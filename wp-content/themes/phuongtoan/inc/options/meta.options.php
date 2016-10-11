<?php
/**
 * Meta options
 *
 * @author ZoTheme
 * @since 1.0.0
 */
class ZOMetaOptions
{
	public function __construct()
	{
		add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
		add_action('admin_enqueue_scripts', array($this, 'admin_script_loader'));
	}
	/* add script */
	function admin_script_loader()
	{
		global $pagenow;
		if (is_admin() && ($pagenow == 'post-new.php' || $pagenow == 'post.php')) {
			wp_enqueue_style('metabox', get_template_directory_uri() . '/inc/options/css/metabox.css');
			wp_enqueue_script('easytabs', get_template_directory_uri() . '/inc/options/js/jquery.easytabs.min.js');
			wp_enqueue_script('metabox', get_template_directory_uri() . '/inc/options/js/metabox.js');
		}
	}
	/* add meta boxs */
	public function add_meta_boxes()
	{
		$this->add_meta_box('template_page_options', __('Setting', 'ori'), 'page');
		$this->add_meta_box('testimonial_options', __('Testimonial about', 'ori'), 'testimonial');
		$this->add_meta_box('pricing_options', __('Pricing Option', 'ori'), 'pricing');
		$this->add_meta_box('team_options', __('Team About', 'ori'), 'teams');
		$this->add_meta_box('portfolio_options', __('Portfolio Details', 'ori'), 'portfolio');
	}

