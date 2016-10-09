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
			$data_meta = zo_post_meta_data();
            foreach (zoGetCategoriesByPostID(get_the_ID(), $taxonomy) as $category) {
                $groups[] = 'category-' . $category->slug;
            }
            ?>
            <div class="zo-carousel-item <?php echo implode(' ', $groups);?>">
                
				<div class="zo-carousel-content">
					<div><i class="fa fa-quote-left"></i></div>
						<?php the_content();?>
					<div class="align-right"><i class="fa fa-quote-right"></i></div>
				</div>
				<div class="zo-carousel-meta">
					<div class="zo-carousel-avata">
						<?php
							if (has_post_thumbnail() && !post_password_required() && !is_attachment() && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
								if($atts['image_size']=='custom'){
									echo zo_post_thumbnail(get_the_ID(),$atts['image_width'],$atts['image_height'],true,true,true);
								}else{
									the_post_thumbnail($atts['image_size']);
								}
							else:
								echo '<img src="' . ZO_IMAGES . 'no-image.jpg" alt="' . get_the_title() . '" />';
							endif;
						?>
					</div>
					<div class="zo-carousel-details">
						<div class="zo-carousel-title"><?php the_title();?></div>
						<div class="zo-carousel-web"><?php echo esc_attr($data_meta->_zo_testimonial_position);?></div>
					</div>
				</div>
				
            </div>
        <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
</div>