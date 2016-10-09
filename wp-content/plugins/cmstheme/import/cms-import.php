<?php

define( 'CMS_IMPORT_PATH', plugin_dir_path( __FILE__ ) );
define( 'CMS_IMPORT_URL', plugin_dir_url( __FILE__ ) );
define( 'CMS_IMPORT_SITE_URL', rtrim( get_site_url(), '/' ) );
//define( 'CMS_IMPORT_DEMO_URL', 'http://localhost/wordpress/test-import' );
define( 'CMS_IMPORT_AJAX', true);
define( 'CMS_THEME_PATH', get_template_directory());

require_once( CMS_IMPORT_PATH . '/inc/import.php' );

$cms_import = new CMS_Import();

//register_activation_hook( __FILE__, array( &$cms_import, 'activation_hook' ) );