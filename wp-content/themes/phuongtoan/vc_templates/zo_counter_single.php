<?php
    $button = '';
	$custom_css = '';
    /* Custom style Icon */
    $custom_css .= '#' . esc_attr($atts['html_id']) . ' .zo-counter-title{';
    $custom_css .= 'text-align: ' . $atts['align'] . ';';
    if(!empty($atts['font_size']) && is_numeric($atts['font_size'])){
        $custom_css .= 'font-size:' . $atts['font_size'] . 'px;';
    }
    if(!empty($atts['line_height']) && is_numeric($atts['line_height'])){
        $custom_css .= 'line-height:' . $atts['line_height'] . 'px;';
    }
    $custom_css .= '}';
    if(!empty($atts['counter_content'])){
        $custom_css .= '#' . esc_attr($atts['html_id']) . ' .zo-counter-content{';
        $custom_css .= 'text-align: ' . $atts['align'] . ';';
        $custom_css .= '}';
    }
	wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/custom-style.css');
	wp_add_inline_style( 'custom-style', $custom_css );
?>
<div class="zo-counter-wraper <?php echo esc_attr($atts['template']); ?>" id="<?php echo esc_attr($atts['html_id']); ?>">
    <?php
    $title = isset($atts['title']) ? $atts['title'] : '';
    $icon = isset($atts["icon_" . $atts['icon_type']]) ? $atts["icon_" . $atts['icon_type']] : '';
    $type = isset($atts['type']) ? $atts['type'] : '';
    $suffix = isset($atts['suffix']) ? $atts['suffix'] : '';
    $prefix = isset($atts['prefix']) ? $atts['prefix'] : '';
    $digit = isset($atts['digit']) ? $atts['digit'] : '69';
    $grouping = isset($atts['grouping']) ? $atts['grouping'] : 'false';
    $separator = isset($atts['separator']) ? $atts['separator'] : ',';
    $counter_content = isset($atts['counter_content']) ? $atts['counter_content'] : '';
    ?>
    <div class="zo-counter-item">
        <?php if ($icon): ?>
            <span class="zo-counter-icon"><i class="<?php echo esc_attr($icon); ?>"></i></span>
        <?php endif; ?>
        <div id="counter_<?php echo esc_attr($atts['html_id'] . '_item_'); ?>"
             class="zo-counter <?php echo esc_attr(strtolower($type)); ?>"
             data-prefix="<?php echo esc_attr($prefix); ?>" data-suffix="<?php echo esc_attr($suffix); ?>"
             data-type="<?php echo esc_attr(strtolower($type)); ?>" data-digit="<?php echo esc_attr($digit); ?>"
             data-grouping="<?php echo esc_attr($grouping); ?>"
             data-separator="<?php echo esc_attr($separator); ?>">
        </div>
        <?php if ($title):
            echo '<' . $atts['element'] . ' class="zo-counter-title">' . apply_filters("the_title", $title) . '</' . $atts['element'] . '>';
        endif; ?>
        <?php if ($counter_content): ?>
            <div class="zo-counter-content"><?php echo apply_filters('the_content', $counter_content); ?></div>
        <?php endif; ?>
    </div>
</div>
