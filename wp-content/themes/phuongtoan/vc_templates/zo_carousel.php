<?php
/* Get Categories */
$taxonomy = 'portfolio';
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
                <div class="zo-grid-media">
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
					<div class="zo-carousel-overlay">
						<a href="<?php the_permalink();?>" class="zo-carousel-link"><i class="fa fa-link"></i></a>
						<a href="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)[0]; ?>" rel="prettyPhoto[<?php echo $atts['html_id']?>]" class="zo-carousel-zoom"><i class="fa fa-search"></i></a>
					</div>
				</div>				
				<div class="zo-carousel-detail">
					<i class="fa fa-leaf"></i>
					<div class="zo-carousel-meta">
						<div class="text-ellipsis">
							<?php echo '<' . $atts['title_element'] . ' class="zo-carousel-title">';?><a href="<?php the_permalink()?>" title="<?php esc_html_e('View Detail','ori');?>"><?php the_title();?></a><?php echo '</' . $atts['title_element'] .'>';?>
						</div>
						<div class="zo-carousel-categories">
							<?php echo get_the_term_list(get_the_ID(), 'portfolio', '', ' ', ''); ?>
						</div>
					</div>
				</div>
            </div>
        <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
</div>