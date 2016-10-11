<?php
global $zo_base;
/* get local fonts. */
$local_fonts = is_admin() ? $zo_base->getListLocalFontsName() : array() ;

/**
 * Body
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Body Layout', 'ori'),
    'icon' => 'el-icon-website',
    'fields' => array(
        array(
            'title' => __('Boxed Layout', 'ori'),
            'subtitle' => __('Set layout boxed default(Wide).', 'ori'),
            'id' => 'body_layout',
            'type' => 'select',
		    'options' => array(
			    'zo-wide' => 'Wide',
			    'zo-boxed' => 'Boxed',
		    ),
            'default' => 'zo-wide',
        ),
        array(
            'subtitle' => __('Set layout default(Light).', 'ori'),
            'id' => 'body_layout_dark',
            'type' => 'switch',
            'title' => __('Dark Layout', 'ori'),
            'default' => false,
        ),
        array(
            'id'       => 'body_background',
            'type'     => 'background',
            'title'    => __( 'Background', 'ori' ),
            'subtitle' => __( 'body background with image, color, etc.', 'ori' ),
            'output'   => array('body'),
        ),
        array(
            'title'       => esc_html__( 'Site width for boxed', 'ori' ),
            'subtitle' => esc_html__( 'Controls the overall site width. Enter value including any valid CSS unit, ex: 1200px. (minimun is standard bootstrap width)', 'ori' ),
            'id'          => 'boxed_width',
            'type'        => 'slider',
            "default"   => 1200,
            "min"       => 1170,
            "step"      => 10,
            "max"       => 1600,
            'display_value' => 'text'
        ),
        array(
            'id'       => 'boxed_background',
            'type'     => 'background',
            'title'    => __( 'Background for boxed layout', 'ori' ),
            'subtitle' => __( 'body background with image, color, etc.', 'ori' ),
            'output'   => array('body.zo-boxed'),
			'default'  => array(
				'background-image' => get_template_directory_uri() . '/inc/options/images/body/bg_boxed.png',
				'background-attachment' => 'fixed'
			)
        ),
        array(
            'id' => 'body_margin',
            'title' => __('Margin', 'ori'),
			'subtitle' => 'For body',
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('body'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'body_padding',
            'title' => __('Padding', 'ori'),
			'subtitle' => 'For body',
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('body'),
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '0',
                'padding-bottom'  => '0',
                'padding-left'    => '0',
                'units'          => 'px',
            )
        ),
        array(
            'id'       => 'container_background',
            'type'     => 'background',
            'title'    => __( 'Background', 'ori' ),
            'subtitle' => __( 'Container background with image, color etc.', 'ori' ),
            'output'   => array('body #page'),
			'default'  => array(
				'background-color' => '#fff'
			)
        ),
		array(
            'title' => __('Enable Selector', 'ori'),
            'subtitle' => __('Enable selector on front end.', 'ori'),
            'id' => 'enable_selector',
            'type' => 'switch',
            'default' => true,
        ),
		array(
            'title' => __('Enable Page Loadding', 'ori'),
            'subtitle' => __('Enable page loadding.', 'ori'),
            'id' => 'enable_page_loadding',
            'type' => 'switch',
            'default' => false,
        ),
        array(
            'title' => __('Page Loadding Style', 'ori'),
            'subtitle' => __('Select Style Page Loadding.', 'ori'),
            'id' => 'page_loadding_style',
            'type' => 'select',
            'options' => array(
                '1' => 'Style 1',
                '2' => 'Style 2'
            ),
            'default' => 'style-1',
            'required' => array( 0 => 'enable_page_loadding', 1 => '=', 2 => 1 )
        )
    )
);

/**
 * Color
 *
 * css color.
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Color', 'ori'),
    'icon' => 'el-icon-adjust',
    'fields' => array(
		array(
			'subtitle' => esc_html__('select presets color.', 'ori'),
			'id' => 'presets_color',
			'type' => 'image_select',
			'title' => esc_html__('Presets Color', 'ori'),
			'default' => '0',
			'options' => array(
				'0' => get_template_directory_uri().'/inc/options/images/presets/pr-c-1.jpg',
				'1' => get_template_directory_uri().'/inc/options/images/presets/pr-c-2.jpg',
				'2' => get_template_directory_uri().'/inc/options/images/presets/pr-c-3.jpg',
				'3' => get_template_directory_uri().'/inc/options/images/presets/pr-c-4.jpg',
				'4' => get_template_directory_uri().'/inc/options/images/presets/pr-c-5.jpg',
				'5' => get_template_directory_uri().'/inc/options/images/presets/pr-c-6.jpg',
				'6' => get_template_directory_uri().'/inc/options/images/presets/pr-c-7.jpg',
				'7' => get_template_directory_uri().'/inc/options/images/presets/pr-c-8.jpg',
				'8' => get_template_directory_uri().'/inc/options/images/presets/pr-c-9.jpg',
				'9' => get_template_directory_uri().'/inc/options/images/presets/pr-c-10.jpg',
				'10' => get_template_directory_uri().'/inc/options/images/presets/pr-c-11.jpg',
				'11' => get_template_directory_uri().'/inc/options/images/presets/pr-c-12.jpg',
				'12' => get_template_directory_uri().'/inc/options/images/presets/pr-c-13.jpg',
				'13' => get_template_directory_uri().'/inc/options/images/presets/pr-c-14.jpg',
			)
		),
        array(
            'subtitle' => __('set color main color.', 'ori'),
            'id' => 'primary_color',
            'type' => 'color',
            'title' => __('Primary Color', 'ori'),
            'default' => '#e03e25'
        ),
        array(
            'subtitle' => __('set color for tag a.', 'ori'),
            'id' => 'link_color',
            'type' => 'color',
            'title' => __('Link Color', 'ori'),
            'default' => '#333333'
        ),
        array(
            'subtitle' => __('set color for tag a:hover.', 'ori'),
            'id' => 'link_hover_color',
            'type' => 'color',
            'title' => __('Link Hover Color', 'ori'),
            'default' => '#e03e25'
        ),
        array(
            'subtitle' => __('set color for tag a:active.', 'ori'),
            'id' => 'link_active_color',
            'type' => 'color',
            'title' => __('Link Active Color', 'ori'),
            'default' => '#e03e25'
        ),
    )
);

/**
 * Header Options
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Header', 'ori'),
    'icon' => 'el-icon-credit-card',
	'fields' => array(
        array(
            'title' => __('100% Header Width', 'ori'),
            'subtitle' => __('Turn on to have the header area display at 100% width according to the window size. Turn off to follow site width.', 'ori'),
            'id' => 'header_width',
            'type' => 'switch',
            'default' => false,
        ),
	)
);

/* Main Header */
$this->sections[] = array(
	'title' => __('Main Header', 'ori'),
	'icon' => '',
	'subsection' => true,
    'fields' => array(
		array(
            'id' => 'header_layout',
            'title' => __('Layouts', 'ori'),
            'subtitle' => __('select a layout for header', 'ori'),
            'default' => '',
            'type' => 'image_select',
            'options' => array(
                '' => get_template_directory_uri().'/inc/options/images/header/h-default.png',
            )
        ),
        array(
            'title'       => esc_html__( 'Height', 'ori' ),
            'subtitle' => esc_html__( 'Controls the height for main header.', 'ori' ),
            'id'          => 'mheader_height',
            'type'        => 'slider',
            "default"   => 120,
            "min"       => 30,
            "step"      => 1,
            "max"       => 300,
            'display_value' => 'label'
        ),
		array(
			'id' => 'mheader_position',
			'title' => 'Position',
			'subtitle' => 'Default opsition: static, if choose absolute then header will on Slider or Page Title...',
			'default'     => 'static',
            'type'        => 'button_set',
            'options'     => array(
                'static'    => esc_html__( 'Static', 'ori' ),
                'absolute'    => esc_html__( 'Absolute', 'ori' )
            )
		),
		array(
			'id' => 'mheader_background',
			'title' => 'Background Color',
            'type' => 'color_rgba',
			'default' => array(
				'color' => '#fff',
				'alpha' => 1,
				'rgba' => 'rgba(255,255,255,1)'
			),
			'subtitle' => esc_html__( 'Background 100% width header.', 'ori' )
		),
		array(
			'id' => 'mheader_background_container',
			'title' => 'Background Container Color',
            'type' => 'color_rgba',
			'default' => array(
				'color' => '#fff',
				'alpha' => 1,
				'rgba' => 'rgba(255,255,255,1)'
			),
			'subtitle' => esc_html__( 'Background container header.', 'ori' )
		),
		array(
            'id' => 'mheader_border_bottom',
            'type' => 'border',
            'title' => __('Header Border Bottom', 'ori'),
            'subtitle' => __('Set header border bottom.', 'ori'),
			'top' => false,
			'right' => false,
			'left' => false,
			'default' => array(
				'border-bottom' => '0px',
				'border-style' => 'none'
			)
        ),
		array(
            'title' => __('Select Logo', 'ori'),
            'subtitle' => __('Select an image file for your logo.', 'ori'),
            'id' => 'main_logo',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/logo.jpg'
            )
        ),
        array(
            'title' => __('Text for logo', 'ori'),
            'id' => 'text_logo',
            'type' => 'text',
            'default' => 'Business Wordpress Theme'
        )
	)
);

