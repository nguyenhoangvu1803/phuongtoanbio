<?php

defined('ABSPATH') or die('You cannot access this script directly');

require_once( CMS_IMPORT_PATH . '/inc/database.php' );

class CMS_Import {

    public $cms_db;
    public $list_db;
    public $source_url = "";
    public $demo_folder = "";

    public function __construct() {
        //Add Menu
        add_action('admin_menu', function () {
            add_submenu_page(
                    'themes.php', esc_html__('Import Data', 'cmstheme-import'), esc_html__('Install Demo', 'cmstheme-import'), 'manage_options', 'cmstheme-import-data', array($this, 'page_settings')
            );
        });
        //add_action( 'admin_init', array( $this, 'plugin_redirect' ) );
        add_action('admin_init', array($this, 'register_scripts'));
        //add_action( 'admin_init', array( $this, 'stop_heartbeat' ), 1 );
        add_action('wp_ajax_cmstheme_import', array($this, 'ajax_import_data'));

        $this->cms_db = new CMS_Database();

        require_once ABSPATH . 'wp-admin/includes/import.php';

        if (!class_exists('WP_Importer')) { // if main importer class doesn't exist
            $wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
            require $wp_importer;
        }

        if (!class_exists('WP_Import')) { // if WP importer doesn't exist
            require CMS_IMPORT_PATH . 'lib/parsers.php';
            $wp_import = CMS_IMPORT_PATH . 'lib/wordpress-importer.php';
            require $wp_import;
        }
    }

    public function stop_heartbeat() {
        global $pagenow;
        if ($pagenow == "themes.php" && $_GET['page'] == 'cmstheme-import-data' && CMS_IMPORT_AJAX) {
            wp_deregister_script('heartbeat');
        }
    }

    /**
     * Activation Hook
     * Set Option for check Activaton Redirect
     */
    public function activation_hook() {
        add_option('cmstheme_import_do_activation_redirect', true);
    }

    /**
     * Deactivation Hook
     */
    public function deactivation_hook() {
        
    }

    /**
     * Check and redirect page after activated plugin
     */
    public function plugin_redirect() {
        if (get_option('cmstheme_import_do_activation_redirect', false)) {
            delete_option('cmstheme_import_do_activation_redirect');
            wp_redirect("themes.php?page=cmstheme-import-data");
            exit;
        }
    }

    /**
     * Register Scripts
     */
    public function register_scripts() {
        wp_register_style('cmstheme-main-css', CMS_IMPORT_URL . 'assets/css/cmstheme-import.min.css', '1.1.0');
        wp_enqueue_style('cmstheme-main-css');
        /* if( CMS_IMPORT_AJAX ) {
          wp_register_script( 'cmstheme-main-js', CMS_IMPORT_URL . 'assets/js/cmstheme-import.min.js', array( 'jquery' ), '1.1.0', true );
          wp_enqueue_script( 'cmstheme-main-js' );
          wp_localize_script( 'cmstheme-main-js', 'CMSImport', array( 'dashboard' => home_url('/') ) );
          } */
    }

