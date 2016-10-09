<?php
/**
 * The Template for displaying all single posts
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */
/*
 *	Demo Single Portfolio - layout left sidebar
 */
 $layout = !empty(zo_get_data_theme_options('portfolio_layout')) ? zo_get_data_theme_options('portfolio_layout') : 1;

get_header(); ?>
<div class="container">
    <div class="row">
		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
			<?php get_sidebar();?>
		</div>
		<div id="primary" class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>
					
					<?php get_template_part( 'single-templates/portfolio/layout', $layout ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
    </div>
</div>
<?php get_footer(); ?>