/* Main Menu */
$this->sections[] = array(
    'title' => __('Main Menu', 'ori'),
    'icon' => '',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'menu_fsize_flevel',
            'type' => 'typography',
            'title' => esc_html__('Font - First Level', 'ori'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'line-height' => false,
            'text-align' => true,
			'letter-spacing' => true,
			'text-transform' => true,
            'units' => 'px',
            'default' => array(
				'font-family' => 'Open Sans',
				'font-weight' => 400,
                'font-size' => '14px'
            )
        ),
        array(
            'id' => 'menu_padding_first_level',
            'title' => __('Padding - First Level', 'ori'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '10px',
                'padding-bottom'  => '0',
                'padding-left'    => '10px',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'menu_margin_first_level',
            'title' => __('Margin - First Level', 'ori'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '7px',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            )
        ),
		array(
            'id' => 'menu_border_top',
            'type' => 'border',
            'title' => __('Border Top', 'ori'),
            'subtitle' => __('Set style for border top.', 'ori'),
			'default' => array(
				'border-top' => '2px',
				'border-right' => '2px',
				'border-bottom' => '2px',
				'border-left' => '2px',
				'border-style' => 'solid',
				'border-color' => '#e03e25'
			)
        ),
		array(
            'id' => 'menu_border_bottom',
            'type' => 'border',
            'title' => __('Border Bottom', 'ori'),
            'subtitle' => __('Set style for border bottom.', 'ori'),
        ),
		array(
            'subtitle' => __('Controls the text color of first level menu items.', 'ori'),
            'id' => 'menu_color_first_level',
            'type' => 'color',
            'title' => __('Font Color - First Level', 'ori'),
            'default' => '#171717'
        ),
        array(
            'subtitle' => __('Controls the text hover color of first level menu items.', 'ori'),
            'id' => 'menu_color_hover_first_level',
            'type' => 'color',
            'title' => __('Font Color Hover - First Level', 'ori'),
            'default' => '#e03e25'
        ),
		array(
            'id'    => 'info_submenu',
            'type'  => 'info',
            'style' => 'success',
            'title' => esc_html__('This is options for Sub Menu', 'ori'),
            'icon'  => 'el-icon-info-sign',
            'desc'  => esc_html__('Control options to change front end, view detail on document in package!', 'ori')
        ),
        array(
            'id' => 'menu_fontsize_sub_level',
            'type' => 'typography',
            'title' => __('Font Size - Sub Level', 'ori'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'font-style' => false,
            'line-height' => false,
            'text-align' => false,
			'text-transform' => true,
			'letter-spacing' => true,
            'output'  => array('.nav-menu > li ul li'),
            'units' => 'px',
            'default' => array(
                'font-size' => '13px',
            )
        ),
        array(
            'id' => 'menu_background_color_sub_level',
            'type' => 'color_rgba',
            'title' => __('Background - Sub Level', 'ori'),
            'subtitle' => __('Controls background for sub menu.', 'ori'),
            'default' => array(
				'color' => '#fff'
			),
        ),
        array(
            'subtitle' => __('Controls the text color of sub level menu items.', 'ori'),
            'id' => 'menu_color_sub_level',
            'type' => 'color',
            'title' => __('Font Color - Sub Level', 'ori'),
            'default' => '#acacac'
        ),
        array(
            'subtitle' => __('Controls the text hover color of sub level menu items.', 'ori'),
            'id' => 'menu_color_hover_sub_level',
            'type' => 'color',
            'title' => __('Font Color Hover - Sub Level', 'ori'),
            'default' => '#fff'
        ),
        array(
            'subtitle' => __('Controls background hover & active item for sub menu.', 'ori'),
            'id' => 'menu_background_color_hover_sub_level',
            'type' => 'color_rgba',
            'title' => __('Background Item Hover - Sub Level', 'ori'),
            'default' => array(
				'color' => '#e03e25'
			),
        ),
        array(
            'subtitle' => __('Enable mega menu.', 'ori'),
            'id' => 'menu_mega',
            'type' => 'switch',
            'title' => __('Mega Menu', 'ori'),
            'default' => true,
        ),
    )
);

/* Phone Menu */
$this->sections[] = array(
    'title' => __('Phone Menu', 'ori'),
    'icon' => '',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'pmenu_fsize_flevel',
            'type' => 'typography',
            'title' => esc_html__('Font - First Level', 'ori'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'text-align' => false,
			'letter-spacing' => true,
			'text-transform' => true,
            'units' => 'px',
            'default' => array(
				'font-family' => 'Open Sans',
				'font-weight' => 400,
                'font-size' => '14px',
				'line-height' => '40px'
            )
        ),
		array(
            'subtitle' => __('Controls the text color of first level menu items.', 'ori'),
            'id' => 'pmenu_color_first_level',
            'type' => 'color',
            'title' => __('Font Color - First Level', 'ori'),
            'default' => '#171717'
        ),
        array(
            'subtitle' => __('Controls the text hover color of first level menu items.', 'ori'),
            'id' => 'pmenu_color_hover_first_level',
            'type' => 'color',
            'title' => __('Font Color Hover - First Level', 'ori'),
            'default' => '#e03e25'
        ),
        array(
            'id' => 'pmenu_bg_color',
            'type' => 'color_rgba',
            'title' => __('Background', 'ori'),
            'default' => array(
				'color' => '#ffffff'
			),
        ),
		array(
            'id' => 'pmenu_border_top',
            'type' => 'border',
            'title' => __('Border Top', 'ori'),
            'subtitle' => __('Set style for border top.', 'ori'),
			'default' => array(
				'border-top' => '2px',
				'border-right' => '2px',
				'border-bottom' => '2px',
				'border-left' => '2px',
				'border-style' => 'solid',
				'border-color' => '#eae9e9'
			)
        ),
		array(
            'id' => 'pmenu_border_bottom',
            'type' => 'border',
            'title' => __('Border Bottom', 'ori'),
            'subtitle' => __('Set style for border bottom.', 'ori'),
			'default' => array(
				'border-top' => '2px',
				'border-right' => '2px',
				'border-bottom' => '2px',
				'border-left' => '2px',
				'border-style' => 'solid',
				'border-color' => '#eae9e9'
			)
        ),
        array(
            'id' => 'pmenu_padding_flevel',
            'title' => __('Padding', 'ori'),
            'subtitle' => __('Padding phone menu wrapper.', 'ori'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '0',
                'padding-bottom'  => '0',
                'padding-left'    => '15px',
                'units'          => 'px',
            )
        ),
		array(
            'id' => 'pmenu_fsize_slevel',
            'type' => 'typography',
            'title' => esc_html__('Font - Sub Level', 'ori'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'text-align' => false,
			'letter-spacing' => true,
			'text-transform' => true,
            'units' => 'px',
            'default' => array(
				'font-family' => 'Open Sans',
				'font-weight' => 400,
                'font-size' => '13px',
				'line-height' => '30px'
            )
        ),
        array(
            'subtitle' => __('Controls the text color of sub level menu items.', 'ori'),
            'id' => 'pmenu_color_sub_level',
            'type' => 'color',
            'title' => __('Font Color - Sub Level', 'ori'),
            'default' => '#acacac'
        ),
        array(
            'subtitle' => __('Controls the text hover color of sub level menu items.', 'ori'),
            'id' => 'pmenu_color_hover_sub_level',
            'type' => 'color',
            'title' => __('Font Color Hover - Sub Level', 'ori'),
            'default' => '#e03e25'
        ),
        array(
            'id' => 'pmenu_padding_slevel',
            'title' => __('Padding', 'ori'),
            'subtitle' => __('Padding sub level.', 'ori'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '15px;',
                'padding-bottom'  => '0',
                'padding-left'    => '15px',
                'units'          => 'px',
            )
        ),
	)
);

/* Sticky Header */
$this->sections[] = array(
    'title' => __('Sticky Header', 'ori'),
    'icon' => '',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('enable sticky mode for menu.', 'ori'),
            'id' => 'menu_sticky',
            'type' => 'switch',
            'title' => __('Sticky Header', 'ori'),
            'default' => false,
        ),
        array(
            'title'       => esc_html__( 'Height', 'ori' ),
            'subtitle' => esc_html__( 'Controls the height for sticky header.', 'ori' ),
            'id'          => 'sheader_height',
            'type'        => 'slider',
            "default"   => 70,
            "min"       => 30,
            "step"      => 1,
            "max"       => 300,
            'display_value' => 'label',
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'title' => __('Logo', 'ori'),
            'subtitle' => __('Set an image for your sticky header logo.', 'ori'),
            'id' => 'sticky_logo',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/logo.jpg'
            ),
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'title' => __('Background Color', 'ori'),
            'subtitle' => __('Set header background, default is white color.', 'ori'),
            'id' => 'sheader_background',
            'type' => 'color_rgba',
            'default'   => array(
				'color' => '#fff',
				'alpha' => 1,
				'rgba'  => 'rgba(255,255,255,1)'
            ),
			'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('enable sticky mode for menu Tablets.', 'ori'),
            'id' => 'menu_sticky_tablets',
            'type' => 'switch',
            'title' => __('Sticky Tablets', 'ori'),
            'default' => false,
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('enable sticky mode for menu Mobile.', 'ori'),
            'id' => 'menu_sticky_mobile',
            'type' => 'switch',
            'title' => __('Sticky Mobile', 'ori'),
            'default' => false,
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        )
    )
);

