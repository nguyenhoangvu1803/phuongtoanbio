<?php
/**
 * The Template for displaying all single posts
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */

$container = (!empty(zo_get_data_theme_options('single_width'))) ? 'container-fluid' : 'container';

get_header(); ?>
<div class="<?php echo esc_attr($container); ?>">
    <div class="row">
		<div id="primary" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'single-templates/single/content', get_post_format() ); ?>
					
					<?php zo_about_author(); ?>
					
					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
    </div>
</div>
<?php get_footer(); ?>