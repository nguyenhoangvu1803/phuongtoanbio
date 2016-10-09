<?php
/**
 * Template Name: Blog 1 Full Width 
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 * @author ZoTheme
 */

get_header(); ?>
<div id="page-front-page">
    <div class="container">
        <div class="row">
            <div id="primary" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="content" role="main">

                <?php global $wp_query, $paged; ?>
                
                <?php $wp_query->query('post_type=post&showposts='.get_option('posts_per_page').'&paged='.$paged); ?>
                
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post();
                        /* Include the post format-specific template for the content. If you want to
                         * this in a child theme then include a file called called content-___.php
                         * (where ___ is the post format) and that will be used instead.
                         */
                        get_template_part( 'single-templates/content/content', get_post_format() );
                    endwhile; // end of the loop.?>
                    
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