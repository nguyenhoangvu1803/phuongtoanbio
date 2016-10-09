<?php
/**
 * @name : Default
 * @package : ZoTheme
 * @author : ZoTheme
 */

global $smof_data, $zo_meta; 

// Get Width Header
$container = (!empty($smof_data['header_width']) && $smof_data['header_width']) ? 'container-fluid' : 'container';

// Socials Style
$socials_style = (!empty($smof_data['tb_socials_style'])) ? $smof_data['tb_socials_style'] : '';
$socials_style = (!empty($zo_meta->_zo_tbar_socials_style)) ? $zo_meta->_zo_tbar_socials_style : $socials_style;
$top_bar_show = !empty($zo_meta->_zo_top_bar_show) ? $zo_meta->_zo_top_bar_show: '';
?>

<!-- Header Top -->
<?php if($top_bar_show != 'none') {?>
	<div id="zo-header-top">
		<div class="<?php echo esc_attr($container);?>">
			<div class="row">
				<?php 
					if(!empty($smof_data['tbar_section'])){
						$left = 0;
						foreach($smof_data['tbar_section'] as $key=>$value){
							switch($key){
								case '1':
									if($value){ ?>
										<div class="col-lg-6 col-md-6 col-sm-6 hidden-xs <?php if($left) echo 'align-right'; else echo 'align-left';?>">
											<div class="top-bar-infomation">
												<?php 
													if(!empty($smof_data['tbar_languages']) && $smof_data['tbar_languages']){
												?>
													<div class="infomation-languages">
														<ul>
															<?php 
																$args = array(
																	'show_names' => 0,
																	'show_flags' => 1,
																);
																pll_the_languages($args);
															?>
														</ul>
													</div>
												<?php 
													}
												?>
												<div class="infomation-content"><?php if(!empty($smof_data['tbar_infomation'])) print($smof_data['tbar_infomation']);?></div>
											</div>
										</div>
									<?php }
									break;
								case '2':
									if($value){ ?>
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 <?php if($left) echo 'align-right'; else echo 'align-left';?>">
											<?php 
												if(!empty($smof_data['tb_social'])){
													echo '<div class="social-ul '. esc_attr($socials_style) .'"><ul>';
														foreach($smof_data['tb_social'] as $key=>$value){
															switch($value){
																case 1:
																	$href_key = 'social_link_' . esc_attr($key);
																	$href = $smof_data[$href_key];
																	echo '<li class="'. esc_attr($key) .'"><a href="'. esc_attr($href) .'" target="_blank"><i class="fa fa-'. esc_attr($key) .'"></i></a></li>';
																	break;
															}
														}
													echo '</ul></div>';
												}
											?>
										</div>
									<?php }
									break;
							} $left++;
						}
					}
				?>
			</div>
		</div>
	</div>
<?php }?>

<!-- Header Navigation -->
<div id="zo-header" class="zo-main-header header-default <?php if ($smof_data['menu_sticky_tablets']) {
	echo 'sticky-tablets';
} ?> <?php if ($smof_data['menu_sticky_mobile']) {
	echo 'sticky-mobile';
} ?>">
	<div class="<?php echo esc_attr($container);?>">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div id="zo-header-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img class="main-logo" alt="<?php echo get_bloginfo ('name');?>" src="<?php echo esc_url(zo_page_header_logo()); ?>">
						<?php echo zo_page_header_sticky_logo(); ?>
					</a>
					<span>
						<?php 
							$slogan = !empty($smof_data['text_logo']) ? $smof_data['text_logo']: '';
							$slogan = !empty($zo_meta->_zo_header_logo_slogan) ? $zo_meta->_zo_header_logo_slogan: $slogan;
							echo esc_attr($slogan);
						?>
					</span>
				</div>
				<div class="zo-header-navigation-wrap pull-right">
					<div class="zo-header-navigation">
						<nav id="site-navigation" class="main-navigation">
							<?php

								$attr = array(
									'menu' => zo_menu_location(),
									'items_wrap' => '<ul class="nav-menu menu-main-menu">%3$s</ul>',
								);

								$menu_locations = get_nav_menu_locations();
								
								if (!empty($menu_locations['primary'])) {
									$attr['theme_location'] = 'primary';
								}
								
								if((zo_menu_location() == '33') || (!empty($menu_locations['primary']) && $menu_locations['primary'] == 33)) { 
									/* One Page Menu */
									wp_enqueue_script( 'waypoints');
								}
								
								/* enable mega menu. */
								if (class_exists('HeroMenuWalker')) {
									$attr['walker'] = new HeroMenuWalker();
								}

								/* main nav. */
								wp_nav_menu($attr); 
							?>
						</nav>
					</div>
					<div class="zo-header-right">
						<?php dynamic_sidebar('sidebar-4'); ?>
					</div>
				</div>
				<div id="zo-menu-mobile" class="collapse navbar-collapse"><i class="fa fa-bars"></i></div>
			</div>
		</div>
	</div>
	<!-- #site-navigation -->
</div>
<!--#zo-header-->