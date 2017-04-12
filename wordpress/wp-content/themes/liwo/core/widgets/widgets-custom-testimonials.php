<?php
class Custom_Testimonials extends WP_Widget {
	function Custom_Testimonials() {
		$widget_ops = array('classname' => 'Custom_Testimonials', 'description' => 'The testimonials posts with thumbnails' );
		$this->WP_Widget('Custom_Testimonials', THEMESTUDIO_THEME_NAME.' Testimonials', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		echo $before_widget;
		$title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
		$items = empty($instance['items']) ? '3' : apply_filters('widget_number', $instance['items']);
		
		if(!is_numeric($items))
		{
			$items = 3;
		}
		
		if($title){ 
			echo $before_title.$title.$after_title; 
		}
		
		?>
		<?php
  			$posts_array = get_posts( 'posts_per_page='.$items.'&post_type=dslc_testimonials' );
  			foreach ($posts_array as $testimonial ) : 
  		?>
            <div class="clientsays_widget">
				<?php 
          			if(get_the_author_meta( '_cmb_avatar', $testimonial->post_author )){
          				echo get_the_author_meta( '_cmb_avatar', $testimonial->post_author );
          			} else {
          				echo get_avatar( $testimonial->post_author, 50 );
          			}
          		?>
				<strong>- <?php echo get_the_author_meta( 'display_name', $testimonial->post_author ); ?></strong>
				<?php
              		if($testimonial->post_excerpt){
              			echo wpautop(wp_trim_words($testimonial->post_excerpt, 30, ''));
              		} else {
              			echo wpautop(wp_trim_words($testimonial->post_content, 30, ''));
              		}
              	?>
			</div>
        <?php
        	endforeach;
			wp_reset_postdata();
        ?>
			
		<?php

		
		echo $after_widget;
		
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['items'] = strip_tags($new_instance['items']);

		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array('title'=>'Testimonials Posts', 'items' => '') );
		$title = strip_tags($instance['title']);
		$items = strip_tags($instance['items']);

?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>">Widget title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('items'); ?>">Items (default 3): <input class="widefat" id="<?php echo $this->get_field_id('items'); ?>" name="<?php echo $this->get_field_name('items'); ?>" type="text" value="<?php echo esc_attr($items); ?>" /></label></p>
<?php
	}
}

register_widget('Custom_Testimonials');
?>