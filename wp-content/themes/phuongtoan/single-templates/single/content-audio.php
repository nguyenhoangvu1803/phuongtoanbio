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
    <div class="zo-blog-image zo-blog-audio">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail( 'full' ); ?>
            <div class="overlay">
                <div class="overlay-inner">
                    <a class="play-button" title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="">
                        <i class="fa fa-play"></i>
                    </a>
                    <?php echo zo_archive_audio(); ?>
                </div>
            </div>
			<div class="zo-blog-date">
				<span class="day"><?php echo get_the_date("d"); ?></span>
				<span class="month-yeah"><?php echo get_the_date("M, Y"); ?></span>
			</div>
        <?php else : ?>
            <?php echo zo_archive_audio(); ?>
        <?php endif; ?>
    </div>

    <div class="zo-blog-detail">
        <div class="zo-blog-meta">
			<h2 class="zo-blog-title"><?php the_title(); ?></h2>
			<?php zo_archive_detail(); ?>
		</div>
        <div class="zo-blog-content">
            <?php
            if(zo_archive_audio()) {
                echo apply_filters('the_content', preg_replace(array('/\[embed(.*)](.*)\[\/embed\]/', '/\[audio(.*)](.*)\[\/audio\]/'), '', get_the_content(), 1));
            } else {
                the_excerpt();
            }
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
    </div>
</article>
