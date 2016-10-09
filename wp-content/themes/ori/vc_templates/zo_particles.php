<?php 
	wp_enqueue_script('text-rotate', get_template_directory_uri() . '/assets/js/rotate.js', array( 'jquery' ), '1.0.0', true);
	wp_enqueue_script('text-rotate-zo', get_template_directory_uri() . '/assets/js/rotate.zo.js', array( 'jquery' ), '1.0.0', true);
	//wp_localize_script('ori-main', 'rotate', true);
?>
<div class="zo-particles <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>" style="height: <?php echo esc_attr($atts['height']);?>px;">
	<div class="zo-particles-content"><?php echo balanceTags($atts['title']);?></div>
</div>