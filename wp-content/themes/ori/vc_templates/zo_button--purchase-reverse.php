<?php
	$icon_name = "icon_" . $atts['icon_type'];
	$iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
    $button = '';
    $custom_css = '';
    $custom_css .= '#' . esc_attr($atts['html_id']) . '{';
    $custom_css .= 'text-align: ' . $atts['align'] . ';';
    $custom_css .= '}';
    $custom_css .= '#' . esc_attr($atts['html_id']) . ' .zo-button {';
    if(!empty($atts['padding_top']) && is_numeric($atts['padding_top'])){
        $custom_css .= 'padding-top: ' . esc_attr($atts['padding_top']) . 'px;';
    }
    if(!empty($atts['padding_right']) && is_numeric($atts['padding_right'])){
        $custom_css .= 'padding-right: ' . esc_attr($atts['padding_right']) . 'px;';
    }
    if(!empty($atts['padding_bottom']) && is_numeric($atts['padding_bottom'])){
        $custom_css .= 'padding-bottom: ' . esc_attr($atts['padding_bottom']) . 'px;';
    }
    if(!empty($atts['padding_left']) && is_numeric($atts['padding_left'])){
        $custom_css .= 'padding-left: ' . esc_attr($atts['padding_left']) . 'px;';
    }
    $custom_css .= '}';
	wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/custom-style.css');
	wp_add_inline_style( 'custom-style', $custom_css );
?>
<div class="zo-button-wraper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    if($atts['is_icon']=='yes'){
        if($atts['icon_align']=='left'){
            $atts['text'] = '<i class="' . esc_attr($iconClass) . '"></i>' . $atts['text'];
        }else{
            $atts['text'] .= '<i class="' . esc_attr($iconClass) . '"></i>';
        }
    }
    if ( !empty($atts['link']) && preg_match('/url/',$atts['link'])) {
        $link = zo_build_link( $atts['link'] );
        $button = '<a href="' . esc_attr( $link['url'] ) . '"'
            . ( $link['target'] ? ' target="' . esc_attr( $link['target'] ) . '"' : '' )
            . ( $link['title'] ? ' title="' . esc_attr( $link['title'] ) . '"' : '' )
            . ' class="zo-button btn-purchase-reverse ' . $atts['class'] . ' ' . $atts['button_style'] . '"'
            . '>' . $atts['text'] . '</a>';
    }else{
        $button = '<button'
            . ' class="zo-button btn-purchase-reverse ' . $atts['class'] . ' ' . $atts['button_style'] . '"'
            . '>' . $atts['text'] . '</button>';
    }
    echo $button;
    ?>
</div>
