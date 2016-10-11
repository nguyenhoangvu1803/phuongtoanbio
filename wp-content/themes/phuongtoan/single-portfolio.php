<?php
/**
 * The Template for displaying all single posts
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */
$layout = !empty(zo_get_data_theme_options('portfolio_layout')) ? zo_get_data_theme_options('portfolio_layout') : 1;
$sidebar = !empty(zo_get_data_theme_options('protfolio_sidebar')) ? zo_get_data_theme_options('protfolio_sidebar') : "0";
$sidebar_position = !empty(zo_get_data_theme_options('sidebar_position')) ? zo_get_data_theme_options('sidebar_position') : 'right';
$content_width = "col-xs-12 col-sm-9 col-md-9 col-lg-9";
if(!$sidebar) $content_width = "col-xs-12 col-sm-12 col-md-12 col-lg-12";

get_header(); ?>
<div class="container">
    <div class="row">
		<?php 
			if($sidebar_position == 'left') {
				echo '<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">';
					get_sidebar();
				echo '</div>';
			}
		?>
		<div id="primary" class="<?php echo esc_attr($content_width);?>">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>
					
					<?php get_template_part( 'single-templates/portfolio/layout', $layout ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
		<?php 
			if($sidebar_position == 'right') {
				if($sidebar) {
					echo '<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">';
						get_sidebar();
					echo '</div>';
				}
			}
		?>
    </div>
</div>
<?php get_footer(); ?>