/* Menu Sticky */
$this->sections[] = array(
    'title' => __('Sticky Menu', 'ori'),
    'icon' => '',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'smenu_fontsize_first_level',
            'type' => 'typography',
            'title' => __('Font Size - First Level', 'ori'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'font-style' => false,
            'line-height' => false,
            'text-align' => false,
			'text-transform' => true,
			'letter-spacing' => true,
            'output'  => array('.header-fixed .nav-menu > li', '.header-fixed .nav-menu > li > a'),
            'units' => 'px',
            'default' => array(
                'font-size' => '14px',
            )
        ),
		array(
            'subtitle' => __('Controls the text color of first level menu items.', 'ori'),
            'id' => 'smenu_color_first_level',
            'type' => 'color',
            'title' => __('Font Color - First Level', 'ori'),
            'default' => '#171717'
        ),
        array(
            'subtitle' => __('Controls the text hover color of first level menu items.', 'ori'),
            'id' => 'smenu_color_hover_first_level',
            'type' => 'color',
            'title' => __('Font Color Hover - First Level', 'ori'),
			'default' => '#e03e25'
		),  
        array(
            'id' => 'smenu_fontsize_sub_level',
            'type' => 'typography',
            'title' => __('Font Size - Sub Level', 'ori'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'font-style' => false,
            'line-height' => false,
            'text-align' => false,
			'text-transform' => true,
			'letter-spacing' => true,
            'output'  => array('.header-fixed .nav-menu > li ul > li', '.header-fixed .nav-menu > li ul > li > a'),
            'units' => 'px',
            'default' => array(
                'font-size' => '13px',
            )
        ),
        array(
            'subtitle' => __('Controls the text color of sub level menu items.', 'ori'),
            'id' => 'smenu_color_sub_level',
            'type' => 'color',
            'title' => __('Font Color - Sub Level', 'ori'),
            'default' => '#acacac'
        ),
        array(
            'subtitle' => __('Controls the text hover color of sub level menu items.', 'ori'),
            'id' => 'smenu_color_hover_sub_level',
            'type' => 'color',
            'title' => __('Font Color Hover - Sub Level', 'ori'),
            'default' => '#fff'
        ),
        array(
            'subtitle' => __('Controls background hover & active item for sub menu.', 'ori'),
            'id' => 'smenu_background_color_hover_sub_level',
            'type' => 'color_rgba',
            'title' => __('Background Hover - Sub Level', 'ori'),
            'default' => array(
				'color' => '#e03e25'
			),
        ),
    ),
);

