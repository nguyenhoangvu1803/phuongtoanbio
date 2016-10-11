<?php
/* Get Categories */
$taxonomy = 'category';
$_category = array();
if(!isset($atts['cat']) || $atts['cat']=='' && taxonomy_exists($taxonomy)){
    $terms = get_terms($taxonomy);
    foreach ($terms as $cat){
        $_category[] = $cat->term_id;
    }
} else {
    $_category  = explode(',', $atts['cat']);
}
$atts['categories'] = $_category;
?>
<div class="zo-carousel-wrap">
    <div class="zo-carousel <?php echo esc_attr($atts['template']); ?>" id="<?php echo esc_attr($atts['html_id']); ?>">
        <?php
        $posts = $atts['posts'];
        while ($posts->have_posts()) :
            $posts->the_post();
            $groups = array();
            $groups[] = 'zo-carousel-filter-item all';
            foreach (zoGetCategoriesByPostID(get_the_ID(), $taxonomy) as $category) {
                $groups[] = 'category-' . $category->slug;
            }
            ?>
            <div class="zo-carousel-item <?php echo implode(' ', $groups);?>">
				<div class="zo-carousel-media">
					<a href="<?php the_permalink();?>" title="<?php the_title();?>">
						<?php
						if (has_post_thumbnail() && !post_password_required() && !is_attachment() && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
							if($atts['image_size']=='custom'){
								echo zo_post_thumbnail(get_the_ID(),$atts['image_width'],$atts['image_height'],true,true,true);
							}else{
								the_post_thumbnail($atts['image_size']);
							}
						else:
							echo '<img src="' . ZO_IMAGES . 'no-image.jpg" alt="' . get_the_title() . '" style="max-height: '. esc_attr($atts['image_height']) .'px;" />';
						endif;
						?>
					</a>
					<div class="zo-carousel-date">
						<span class="day"><?php echo get_the_date("d"); ?></span>
						<span class="month-yeah"><?php echo get_the_date("M, Y"); ?></span>
					</div>
				</div>	
				<div class="text-ellipsis">
					<?php echo '<' . $atts['title_element'] . ' class="zo-carousel-title">';?><a href="<?php the_permalink();?>" title="<?php esc_html_e('View Detail','ori');?>"><?php the_title();?></a><?php echo '</' . $atts['title_element'] .'>';?>
				</div>
				<div class="zo-carousel-content">
					<?php echo zo_limit_words(get_the_excerpt(), 20);?>
					<a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php esc_html_e('Read More', 'ori');?></a>
				</div>
				<div class="zo-carousel-meta">
					<div class="author vcard"><i class="fa fa-user"></i><?php esc_html_e('Author: ', 'ori'); ?><?php the_author_posts_link(); ?></div>
					<div class="zo-blog-comment"><i class="fa fa-comments"></i><a href="<?php the_permalink(); ?>"><?php esc_html_e('Comments: ', 'ori'); ?><?php echo comments_number('0','1','%'); ?></a></div>
				</div>
            </div>
        <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
</div>