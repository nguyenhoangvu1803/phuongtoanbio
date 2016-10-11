<?php

/**
 * Auto create .css file from Theme Options
 * @author ZoTheme
 * @version 1.0.0
 */
class ZoTheme_StaticCss
{

    public $scss;

    function __construct()
    {
        global $smof_data;

        /* scss */
        $this->scss = new scssc();

        /* set paths scss */
        $this->scss->setImportPaths(get_template_directory() . '/assets/scss/');

        /* generate css over time */
        if (isset($smof_data['dev_mode']) && $smof_data['dev_mode']) {
            $this->generate_file();
        } else {
            /* save option generate css */
            add_action("redux/options/smof_data/saved", array(
                $this,
                'generate_file'
            ));
        }
    }

    /**
     * generate css file.
     *
     * @since 1.0.0
     */
    public function generate_file()
    {
        global $smof_data;
        if (! empty($smof_data)) {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            WP_Filesystem();
            global $wp_filesystem;

            /* write options to scss file */
            
			if ( ! $wp_filesystem->put_contents( get_template_directory() . '/assets/scss/options.scss', $this->css_render(), 0644 ) ) {
				_e( 'Error saving file!', 'ori' );
			}

            /* minimize CSS styles */
            if (!$smof_data['dev_mode']) {
                $this->scss->setFormatter('scss_formatter_compressed');
            }

            /* compile scss to css */
            $css = $this->scss_render();

            $file = "static.css";

            if(!empty($smof_data['presets_color']) && $smof_data['presets_color']){
                $file = "presets-".$smof_data['presets_color'].".css";
            }

            /* write static.css file */
			if ( ! $wp_filesystem->put_contents( get_template_directory() . '/assets/css/' . $file, $css, 0644) ) {
				_e( 'Error saving file!', 'ori' );
			}
        }
    }

    /**
     * scss compile
     *
     * @since 1.0.0
     * @return string
     */
    public function scss_render(){
        /* compile scss to css */
        return $this->scss->compile('@import "master.scss"');
    }

