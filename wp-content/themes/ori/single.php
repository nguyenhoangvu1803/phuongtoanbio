<?php
/**
 * The Template for displaying all single posts
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */

$container = (!empty(zo_get_data_theme_options('single_width'))) ? 'container-fluid' : 'container';
$sidebar_size = zo_get_data_theme_options('single_sidebar_size');
$content_size = 12 - $sidebar_size;

get_header(); ?>
<div class="<?php echo esc_attr($container); ?>">
    <div class="row">
		<?php 
			$section = zo_get_data_theme_options('single_section');
			if(!empty($section)){
				foreach($section as $key=>$value){				
					if($section[$key]) {
						switch($key) {
							case 'posts': 
								?>
									<div id="primary" class="col-xs-12 col-sm-<?php echo esc_attr($content_size)?> col-md-<?php echo esc_attr($content_size)?> col-lg-<?php echo esc_attr($content_size)?>">
										<div id="content" role="main">

											<?php while ( have_posts() ) : the_post(); ?>

												<?php get_template_part( 'single-templates/single/content', get_post_format() ); ?>

												<?php //zo_post_nav(); ?>
												
												<?php zo_about_author(); ?>
												
												<?php comments_template( '', true ); ?>

											<?php endwhile; // end of the loop. ?>

										</div><!-- #content -->
									</div><!-- #primary -->
								<?php
								break;
								
							case 'sidebar': 
								?>
									<div class="col-xs-12 col-sm-<?php echo esc_attr($sidebar_size)?> col-md-<?php echo esc_attr($sidebar_size)?> col-lg-<?php echo esc_attr($sidebar_size)?>">
										<?php get_sidebar(); ?>
									</div>
								<?php
								break;
						}
					}
				}
			}
		?>
    </div>
</div>
<?php get_footer(); ?>