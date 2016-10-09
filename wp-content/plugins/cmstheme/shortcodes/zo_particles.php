<?php
vc_map(
	array(
		"name" => __("ZO Particles", 'cmstheme'),
	    "base" => "zo_particles",
	    "class" => "vc-zo-particles",
		"content_element" => true,
	    "category" => __("ZoTheme Shortcodes", 'cmstheme'),
	    "params" => array(
		    array(
			    "type" => "textarea_html",
			    "heading" => __("Title",'cmstheme'),
			    "param_name" => "title",
			    "group" => __("Genaral", 'cmstheme'),
			    "description" => __('Enter the title', 'cmstheme'),
		    ),
		    array(
			    "type" => "textfield",
			    "heading" => __("Height",'cmstheme'),
			    "param_name" => "height",
			    "value" => "",
			    "group" => __("Genaral", 'cmstheme'),
			    "description" => __('Enter height for particles, ex: 400. Width follow the row.', 'cmstheme')
		    ),
		    array(
			    "type" => "colorpicker",
			    "heading" => __("Dot Color",'cmstheme'),
			    "param_name" => "dot_color",
				"default"  => "#FFFFFF",
			    "group" => __("Genaral", 'cmstheme'),
		    ),
		    array(
			    "type" => "colorpicker",
			    "heading" => __("Line Color",'cmstheme'),
			    "param_name" => "line_color",
				"default"  => "#FFFFFF",
			    "group" => __("Genaral", 'cmstheme'),
		    ),
			array(
	            "type" => "zo_template_img",
	            "param_name" => "zo_template",
	            "admin_label" => true,
	            "heading" => __("Template",'cmstheme'),
	            "shortcode" => "zo_particles",
	            "group" => __("Templates", 'cmstheme'),
	        ),
	    )
	)
);

global $particles;
$particles = array();
class WPBakeryShortCode_zo_particles extends ZoShortcode{
	protected function content($atts, $content = null){
		$atts_extra = shortcode_atts(array(
			'title' => 'Title',
			'height' => '400',
			'dot_color' => '#fff',
			'line_color' => '#fff',
			'zo_template' => 'zo_particles.php'
		), $atts);
		global $zo_carousel;
		$html_id = zoHtmlID('zo-particles');
		$particles[$html_id] = array(
			'id' => $html_id,
			'dot_color' => $atts['dot_color'],
			'line_color' => $atts['line_color'],
		);
		wp_enqueue_script('particles-js',ZO_JS.'particles.js',array('jquery'),'1.0.0', true);
		wp_enqueue_script('particles-tpl-js',ZO_JS.'particles-tpl.js',array('jquery'),'1.0.0', true);
		wp_localize_script('particles-tpl-js', "particles", $particles);
		$atts['html_id'] = $html_id;
		$atts['template'] = 'template-' . str_replace('.php','',$atts['zo_template']);
		return parent::content($atts, $content);
	}
}