    /**
     * main css
     *
     * @since 1.0.0
     * @return string
     */
    public function css_render()
    {
        global $smof_data, $zo_base;
        ob_start();
        /* local fonts */
        $zo_base->setTypographyLocal($smof_data['local-fonts-1'], $smof_data['local-fonts-selector-1']);
        $zo_base->setTypographyLocal($smof_data['local-fonts-2'], $smof_data['local-fonts-selector-2']);
		zo_setvariablescss($smof_data['primary_color'],'$primary_color','#e03e25');
        /* ==========================================================================
           Start Header
        ========================================================================== */
		
		// Link
		if(!empty($smof_data['link_color'])){
			echo 'a{ color: '. esc_attr($smof_data['link_color']) .'; }';
		}
		if(!empty($smof_data['link_hover_color'])){
			echo 'a:hover{ color: '. esc_attr($smof_data['link_hover_color']) .'; }';
		}
		if(!empty($smof_data['link_active_color'])){
			echo 'a:active, a:focus{ color: '. esc_attr($smof_data['link_active_color']) .'; }';
		}
		
		
		// Body - Boxed
		$width = 1200;
		if(!empty($smof_data['boxed_width']) && is_numeric($smof_data['boxed_width'])){
			$width = (int)$smof_data['boxed_width'];
		}
		echo '@media(min-width: 1170px) {';
			echo 'body.zo-boxed #page, body.zo-boxed header{';
			echo 'width: ' . esc_attr($width) . 'px;';
			echo '}';
			echo 'body.zo-boxed #page #zo-header, body.zo-boxed #page #zo-header-top {';
			echo 'width: ' . esc_attr($width) . 'px;';
			echo 'max-width: 100%;';
			echo 'margin-left: auto;';
			echo 'margin-right: auto;';
			echo '}';
		echo '}';
		
		// Main Header
		$header_border_bottom_width = !empty($smof_data['mheader_border_bottom']['border-bottom']) ? $smof_data['mheader_border_bottom']['border-bottom'] : '';
		$header_border_bottom_style = !empty($smof_data['mheader_border_bottom']['border-style']) ? $smof_data['mheader_border_bottom']['border-style'] : '';
		$header_border_bottom_color = !empty($smof_data['mheader_border_bottom']['border-color']) ? $smof_data['mheader_border_bottom']['border-color'] : '';
		if(!empty($header_border_bottom_width) || !empty($header_border_bottom_style) || !empty($header_border_bottom_color)) {
			echo '#zo-header {';
				if(!empty($header_border_bottom_width))
					echo 'border-bottom-width: '. esc_attr($header_border_bottom_width) .';';
				if(!empty($header_border_bottom_style))
					echo 'border-bottom-style: '. esc_attr($header_border_bottom_style) .';';
				if(!empty($header_border_bottom_color))
					echo 'border-bottom-color: '. esc_attr($header_border_bottom_color) .';';
			echo '}';
		}
		
		// Menu - Screen >= 992px
		echo '@media(min-width: 992px) {';
			if(!empty($smof_data['menu_fsize_flevel'])) { 
				echo '.nav-menu > li, .nav-menu > li > a, .widget_cart_search_wrap a {';
					if(!empty($smof_data['menu_fsize_flevel']['font-family']))
						echo 'font-family: '. esc_attr($smof_data['menu_fsize_flevel']['font-family']) .';';
					if(!empty($smof_data['menu_fsize_flevel']['font-weight']))
						echo 'font-weight: '. esc_attr($smof_data['menu_fsize_flevel']['font-weight']) .';';
					if(!empty($smof_data['menu_fsize_flevel']['text-transform']))
						echo 'text-transform: '. esc_attr($smof_data['menu_fsize_flevel']['text-transform']) .';';
					if(!empty($smof_data['menu_fsize_flevel']['font-size']))
						echo 'font-size: '. esc_attr($smof_data['menu_fsize_flevel']['font-size']) .';';
					if(!empty($smof_data['menu_fsize_flevel']['letter-spacing']))
						echo 'letter-spacing: '. esc_attr($smof_data['menu_fsize_flevel']['letter-spacing']) .';';
				echo '}';
				if(!empty($smof_data['menu_fsize_flevel']['text-align'])){
					echo '.nav-menu, .nav-menu > li {
						text-align: '. esc_attr($smof_data['menu_fsize_flevel']['text-align']) .';
					}';
				}
			}
			if(!empty($smof_data['menu_padding_first_level'])) {
				echo '.nav-menu > li {';
					if(!empty($smof_data['menu_padding_first_level']['padding-top'])) 
						echo 'padding-top: '. esc_attr($smof_data['menu_padding_first_level']['padding-top']) .';';
					if(!empty($smof_data['menu_padding_first_level']['padding-right'])) 
						echo 'padding-right: '. esc_attr($smof_data['menu_padding_first_level']['padding-right']) .';';
					if(!empty($smof_data['menu_padding_first_level']['padding-bottom'])) 
						echo 'padding-bottom: '. esc_attr($smof_data['menu_padding_first_level']['padding-bottom']) .';';
					if(!empty($smof_data['menu_padding_first_level']['padding-left'])) 
						echo 'padding-left: '. esc_attr($smof_data['menu_padding_first_level']['padding-left']) .';';
				echo '}';
				echo '.nav-menu > li:last-child { padding-right: 0; }';
			}
			if(!empty($smof_data['menu_margin_first_level'])) {
				echo '.nav-menu > li {';
					if(!empty($smof_data['menu_margin_first_level']['margin-top'])) 
						echo 'margin-top: '. esc_attr($smof_data['menu_margin_first_level']['margin-top']) .';';
					if(!empty($smof_data['menu_margin_first_level']['margin-right'])) 
						echo 'margin-right: '. esc_attr($smof_data['menu_margin_first_level']['margin-right']) .';';
					if(!empty($smof_data['menu_margin_first_level']['margin-bottom'])) 
						echo 'margin-bottom: '. esc_attr($smof_data['menu_margin_first_level']['margin-bottom']) .';';
					if(!empty($smof_data['menu_margin_first_level']['margin-left'])) 
						echo 'margin-left: '. esc_attr($smof_data['menu_margin_first_level']['margin-left']) .';';
				echo '}';
				echo '.nav-menu > li:last-child { margin-right: 0; }';
			}
		echo '}';
		
