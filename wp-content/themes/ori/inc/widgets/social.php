<?php
class ZO_Social_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'zo_social_widget', // Base ID
            __('Social', 'ori'), // Name
            array('description' => __('Social Widget', 'ori'),) // Args
        );
    }

    function widget($args, $instance) {
        extract($args);
        if (!empty($instance['title'])) {
        $title = apply_filters('widget_title', empty($instance['title']) ? __('Social', 'ori' ) : $instance['title'], $instance, $this->id_base);
        }

        $style = 'style-1';
        if(!empty($instance['style'])){
            $style = $instance['style'];
        }
        $align = 'text-left';
        if(!empty($instance['align'])){
            $align = $instance['align'];
        }

        $icon_1 = isset($instance['icon_1']) ? (!empty($instance['icon_1']) ? $instance['icon_1']: 'fa fa-facebook') : 'fa fa-facebook';
        $link_1 = isset($instance['link_1']) ? $instance['link_1'] : '';
        $class_1 = isset($instance['class_1']) ? $instance['class_1'] : '';

        $icon_2 = isset($instance['icon_2']) ? (!empty($instance['icon_2']) ? $instance['icon_2']: 'fa fa-rss') : 'fa fa-rss';
        $link_2 = isset($instance['link_2']) ? $instance['link_2'] : '';
        $class_2 = isset($instance['class_2']) ? $instance['class_2'] : '';

        $icon_3 = isset($instance['icon_3']) ? (!empty($instance['icon_3']) ? $instance['icon_3']: 'fa fa-youtube') : 'fa fa-youtube';
        $link_3 = isset($instance['link_3']) ? $instance['link_3'] : '';
        $class_3 = isset($instance['class_3']) ? $instance['class_3'] : '';

        $icon_4 = isset($instance['icon_4']) ? (!empty($instance['icon_4']) ? $instance['icon_4']: 'fa fa-twitter') : 'fa fa-twitter';
        $link_4 = isset($instance['link_4']) ? $instance['link_4'] : '';
        $class_4 = isset($instance['class_4']) ? $instance['class_4'] : '';

        $icon_5 = isset($instance['icon_5']) ? (!empty($instance['icon_5']) ? $instance['icon_5']: 'fa fa-google-plus') : 'fa fa-google-plus';
        $link_5 = isset($instance['link_5']) ? $instance['link_5'] : '';
        $class_5 = isset($instance['class_5']) ? $instance['class_5'] : '';

        $icon_6 = isset($instance['icon_6']) ? (!empty($instance['icon_6']) ? $instance['icon_6']: 'fa fa-skype') : 'fa fa-skype';
        $link_6 = isset($instance['link_6']) ? $instance['link_6'] : '';
        $class_6 = isset($instance['class_6']) ? $instance['class_6'] : '';

        $icon_7 = isset($instance['icon_7']) ? (!empty($instance['icon_7']) ? $instance['icon_7']: 'fa fa-smile-o') : 'fa fa fa-smile-o';
        $link_7 = isset($instance['link_7']) ? $instance['link_7'] : '';
        $class_7 = isset($instance['class_7']) ? $instance['class_7'] : '';

        $icon_8 = isset($instance['icon_8']) ? (!empty($instance['icon_8']) ? $instance['icon_8']: 'fa fa-dribbble') : 'fa fa-dribbble';
        $link_8 = isset($instance['link_8']) ? $instance['link_8'] : '';
        $class_8 = isset($instance['class_8']) ? $instance['class_8'] : '';

        $icon_9 = isset($instance['icon_9']) ? (!empty($instance['icon_9']) ? $instance['icon_9']: 'fa fa-flickr') : 'fa fa-flickr';
        $link_9 = isset($instance['link_9']) ? $instance['link_9'] : '';
        $class_9 = isset($instance['class_9']) ? $instance['class_9'] : '';

        $icon_10 = isset($instance['icon_10']) ? (!empty($instance['icon_10']) ? $instance['icon_10']: 'fa fa-linkedin') : 'fa fa-linkedin';
        $link_10 = isset($instance['link_10']) ? $instance['link_10'] : '';
        $class_10 = isset($instance['class_10']) ? $instance['class_10'] : '';

        $icon_11 = isset($instance['icon_11']) ? (!empty($instance['icon_11']) ? $instance['icon_11']: 'fa fa-vimeo-square') : 'fa fa-vimeo-square';
        $link_11 = isset($instance['link_11']) ? $instance['link_11'] : '';
        $class_11 = isset($instance['class_11']) ? $instance['class_11'] : '';

        $icon_12 = isset($instance['icon_12']) ? (!empty($instance['icon_12']) ? $instance['icon_12']: 'fa fa-pinterest') : 'fa fa-pinterest';
        $link_12 = isset($instance['link_12']) ? $instance['link_12'] : '';
        $class_12 = isset($instance['class_12']) ? $instance['class_12'] : '';

        $icon_13 = isset($instance['icon_13']) ? (!empty($instance['icon_13']) ? $instance['icon_13']: 'fa fa-github') : 'fa fa-github';
        $link_13 = isset($instance['link_13']) ? $instance['link_13'] : '';
        $class_13 = isset($instance['class_13']) ? $instance['class_13'] : '';

        $icon_14 = isset($instance['icon_14']) ? (!empty($instance['icon_14']) ? $instance['icon_14']: 'fa fa-instagram') : 'fa fa-instagram';
        $link_14 = isset($instance['link_14']) ? $instance['link_14'] : '';
        $class_14 = isset($instance['class_14']) ? $instance['class_14'] : '';

        $extra_class = !empty($instance['extra_class']) ? $instance['extra_class'] : "";

        // no 'class' attribute - add one with the value of width
        if( strpos($before_widget, 'class') === false ) {
            $before_widget = str_replace('>', 'class="'. $extra_class . '"', $before_widget);
        }
        // there is 'class' attribute - append width value to it
        else {
            $before_widget = str_replace('class="', 'class="'. $extra_class . ' ', $before_widget);
        }
        echo balanceTags($before_widget);

        if (!empty($title))
                echo balanceTags($before_title . $title . $after_title);

            echo "<ul class='zo-social ".$style.' '.$align."'>";

            if ($link_1 != '') {
                echo '<li class="'.esc_attr($class_1).'"><a target="_blank" href="'.esc_url($link_1).'"><i class="'.$icon_1.'"></i></a></li>';
            }
			
            if ($link_2 != '') {
                echo '<li class="'.esc_attr($class_2).'"><a target="_blank" data-rel="tooltip" data-placement="bottom" data-original-title="Rss" href="'.esc_url($link_2).'"><i class="'.$icon_2.'"></i></a></li>';
            }

            if ($link_3 != '') {
                echo '<li class="'.esc_attr($class_3).'"><a target="_blank" data-rel="tooltip" data-placement="bottom" data-original-title="YouTube" href="'.esc_url($link_3).'"><i class="'.$icon_3.'"></i></a></li>';
            }

            if ($link_4 != '') {
                echo '<li class="'.esc_attr($class_4).'"><a target="_blank" data-rel="tooltip" data-placement="bottom" data-original-title="Twitter" href="'.esc_url($link_4).'"><i class="'.$icon_4.'"></i></a></li>';
            }

            if ($link_5 != '') {
                echo '<li class="'.esc_attr($class_5).'"><a target="_blank" data-rel="tooltip" data-placement="bottom" data-original-title="Google" href="'.esc_url($link_5).'"><i class="'.$icon_5.'"></i></a></li>';
            }

            if ($link_6 != '') {
                echo '<li class="'.esc_attr($class_6).'"><a target="_blank" data-rel="tooltip" data-placement="bottom" data-original-title="Skype" href="'.esc_url($link_6).'"><i class="'.$icon_6.'"></i></a></li>';
            }

            if ($link_7 != '') {
                echo '<li class="'.esc_attr($class_7).'"><a target="_blank" data-rel="tooltip" data-placement="bottom" data-original-title="Yahoo" href="'.esc_url($link_7).'"><i class="'.$icon_7.'"></i></a></li>';
            }

            if ($link_8 != '') {
                echo '<li class="'.esc_attr($class_8).'"><a target="_blank" data-rel="tooltip" data-placement="bottom" data-original-title="Dribbble" href="'.esc_url($link_8).'"><i class="'.$icon_8.'"></i></a></li>';
            }

            if ($link_9 != '') {
                echo '<li class="'.esc_attr($class_9).'"><a target="_blank" data-rel="tooltip" data-placement="bottom" data-original-title="Flickr" href="'.esc_url($link_9).'"><i class="'.$icon_9.'"></i></a></li>';
            }

            if ($link_10 != '') {
                echo '<li class="'.esc_attr($class_10).'"><a target="_blank" data-rel="tooltip" data-placement="bottom" data-original-title="Linkedin" href="'.esc_url($link_10).'"><i class="'.$icon_10.'"></i></a></li>';
            }

            if ($link_11 != '') {
                echo '<li class="'.esc_attr($class_11).'"><a target="_blank" data-rel="tooltip" data-placement="bottom" data-original-title="Vimeo" href="'.esc_url($link_11).'"><i class="'.$icon_11.'"></i></a></li>';
            }

            if ($link_12 != '') {
                echo '<li class="'.esc_attr($class_12).'"><a target="_blank" data-rel="tooltip" data-placement="bottom" data-original-title="Pinterest" href="'.esc_url($link_12).'"><i class="'.$icon_12.'"></i></a></li>';
            }

            if ($link_13 != '') {
                echo '<li class="'.esc_attr($class_13).'"><a target="_blank" data-rel="tooltip" data-placement="bottom" data-original-title="Github" href="'.esc_url($link_13).'"><i class="'.$icon_13.'"></i></a></li>';
            }

            if ($link_14 != '') {
                echo '<li class="'.esc_attr($class_14).'"><a target="_blank" data-rel="tooltip" data-placement="bottom" data-original-title="Instagram" href="'.esc_url($link_14).'"><i class="'.$icon_14.'"></i></a></li>';
            }

            echo "</ul>";


        echo balanceTags($after_widget);
    }

    function update( $new_instance, $old_instance ) {
         $instance = $old_instance;
         $instance['title'] = strip_tags($new_instance['title']);

         $instance['style'] = strip_tags($new_instance['style']);
         $instance['align'] = strip_tags($new_instance['align']);

         $instance['icon_1'] = strip_tags($new_instance['icon_1']);
         $instance['link_1'] = strip_tags($new_instance['link_1']);
         $instance['class_1'] = strip_tags($new_instance['class_1']);

         $instance['icon_2'] = strip_tags($new_instance['icon_2']);
         $instance['link_2'] = strip_tags($new_instance['link_2']);
         $instance['class_2'] = strip_tags($new_instance['class_2']);

         $instance['icon_3'] = strip_tags($new_instance['icon_3']);
         $instance['link_3'] = strip_tags($new_instance['link_3']);
         $instance['class_3'] = strip_tags($new_instance['class_3']);

         $instance['icon_4'] = strip_tags($new_instance['icon_4']);
         $instance['link_4'] = strip_tags($new_instance['link_4']);
         $instance['class_4'] = strip_tags($new_instance['class_4']);

         $instance['icon_5'] = strip_tags($new_instance['icon_5']);
         $instance['link_5'] = strip_tags($new_instance['link_5']);
         $instance['class_5'] = strip_tags($new_instance['class_5']);

         $instance['icon_6'] = strip_tags($new_instance['icon_6']);
         $instance['link_6'] = strip_tags($new_instance['link_6']);
         $instance['class_6'] = strip_tags($new_instance['class_6']);

         $instance['icon_7'] = strip_tags($new_instance['icon_7']);
         $instance['link_7'] = strip_tags($new_instance['link_7']);
         $instance['class_7'] = strip_tags($new_instance['class_7']);

         $instance['icon_8'] = strip_tags($new_instance['icon_8']);
         $instance['link_8'] = strip_tags($new_instance['link_8']);
         $instance['class_8'] = strip_tags($new_instance['class_8']);

         $instance['icon_9'] = strip_tags($new_instance['icon_9']);
         $instance['link_9'] = strip_tags($new_instance['link_9']);
         $instance['class_9'] = strip_tags($new_instance['class_9']);

         $instance['icon_10'] = strip_tags($new_instance['icon_10']);
         $instance['link_10'] = strip_tags($new_instance['link_10']);
         $instance['class_10'] = strip_tags($new_instance['class_10']);

         $instance['icon_11'] = strip_tags($new_instance['icon_11']);
         $instance['link_11'] = strip_tags($new_instance['link_11']);
         $instance['class_11'] = strip_tags($new_instance['class_11']);

         $instance['icon_12'] = strip_tags($new_instance['icon_12']);
         $instance['link_12'] = strip_tags($new_instance['link_12']);
         $instance['class_12'] = strip_tags($new_instance['class_12']);

         $instance['icon_13'] = strip_tags($new_instance['icon_13']);
         $instance['link_13'] = strip_tags($new_instance['link_13']);
         $instance['class_13'] = strip_tags($new_instance['class_13']);

         $instance['icon_14'] = strip_tags($new_instance['icon_14']);
         $instance['link_14'] = strip_tags($new_instance['link_14']);
         $instance['class_14'] = strip_tags($new_instance['class_14']);

         $instance['extra_class'] = $new_instance['extra_class'];

         return $instance;
    }

    function form( $instance ) {
         $title = isset($instance['title']) ? esc_attr($instance['title']) : '';

         $style = isset($instance['style']) ? esc_attr($instance['style']) : '';
         $align = isset($instance['align']) ? esc_attr($instance['align']) : '';

         $icon_1 = isset($instance['icon_1']) ? esc_attr($instance['icon_1']) : '';
         $link_1 = isset($instance['link_1']) ? esc_attr($instance['link_1']) : '';
         $class_1 = isset($instance['class_1']) ? esc_attr($instance['class_1']) : '';

         $icon_2 = isset($instance['icon_2']) ? esc_attr($instance['icon_2']) : '';
         $link_2 = isset($instance['link_2']) ? esc_attr($instance['link_2']) : '';
         $class_2 = isset($instance['class_2']) ? esc_attr($instance['class_2']) : '';

         $icon_3 = isset($instance['icon_3']) ? esc_attr($instance['icon_3']) : '';
         $link_3 = isset($instance['link_3']) ? esc_attr($instance['link_3']) : '';
         $class_3 = isset($instance['class_3']) ? esc_attr($instance['class_3']) : '';

         $icon_4 = isset($instance['icon_4']) ? esc_attr($instance['icon_4']) : '';
         $link_4 = isset($instance['link_4']) ? esc_attr($instance['link_4']) : '';
         $class_4 = isset($instance['class_4']) ? esc_attr($instance['class_4']) : '';

         $icon_5 = isset($instance['icon_5']) ? esc_attr($instance['icon_5']) : '';
         $link_5 = isset($instance['link_5']) ? esc_attr($instance['link_5']) : '';
         $class_5 = isset($instance['class_5']) ? esc_attr($instance['class_5']) : '';

         $icon_6 = isset($instance['icon_6']) ? esc_attr($instance['icon_6']) : '';
         $link_6 = isset($instance['link_6']) ? esc_attr($instance['link_6']) : '';
         $class_6 = isset($instance['class_6']) ? esc_attr($instance['class_6']) : '';

         $icon_7 = isset($instance['icon_7']) ? esc_attr($instance['icon_7']) : '';
         $link_7 = isset($instance['link_7']) ? esc_attr($instance['link_7']) : '';
         $class_7 = isset($instance['class_7']) ? esc_attr($instance['class_7']) : '';

         $icon_8 = isset($instance['icon_8']) ? esc_attr($instance['icon_8']) : '';
         $link_8 = isset($instance['link_8']) ? esc_attr($instance['link_8']) : '';
         $class_8 = isset($instance['class_8']) ? esc_attr($instance['class_8']) : '';

         $icon_9 = isset($instance['icon_9']) ? esc_attr($instance['icon_9']) : '';
         $link_9 = isset($instance['link_9']) ? esc_attr($instance['link_9']) : '';
         $class_9 = isset($instance['class_9']) ? esc_attr($instance['class_9']) : '';

         $icon_10 = isset($instance['icon_10']) ? esc_attr($instance['icon_10']) : '';
         $link_10 = isset($instance['link_10']) ? esc_attr($instance['link_10']) : '';
         $class_10 = isset($instance['class_10']) ? esc_attr($instance['class_10']) : '';

         $icon_11 = isset($instance['icon_11']) ? esc_attr($instance['icon_11']) : '';
         $link_11 = isset($instance['link_11']) ? esc_attr($instance['link_11']) : '';
         $class_11 = isset($instance['class_11']) ? esc_attr($instance['class_11']) : '';

         $icon_12 = isset($instance['icon_12']) ? esc_attr($instance['icon_12']) : '';
         $link_12 = isset($instance['link_12']) ? esc_attr($instance['link_12']) : '';
         $class_12 = isset($instance['class_12']) ? esc_attr($instance['class_12']) : '';

         $icon_13 = isset($instance['icon_13']) ? esc_attr($instance['icon_13']) : '';
         $link_13 = isset($instance['link_13']) ? esc_attr($instance['link_13']) : '';
         $class_13 = isset($instance['class_13']) ? esc_attr($instance['class_13']) : '';

         $icon_14 = isset($instance['icon_14']) ? esc_attr($instance['icon_14']) : '';
         $link_14 = isset($instance['link_14']) ? esc_attr($instance['link_14']) : '';
         $class_14 = isset($instance['class_14']) ? esc_attr($instance['class_14']) : '';

         $extra_class = isset($instance['extra_class']) ? esc_attr($instance['extra_class']) : '';
         ?>
         <p><label for="<?php echo esc_url($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

         <p><label for="<?php echo esc_url($this->get_field_id('style')); ?>"><?php esc_html_e( 'Style:', 'ori' ); ?></label>
         <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('style') ); ?>" name="<?php echo esc_attr( $this->get_field_name('style') ); ?>">
            <option value="default"<?php if( $style == 'default' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Default', 'ori'); ?></option>
            <option value="style-1"<?php if( $style == 'style-1' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Square', 'ori'); ?></option>
            <option value="style-2"<?php if( $style == 'style-2' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Rounded Square', 'ori'); ?></option>
            <option value="style-3"<?php if( $style == 'style-3' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Circle', 'ori'); ?></option>
            <option value="style-4"<?php if( $style == 'style-4' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Box Style 1', 'ori'); ?></option>
            <option value="style-7"<?php if( $style == 'style-7' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Box Style 2', 'ori'); ?></option>
            <option value="style-5"<?php if( $style == 'style-5' ){ echo 'selected="selected"';} ?>><?php esc_html_e('No List', 'ori'); ?></option>
            <option value="style-6"<?php if( $style == 'style-6' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Circle Border', 'ori'); ?></option>
         </select>
         </p>

         <p><label for="<?php echo esc_url($this->get_field_id('align')); ?>"><?php esc_html_e( 'Content Align:', 'ori' ); ?></label>
         <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('align') ); ?>" name="<?php echo esc_attr( $this->get_field_name('align') ); ?>">
            <option value="text-left"<?php if( $align == 'text-left' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Left', 'ori'); ?></option>
            <option value="text-center"<?php if( $align == 'text-center' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Center', 'ori'); ?></option>
            <option value="text-right"<?php if( $align == 'text-right' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Right', 'ori'); ?></option>
         </select>
         </p>

         <p><label for="<?php echo esc_url($this->get_field_id('icon_1')); ?>"><?php esc_html_e( 'Icon 1:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_1') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_1') ); ?>" type="text" value="<?php echo esc_attr( $icon_1 ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_1')); ?>"><?php esc_html_e( 'Link 1:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_1') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_1') ); ?>" type="text" value="<?php echo esc_attr( $link_1 ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('class_1')); ?>"><?php esc_html_e( 'Class 1:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('class_1') ); ?>" name="<?php echo esc_attr( $this->get_field_name('class_1') ); ?>" type="text" value="<?php echo esc_attr( $class_1 ); ?>" /></p>

		 
         <p><label for="<?php echo esc_attr($this->get_field_id('icon_2')); ?>"><?php esc_html_e( 'Icon 2:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_2') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_2') ); ?>" type="text" value="<?php echo esc_attr( $icon_2 ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_2')); ?>"><?php esc_html_e( 'Link 2:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_2') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_2') ); ?>" type="text" value="<?php echo esc_attr( $link_2 ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('class_2')); ?>"><?php esc_html_e( 'Class 2:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('class_2') ); ?>" name="<?php echo esc_attr( $this->get_field_name('class_2') ); ?>" type="text" value="<?php echo esc_attr( $class_2 ); ?>" /></p>

		 
         <p><label for="<?php echo esc_attr($this->get_field_id('icon_3')); ?>"><?php esc_html_e( 'Icon 3:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_3') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_3') ); ?>" type="text" value="<?php echo esc_attr( $icon_3 ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_3')); ?>"><?php esc_html_e( 'Link 3:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_3') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_3') ); ?>" type="text" value="<?php echo esc_attr( $link_3 ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('class_3')); ?>"><?php esc_html_e( 'Class 3:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('class_3') ); ?>" name="<?php echo esc_attr( $this->get_field_name('class_3') ); ?>" type="text" value="<?php echo esc_attr( $class_3 ); ?>" /></p>


         <p><label for="<?php echo esc_attr($this->get_field_id('icon_4')); ?>"><?php esc_html_e( 'Icon 4:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_4') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_4') ); ?>" type="text" value="<?php echo esc_attr( $icon_4 ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_4')); ?>"><?php esc_html_e( 'Link 4:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_4') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_4') ); ?>" type="text" value="<?php echo esc_attr( $link_4 ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('class_4')); ?>"><?php esc_html_e( 'Class 4:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('class_4') ); ?>" name="<?php echo esc_attr( $this->get_field_name('class_4') ); ?>" type="text" value="<?php echo esc_attr( $class_4 ); ?>" /></p>


         <p><label for="<?php echo esc_attr($this->get_field_id('icon_5')); ?>"><?php esc_html_e( 'Icon 5:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_5') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_5') ); ?>" type="text" value="<?php echo esc_attr( $icon_5 ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_5')); ?>"><?php esc_html_e( 'Link 5:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_5') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_5') ); ?>" type="text" value="<?php echo esc_attr( $link_5 ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('class_5')); ?>"><?php esc_html_e( 'Class 5:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('class_5') ); ?>" name="<?php echo esc_attr( $this->get_field_name('class_5') ); ?>" type="text" value="<?php echo esc_attr( $class_5 ); ?>" /></p>


         <p><label for="<?php echo esc_attr($this->get_field_id('icon_6')); ?>"><?php esc_html_e( 'Icon 6:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_6') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_6') ); ?>" type="text" value="<?php echo esc_attr( $icon_6 ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_6')); ?>"><?php esc_html_e( 'Link 6:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_6') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_6') ); ?>" type="text" value="<?php echo esc_attr( $link_6 ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('class_6')); ?>"><?php esc_html_e( 'Class 6:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('class_6') ); ?>" name="<?php echo esc_attr( $this->get_field_name('class_6') ); ?>" type="text" value="<?php echo esc_attr( $class_6 ); ?>" /></p>


         <p><label for="<?php echo esc_attr($this->get_field_id('icon_7')); ?>"><?php esc_html_e( 'Icon 7:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_7') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_7') ); ?>" type="text" value="<?php echo esc_attr( $icon_7 ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_7')); ?>"><?php esc_html_e( 'Link 7:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_7') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_7') ); ?>" type="text" value="<?php echo esc_attr( $link_7 ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('class_7')); ?>"><?php esc_html_e( 'Class 7:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('class_7') ); ?>" name="<?php echo esc_attr( $this->get_field_name('class_7') ); ?>" type="text" value="<?php echo esc_attr( $class_7 ); ?>" /></p>


         <p><label for="<?php echo esc_attr($this->get_field_id('icon_8')); ?>"><?php esc_html_e( 'Icon 8:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_8') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_8') ); ?>" type="text" value="<?php echo esc_attr( $icon_8 ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_8')); ?>"><?php esc_html_e( 'Link 8:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_8') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_8') ); ?>" type="text" value="<?php echo esc_attr( $link_8 ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('class_8')); ?>"><?php esc_html_e( 'Class 8:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('class_8') ); ?>" name="<?php echo esc_attr( $this->get_field_name('class_8') ); ?>" type="text" value="<?php echo esc_attr( $class_8 ); ?>" /></p>


         <p><label for="<?php echo esc_attr($this->get_field_id('icon_9')); ?>"><?php esc_html_e( 'Icon 9:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_9') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_9') ); ?>" type="text" value="<?php echo esc_attr( $icon_9 ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_9')); ?>"><?php esc_html_e( 'Link 9:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_9') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_9') ); ?>" type="text" value="<?php echo esc_attr( $link_9 ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('class_9')); ?>"><?php esc_html_e( 'Class 9:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('class_9') ); ?>" name="<?php echo esc_attr( $this->get_field_name('class_9') ); ?>" type="text" value="<?php echo esc_attr( $class_9 ); ?>" /></p>


         <p><label for="<?php echo esc_attr($this->get_field_id('icon_10')); ?>"><?php esc_html_e( 'Icon 10:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_10') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_10') ); ?>" type="text" value="<?php echo esc_attr( $icon_10 ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_10')); ?>"><?php esc_html_e( 'Link 10:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_10') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_10') ); ?>" type="text" value="<?php echo esc_attr( $link_10 ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('class_10')); ?>"><?php esc_html_e( 'Class 10:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('class_10') ); ?>" name="<?php echo esc_attr( $this->get_field_name('class_10') ); ?>" type="text" value="<?php echo esc_attr( $class_10 ); ?>" /></p>


         <p><label for="<?php echo esc_attr($this->get_field_id('icon_11')); ?>"><?php esc_html_e( 'Icon 11:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_11') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_11') ); ?>" type="text" value="<?php echo esc_attr( $icon_11 ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_11')); ?>"><?php esc_html_e( 'Link 11:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_11') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_11') ); ?>" type="text" value="<?php echo esc_attr( $link_11 ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('class_11')); ?>"><?php esc_html_e( 'Class 11:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('class_11') ); ?>" name="<?php echo esc_attr( $this->get_field_name('class_11') ); ?>" type="text" value="<?php echo esc_attr( $class_11 ); ?>" /></p>


         <p><label for="<?php echo esc_attr($this->get_field_id('icon_12')); ?>"><?php esc_html_e( 'Icon 12:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_12') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_12') ); ?>" type="text" value="<?php echo esc_attr( $icon_12 ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_12')); ?>"><?php esc_html_e( 'Link 12:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_12') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_12') ); ?>" type="text" value="<?php echo esc_attr( $link_12 ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('class_12')); ?>"><?php esc_html_e( 'Class 12:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('class_12') ); ?>" name="<?php echo esc_attr( $this->get_field_name('class_12') ); ?>" type="text" value="<?php echo esc_attr( $class_12 ); ?>" /></p>


         <p><label for="<?php echo esc_attr($this->get_field_id('icon_13')); ?>"><?php esc_html_e( 'Icon 13:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_13') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_13') ); ?>" type="text" value="<?php echo esc_attr( $icon_13 ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_13')); ?>"><?php esc_html_e( 'Link 13:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_13') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_13') ); ?>" type="text" value="<?php echo esc_attr( $link_13 ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('class_13')); ?>"><?php esc_html_e( 'Class 13:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('class_13') ); ?>" name="<?php echo esc_attr( $this->get_field_name('class_13') ); ?>" type="text" value="<?php echo esc_attr( $class_13 ); ?>" /></p>


         <p><label for="<?php echo esc_attr($this->get_field_id('icon_14')); ?>"><?php esc_html_e( 'Icon 14:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_14') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_14') ); ?>" type="text" value="<?php echo esc_attr( $icon_14 ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_14')); ?>"><?php esc_html_e( 'Link 14:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_14') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_14') ); ?>" type="text" value="<?php echo esc_attr( $link_14 ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('class_14')); ?>"><?php esc_html_e( 'Class 14:', 'ori' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('class_14') ); ?>" name="<?php echo esc_attr( $this->get_field_name('class_14') ); ?>" type="text" value="<?php echo esc_attr( $class_14 ); ?>" /></p>


         <p><label for="<?php echo esc_attr($this->get_field_id('extra_class')); ?>">Extra Class:</label>
         <input class="widefat" id="<?php echo esc_attr($this->get_field_id('extra_class')); ?>" name="<?php echo esc_attr($this->get_field_name('extra_class')); ?>" value="<?php echo esc_attr($extra_class); ?>" /></p>

    <?php
    }

}

/**
* Class CS_Social_Widget
*/

function register_social_widget() {
    register_widget('ZO_Social_Widget');
}

add_action('widgets_init', 'register_social_widget');
?>