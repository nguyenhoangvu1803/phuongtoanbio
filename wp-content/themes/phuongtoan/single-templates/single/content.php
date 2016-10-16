<?php
/**
 * The default template for displaying content
 *
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-teaser'); ?>>
    <?php if(has_post_thumbnail()) : ?>
    <div class="zo-blog-image">
        <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_post_thumbnail( 'full' ); ?></a>
		<div class="zo-blog-date">
			<span class="day"><?php echo get_the_date("d"); ?></span>
			<span class="month-yeah"><?php echo get_the_date("M, Y"); ?></span>
		</div>
    </div>
    <?php endif ?>

    <div class="zo-blog-detail">
        <div class="zo-blog-meta">
			<h2 class="zo-blog-title"><?php the_title(); ?></h2>
		</div>
        <div class="zo-blog-content">
            <?php the_content();
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
		<div class="zo-blog-tag-share">
			<?php if(has_tag()): ?>
				<div class="zo-blog-tag"><?php the_tags('<i class="fa fa-tags"></i>', ', ' ); ?></div>
			<?php endif; ?>
			<div class="social-share">
				<?php zo_social_share() ?>
			</div>
		</div>
    </div>
</article>