	public function add_meta_box($id, $label, $post_type, $context = 'advanced', $priority = 'default')
	{
		add_meta_box('_zo_' . $id, $label, array($this, $id), $post_type, $context, $priority);
	}
	/* --------------------- PAGE ---------------------- */
	function template_page_options() {
		?>
		<div class="tab-container clearfix">
			<ul class='etabs clearfix'>
				<li class="tab"><a href="#tabs-general"><i class="fa fa-server"></i><?php esc_html_e('General', 'ori'); ?></a></li>
				<li class="tab"><a href="#tabs-header"><i class="fa fa-diamond"></i><?php esc_html_e('Header', 'ori'); ?></a></li>
				<li class="tab"><a href="#tabs-page-title"><i class="fa fa-connectdevelop"></i><?php esc_html_e('Page Title', 'ori'); ?></a></li>
			</ul>
			<div class='panel-container'>
				<div id="tabs-general">
					<?php
					zo_options(array(
						'id' => 'full_width',
						'label' => __('Full Width','ori'),
						'type' => 'switch',
						'options' => array('on'=>'1','off'=>''),
					));
					zo_options(array(
						'id' => 'presets_color',
						'label' => esc_html__('Presets Color','cardealer'),
						'type' => 'imegesselect',
						'options' => array(
							'' => get_template_directory_uri().'/inc/options/images/presets/pr-c-default.jpg',
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
					));
					zo_options(array(
						'id' => 'page_boxed',
						'label' => __('Page Boxed Layout','ori'),
						'type' => 'switch',
						'options' => array('on'=>'1','off'=>''),
						'follow' => array('1'=>array('#div_page_boxed_bg'))
					));
					?>
						<div id="div_page_boxed_bg">
							<?php 
								zo_options(array(
									'id' => 'page_boxed_bg',
									'label' => __('Background for Boxed','ori'),
									'type' => 'image'
								));
								zo_options(array(
									'id' => 'page_boxed_padding',
									'label' => __('Padding for Body Boxed, Ex: 1px 1px 1px 1px...','ori'),
									'type' => 'text'
								));
							?>
						</div>
					<?php
					zo_options(array(
						'id' => 'page_dark',
						'label' => __('Page Dark Layout','ori'),
						'type' => 'switch',
						'options' => array('on'=>'1','off'=>''),
					));
					?>
				</div>
				<div id="tabs-header">
					<div id="page_header_enable"><?php
						zo_options(array(
							'id' => 'header_layout',
							'label' => __('Layout','ori'),
							'type' => 'imegesselect',
							'options' => array(
								'' => get_template_directory_uri().'/inc/options/images/header/h-default.png',
								'1' => get_template_directory_uri().'/inc/options/images/header/header-4.png',
								'2' => get_template_directory_uri().'/inc/options/images/header/header-5.png',
							)
						));
						?><div class="zo_metabox_note"><?php echo esc_html__('Top Bar', 'ori');?> </div><?php
						zo_options(array(
							'id' => 'top_bar_show',
							'label' => __('Disable/Enable Top Bar','ori'),
							'type' => 'select',
							'options' => array(
								'' => 'Display',
								'none' => 'None'
							)
						));
						zo_options(array(
							'id' => 'tbar_background_color',
							'label' => __('TB background color','ori'),
							'type' => 'color',
							'rgba' => true
						));
						zo_options(array(
							'id' => 'tbar_border_bottom_width',
							'label' => __('TB Bottom Width','ori'),
							'type' => 'select',
							'options' => array(
								'' => 'Default',
								'1px' => '1px',
								'2px' => '2px',
								'3px' => '3px',
								'4px' => '4px',
								'5px' => '5px',
								'none' => 'none'
							),
						));
						zo_options(array(
							'id' => 'tbar_border_bottom_style',
							'label' => __('TB Bottom Style','ori'),
							'type' => 'select',
							'options' => array(
								'' => 'Default',
								'solid' => 'Solid',
								'dashed' => 'Dashed',
								'dotted' => 'Dotted',
								'double' => 'Double',
								'none' => 'none'
							),
						));
						zo_options(array(
							'id' => 'tbar_border_bottom_color',
							'label' => __('TB Bottom color','ori'),
							'type' => 'color',
							'rgba' => true
						));
						zo_options(array(
							'id' => 'tbar_color',
							'label' => __('TB font color','ori'),
							'type' => 'color',
							'rgba' => true
						));
						zo_options(array(
							'id' => 'tbar_link_color',
							'label' => __('TB link color','ori'),
							'type' => 'color',
							'rgba' => true
						));
						zo_options(array(
							'id' => 'tbar_link_hover',
							'label' => __('TB link color hover','ori'),
							'type' => 'color',
							'rgba' => true
						));
						zo_options(array(
							'id' => 'tbar_info_icon_color',
							'label' => __('TB Infomation Icon color','ori'),
							'type' => 'color',
							'rgba' => true
						));
						zo_options(array(
							'id' => 'tbar_socials_style',
							'label' => __('TB Socials Style','ori'),
							'type' => 'select',
							'options' => array(
								'' => 'Default',
								'style-1' => 'Style 2',
								'style-2' => 'Style 3',
								'style-3' => 'Style 4'
							),
						));
						
						?><div class="zo_metabox_note"><?php echo esc_html__('Main Header', 'ori');?> </div><?php
						zo_options(array(
							'id' => 'header_logo',
							'label' => __('MH Logo','ori'),
							'type' => 'image'
						));
						zo_options(array(
							'id' => 'header_logo_slogan',
							'label' => __('MH Logo Slogan','ori'),
							'type' => 'text'
						));
						zo_options(array(
							'id' => 'mheader_position',
							'label' => __('MH Position','ori'),
							'type' => 'select',
							'options' => array(
								'' => 'Default',
								'absolute' => 'Absolute'
							)
						));
						zo_options(array(
							'id' => 'mheader_background',
							'label' => __('MH Background','ori'),
							'type' => 'color',
							'rgba' => true,
							'desc' => 'Background 100% width header'
						));
						zo_options(array(
							'id' => 'mheader_background_container',
							'label' => __('MH Background Container','ori'),
							'type' => 'color',
							'rgba' => true,
							'desc' => 'Background container header'
						));
						zo_options(array(
							'id' => 'mheader_height',
							'label' => __('MH Height','ori'),
							'type' => 'text',
							'desc' => 'Enter height main header, ex: 55.'
						));
						?><div class="zo_metabox_note"><?php echo esc_html__('Main Menu', 'ori');?> </div> 
						<div id="page_header_menu_enable"><?php
							zo_options(array(
								'id' => 'menu_border_top_width',
								'label' => __('Menu Border Top Width','ori'),
								'type' => 'select',
								'options' => array(
									'' => 'Default',
									'1px' => '1px',
									'2px' => '2px',
									'3px' => '3px',
									'4px' => '4px',
									'5px' => '5px',
									'none' => 'none'
								),
							));
							zo_options(array(
								'id' => 'menu_border_top_style',
								'label' => __('Menu Border Top Style','ori'),
								'type' => 'select',
								'options' => array(
									'' => 'Default',
									'solid' => 'Solid',
									'dashed' => 'Dashed',
									'dotted' => 'Dotted',
									'double' => 'Double',
									'none' => 'none'
								),
							));
							zo_options(array(
								'id' => 'menu_border_top_color',
								'label' => __('Menu Border Top color','ori'),
								'type' => 'color',
								'rgba' => true
							));
							zo_options(array(
								'id' => 'menu_border_bottom_width',
								'label' => __('Menu Border Bottom Width','ori'),
								'type' => 'select',
								'options' => array(
									'' => 'Default',
									'1px' => '1px',
									'2px' => '2px',
									'3px' => '3px',
									'4px' => '4px',
									'5px' => '5px',
									'none' => 'none'
								),
							));
							zo_options(array(
								'id' => 'menu_border_bottom_style',
								'label' => __('Menu Border Bottom Style','ori'),
								'type' => 'select',
								'options' => array(
									'' => 'Default',
									'solid' => 'Solid',
									'dashed' => 'Dashed',
									'dotted' => 'Dotted',
									'double' => 'Double',
									'none' => 'none'
								),
							));
							zo_options(array(
								'id' => 'menu_border_bottom_color',
								'label' => __('Menu Border Bottom color','ori'),
								'type' => 'color',
								'rgba' => true
							));
							zo_options(array(
								'id' => 'menu_color_first_level',
								'label' => __('Menu Color - First Level','ori'),
								'type' => 'color',
								'rgba' => true
							));
							zo_options(array(
								'id' => 'menu_color_hover_first_level',
								'label' => __('Menu Hover - First Level','ori'),
								'type' => 'color',
								'rgba' => true
							));
							zo_options(array(
								'id' => 'menu_text_align_first_level',
								'label' => __('Text Align - First Level','ori'),
								'type' => 'select',
								'options' => array(
									'' => 'Default',
									'left' => 'Left',
									'right' => 'Right',
									'center' => 'Center'
								)
							));
							zo_options(array(
								'id' => 'menu_background_color_sub_level',
								'label' => __('Sub menu - Background','ori'),
								'type' => 'color',
								'rgba' => true
							));
							zo_options(array(
								'id' => 'menu_color_sub_level',
								'label' => __('Sub menu - Color','ori'),
								'type' => 'color',
								'rgba' => true
							));
							zo_options(array(
								'id' => 'menu_color_hover_sub_level',
								'label' => __('Sub menu - Color Hover','ori'),
								'type' => 'color',
								'rgba' => true
							));
							zo_options(array(
								'id' => 'menu_background_color_hover_sub_level',
								'label' => __('Sub menu - BG Item Color Hover','ori'),
								'type' => 'color',
								'rgba' => true
							));
							?><div class="zo_metabox_note"><?php echo esc_html__('Sticky Menu', 'ori');?> </div> 
							<?php 
							zo_options(array(
								'id' => 'menu_sticky',
								'label' => __('Sticky Menu','ori'),
								'type' => 'select',
								'options' => array(
									'' => 'Default',
									false => 'Disable',
									true => 'Enable'
								)
							));
							?>
						</div>
						<div class="zo_metabox_note"><?php echo esc_html__('Select Menu', 'ori');?> </div> 
						<?php
						$menus = array();
						$menus[''] = 'Default';
						$obj_menus = wp_get_nav_menus();
						foreach ($obj_menus as $obj_menu){
							$menus[$obj_menu->term_id] = $obj_menu->name;
						}
						$navs = get_registered_nav_menus();
						foreach ($navs as $key => $mav){
							zo_options(array(
								'id' => $key,
								'label' => $mav,
								'type' => 'select',
								'options' => $menus
							));
						}
						?>
					</div>
				</div>
				<div id="tabs-page-title">
					<?php
					/* page title. */
					zo_options(array(
						'id' => 'page_title',
						'label' => __('Page Title','ori'),
						'type' => 'switch',
						'options' => array('on'=>'1','off'=>''),
						'follow' => array('1'=>array('#page_title_enable'))
					));
					?>  <div id="page_title_enable"><?php
						zo_options(array(
							'id' => 'page_title_text',
							'label' => __('Title','ori'),
							'type' => 'text',
						));
						zo_options(array(
							'id' => 'page_title_sub_text',
							'label' => __('Sub Title','ori'),
							'type' => 'text',
						));
						zo_options(array(
							'id' => 'page_title_padding',
							'label' => __('Page Title Padding, Ex: 10px, 0 10px...','ori'),
							'type' => 'text',
						));
						zo_options(array(
							'id' => 'page_title_margin',
							'label' => __('Page Title Margin, Ex: 10px, 0 10px...','ori'),
							'type' => 'text',
						));
						zo_options(array(
							'id' => 'page_title_background',
							'label' => __('Page Title Background','ori'),
							'type' => 'image',
						));
						zo_options(array(
							'id' => 'page_title_type',
							'label' => __('Layout','ori'),
							'type' => 'imegesselect',
							'options' => array(
								'' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-0.png',
								'1' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-1.png',
								'2' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-2.png',
								'3' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-3.png',
								'4' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-4.png',
								'5' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-5.png',
								'6' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-6.png',
							)
						));
						?>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
	/* --------------------- RATING TESTIMONIAL ---------------------- */
	function testimonial_options(){
		?>
		<div class="testimonial-rating">
			<?php
			zo_options(array(
				'id' => 'testimonial_position',
				'label' => __('Client Position','ori'),
				'type' => 'text',
			));
			?>
		</div>
	<?php
	}
	/* --------------------- PRICING ---------------------- */

	function pricing_options() {
		?>
		<div class="pricing-option-wrap">
			<table class="wp-list-table widefat fixed">
				<tr>
					<td>
						<?php
						zo_options(array(
							'id' => 'price',
							'label' => __('Price','ori'),
							'type' => 'text',
						));

						zo_options(array(
							'id' => 'value',
							'label' => __('Value','ori'),
							'type' => 'select',
							'options' => array(
								'Monthly' => 'Monthly',
								'Year' => 'Year'
							)
						));

						zo_options(array(
							'id' => 'color',
							'label' => __('Header Color','ori'),
							'type' => 'color',
							'default' => ''
						));

						?>
					</td>
					<td>
						<?php
						zo_options(array(
							'id' => 'is_feature',
							'label' => __('Is feature','ori'),
							'type' => 'switch',
							'options' => array('on'=>'1','off'=>''),
						));

						zo_options(array(
							'id' => 'button_url',
							'label' => __('Button Url','ori'),
							'type' => 'text',
						));

						zo_options(array(
							'id' => 'button_text',
							'label' => __('Button Text','ori'),
							'type' => 'text',
						));
						?>
					</td>
				</tr>
			</table>
		</div>
	<?php
	}
	/* --------------------- PRICING ---------------------- */

	/*-----------------------TEAM-------------------------*/
	function team_options() {
		?>

		<div class="tab-container clearfix">
			<ul class='etabs clearfix'>
				<li class="tab"><a href="#tabs-position"><i class="fa fa-server"></i><?php _e('Position', 'ori'); ?></a></li>
			</ul>
			<div class='panel-container'>
				<div id="tabs-position">
					<?php
					zo_options(array(
						'id' => 'socials',
						'label' => __('Socials of team','ori'),
						'type' => 'social',
					));
					?>
				</div>
			</div>
		</div>
	<?php
	}
	/*-----------------------Portfolio-------------------------*/
	function portfolio_options() {
		?>
		<div class="tab-container clearfix">
			<ul class='etabs clearfix'>
				<li class="tab"><a href="#tabs-about"><i class="fa fa-server"></i><?php _e('Details', 'ori'); ?></a></li>
			</ul>
			<div class='panel-container'>
				<div id="tabs-about">
					<?php
					zo_options(array(
						'id' => 'portfolio_client',
						'label' => __('Client', 'ori'),
						'type' => 'text',
						'placeholder' => '',
					));
					zo_options(array(
						'id' => 'portfolio_date',
						'label' => __('Date', 'ori'),
						'type' => 'date',
						'placeholder' => '',
					));
					zo_options(array(
						'id' => 'portfolio_skills',
						'label' => __('Skills', 'ori'),
						'type' => 'text',
						'placeholder' => '',
					));
					zo_options(array(
						'id' => 'portfolio_images',
						'label' => __('Gallery', 'ori'),
						'type' => 'images',
					));
					?>
				</div>
			</div>
		</div>


	<?php
	}
}

new ZOMetaOptions();