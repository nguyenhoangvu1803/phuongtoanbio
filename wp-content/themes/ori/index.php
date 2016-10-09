<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package ZoTheme
 * @subpackage Zo Theme 
 * @since 1.0.0
 */

$blog_layout = zo_get_data_theme_options('blog_layout');
$blog_sidebar = zo_get_data_theme_options('blog_sidebar');
$container = zo_get_data_theme_options('blog_layout_width') ? 'container-fluid' : 'container';
$sidebar_size = zo_get_data_theme_options('body_sidebar_size');
$content_size = 12 - $sidebar_size;

$blog_layout = '';
if(!empty(zo_get_data_theme_options('blog_masonry'))) {
	wp_enqueue_script('modernizr', get_template_directory_uri() . '/assets/js/modernizr.min.js', array('jquery'));
	wp_enqueue_script('imagesloaded', get_template_directory_uri() . '/assets/js/jquery.imagesloaded.js', array('jquery'));
	wp_enqueue_script('zo-jquery-shuffle', get_template_directory_uri() . '/assets/js/jquery.shuffle.js', array('jquery','modernizr','imagesloaded'));
	wp_enqueue_script('zo-blog-jquery-shuffle', get_template_directory_uri() . '/assets/js/jquery.shuffle.zo.js', array('zo-jquery-shuffle'));
	$blog_layout = 'zo-grid-masonry';
}

get_header(); ?>
    <div class="<?php echo esc_attr($container); ?>">
        <div class="row">
			<?php if(zo_get_data_theme_options('blog_sidebar') == 'left'){?>
				<div class="col-xs-12 col-sm-<?php echo esc_attr($sidebar_size);?> col-md-<?php echo esc_attr($sidebar_size);?> col-lg-<?php echo esc_attr($sidebar_size);?>">
					<?php get_sidebar(); ?>
				</div>
			<?php }?>
            <div id="primary" class="<?php if(zo_get_data_theme_options('blog_sidebar') == 'none') { ?>col-xs-12 col-sm-12 col-md-12 col-lg-12<?php } else {?>col-xs-12 col-sm-<?php echo esc_attr($content_size);?> col-md-<?php echo esc_attr($content_size);?> col-lg-<?php echo esc_attr($content_size);?><?php }?>">
                <div id="content" role="main" class="row">
                    <?php if ( have_posts() ) : ?>
						<div id="zo-blog-grid" <?php if($blog_layout) echo 'class="'. esc_attr($blog_layout) .'"';?>>
							<?php while ( have_posts() ) : the_post(); ?>
								<?php if(zo_get_data_theme_options('blog_layout') == 2){ ?>
									<div class="zo-grid-item blog-style-2 <?php if(zo_get_data_theme_options('blog_sidebar') == 'none') { echo esc_attr('col-xs-12 col-sm-4 col-md-4 col-lg-4 sidebar-none');} else { echo esc_attr('col-xs-12 col-sm-6 col-md-6 col-lg-6'); }?>">
										<?php get_template_part( 'single-templates/content/content', get_post_format() ); ?>
									</div>
								<?php }else{?>
									<div class="zo-grid-item col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<?php get_template_part( 'single-templates/content/content', get_post_format() ); ?>
									</div>
								<?php }?>
							<?php endwhile; ?>
						</div>
						<?php zo_paging_nav(); ?>
                    <?php else : ?>

                        <article id="post-0" class="post no-results not-found">

                            <?php if ( current_user_can( 'edit_posts' ) ) :
                                // Show a different message to a logged-in user who can add posts.
                                ?>
                                <header class="entry-header">
                                    <h1 class="entry-title"><?php _e( 'No posts to display', 'ori' ); ?></h1>
                                </header>

                                <div class="entry-content">
                                    <p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'ori' ), admin_url( 'post-new.php' ) ); ?></p>
                                </div><!-- .entry-content -->

                            <?php else :
                                // Show the default message to everyone else.
                                ?>
                                <header class="entry-header">
                                    <h1 class="entry-title"><?php _e( 'Nothing Found', 'ori' ); ?></h1>
                                </header>

                                <div class="entry-content">
                                    <p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'ori' ); ?></p>
                                    <?php get_search_form(); ?>
                                </div><!-- .entry-content -->
                            <?php endif; // end current_user_can() check ?>

                        </article><!-- #post-0 -->

                    <?php endif; // end have_posts() check ?>

                </div><!-- #content -->
            </div><!-- #primary -->
			<?php if(zo_get_data_theme_options('blog_sidebar') == 'right'){?>
				<div class="col-xs-12 col-sm-<?php echo esc_attr($sidebar_size);?> col-md-<?php echo esc_attr($sidebar_size);?> col-lg-<?php echo esc_attr($sidebar_size);?>">
					<?php get_sidebar(); ?>
				</div>
			<?php }?>
        </div>
    </div>
<?php get_footer(); ?>