		// Phone Menu - Screen < 992px
		echo '@media(max-width: 991px) {';
			if(!empty($smof_data['pmenu_fsize_flevel'])) { 
				echo '.nav-menu > li, .nav-menu > li > a, .widget_cart_search_wrap a {';
					if(!empty($smof_data['pmenu_fsize_flevel']['font-family']))
						echo 'font-family: '. esc_attr($smof_data['pmenu_fsize_flevel']['font-family']) .';';
					if(!empty($smof_data['pmenu_fsize_flevel']['font-weight']))
						echo 'font-weight: '. esc_attr($smof_data['pmenu_fsize_flevel']['font-weight']) .';';
					if(!empty($smof_data['pmenu_fsize_flevel']['text-transform']))
						echo 'text-transform: '. esc_attr($smof_data['pmenu_fsize_flevel']['text-transform']) .';';
					if(!empty($smof_data['pmenu_fsize_flevel']['font-size']))
						echo 'font-size: '. esc_attr($smof_data['pmenu_fsize_flevel']['font-size']) .';';
					if(!empty($smof_data['pmenu_fsize_flevel']['letter-spacing']))
						echo 'letter-spacing: '. esc_attr($smof_data['pmenu_fsize_flevel']['letter-spacing']) .';';
					if(!empty($smof_data['pmenu_fsize_flevel']['line-height']))
						echo 'line-height: '. esc_attr($smof_data['pmenu_fsize_flevel']['line-height']) .';';
				echo '}';
			}
			if(!empty($smof_data['pmenu_color_first_level'])) {
				echo ".nav-menu > li, .nav-menu > li > a, .widget_cart_search_wrap a {
					color:". esc_attr($smof_data['pmenu_color_first_level']) .";
				}";
			}
			if(!empty($smof_data['pmenu_color_hover_first_level'])){
				echo ".nav-menu > li:hover, 
					.nav-menu > li.active,
					.nav-menu > li.active > a,
					.nav-menu > li.active:hover,
					.nav-menu > li:hover > a, 
					.nav-menu > li:hover > a:active, 
					.widget_cart_search_wrap a:hover, 
					.nav-menu > li.current_page_item,
					.nav-menu > li.current_page_ancestor,
					.nav-menu > li.current-menu-item ,
					.nav-menu > li.current-menu-ancestor,
					.nav-menu > li.current_page_item > a,
					.nav-menu > li.current_page_ancestor > a,
					.nav-menu > li.current-menu-item > a,
					.nav-menu > li.current-menu-ancestor > a { ";
					echo "color:". esc_attr($smof_data['pmenu_color_hover_first_level']) .";";
				echo "}";
			}
			if(!empty($smof_data['pmenu_bg_color'])){
				echo ".zo-header-navigation {";
					if(!empty($smof_data['pmenu_bg_color']['rgba'])){
						echo "background-color:". esc_attr($smof_data['pmenu_bg_color']['rgba']) .";";
					} elseif(!empty($smof_data['pmenu_bg_color']['color'])) {
						echo "background-color:". esc_attr($smof_data['pmenu_bg_color']['color']) .";";
					}
				echo "}";
			}
			if(!empty($smof_data['pmenu_border_top'])) {
				echo '.zo-header-navigation {';
					if(!empty($smof_data['pmenu_border_top']['border-top']))
						echo 'border-top-width: '. esc_attr($smof_data['pmenu_border_top']['border-top']) .';';
					if(!empty($smof_data['pmenu_border_top']['border-style']))
						echo 'border-top-style: '. esc_attr($smof_data['pmenu_border_top']['border-style']) .';';
					if(!empty($smof_data['pmenu_border_top']['border-color']))
						echo 'border-top-color: '. esc_attr($smof_data['pmenu_border_top']['border-color']) .';';
				echo '}';
			}
			if(!empty($smof_data['pmenu_border_bottom'])) {
				echo '.zo-header-navigation {';
					if(!empty($smof_data['pmenu_border_bottom']['border-top']))
						echo 'border-bottom-width: '. esc_attr($smof_data['pmenu_border_bottom']['border-top']) .';';
					if(!empty($smof_data['pmenu_border_bottom']['border-style']))
						echo 'border-bottom-style: '. esc_attr($smof_data['pmenu_border_bottom']['border-style']) .';';
					if(!empty($smof_data['pmenu_border_bottom']['border-color']))
						echo 'border-bottom-color: '. esc_attr($smof_data['pmenu_border_bottom']['border-color']) .';';
				echo '}';
			}
			if(!empty($smof_data['pmenu_padding_flevel'])) {
				echo '.zo-header-navigation {';
					if(!empty($smof_data['pmenu_padding_flevel']['padding-top']) || $smof_data['pmenu_padding_flevel']['padding-top'] == '0') 
						echo 'padding-top: '. esc_attr($smof_data['pmenu_padding_flevel']['padding-top']) .';';
					if(!empty($smof_data['pmenu_padding_flevel']['padding-right']) || $smof_data['pmenu_padding_flevel']['padding-right'] == '0') 
						echo 'padding-right: '. esc_attr($smof_data['pmenu_padding_flevel']['padding-right']) .';';
					if(!empty($smof_data['pmenu_padding_flevel']['padding-bottom']) || $smof_data['pmenu_padding_flevel']['padding-bottom'] == '0') 
						echo 'padding-bottom: '. esc_attr($smof_data['pmenu_padding_flevel']['padding-bottom']) .';';
					if(!empty($smof_data['pmenu_padding_flevel']['padding-left']) || $smof_data['pmenu_padding_flevel']['padding-left'] == '0') 
						echo 'padding-left: '. esc_attr($smof_data['pmenu_padding_flevel']['padding-left']) .';';
				echo '}';
			}
			if(!empty($smof_data['pmenu_fsize_slevel'])) { 
				echo '.nav-menu > li ul > li, .nav-menu > li ul > li > a {';
					if(!empty($smof_data['pmenu_fsize_slevel']['font-family']))
						echo 'font-family: '. esc_attr($smof_data['pmenu_fsize_slevel']['font-family']) .';';
					if(!empty($smof_data['pmenu_fsize_slevel']['font-weight']))
						echo 'font-weight: '. esc_attr($smof_data['pmenu_fsize_slevel']['font-weight']) .';';
					if(!empty($smof_data['pmenu_fsize_slevel']['text-transform']))
						echo 'text-transform: '. esc_attr($smof_data['pmenu_fsize_slevel']['text-transform']) .';';
					if(!empty($smof_data['pmenu_fsize_slevel']['font-size']))
						echo 'font-size: '. esc_attr($smof_data['pmenu_fsize_slevel']['font-size']) .';';
					if(!empty($smof_data['pmenu_fsize_slevel']['letter-spacing']))
						echo 'letter-spacing: '. esc_attr($smof_data['pmenu_fsize_slevel']['letter-spacing']) .';';
					if(!empty($smof_data['pmenu_fsize_slevel']['line-height']))
						echo 'line-height: '. esc_attr($smof_data['pmenu_fsize_slevel']['line-height']) .';';
				echo '}';
			}
			if(!empty($smof_data['pmenu_color_sub_level'])){
				echo ".nav-menu > li ul > li,
					.nav-menu > li ul li > a {
					color:". esc_attr($smof_data['pmenu_color_sub_level']) .";
				}";
			}
			if(!empty($smof_data['pmenu_color_hover_sub_level'])){
				echo ".nav-menu > li ul li:hover > a,
				.nav-menu > li ul li:hover,
				.nav-menu > li ul a:focus,
				.nav-menu > li ul li.current_page_item > a,
				.nav-menu > li ul li.current_page_item,
				.nav-menu > li ul li.current-menu-item > a,
				.nav-menu > li ul li.current-menu-item,
				.nav-menu > li ul li.current-menu-parent > a,
				.nav-menu > li ul li.current-menu-parent,
				.nav-menu > li ul li.current-menu-ancestor > a,
				.nav-menu > li ul li.current-menu-ancestor {
					color:". esc_attr($smof_data['pmenu_color_hover_sub_level']) .";
				}";
			}
			if(!empty($smof_data['pmenu_padding_slevel'])) {
				echo '.nav-menu ul.sub-menu {';
					if(!empty($smof_data['pmenu_padding_slevel']['padding-top']) || $smof_data['pmenu_padding_slevel']['padding-top'] == '0') 
						echo 'padding-top: '. esc_attr($smof_data['pmenu_padding_slevel']['padding-top']) .';';
					if(!empty($smof_data['pmenu_padding_slevel']['padding-right']) || $smof_data['pmenu_padding_slevel']['padding-right'] == '0') 
						echo 'padding-right: '. esc_attr($smof_data['pmenu_padding_slevel']['padding-right']) .';';
					if(!empty($smof_data['pmenu_padding_slevel']['padding-bottom']) || $smof_data['pmenu_padding_slevel']['padding-bottom'] == '0') 
						echo 'padding-bottom: '. esc_attr($smof_data['pmenu_padding_slevel']['padding-bottom']) .';';
					if(!empty($smof_data['pmenu_padding_slevel']['padding-left']) || $smof_data['pmenu_padding_slevel']['padding-left'] == '0') 
						echo 'padding-left: '. esc_attr($smof_data['pmenu_padding_slevel']['padding-left']) .';';
				echo '}';
			}
		echo '}';
		
		// Sticky Header (Fixed)
		if(!empty($smof_data['sheader_height'])) {
			echo '.header-fixed #zo-header-logo a, .header-fixed .nav-menu > li > a {
				line-height: '. esc_attr($smof_data['sheader_height']) .'px;
			}';
			echo '.header-fixed #zo-header-logo a img {
				max-height: '. esc_attr($smof_data['sheader_height']) .'px;
			}';
		}
		if(!empty($smof_data['sheader_background'])) {
			echo '#zo-header.header-fixed { ';
				if(!empty($smof_data['sheader_background']['rgba'])) {
					echo 'background-color: '. esc_attr($smof_data['sheader_background']['rgba']).';';
				} else if(!empty($smof_data['sheader_background']['color'])) {
					echo 'background-color: '. esc_attr($smof_data['sheader_background']['color']).';';
				}
			echo '}';
		}
		if(!empty($smof_data['smenu_color_first_level'])){
			echo ".header-fixed .nav-menu > li, .header-fixed .nav-menu > li > a, .header-fixed .widget_cart_search_wrap a {
				color:".esc_attr($smof_data['smenu_color_first_level']).";
			}";
		}
		if(!empty($smof_data['smenu_color_hover_first_level'])){
			echo ".header-fixed .nav-menu > li:hover, 
				.header-fixed .nav-menu > li:hover > a, 
				.header-fixed .widget_cart_search_wrap a:hover, 
				.header-fixed .nav-menu > li.current_page_item,
				.header-fixed .nav-menu > li.current_page_ancestor,
				.header-fixed .nav-menu > li.current-menu-item ,
				.header-fixed .nav-menu > li.current-menu-ancestor,
				.header-fixed .nav-menu > li.current_page_item > a,
				.header-fixed .nav-menu > li.current_page_ancestor > a,
				.header-fixed .nav-menu > li.current-menu-item > a,
				.header-fixed .nav-menu > li.current-menu-ancestor > a { ";
				echo "color:". esc_attr($smof_data['smenu_color_hover_first_level']) .";";
			echo "}";
		}
        if(!empty($smof_data['smenu_color_hover_sub_level'])){
            echo ".header-fixed .nav-menu > li ul li:hover > a,
			.header-fixed .nav-menu > li ul li:hover,
			.header-fixed .nav-menu > li ul a:focus,
			.header-fixed .nav-menu > li ul li.current_page_item > a,
			.header-fixed .nav-menu > li ul li.current_page_item,
			.header-fixed .nav-menu > li ul li.current-menu-item > a,
			.header-fixed .nav-menu > li ul li.current-menu-item,
			.header-fixed .nav-menu > li ul li.current-menu-parent > a,
			.header-fixed .nav-menu > li ul li.current-menu-parent,
			.header-fixed .nav-menu > li ul li.current-menu-ancestor > a,
			.header-fixed .nav-menu > li ul li.current-menu-ancestor {
				color:". esc_attr($smof_data['smenu_color_hover_sub_level']) .";
			}";
        }
		if(!empty($smof_data['smenu_background_color_hover_sub_level'])){
			echo ".header-fixed .nav-menu > li ul li:hover,
			.header-fixed .nav-menu > li ul li:focus,
			.header-fixed .nav-menu > li ul li.current_page_item,
			.header-fixed .nav-menu > li ul li.current-menu-item,
			.header-fixed .nav-menu > li ul li.current-menu-parent,
			.header-fixed .nav-menu > li ul li.current-menu-ancestor {";
				if(!empty($smof_data['smenu_background_color_hover_sub_level']['rgba'])){
					echo "background-color:". esc_attr($smof_data['smenu_background_color_hover_sub_level']['rgba']) .";";
				} elseif(!empty($smof_data['smenu_background_color_hover_sub_level']['color'])) {
					echo "background-color:". esc_attr($smof_data['smenu_background_color_hover_sub_level']['color']) .";";
				}
			echo "}";
		}
        
		// Page Title
		if(!empty($smof_data['page_title_border_top'])) {
			echo '#zo-page-element-wrap {';
				if(!empty($smof_data['page_title_border_top']['border-top']))
					echo 'border-top-width: '. esc_attr($smof_data['page_title_border_top']['border-top']) .';';
				if(!empty($smof_data['page_title_border_top']['border-style']))
					echo 'border-top-style: '. esc_attr($smof_data['page_title_border_top']['border-style']) .';';
				if(!empty($smof_data['page_title_border_top']['border-color']))
					echo 'border-top-color: '. esc_attr($smof_data['page_title_border_top']['border-color']) .';';
			echo '}';
		}
		if(!empty($smof_data['page_title_border_bottom'])) {
			echo '#zo-page-element-wrap {';
				if(!empty($smof_data['page_title_border_bottom']['border-top']))
					echo 'border-bottom-width: '. esc_attr($smof_data['page_title_border_bottom']['border-top']) .';';
				if(!empty($smof_data['page_title_border_bottom']['border-style']))
					echo 'border-bottom-style: '. esc_attr($smof_data['page_title_border_bottom']['border-style']) .';';
				if(!empty($smof_data['page_title_border_bottom']['border-color']))
					echo 'border-bottom-color: '. esc_attr($smof_data['page_title_border_bottom']['border-color']) .';';
			echo '}';
		}
		
		
        /* ==========================================================================
           Start Footer
        ========================================================================== */
        /* Footer Top */
        if($smof_data['footer_heading_color']){
            echo "#zo-footer-top .wg-title:before {
				background-color:".esc_attr($smof_data['footer_heading_color']).";
			}";
        }
        /* End Footer Top */
		
        return ob_get_clean();
    }
}

new ZoTheme_StaticCss();