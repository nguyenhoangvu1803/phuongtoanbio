<?php

/**
 * Auto create css from Meta Options.
 *
 * @author ZoTheme
 * @version 1.0.0
 */
class ZoTheme_DynamicCss
{

    function __construct()
    {
        add_action('wp_head', array($this, 'generate_css'));
    }

    /**
     * generate css inline.
     *
     * @since 1.0.0
     */
    public function generate_css()
    {
        global $smof_data, $zo_base;
        $css = $this->css_render();
        if (! $smof_data['dev_mode']) {
            $css = $zo_base->compressCss($css);
        }
        echo '<style type="text/css" data-type="zo_shortcodes-custom-css">'.$css.'</style>';
    }

    /**
     * header css
     *
     * @since 1.0.0
     * @return string
     */
    public function css_render()
    {
        global $smof_data, $zo_meta;
        ob_start();

        /* custom css.  */
        if( isset($smof_data['custom_css']) ) {
            echo wp_filter_nohtml_kses(trim($smof_data['custom_css']))."\n";
        }
		
		/* For Boxed */
		if(!empty($zo_meta->_zo_page_boxed_bg)){
			echo "body.page.zo-boxed {
				background: url(". esc_attr(wp_get_attachment_image_src( $zo_meta->_zo_page_boxed_bg, 'full' )[0]) . ");
				background-attachment: fixed;
			}";
		}
		if(!empty($zo_meta->_zo_page_boxed_padding)){
			echo "body.zo-boxed {
				padding: ". esc_attr( $zo_meta->_zo_page_boxed_padding) . ";
			}";
		}
		
        /* ==========================================================================
           Start Header
        ========================================================================== */
		
		// Top Bar
		$tbar_background_color = !empty($smof_data['tbar_background_color']) ? $smof_data['tbar_background_color'] : '';
		$tbar_background_color = !empty($zo_meta->_zo_tbar_background_color) ? $zo_meta->_zo_tbar_background_color : $tbar_background_color;
		if($tbar_background_color) {
			echo '#zo-header-top {
				background-color: '. esc_attr($tbar_background_color) .';
			}';
		}
		$tbar_border_bottom_width = !empty($smof_data['tbar_border_bottom']['border-bottom']) ? $smof_data['tbar_border_bottom']['border-bottom'] : '';
		$tbar_border_bottom_width = !empty($zo_meta->_zo_tbar_border_bottom_width) ? $zo_meta->_zo_tbar_border_bottom_width : $tbar_border_bottom_width;
		$tbar_border_bottom_style = !empty($smof_data['tbar_border_bottom']['border-style']) ? $smof_data['tbar_border_bottom']['border-style'] : '';
		$tbar_border_bottom_style = !empty($zo_meta->_zo_tbar_border_bottom_style) ? $zo_meta->_zo_tbar_border_bottom_style : $tbar_border_bottom_style;
		$tbar_border_bottom_color = !empty($smof_data['tbar_border_bottom']['border-color']) ? $smof_data['tbar_border_bottom']['border-color'] : '';
		$tbar_border_bottom_color = !empty($zo_meta->_zo_tbar_border_bottom_color) ? $zo_meta->_zo_tbar_border_bottom_color : $tbar_border_bottom_color;
		if(!empty($tbar_border_bottom_width) || !empty($tbar_border_bottom_style) || !empty($tbar_border_bottom_color)) {
			echo '#zo-header-top {';
				if(!empty($tbar_border_bottom_width))
					echo 'border-bottom-width: '. esc_attr($tbar_border_bottom_width) .';';
				if(!empty($tbar_border_bottom_style))
					echo 'border-bottom-style: '. esc_attr($tbar_border_bottom_style) .';';
				if(!empty($tbar_border_bottom_color))
					echo 'border-bottom-color: '. esc_attr($tbar_border_bottom_color) .';';
			echo '}';
		}
		$tbar_color = !empty($smof_data['tbar_color']) ? $smof_data['tbar_color'] : '';
		$tbar_color = !empty($zo_meta->_zo_tbar_color) ? $zo_meta->_zo_tbar_color: $tbar_color;
		if($tbar_color) {
			echo '#zo-header-top {
				color: '. esc_attr($tbar_color) .';
			}';
		}
		$regular = !empty($smof_data['tbar_link_color']['regular']) ? $smof_data['tbar_link_color']['regular'] : '';
		$regular = !empty($zo_meta->_zo_tbar_link_color) ? $zo_meta->_zo_tbar_link_color : $regular;
		$hover = !empty($smof_data['tbar_link_color']['hover']) ? $smof_data['tbar_link_color']['hover'] : '';
		$hover = !empty($zo_meta->_zo_tbar_link_hover) ? $zo_meta->_zo_tbar_link_hover : $hover;
		$active = !empty($smof_data['tbar_link_color']['active']) ? $smof_data['tbar_link_color']['active'] : '';
		$active = !empty($zo_meta->_zo_tbar_link_hover) ? $zo_meta->_zo_tbar_link_hover : $active;
		if($regular)
			echo '#zo-header-top a{ color: '. esc_attr($regular) .'; }';
		if($hover)
			echo '#zo-header-top a:hover{ color: '. esc_attr($hover) .'; }';
		if($active)
			echo '#zo-header-top a:active{ color: '. esc_attr($active) .'; }';
		$tbar_info_icon_color = !empty($smof_data['tbar_info_icon_color']) ? $smof_data['tbar_info_icon_color'] : '';
		$tbar_info_icon_color = !empty($zo_meta->_zo_tbar_info_icon_color) ? $zo_meta->_zo_tbar_info_icon_color : $tbar_info_icon_color;
		if($tbar_info_icon_color)
			echo '.top-bar-infomation i {color: '. esc_attr($tbar_info_icon_color) .';}';
		
		// Main Header
		
		// Main Menu Screen > 992px
		echo '@media(min-width: 992px) {';
			$mheader_height = !empty($smof_data['mheader_height']) ? $smof_data['mheader_height'] : '';
			$mheader_height = !empty($zo_meta->_zo_mheader_height) ? $zo_meta->_zo_mheader_height : $mheader_height;
			if($mheader_height) {
				echo '#zo-header-logo a, .nav-menu > li > a {
					line-height: '. esc_attr($mheader_height) .'px;
				}';
				echo '#zo-header-logo a img {
					max-height: '. esc_attr($mheader_height) .'px;
				}';
			}
			$mheader_position = (!empty($smof_data['mheader_position'])) ? $smof_data['mheader_position'] : '';
			$mheader_position = (!empty($zo_meta->_zo_mheader_position)) ? $zo_meta->_zo_mheader_position : $mheader_position;
			if($mheader_position == 'absolute') {
				echo 'header { 
					position: absolute; 
					width: 100%;
				}';
			}
			$mheader_background = (!empty($smof_data['mheader_background']['color'])) ? $smof_data['mheader_background']['color'] : '';
			$mheader_background = (!empty($smof_data['mheader_background']['rgba'])) ? $smof_data['mheader_background']['rgba'] : $mheader_background;
			$mheader_background = (!empty($zo_meta->_zo_mheader_background)) ? $zo_meta->_zo_mheader_background : $mheader_background;
			if($mheader_background) {
				echo '#zo-header { ';
					echo 'background: '. esc_attr($mheader_background).';';
				echo '}';
			}
			$mheader_background_container = (!empty($smof_data['mheader_background_container']['color'])) ? $smof_data['mheader_background_container']['color'] : '';
			$mheader_background_container = (!empty($smof_data['mheader_background_container']['rgba'])) ? $smof_data['mheader_background_container']['rgba'] : $mheader_background_container;
			$mheader_background_container = (!empty($zo_meta->_zo_mheader_background_container)) ? $zo_meta->_zo_mheader_background_container : $mheader_background_container;
			if($mheader_background_container) {
				echo '#zo-header > .container { ';
					echo 'background: '. esc_attr($mheader_background_container).';';
				echo '}';
			}
			$top_submenu = '';
			$menu_border_top_width = !empty($smof_data['menu_border_top']['border-top']) ? $smof_data['menu_border_top']['border-top'] : '';
			$menu_border_top_width = (!empty($zo_meta->_zo_menu_border_top_width)) ? $zo_meta->_zo_menu_border_top_width : $menu_border_top_width;
			$menu_border_top_style = !empty($smof_data['menu_border_top']['border-style']) ? $smof_data['menu_border_top']['border-style'] : '';
			$menu_border_top_style = (!empty($zo_meta->_zo_menu_border_top_style)) ? $zo_meta->_zo_menu_border_top_style : $menu_border_top_style;
			$menu_border_top_color = !empty($smof_data['menu_border_top']['border-color']) ? $smof_data['menu_border_top']['border-color'] : '';
			$menu_border_top_color = (!empty($zo_meta->_zo_menu_border_top_color)) ? $zo_meta->_zo_menu_border_top_color : $menu_border_top_color;
			if($menu_border_top_width) {
				echo '.nav-menu > li {
					border-top-width : '. esc_attr($menu_border_top_width) .';
					border-top-style : '. esc_attr($menu_border_top_style) .';
					border-top-color : transparent;
				}';
				echo '.nav-menu > li:hover, 
					.nav-menu > li.active,
					.nav-menu > li.current_page_item,
					.nav-menu > li.current_page_ancestor,
					.nav-menu > li.current-menu-item,
					.nav-menu > li.current-menu-ancestor {';
						echo 'border-top-width: '. esc_attr($menu_border_top_width) .';';
						echo 'border-top-style: '. esc_attr($menu_border_top_style) .';';
						echo 'border-top-color: '. esc_attr($menu_border_top_color) .';';
				echo '}';
			}
			$menu_border_bottom_width = !empty($smof_data['menu_border_bottom']['border-top']) ? $smof_data['menu_border_bottom']['border-top'] : '';
			$menu_border_bottom_width = (!empty($zo_meta->_zo_menu_border_bottom_width)) ? $zo_meta->_zo_menu_border_bottom_width : $menu_border_bottom_width;
			$menu_border_bottom_style = !empty($smof_data['menu_border_bottom']['border-style']) ? $smof_data['menu_border_bottom']['border-style'] : '';
			$menu_border_bottom_style = (!empty($zo_meta->_zo_menu_border_bottom_style)) ? $zo_meta->_zo_menu_border_bottom_style : $menu_border_bottom_style;
			$menu_border_bottom_color = !empty($smof_data['menu_border_bottom']['border-color']) ? $smof_data['menu_border_bottom']['border-color'] : '';
			$menu_border_bottom_color = (!empty($zo_meta->_zo_menu_border_bottom_color)) ? $zo_meta->_zo_menu_border_bottom_color : $menu_border_bottom_color;
			if($menu_border_bottom_width) {
				$top_submenu += $menu_border_bottom_width;
				echo '.nav-menu > li:hover, 
					.nav-menu > li.active,
					.nav-menu > li.current_page_item,
					.nav-menu > li.current_page_ancestor,
					.nav-menu > li.current-menu-item,
					.nav-menu > li.current-menu-ancestor {';
						echo 'border-bottom-width: '. esc_attr($menu_border_bottom_width) .';';
						echo 'border-bottom-style: '. esc_attr($menu_border_bottom_style) .';';
						echo 'border-bottom-color: '. esc_attr($menu_border_bottom_color) .';';
				echo '}';
			}
			if($top_submenu) {
				echo '.nav-menu > li ul.sub-menu { top : calc( 100% + '. esc_attr($top_submenu) .'px );}';
			}
			$menu_color_first_level = (!empty($smof_data['menu_color_first_level'])) ? $smof_data['menu_color_first_level']: '';
			$menu_color_first_level = (!empty($zo_meta->_zo_menu_color_first_level)) ? $zo_meta->_zo_menu_color_first_level : $menu_color_first_level;
			if($menu_color_first_level) {
				echo ".nav-menu > li, .nav-menu > li > a, .widget_cart_search_wrap a {
					color:". esc_attr($menu_color_first_level) .";
				}";
			}
			$menu_color_hover_first_level = (!empty($smof_data['menu_color_hover_first_level'])) ? $smof_data['menu_color_hover_first_level']: '';
			$menu_color_hover_first_level = (!empty($zo_meta->_zo_menu_color_hover_first_level)) ? $zo_meta->_zo_menu_color_hover_first_level : $menu_color_hover_first_level;
			if($menu_color_hover_first_level){
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
					echo "color:". esc_attr($menu_color_hover_first_level) .";";
				echo "}";
			}
			$menu_background_color_sub_level = (!empty($smof_data['menu_background_color_sub_level']['color'])) ? $smof_data['menu_background_color_sub_level']['color'] : '';
			$menu_background_color_sub_level = (!empty($smof_data['menu_background_color_sub_level']['rgba'])) ? $smof_data['menu_background_color_sub_level']['rgba'] : $menu_background_color_sub_level;
			$menu_background_color_sub_level = (!empty($zo_meta->_zo_menu_background_color_sub_level)) ? $zo_meta->_zo_menu_background_color_sub_level : $menu_background_color_sub_level;
			if($menu_background_color_sub_level) {
				echo ".nav-menu > li ul.sub-menu { ";
					echo 'background: '. esc_attr($menu_background_color_sub_level) .';';
				echo "}";
			}
			$menu_color_sub_level = (!empty($smof_data['menu_color_sub_level'])) ? $smof_data['menu_color_sub_level'] : '';
			$menu_color_sub_level = (!empty($zo_meta->_zo_menu_color_sub_level)) ? $zo_meta->_zo_menu_color_sub_level : $menu_color_sub_level;
			if($menu_color_sub_level){
				echo ".nav-menu > li ul > li,
					.nav-menu > li ul li > a {
					color:". esc_attr($menu_color_sub_level) .";
				}";
			}
			$menu_color_hover_sub_level = (!empty($smof_data['menu_color_hover_sub_level'])) ? $smof_data['menu_color_hover_sub_level'] : '';
			$menu_color_hover_sub_level = (!empty($zo_meta->_zo_menu_color_hover_sub_level)) ? $zo_meta->_zo_menu_color_hover_sub_level : $menu_color_hover_sub_level;
			if($menu_color_hover_sub_level){
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
					color:". esc_attr($menu_color_hover_sub_level) .";
				}";
			}
			$menu_background_color_hover_sub_level = (!empty($smof_data['menu_background_color_hover_sub_level']['color'])) ? $smof_data['menu_background_color_hover_sub_level']['color'] : '';
			$menu_background_color_hover_sub_level = (!empty($smof_data['menu_background_color_hover_sub_level']['rgba'])) ? $smof_data['menu_background_color_hover_sub_level']['rgba'] : $menu_background_color_hover_sub_level;
			$menu_background_color_hover_sub_level = (!empty($zo_meta->_zo_menu_background_color_hover_sub_level)) ? $zo_meta->_zo_menu_background_color_hover_sub_level : $menu_background_color_hover_sub_level;
			if($menu_background_color_hover_sub_level){
				echo ".nav-menu > li ul li:hover,
				.nav-menu > li ul li:focus,
				.nav-menu > li ul li.current_page_item,
				.nav-menu > li ul li.current-menu-item,
				.nav-menu > li ul li.current-menu-parent,
				.nav-menu > li ul li.current-menu-ancestor {";
					echo "background:". esc_attr($menu_background_color_hover_sub_level) .";";
				echo "}";
			}
			if(!empty($zo_meta->_zo_menu_text_align_first_level)) {
				echo ".nav-menu { text-align: ". esc_attr($zo_meta->_zo_menu_text_align_first_level) ."; }";
			}
		echo '}';

        /* Start Page Title */
        if (!empty($zo_meta->_zo_page_title_padding)) {
            echo "body #zo-page-element-wrap {
				padding: ".esc_attr($zo_meta->_zo_page_title_padding).";
			}\n";
        }
        if (!empty($zo_meta->_zo_page_title_margin)) {
            echo "body #zo-page-element-wrap {
				margin: ".esc_attr($zo_meta->_zo_page_title_margin).";
			}\n";
        }
        if (!empty($zo_meta->_zo_page_title_background)) {
            $background = wp_get_attachment_image_src($zo_meta->_zo_page_title_background, 'full');
            echo "body #zo-page-element-wrap {
				background-image: url('".esc_url($background[0])."');
			}\n";
        }
        /* End Page Title */
        /* ==========================================================================
           End Header
        ========================================================================== */
        return ob_get_clean();
    }
}

new ZoTheme_DynamicCss();