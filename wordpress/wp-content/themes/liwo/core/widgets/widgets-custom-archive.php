<?php 
class Custom_Archive_Widget extends WP_Widget {  
    function Custom_Archive_Widget() {  
        $widget_ops = array('classname' => 'Custom_Archive_Widget', 'description' => 'Custom Archives Widget' );
        $this->WP_Widget('Custom_Archive_Widget', THEMESTUDIO_THEME_NAME.' Archives', $widget_ops); 
    }  
    function form($instance) {  
        // outputs the options form on admin  
        $instance = wp_parse_args( (array) $instance, array( 'title' => '') );
        $instance = wp_parse_args( (array) $instance, array( 'show_count' => 1) );
        $title = strip_tags($instance['title']);
        $show_count = strip_tags($instance['show_count']);
        ?>

            <p><label for="<?php echo $this->get_field_id('title'); ?>">Title (default "Custom Archives"):</label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
            <p><label for="<?php echo $this->get_field_id('show_count'); ?>">Show count:</label><input id="<?php echo $this->get_field_id('show_count'); ?>" name="<?php echo $this->get_field_name('show_count'); ?>" type="checkbox" value="1" <?php checked( '1', $show_count ); ?>/></p>
        <?php
    }
    function update($new_instance, $old_instance) {  
        // processes widget options to be saved  
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['show_count'] = $new_instance['show_count'];

        return $instance;
    }  
    function widget($args, $instance) {  
        // outputs the content of the widget  
        extract($args, EXTR_SKIP);

        echo $before_widget;
        $title = empty($instance['title']) ? 'Archives' : apply_filters('widget_title', $instance['title']);
        $show_count = empty($instance['show_count']) ? '1' : apply_filters('widget_title', $instance['show_count']);
            
        echo $before_title.$title.$after_title;

        $args = array('format' =>'html','show_post_count'=>$show_count ,'before'=>'','after'=>'' );
        echo '<ul class="sidebar-category unstyled custom-list arrows">';
        echo wp_get_archives($args);
        echo '</ul>';
        echo $after_widget;
    }  
}  
register_widget('Custom_Archive_Widget');  
?>