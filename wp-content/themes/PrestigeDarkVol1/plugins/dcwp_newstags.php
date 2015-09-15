<?php  
/*
 * Plugin Name: News Tags (Prestige)
 * Version: 1.0
 * Plugin URI: http://themeforest.net/user/DigitalCavalry
 * Description: News Tags (Prestige)
 * Author: Digital Cavalry
 * Author URI: http://themeforest.net/user/DigitalCavalry
 */

  class dcwp_newstags extends WP_Widget {
   
       function dcwp_newstags() {
           $widget_ops = array('classname' => 'dcwp_newstags', 'description' => "Your most used news tags in cloud format (Prestige)");
           $this->WP_Widget('dcwp_newstags', 'dcwp_NewsTags', $widget_ops);
       }
   
       function widget( $args, $instance ) {
           extract($args);
           $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);

          $tags_args = array('taxonomy' => 'news_tag', 'format'=>'list', 'smallest'=>9, 'largest'=>9, 'unit'=>'px');
  
          echo $before_widget;
          if ( $title )
              echo $before_title . $title . $after_title;
          echo '<div class="widget-tags">';
          wp_tag_cloud($tags_args);
          echo '<div style="clear:both"></div></div>';
          echo $after_widget;
      }
  
      function update( $new_instance, $old_instance ) {
          $instance['title'] = strip_tags(stripslashes($new_instance['title']));
          return $instance;
      }
  
      function form( $instance ) {
  ?>
      <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo 'Title:'; ?></label>
      <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php if (isset ( $instance['title'])) {echo esc_attr( $instance['title'] );} ?>" /></p>
<?php
      }
  

  }

  // Register widget
  function dcwp_newstagsInit() { register_widget('dcwp_newstags'); }
  add_action('widgets_init', 'dcwp_newstagsInit');

?>
