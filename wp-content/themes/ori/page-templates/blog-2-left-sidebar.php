<?php
/**
 * Template Name: Blog 2 Left Side 
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 * @author ZoTheme
 */
$blog_layout = '';
if(!empty(zo_get_data_theme_options('blog_masonry'))) {
	wp_enqueue_script('modernizr', get_template_directory_uri() . '/assets/js/modernizr.min.js', array('jquery'));
	wp_enqueue_script('imagesloaded', get_template_directory_uri() . '/assets/js/jquery.imagesloaded.js', array('jquery'));
	wp_enqueue_script('zo-jquery-shuffle', get_template_directory_uri() . '/assets/js/jquery.shuffle.js', array('jquery','modernizr','imagesloaded'));
	wp_enqueue_script('zo-blog-jquery-shuffle', get_template_directory_uri() . '/assets/js/jquery.shuffle.zo.js', array('zo-jquery-shuffle'));
	$blog_layout = 'zo-grid-masonry';
}
get_header(); ?>
<div id="page-front-page">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <?php get_sidebar(); ?>
            </div>
            <div id="primary" class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <div id="content" role="main">

                <?php global $wp_query, $paged; ?>
                
                <?php $wp_query->query('post_type=post&showposts='.get_option('posts_per_page').'&paged='.$paged); ?>
                
                <?php if ( have_posts() ) : ?>
					<div class="row">
						<div id="zo-blog-grid" <?php if($blog_layout) echo 'class="'. esc_attr($blog_layout) .'"';?>>
							<?php while ( have_posts() ) : the_post();
								/* Include the post format-specific template for the content. If you want to
								 * this in a child theme then include a file called called content-___.php
								 * (where ___ is the post format) and that will be used instead.
								 */
							?>
								<div class="zo-grid-item col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<?php get_template_part( 'single-templates/content/content', get_post_format() );?>
								</div>
							<?php endwhile; // end of the loop.?>
						</div>
					</div>
                    <?php zo_paging_nav(); ?>
                    
                <?php else : ?>
                    <?php get_template_part( 'single-templates/content', 'none' ); ?>
                <?php endif; ?> 
                
                </div><!-- #content -->
            </div><!-- #primary -->
        </div>
    </div>
</div>
<?php get_footer(); ?>