/**
 * Page Title
 *
 * @author ZoTheme
 */

/**
 * Page title settings
 *
 */
$page_title = array(
    array(
        'id' => 'page_title_layout',
        'title' => __('Layouts', 'ori'),
        'subtitle' => __('select a layout for page title', 'ori'),
        'default' => '3',
        'type' => 'image_select',
        'options' => array(
            '' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-0.png',
            '1' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-1.png',
            '2' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-2.png',
            '3' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-3.png',
            '4' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-4.png',
            '5' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-5.png',
            '6' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-6.png',
        )
    ),
    array(
        'id'       => 'page_title_background',
        'type'     => 'background',
        'title'    => __( 'Background', 'ori' ),
        'subtitle' => __( 'page title background with image, color, etc.', 'ori' ),
        'output'   => array('#zo-page-element-wrap'),
        'default'   => array(
            'background-color'=>'#f8f7f7',
            'background-image'=> '',
            'background-repeat'=>'',
            'background-size'=>'',
            'background-attachment'=>'',
            'background-position'=>''
        )
    ),
    array(
        'id' => 'page_title_margin',
        'title' => __('Margin', 'ori'),
        'type' => 'spacing',
        'units' => 'px',
        'mode' => 'margin',
        'output' => array('#zo-page-element-wrap'),
        'default' => array(
            'margin-top'     => '0',
            'margin-right'   => '0',
            'margin-bottom'  => '80px',
            'margin-left'    => '0',
            'units'          => 'px',
        )
    ),
    array(
        'id' => 'page_title_padding',
        'title' => __('Padding', 'ori'),
        'type' => 'spacing',
        'units' => 'px',
        'mode' => 'padding',
        'output' => array('#zo-page-element-wrap'),
        'default' => array(
            'padding-top'     => '17px',
            'padding-right'   => '0',
            'padding-bottom'  => '17px',
            'padding-left'    => '0',
            'units'          => 'px',
        )
    ),
	array(
		'id' => 'page_title_border_top',
		'type' => 'border',
		'title' => __('Border Top', 'ori'),
		'subtitle' => __('Set style for border top.', 'ori'),
		'default' => array(
			'border-top' => '1px',
			'border-right' => '1px',
			'border-bottom' => '1px',
			'border-left' => '1px',
			'border-style' => 'solid',
			'border-color' => '#e3e3e4'
		)
	),
	array(
		'id' => 'page_title_border_bottom',
		'type' => 'border',
		'title' => __('Border Bottom', 'ori'),
		'subtitle' => __('Set style for border bottom.', 'ori'),
		'default' => array(
			'border-top' => '1px',
			'border-right' => '1px',
			'border-bottom' => '1px',
			'border-left' => '1px',
			'border-style' => 'solid',
			'border-color' => '#edecec'
		)
	),
    array(
        'id' => 'page_title_parallax',
        'title' => __('Enable Header Parallax', 'ori'),
        'type' => 'switch',
        'default' => false
    ),
    array(
        'id' => 'page_title_custom_post',
        'title' => __('Custom Background For Post Type', 'ori'),
        'type' => 'switch',
        'default' => false
    ),
);
/**
 * add custom background for post type
 */
$post_types = zo_list_post_types();
foreach( $post_types as $type => $name) {
    $page_title[] = array(
        'id'       => 'page_title_custom_post_' . $type,
        'type'     => 'background',
        'title'    => sprintf( __( 'Background For %s' , 'ori'), $name),
        'subtitle' => sprintf( __( 'Custom background image for post type %s', 'ori' ), $name),
        'output'   => array('.single-'.$type.' #zo-page-element-wrap'),
        'background-color' => false,
        'background-repeat' => false,
        'background-size' => false,
        'background-attachment' => false,
        'background-position' => false,
        'default'   => array(
            'background-image'=> '',
        ),
        'required' => array( 'page_title_custom_post', '=', 1 )
    );
}
/**
 * Section settings
 */
$this->sections[] = array(
    'title' => __('Page Title & BC', 'ori'),
    'icon' => 'el-icon-map-marker',
    'fields' => $page_title
);

/* Page Title */
$this->sections[] = array(
    'icon' => '',
    'title' => __('Page Title', 'ori'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'pt_typography',
            'type' => 'typography',
            'title' => __('Typography', 'ori'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('#page-title-text h1'),
            'units' => 'px',
            'subtitle' => __('Typography option with title text.', 'ori'),
            'default' => array(
                'font-weight' => '400',
                'font-family' => 'Open Sans',
				'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '22px',
                'line-height' => '24px',
				'color' => '#e03e25'
            )
        ),
		array(
			'id' => 'pt_text_home',
			'type' => 'text',
			'title' => 'Output on Blog',
			'default' => 'Our Blog',
		),
		array(
			'id' => 'pt_text_search',
			'type' => 'text',
			'title' => 'Output on Search',
			'default' => 'Search Results for:',
		),
		array(
			'id' => 'pt_text_404',
			'type' => 'text',
			'title' => 'Output on 404',
			'default' => '404',
		),
		array(
			'id' => 'pt_text_author',
			'type' => 'text',
			'title' => 'Output on archive author',
			'default' => 'Author:',
		),
		array(
			'id' => 'pt_text_day',
			'type' => 'text',
			'title' => 'Output on archive day',
			'default' => 'Day:',
		),
		array(
			'id' => 'pt_text_month',
			'type' => 'text',
			'title' => 'Output on archive month',
			'default' => 'Month:',
		),
		array(
			'id' => 'pt_text_year',
			'type' => 'text',
			'title' => 'Output on archive year',
			'default' => 'Year:',
		),
		
		
		
		
		
		array(
			'id' => 'sub_page_title',
			'title' => 'Sub Page Title',
			'type' => 'text',
			'default' => 'Check Out Our Latest News'
		)
    )
);

