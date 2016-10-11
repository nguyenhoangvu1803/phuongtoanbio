<?php
/* get categories */
$taxonomy = 'categories-pricing';
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

<div class="zo-grid-wrapper zo-pricing-default <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class="row zo-grid <?php echo esc_attr($atts['grid_class']);?> zo-gird-pricing-item-wrap">
        <?php
        $posts = $atts['posts'];
        $i = 1;
        while($posts->have_posts()) :
            $posts->the_post();
            $pricing_meta = zo_post_meta_data();
            $zo_title_size = isset( $atts['zo_title_size'] ) ? $atts['zo_title_size'] : 'h2';
        ?>
            <div class="zo-pricing-item <?php echo 0 === $i++ % 2 ? 'even' : 'odd'; ?> <?php echo esc_attr($atts['item_class']);?> <?php echo ( $pricing_meta->_zo_is_feature == 1 ) ? ' pricing-feature-item' : '' ?> ">
                <div class="zo-pricing-inner">
					<div class="zo-pricing-header">
						<?php if ( $pricing_meta->_zo_is_feature == 1 ) : ?>
							<span class="featured"><?php esc_html_e('Popular', 'ori'); ?></span>
						<?php endif; ?>

						<div class="zo-pricing-price">
							<span class="price"><?php echo esc_attr($pricing_meta->_zo_price); ?></span>
							<span class="time"><?php esc_html_e('per', 'ori'); ?> <?php echo esc_attr($pricing_meta->_zo_value); ?></span>
						</div>
						
						<h2 class="zo-pricing-title" style="background-color: <?php echo esc_attr($pricing_meta->_zo_color); ?>"><?php the_title();?></h2>
						
						<div class="zo-pricing-button">
							<?php printf('<a class="btn-pricing btn-black btn" href="%s">%s</a>', esc_url($pricing_meta->_zo_button_url), esc_attr($pricing_meta->_zo_button_text) ) ; ?>
						</div>
                    </div>

                    <div class="zo-pricing-meta">
                        <?php the_content(); ?>
                    </div>
                </div>
             </div>
        <?php
        endwhile;
    wp_reset_postdata();
    ?>
	</div>
	
	<?php if(isset($atts['pagination']) && $atts['pagination']) {?>
		<nav class="navigation paging-navigation clearfix">
				<div class="pagination loop-pagination">
					<?php print($atts['pagination']); ?>
				</div><!-- .pagination -->
		</nav><!-- .navigation -->
	<?php }?>
	
</div>
<?php
wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/custom-style.css');
$gap = (int) $atts['item_gap'];
$gap_left_right = $gap / 2;
$custom_css = '
	#'. esc_attr($atts['html_id']) .' .zo-grid .zo-grid-item {
		padding-left: '. esc_attr($gap_left_right) .'px;
		padding-right: '. esc_attr($gap_left_right) .'px;
		margin-bottom: '. esc_attr($gap) .'px;
	}
';
if($gap == 0) {
	$custom_css .= '
		#'. esc_attr($atts['html_id']) . '.container { 
			padding-left: 15px;
			padding-right: 15px;
		}
	';
};
wp_add_inline_style( 'custom-style', $custom_css );
?>