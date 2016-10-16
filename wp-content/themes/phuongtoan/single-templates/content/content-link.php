<?php
/**
 * The default template for displaying content
 *
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */
global $smof_data;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-teaser'); ?>>
    <?php 
		if(!empty($smof_data['blog_section'])){
			foreach($smof_data['blog_section'] as $key=>$value){				
				if($smof_data['blog_section'][$key]) {
					switch($key) {
						case 'thumb': 
							?>
								<div class="zo-blog-link">
									<?php if (has_post_thumbnail()) : ?>
										<?php the_post_thumbnail( 'full' ); ?>
										<div class="overlay-link">
											<span class="link"><?php echo zo_archive_link(); ?></span>
										</div>
										<div class="zo-blog-date">
											<span class="day"><?php echo get_the_date("d"); ?></span>
											<span class="month-yeah"><?php echo get_the_date("M, Y"); ?></span>
										</div>
									<?php else : ?>
										<?php echo zo_archive_link(); ?>
									<?php endif; ?>
								</div>
							<?php 
							break;
							
						case 'title':
							?>
								<h2 class="zo-blog-title"><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_title(); ?></a></h2>
							<?php
							break;
							
						case 'content':
							?>
								<div class="zo-blog-content">
									<?php
									if(get_post_type( get_the_ID() ) != 'page'):
										the_excerpt();
									endif;
									wp_link_pages( array(
										'before'      => '<p class="page-links"><span class="page-links-title">' . __( 'Pages:', 'ori' ) . '</span>',
										'after'       => '</p>',
										'link_before' => '<span>',
										'link_after'  => '</span>',
										'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'ori' ) . ' </span>%',
										'separator'   => '<span class="screen-reader-text">, </span>',
									) );
									?>
								</div>
							<?php
							break;
							
						case 'meta':
							?>
								<div class="zo-blog-meta">
									<a class="btn btn-readmore" title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php _e('Xem Tiếp ', 'ori') ?></a>
								</div>
							<?php
							break;
					}
				}
			}
		}
	?>
</article>