    /**
     * Copy file to WP Upload folder
     *
     * @param $src
     * @param $upload_dir
     */
    private function extra_files($src, $upload_dir) {
        $dir = opendir($src);
        @mkdir($upload_dir);
        while (false !== ( $file = readdir($dir) )) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if (is_dir($src . '/' . $file)) {
                    $this->extra_files($src . '/' . $file, $upload_dir . '/' . $file);
                } else {
                    copy($src . '/' . $file, $upload_dir . '/' . $file);
                }
            }
        }
        closedir($dir);
    }

    /**
     * Import Database
     * Read all database has split on "databases" folder
     *
     * @return bool
     */
    public function import() {


        $file = CMS_THEME_PATH . '/sample-data/' . $this->demo_folder . '/media.xml';
        $this->transfer($file);

        /**
         * Read and Execute query
         */
        $this->list_db = glob(CMS_THEME_PATH . '/sample-data/' . $this->demo_folder . '/sql/*.sql');
            foreach ($this->list_db as $file) {
            $this->cms_db->import($file, $this->source_url, CMS_IMPORT_SITE_URL);
        }
        /**
         * Update Prefix And Meta Key
         */
        $this->cms_db->update_site_url(CMS_IMPORT_SITE_URL);
        /**
         * Update Theme Options Link
         */
        $this->cms_db->update_theme_options($this->source_url, CMS_IMPORT_SITE_URL);
        //Import Widget
        $widgets_json = CMS_THEME_PATH . '/sample-data/' . $this->demo_folder . '/widget_data.json';
        $widgets_json = file_get_contents($widgets_json);
        $widget_data = $widgets_json;
        $import_widgets = $this->cms_import_widget_data($widget_data);

        return true;
    }

    /**
     * Page Settings UI
     */
    public function page_settings() {
        if (isset($_POST['submit'])) {
            $this->source_url = $_POST['source_url'];
            $this->demo_folder = $_POST['demo_folder'];
            if (!empty($this->source_url) && !empty($this->demo_folder)) {
                if (!@$this->import()) {
                    $status = 400;
                } else {
                    $status = 200;
                }
            }
        }
        require_once( CMS_THEME_PATH . '/sample-data/layout.php' );
    }

    public function transfer($file) {

        $importer = new WP_Import();
        /* Import Images */
        $theme_xml = $file;
        //ob_start();
        $importer->fetch_attachments = true;

        $importer->import($theme_xml);
        //ob_end_clean();

        flush_rewrite_rules();
        return true;
    }

    /**
     * Ajax Request Import Data
     */
    public function ajax_import_data() {
        $msg = json_encode(array('status' => 400));
        $file = CMS_IMPORT_PATH . 'data/media.xml';
        if (@$this->import()) {
            $msg = json_encode(array('status' => 200));
        }
        echo $msg;
        die();
    }

    // Parsing Widgets Function
    // Thanks to http://wordpress.org/plugins/widget-settings-importexport/
    public function cms_import_widget_data($widget_data) {
        $json_data = $widget_data;
        $json_data = json_decode($json_data, true);

        $sidebar_data = $json_data[0];
        $widget_data = $json_data[1];
        
        foreach ($widget_data as $widget_data_title => $widget_data_value) {
            $widgets[$widget_data_title] = '';
            foreach ($widget_data_value as $widget_data_key => $widget_data_array) {
                if (is_int($widget_data_key)) {
                    $widgets[$widget_data_title][$widget_data_key] = 'on';
                }
            }
        }
        unset($widgets[""]);

        foreach ($sidebar_data as $title => $sidebar) {
            $count = count($sidebar);
            for ($i = 0; $i < $count; $i++) {
                $widget = array();
                $widget['type'] = trim(substr($sidebar[$i], 0, strrpos($sidebar[$i], '-')));
                $widget['type-index'] = trim(substr($sidebar[$i], strrpos($sidebar[$i], '-') + 1));
                if (!isset($widgets[$widget['type']][$widget['type-index']])) {
                    unset($sidebar_data[$title][$i]);
                }
            }
            $sidebar_data[$title] = array_values($sidebar_data[$title]);
        }

        foreach ($widgets as $widget_title => $widget_value) {
            foreach ($widget_value as $widget_key => $widget_value) {
                $widgets[$widget_title][$widget_key] = $widget_data[$widget_title][$widget_key];
            }
        }

        $sidebar_data = array(array_filter($sidebar_data), $widgets);

        $this->cms_parse_import_data($sidebar_data);
    }

    public function cms_parse_import_data($import_array) {
        global $wp_registered_sidebars;
        $sidebars_data = $import_array[0];
        $widget_data = $import_array[1];
        $current_sidebars = get_option('sidebars_widgets');
        $new_widgets = array();

        foreach ($sidebars_data as $import_sidebar => $import_widgets) :

            foreach ($import_widgets as $import_widget) :
                //if the sidebar exists
                if (isset($wp_registered_sidebars[$import_sidebar])) :
                    $title = trim(substr($import_widget, 0, strrpos($import_widget, '-')));
                    $index = trim(substr($import_widget, strrpos($import_widget, '-') + 1));
                    $current_widget_data = get_option('widget_' . $title);
                    $new_widget_name = $this->cms_get_new_widget_name($title, $index);
                    $new_index = trim(substr($new_widget_name, strrpos($new_widget_name, '-') + 1));

                    if (!empty($new_widgets[$title]) && is_array($new_widgets[$title])) {
                        while (array_key_exists($new_index, $new_widgets[$title])) {
                            $new_index++;
                        }
                    }
                    $current_sidebars[$import_sidebar][] = $title . '-' . $new_index;
                    if (array_key_exists($title, $new_widgets)) {
                        if ('nav_menu' == $title & !is_numeric($index)) {
                            $menu = $this->wp_get_nav_menu_object($index);
                            $menu_id = $menu->term_id;
                            $new_widgets[$title][$new_index] = $menu_id;
                        } else {
                            $new_widgets[$title][$new_index] = $widget_data[$title][$index];
                        }
                        $multiwidget = $new_widgets[$title]['_multiwidget'];
                        unset($new_widgets[$title]['_multiwidget']);
                        $new_widgets[$title]['_multiwidget'] = $multiwidget;
                    } else {
                        if ('nav_menu' == $title & !is_numeric($index)) {
                            $menu = $this->wp_get_nav_menu_object($index);
                            $menu_id = $menu->term_id;
                            $current_widget_data[$new_index] = $menu_id;
                        } else {
                            $current_widget_data[$new_index] = $widget_data[$title][$index];
                        }
                        $current_multiwidget = isset($current_widget_data['_multiwidget']) ? $current_widget_data['_multiwidget'] : false;
                        $new_multiwidget = isset($widget_data[$title]['_multiwidget']) ? $widget_data[$title]['_multiwidget'] : false;
                        $multiwidget = ($current_multiwidget != $new_multiwidget) ? $current_multiwidget : 1;
                        unset($current_widget_data['_multiwidget']);
                        $current_widget_data['_multiwidget'] = $multiwidget;
                        $new_widgets[$title] = $current_widget_data;
                    }

                endif;
            endforeach;
        endforeach;

        if (isset($new_widgets) && isset($current_sidebars)) {
            update_option('sidebars_widgets', $current_sidebars);

            foreach ($new_widgets as $title => $content)
                update_option('widget_' . $title, $content);

            return true;
        }

        return false;
    }

    public function cms_get_new_widget_name($widget_name, $widget_index) {
        $current_sidebars = get_option('sidebars_widgets');
        $all_widget_array = array();
        foreach ($current_sidebars as $sidebar => $widgets) {
            if (!empty($widgets) && is_array($widgets) && $sidebar != 'wp_inactive_widgets') {
                foreach ($widgets as $widget) {
                    $all_widget_array[] = $widget;
                }
            }
        }
        while (in_array($widget_name . '-' . $widget_index, $all_widget_array)) {
            $widget_index++;
        }
        $new_widget_name = $widget_name . '-' . $widget_index;
        return $new_widget_name;
    }

}
