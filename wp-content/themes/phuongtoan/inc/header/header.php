<?php
/**
 * @name : Default
 * @package : ZoTheme
 * @author : ZoTheme
 */

global $smof_data, $zo_meta; 

// Get Width Header
$container = (!empty($smof_data['header_width']) && $smof_data['header_width']) ? 'container-fluid' : 'container';
?>

<!--
<div id="zo-header-top">
	<div class="<?php echo esc_attr($container);?>">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="company-info">
					<span class="company-name">
						<?php 
							$company_name = !empty($smof_data['company_name']) ? $smof_data['company_name']: 'PHƯƠNG TOÀN - DOANH NGHIỆP TƯ NHÂN SINH HÓA';
							echo esc_attr($company_name);
						?>
					</span>
					<span class="company-sologan">
						<?php 
							$slogan = !empty($smof_data['text_logo']) ? $smof_data['text_logo']: '';
							$slogan = !empty($zo_meta->_zo_header_logo_slogan) ? $zo_meta->_zo_header_logo_slogan: $slogan;
							echo esc_attr($slogan);
						?>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>
-->

<!-- Header Navigation -->
<div id="zo-header" class="zo-main-header header-default <?php if ($smof_data['menu_sticky_tablets']) {
	echo 'sticky-tablets';
} ?> <?php if ($smof_data['menu_sticky_mobile']) {
	echo 'sticky-mobile';
} ?>">
	<div class="zo-header-navigation-wrap">
		<div class="<?php echo esc_attr($container);?>">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
					<div id="zo-menu-mobile" class="collapse navbar-collapse"><i class="fa fa-bars"></i></div>
				</div>
			</div>
		</div>
	</div>
	<!-- #site-navigation -->
</div>
<!--#zo-header-->

<div id="zo-header-logo">
	<div class="<?php echo esc_attr($container);?>">
		<div class="row">
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">			
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img class="main-logo" alt="<?php echo get_bloginfo ('name');?>" src="<?php echo esc_url(zo_page_header_logo()); ?>">
					<?php //echo zo_page_header_sticky_logo(); ?>
				</a>
			</div>
			<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">		
				<?php 
					if(is_active_sidebar('header-address')) dynamic_sidebar('header-address');
				?>
				<div class="company-info">
					<span class="company-sologan">
						<?php 
							$slogan = !empty($smof_data['text_logo']) ? $smof_data['text_logo']: '';
							$slogan = !empty($zo_meta->_zo_header_logo_slogan) ? $zo_meta->_zo_header_logo_slogan: $slogan;
							echo esc_attr($slogan);
						?>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>