/* Breadcrumb */
$this->sections[] = array(
    'icon' => '',
    'title' => __('Breadcrumb', 'ori'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'breacrumb_typography',
            'type' => 'typography',
            'title' => __('Typography', 'ori'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('#breadcrumb-text'),
            'units' => 'px',
            'subtitle' => __('Typography option with title text.', 'ori'),
            'default' => array(
				'color' => '#171717',
                'font-weight' => '400',
                'font-family' => 'Open Sans',
				'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '12px',
                'text-align' => 'right'
            )
        ),
        array(
            'id' => 'breacrumb_home_prefix',
            'type' => 'text',
            'title' => __('Breadcrumb Home Prefix', 'ori'),
            'subtitle' => __('The text before the breadcrumb home.', 'ori'),
            'default' => 'You are here:'
        ),
        array(
            'id' => 'breacrumb_home',
            'type' => 'text',
            'title' => __('Breadcrumb Home', 'ori'),
            'default' => 'Home'
        ),
        array(
            'id' => 'breacrumb_blog',
            'type' => 'text',
            'title' => __('Breadcrumb Blog', 'ori'),
            'default' => 'BLOG'
        ),
    )
);

/**
 * Blog
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Blog', 'ori'),
    'icon' => 'el-icon-website',
    'fields' => array(
		 array(
            'subtitle' => __('Turn on to have the blog content area display at 100% width according to the window size. Turn off to follow site width.', 'ori'),
            'id' => 'blog_layout_width',
            'type' => 'switch',
            'title' => __('100% Width Blog', 'ori'),
            'default' => false,
        ),
        array(
            'id' => 'blog_layout',
            'title' => __('Blog Layout', 'ori'),
            'type' => 'select',
			'options' => array(
                1 => 'Blog style 1',
                2 => 'Blog style 2',
            ),
            'default' => 1,
        ),
        array(
            'id' => 'blog_sidebar',
            'title' => __('Sidebar on blog', 'ori'),
			'subtitle' => __('On blog and single.', 'ori'),
            'type' => 'select',
			'options' => array(
                'right' => 'Sidebar right',
                'left' => 'Sidebar left',
                'none' => 'Sidebar none or blog full width',
            ),
            'default' => 'right',
        ),
        array(
            'title'       => esc_html__( 'Main Sidebar Width', 'ori' ),
            'subtitle' => esc_html__( 'Controls the width of the sidebar when only one sidebar is present. It is standard Bootstrap column, ex: 3 columns.', 'ori' ),
            'id'          => 'body_sidebar_size',
            'type'        => 'slider',
            "default"   => 3,
            "min"       => 3,
            "step"      => 1,
            "max"       => 6,
            'display_value' => 'label'
        ),
        array(
            'title'       => esc_html__( 'Grid Masonry', 'ori' ),
            'subtitle' => esc_html__( 'Controls layout display on Blog. Only use for layout Grid', 'ori' ),
            'id'          => 'blog_masonry',
            'type'        => 'switch',
            "default"   => true
        ),
		array(
			'title' => esc_html__('Section', 'ori'),
			'subtitle' => esc_html__( 'Controls position content item', 'ori' ),
			'id' => 'blog_section',
			'type' => 'sortable',
			'mode' => 'checkbox',
			'options' => array(
				'thumb' => 'The Thumbnail',
				'title' => 'The Title',
				'content' => 'The Content',
				'meta' => 'The Meta'
			),
			'default' => array(
				'thumb' => true,
				'title' => true,
				'content' => true,
				'meta' => true,
			),
		)
    )
);

/**
 * Blog
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Single', 'ori'),
    'icon' => '',
	'subsection' => true,
    'fields' => array(
		array(
			'title' => esc_html__('Section', 'ori'),
			'subtitle' => esc_html__( 'Controls position the Posts & Sidebar', 'ori' ),
			'id' => 'single_section',
			'type' => 'sortable',
			'mode' => 'checkbox',
			'options' => array(
				'posts' => 'The Posts',
				'sidebar' => 'The Sidebar'
			),
			'default' => array(
				'posts' => true,
				'sidebar' => true,
			),
		),
		array(
            'subtitle' => __('Turn on to have the single post area display at 100% width according to the window size. Turn off to follow site width.', 'ori'),
            'id' => 'single_width',
            'type' => 'switch',
            'title' => __('100% Width Blog', 'ori'),
            'default' => false,
        ),
        array(
            'title'       => esc_html__( 'Main Sidebar Width', 'ori' ),
            'subtitle' => esc_html__( 'Controls the width of the sidebar when only one sidebar is present. It is standard Bootstrap column, ex: 3 columns.', 'ori' ),
            'id'          => 'single_sidebar_size',
            'type'        => 'slider',
            "default"   => 3,
            "min"       => 0,
            "step"      => 1,
            "max"       => 6,
            'display_value' => 'label'
        ),
	)
);

/**
 * Footer
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Footer', 'ori'),
    'icon' => 'el-icon-credit-card',
);

/* Footer top */
$this->sections[] = array(
    'title' => __('Footer Top', 'ori'),
    'icon' => '',
    'subsection' => true,
    'fields' => array(
		array(
            'id' => 'footer_layout',
            'title' => __('Layouts', 'ori'),
            'subtitle' => __('select a layout for footer', 'ori'),
            'default' => '',
            'type' => 'image_select',
            'options' => array(
                '' => get_template_directory_uri().'/inc/options/images/footer/f-default.png',
            )
        ),
		array(
            'title' => __('100% Footer Width', 'ori'),
            'subtitle' => __('Turn on to have the footer area display at 100% width according to the window size. Turn off to follow site width.', 'ori'),
            'id' => 'footer_top_width',
            'type' => 'switch',
            'default' => false,
        ),
		array(
			'title' => esc_html__('Section', 'ori'),
			'subtitle' => esc_html__( 'Controls position & display the Sidebars on footer top', 'ori' ),
			'id' => 'footer_top_section',
			'type' => 'sortable',
			'mode' => 'checkbox',
			'options' => array(
				'footer_top_1' => 'Sidebar - Footer Top 1',
				'footer_top_2' => 'Sidebar - Footer Top 2',
				'footer_top_3' => 'Sidebar - Footer Top 3',
				'footer_top_4' => 'Sidebar - Footer Top 4'
			),
			'default' => array(
				'footer_top_1' => true,
				'footer_top_2' => true,
				'footer_top_3' => true,
				'footer_top_4' => true,
			),
		),
        array(
            'title'       => esc_html__( 'Sidebar Width', 'ori' ),
            'subtitle' => esc_html__( 'Controls the width of the sidebar when only one sidebar is present. It is standard Bootstrap column, ex: 3 columns.', 'ori' ),
            'id'          => 'footer_top_sidebar_width',
            'type'        => 'slider',
            "default"   => 3,
            "min"       => 1,
            "step"      => 1,
            "max"       => 6,
            'display_value' => 'label'
        ),
		array(
			'title' => 'Socials on Footer Top 1',
			'subtitle' => 'Click to display, drag and drop to set position for a item social',
			'id' => 'ft_social',
			'type' => 'sortable',
			'mode' => 'checkbox',
			'options' => array(
				'facebook' => 'Facebook',
				'twitter' => 'Twitter',
				'google-plus' => 'Google Plus',
				'pinterest' => 'Pinterest',
				'vimeo' => 'Vimeo',
				'linkedin' => 'LinkedIn',
				'dribbble' => 'Dribbble',
				'youtube' => 'Youtube',
				'rss' => 'RSS'
			),
			'default' => array(
				'facebook' => true,
				'twitter' => true,
				'google-plus' => true,
				'pinterest' => true,
				'vimeo' => true,
				'linkedin' => true,
				'dribbble' => false,
				'youtube' => false,
				'rss' => false
			)
		),
        array(
            'id'       => 'footer_background',
            'type'     => 'background',
            'title'    => __( 'Background', 'ori' ),
            'subtitle' => __( 'footer background with image, color, etc.', 'ori' ),
            'output'   => array('footer #zo-footer-top'),
            'default'   => array(
                'background-color'=>'#171717'
            )
        ),
		array(
            'subtitle' => __('Set color footer top.', 'ori'),
            'id' => 'footer_top_color',
            'type' => 'color',
            'output' => array('#zo-footer-top'),
            'title' => __('Footer Top Color', 'ori'),
            'default' => '#acacac'
        ),
        array(
            'subtitle' => __('Set title color footer top.', 'ori'),
            'id' => 'footer_heading_color',
            'type' => 'color',
            'output' => array('#zo-footer-top h1,#zo-footer-top h2,#zo-footer-top h3,#zo-footer-top h4,#zo-footer-top h5,#zo-footer-top h6'),
            'title' => __('Footer Heading Color', 'ori'),
            'default' => '#acacac'
        ),
        array(
            'subtitle' => __('Set title link color footer top.', 'ori'),
            'id' => 'footer_top_link_color',
            'type' => 'link_color',
            'output' => array('#zo-footer-top a'),
            'title' => __('Footer Link Color', 'ori'),
            'default' => '#acacac',
            'default' => array(
				'regular'  => '#acacac',
				'hover'    => '#e03e25',
				'active'    => '#e03e25',
			)
        ),
        array(
            'id' => 'footer_margin',
            'title' => __('Margin', 'ori'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('footer #zo-footer-top'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'footer_padding',
            'title' => __('Padding', 'ori'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('footer #zo-footer-top'),
            'default' => array(
                'padding-top'     => '70px',
                'padding-right'   => '0',
                'padding-bottom'  => '40px',
                'padding-left'    => '0',
                'units'          => 'px',
            )
        ),
    )
);

/* footer bottom */
$this->sections[] = array(
    'title' => __('Footer Bottom', 'ori'),
    'icon' => '',
    'subsection' => true,
    'fields' => array(
		array(
            'title' => __('100% Footer Width', 'ori'),
            'subtitle' => __('Turn on to have the footer area display at 100% width according to the window size. Turn off to follow site width.', 'ori'),
            'id' => 'footer_bottom_width',
            'type' => 'switch',
            'default' => false,
        ),
		array(
			'title' => esc_html__('Section', 'ori'),
			'subtitle' => esc_html__( 'Controls position & display the copyright & menu', 'ori' ),
			'id' => 'footer_bottom_section',
			'type' => 'sortable',
			'mode' => 'checkbox',
			'options' => array(
				'footer_bottom_1' => 'Sidebar - Footer Bottom Copyright',
				'footer_bottom_2' => 'Sidebar - Footer Bottom Menu'
			),
			'default' => array(
				'footer_bottom_1' => true,
				'footer_bottom_2' => true
			),
		),
        array(
            'id'       => 'footer_botton_background',
            'type'     => 'background',
            'title'    => __( 'Background', 'ori' ),
            'subtitle' => __( 'background with image, color, etc.', 'ori' ),
            'output'   => array('footer #zo-footer-bottom'),
            'default'   => array(
                'background-color'=>'#111'
            )
        ),
        array(
            'subtitle' => __('Set color footer top.', 'ori'),
            'id' => 'footer_bottom_color',
            'type' => 'color',
            'output' => array('#zo-footer-bottom'),
            'title' => __('Footer Bottom Color', 'ori'),
            'default' => '#acacac'
        ),
        array(
            'id' => 'footer_bottom_margin',
            'title' => __('Margin', 'ori'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('footer #zo-footer-bottom'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'footer_bottom_padding',
            'title' => __('Padding', 'ori'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('footer #zo-footer-bottom'),
            'default' => array(
                'padding-top'     => '25px',
                'padding-right'   => '0',
                'padding-bottom'  => '25px',
                'padding-left'    => '0',
                'units'          => 'px',
            )
        ),
        array(
            'subtitle' => __('enable button back to top.', 'ori'),
            'id' => 'footer_botton_back_to_top',
            'type' => 'switch',
            'title' => __('Back To Top', 'ori'),
            'default' => true,
        )
    )
);

/**
 * Typography
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Typography', 'ori'),
    'icon' => 'el el-fontsize',
    'fields' => array(
        array(
            'id' => 'font_body',
            'type' => 'typography',
            'title' => __('Body Font', 'ori'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body'),
            'units' => 'px',
            'default' => array(
                'color' => '#acacac',
                'font-weight' => '400',
                'font-family' => 'Open Sans',
				'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '13px',
                'line-height' => '20px',
            ),
            'subtitle' => __('Typography option with each property can be called individually.', 'ori'),
        ),
        array(
            'id' => 'font_h1',
            'type' => 'typography',
            'title' => __('H1', 'ori'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h1'),
            'units' => 'px',
            'default' => array(
                'color' => '#e03e25',
                'font-weight' => '700',
                'font-family' => 'Open Sans',
				'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '32px',
                'line-height' => '35px'
            )
        ),
        array(
            'id' => 'font_h2',
            'type' => 'typography',
            'title' => __('H2', 'ori'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h2'),
            'units' => 'px',
            'default' => array(
                'color' => '#e03e25',
                'font-weight' => '700',
                'font-family' => 'Open Sans',
				'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '28px',
                'line-height' => '30px'
            )
        ),
        array(
            'id' => 'font_h3',
            'type' => 'typography',
            'title' => __('H3', 'ori'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h3'),
            'units' => 'px',
            'default' => array(
                'color' => '#e03e25',
                'font-weight' => '700',
                'font-family' => 'Open Sans',
				'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '25px',
                'line-height' => '26px'
            )
        ),
        array(
            'id' => 'font_h4',
            'type' => 'typography',
            'title' => __('H4', 'ori'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h4'),
            'units' => 'px',
            'default' => array(
                'color' => '#e03e25',
                'font-weight' => '700',
                'font-family' => 'Open Sans',
				'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '22px',
                'line-height' => '24px'
            )
        ),
        array(
            'id' => 'font_h5',
            'type' => 'typography',
            'title' => __('H5', 'ori'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h5'),
            'units' => 'px',
            'default' => array(
                'color' => '#e03e25',
                'font-weight' => '700',
                'font-family' => 'Open Sans',
				'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '18px',
                'line-height' => '22px'
            )
        ),
        array(
            'id' => 'font_h6',
            'type' => 'typography',
            'title' => __('H6', 'ori'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h6'),
            'units' => 'px',
            'default' => array(
                'color' => '#e03e25',
                'font-weight' => '700',
                'font-family' => 'Open Sans',
				'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '14px',
                'line-height' => '20px'
            )
        )
    )
);

/* extra font. */
$this->sections[] = array(
    'title' => __('Extra Fonts', 'ori'),
    'icon' => '',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'google-font-1',
            'type' => 'typography',
            'title' => __('Font 1', 'ori'),
            'subtitle' => __('extend class "zo_extra_font1" to using this font', 'ori'),
            'google' => true,
            'font-backup' => false,
            'font-style' => false,
            'color' => false,
            'text-align'=> false,
            'line-height'=>false,
            'font-size'=> false,
            'subsets'=> false,
            'output' => array('.zo_extra_font1'),
            'default' => array(
                'font-weight' => '',
                'font-family' => ''
            )
        ),
        array(
            'id' => 'google-font-2',
            'type' => 'typography',
            'title' => __('Font 2', 'ori'),
            'subtitle' => __('extend class "zo_extra_font2" to using this font', 'ori'),
            'google' => true,
            'font-backup' => false,
            'font-style' => false,
            'color' => false,
            'text-align'=> false,
            'line-height'=>false,
            'font-size'=> false,
            'subsets'=> false,
            'output' => array('.zo_extra_font2'),
            'default' => array(
                'font-weight' => '',
                'font-family' => ''
            )
        ),
        array(
            'id' => 'google-font-3',
            'type' => 'typography',
            'title' => __('Font 3', 'ori'),
            'subtitle' => __('extend class "zo_extra_font3" to using this font', 'ori'),
            'google' => true,
            'font-backup' => false,
            'font-style' => false,
            'color' => false,
            'text-align'=> false,
            'line-height'=>false,
            'font-size'=> false,
            'subsets'=> false,
            'output' => array('.zo_extra_font3'),
            'default' => array(
                'font-weight' => '',
                'font-family' => ''
            )
        ),
    )
);

/* local fonts. */
$this->sections[] = array(
    'title' => __('Local Fonts', 'ori'),
    'icon' => '',
    'subsection' => true,
    'fields' => array(
        array(
            'id'       => 'local-fonts-1',
            'type'     => 'select',
            'title'    => __( 'Fonts 1', 'ori' ),
            'options'  => $local_fonts,
            'default'  => '',
        ),
        array(
            'id' => 'local-fonts-selector-1',
            'type' => 'textarea',
            'title' => __('Selector 1', 'ori'),
            'subtitle' => __('add html tags ID or class (body,a,.class,#id)', 'ori'),
            'validate' => 'no_html',
            'default' => '',
            'required' => array(
                0 => 'local-fonts-1',
                1 => '!=',
                2 => ''
            )
        ),
        array(
            'id'       => 'local-fonts-2',
            'type'     => 'select',
            'title'    => __( 'Fonts 2', 'ori' ),
            'options'  => $local_fonts,
            'default'  => '',
        ),
        array(
            'id' => 'local-fonts-selector-2',
            'type' => 'textarea',
            'title' => __('Selector 2', 'ori'),
            'subtitle' => __('add html tags ID or class (body,a,.class,#id)', 'ori'),
            'validate' => 'no_html',
            'default' => '',
            'required' => array(
                0 => 'local-fonts-2',
                1 => '!=',
                2 => ''
            )
        )
    )
);

// Socials Link 
$this->sections[] = array(
	'title' => __('Socials Link', 'ori'),
	'icon' => 'el el-link',
	'fields' => array(
		array(
			'title' => __('Facebook Link','ori'),
			'id' => 'social_link_facebook',
			'type' => 'text',
			'default' => 'https://www.facebook.com/CMSTheme',
		),
		array(
			'title' => __('Twitter Link','ori'),
			'id' => 'social_link_twitter',
			'type' => 'text',
			'default' => 'https://twitter.com/theme_cms',
		),
		array(
			'title' => __('Google Plus Link','ori'),
			'id' => 'social_link_google-plus',
			'type' => 'text',
			'default' => 'https://plus.google.com/u/0/100441859891321665284',
		),
		array(
			'title' => __('Pinterest Link','ori'),
			'id' => 'social_link_pinterest',
			'type' => 'text',
			'default' => 'https://www.pinterest.com/CMSTheme/',
		),
		array(
			'title' => __('Vimeo Link','ori'),
			'id' => 'social_link_vimeo',
			'type' => 'text',
			'default' => '#',
		),
		array(
			'title' => __('LinkedIn Link','ori'),
			'id' => 'social_link_linkedin',
			'type' => 'text',
			'default' => '#',
		),
		array(
			'title' => __('Dribbble Link','ori'),
			'id' => 'social_link_dribbble',
			'type' => 'text',
			'default' => '#',
		),
		array(
			'title' => __('Youtube Link','ori'),
			'id' => 'social_link_youtube',
			'type' => 'text',
			'default' => 'https://www.youtube.com/channel/UCEKkRQrWT47Vue-kbTepXBA',
		),
		array(
			'title' => __('RSS Link','ori'),
			'id' => 'social_link_rss',
			'type' => 'text',
			'default' => '#',
		),
	)
);

// Portfolio
$this->sections[] = array(
	'title' => __('Portfolio', 'ori'),
	'icon' => 'el el-indent-left',
	'fields' => array(
		array(
			'title' => esc_html__('Layout', 'ori'),
			'subtitle' => esc_html__('select layout for single portfolio.', 'ori'),
			'id' => 'portfolio_layout',
			'type' => 'image_select',
			'default' => '1',
			'options' => array(
				'1' => get_template_directory_uri().'/inc/options/images/portfolio/layout-1.jpg',
				'2' => get_template_directory_uri().'/inc/options/images/portfolio/layout-2.jpg',
				'3' => get_template_directory_uri().'/inc/options/images/portfolio/layout-3.jpg',
			)
		),
		array(
			'title' => esc_html__('Sidebar', 'ori'),
			'subtitle' => esc_html__('Enable sidebar on single portfolio', 'ori'),
			'id' => 'protfolio_sidebar',
			'type' => 'switch',
			'default' => true
		),
		array(
			'title' => esc_html__('Sidebar Position', 'ori'),
			'id' => 'sidebar_position',
			'type' => 'select',
			'options' => array(
				'right' => 'Right',
				'left' => 'Left'
			),
			'default' => 'right',
            'required' => array( 0 => 'protfolio_sidebar', 1 => '=', 2 => 1 )
		),
		array(
            'id'    => 'info_recent',
            'type'  => 'info',
            'style' => 'success',
            'title' => esc_html__('Recent Works', 'ori'),
            'icon'  => 'el-icon-info-sign',
            'desc'  => esc_html__('Control options recent works on single portfolio!', 'ori')
        ),
		array(
			'title' => esc_html__('Recent Works', 'ori'),
			'subtitle' => esc_html__('Enable recent works on single portfolio', 'ori'),
			'id' => 'protfolio_recent',
			'type' => 'switch',
			'default' => true
		),
        array(
            'title'       => esc_html__( 'Recent Column', 'ori' ),
			'subtitle' => esc_html__('On mobile this column is 1.', 'ori'),
            'id'          => 'recent_column',
            'type'        => 'slider',
            "default"   => 3,
            "min"       => 2,
            "step"      => 1,
            "max"       => 6,
            'display_value' => 'label',
            'required' => array( 0 => 'protfolio_recent', 1 => '=', 2 => 1 )
        ),
	)
);

$this->sections[] = array(
    'title' => __('Translate', 'ori'),
	'icon' => '',
	'subsection' => true,
    'fields' => array(
		array(
			'id' => 'pt_description',
			'title' => __('Title section description', 'ori'),
			'subtitle' => __('Default is "Project Description"', 'ori'),
			'type' => 'text',
			'default' => 'Project Description'
		),
		array(
			'id' => 'pt_details',
			'title' => __('Title section Details', 'ori'),
			'subtitle' => __('Default is "Project Details"', 'ori'),
			'type' => 'text',
			'default' => 'Project Details'
		),
		array(
			'id' => 'pt_details_date',
			'title' => __('Date in Details ', 'ori'),
			'subtitle' => __('Default is "Date:"', 'ori'),
			'type' => 'text',
			'default' => 'Date:'
		),
		array(
			'id' => 'pt_details_client',
			'title' => __('Client in Details ', 'ori'),
			'subtitle' => __('Default is "Client:"', 'ori'),
			'type' => 'text',
			'default' => 'Client:'
		),
		array(
			'id' => 'pt_details_skill',
			'title' => __('Skill in Details ', 'ori'),
			'subtitle' => __('Default is "Skill:"', 'ori'),
			'type' => 'text',
			'default' => 'Skill:'
		),
		array(
			'id' => 'pt_details_cat',
			'title' => __('Category in Details ', 'ori'),
			'subtitle' => __('Default is "Category:"', 'ori'),
			'type' => 'text',
			'default' => 'Category:'
		),
		array(
			'id' => 'pt_share',
			'title' => __('Title section Share', 'ori'),
			'subtitle' => __('Default is "Project Share"', 'ori'),
			'type' => 'text',
			'default' => 'Project Share'
		),
		array(
			'id' => 'pt_recent',
			'title' => __('Title section Recent', 'ori'),
			'subtitle' => __('Default is "Recent Works"', 'ori'),
			'type' => 'text',
			'default' => 'Recent Works'
		),
		array(
			'id' => 'pt_recent_desc',
			'title' => __('Description for Recent', 'ori'),
			'type' => 'editor',
			'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam, adipiscing condimentum tristique vel, eleifend sed turpis. Pellentesque cursus arcu id magna euismod in elementum purus molestie.'
		),
	)
);

/**
 * Custom CSS
 *
 * extra css for customer.
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Custom CSS', 'ori'),
    'icon' => 'el-icon-bulb',
    'fields' => array(
        array(
            'id' => 'custom_css',
            'type' => 'ace_editor',
            'title' => __('CSS Code', 'ori'),
            'subtitle' => __('create your css code here.', 'ori'),
            'mode' => 'css',
            'theme' => 'monokai',
        )
    )
);

/**
 * Animations
 *
 * Animations options for theme. libs css, js.
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Animations', 'ori'),
    'icon' => 'el-icon-magic',
    'fields' => array(
        array(
            'subtitle' => __('Enable animation parallax for images...', 'ori'),
            'id' => 'paralax',
            'type' => 'switch',
            'title' => __('Images Paralax', 'ori'),
            'default' => true
        ),
    )
);

/**
 * Optimal Core
 *
 * Optimal options for theme. optimal speed
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Optimal Core', 'ori'),
    'icon' => 'el-icon-idea',
    'fields' => array(
        array(
            'subtitle' => __('no minimize , generate css over time...', 'ori'),
            'id' => 'dev_mode',
            'type' => 'switch',
            'title' => __('Dev Mode (not recommended)', 'ori'),
            'default' => true
        )
    )
);