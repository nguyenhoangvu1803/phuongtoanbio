<?php 
$ft_container = zo_get_data_theme_options('footer_top_width') ? 'container-fluid': 'container' ;
$ft_sb_width = zo_get_data_theme_options('footer_top_sidebar_width');
$ft_section = zo_get_data_theme_options('footer_top_section');

$fb_container = zo_get_data_theme_options('footer_bottom_width') ? 'container-fluid': 'container' ;
$fb_section = zo_get_data_theme_options('footer_bottom_section');

$ft_social = zo_get_data_theme_options('ft_social');
?>
<footer>
	<?php
		if(!empty($ft_section)){
	?>
		<div id="zo-footer-top">
			<div class="<?php echo esc_attr($ft_container);?>">
				<div class="row">
					<?php 
						foreach($ft_section as $key=>$value){				
							if($ft_section[$key]) {
								switch($key) {
									case 'footer_top_1': 
										?>
											<div class="col-xs-12 col-sm-<?php echo esc_attr($ft_sb_width)?> col-md-<?php echo esc_attr($ft_sb_width)?> col-lg-<?php echo esc_attr($ft_sb_width)?> footer-first">
												<?php if (is_active_sidebar('sidebar-5')) : ?><?php dynamic_sidebar('sidebar-5'); ?><?php endif; ?>
												<?php 
													if(!empty($ft_social)){
														echo '<div class="social-ul"><ul>';
															foreach($ft_social as $key=>$value){
																switch($value){
																	case 1:
																		$href_key = 'social_link_' . esc_attr($key);
																		$href = zo_get_data_theme_options($href_key);
																		echo '<li class="'. esc_attr($key) .'"><a href="'. esc_attr($href) .'" target="_blank"><i class="fa fa-'. esc_attr($key) .'"></i></a></li>';
																		break;
																}
															}
														echo '</ul></div>';
													}
												?>
											</div>
										<?php
										break;
										
									case 'footer_top_2': 
										?>
											<?php if (is_active_sidebar('sidebar-6')) : ?>
												<div class="col-xs-12 col-sm-<?php echo esc_attr($ft_sb_width)?> col-md-<?php echo esc_attr($ft_sb_width)?> col-lg-<?php echo esc_attr($ft_sb_width)?> footer-second"><?php dynamic_sidebar('sidebar-6'); ?></div>
											<?php endif; ?>
										<?php
										break;
										
									case 'footer_top_3': 
										?>
											<?php if (is_active_sidebar('sidebar-7')) : ?>
												<div class="col-xs-12 col-sm-<?php echo esc_attr($ft_sb_width)?> col-md-<?php echo esc_attr($ft_sb_width)?> col-lg-<?php echo esc_attr($ft_sb_width)?> footer-third"><?php dynamic_sidebar('sidebar-7'); ?></div>
											<?php endif; ?>
										<?php
										break;
										
									case 'footer_top_4': 
										?>
											<?php if (is_active_sidebar('sidebar-8')) : ?>
												<div class="col-xs-12 col-sm-<?php echo esc_attr($ft_sb_width)?> col-md-<?php echo esc_attr($ft_sb_width)?> col-lg-<?php echo esc_attr($ft_sb_width)?> footer-four"><?php dynamic_sidebar('sidebar-8'); ?></div>
											<?php endif; ?>
										<?php
										break;
								}
							}
						}
					?>
				</div>
			</div>
		</div>
	<?php 
		}
	?>
	
	<?php
		if(!empty($fb_section)){
	?>
		<div id="zo-footer-bottom">
			 <div class="<?php echo esc_attr($fb_container);?>">
				 <div class="row">
					 <?php 
						$i = 1;
						foreach($fb_section as $key=>$value){				
							if($fb_section[$key]) {
								switch($key) {
									case 'footer_bottom_1':
										?>
											 <?php if (is_active_sidebar('sidebar-9')) : ?>
												 <div class="col-xs-12 col-sm-5 col-md-6 col-lg-6 bottom-first <?php if($i == 2) echo "align-right";?>"><?php dynamic_sidebar('sidebar-9'); ?></div>
											 <?php endif; ?>
										<?php
										break;
									case 'footer_bottom_2':
										?>
											 <?php if (is_active_sidebar('sidebar-10')) : ?>
												 <div class="col-xs-12 col-sm-7 col-md-6 col-lg-6 bottom-second <?php if($i == 2) echo "align-right";?>"><?php dynamic_sidebar('sidebar-10'); ?></div>
											 <?php endif; ?>
										<?php
										break;
								}
							}
							$i++;
						}
					?>
				 </div>
			 </div>
		</div>
	<?php 
		}
	?>
</footer><!-- #site-footer -->