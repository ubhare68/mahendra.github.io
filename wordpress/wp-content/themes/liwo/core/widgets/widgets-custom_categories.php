<?php

class Custom_Categories extends WP_Widget {

	function Custom_Categories() {

		$widget_ops = array('classname' => 'Custom_Categories ', 'description' => 'The categories list' );

		$this->WP_Widget('Custom_Categories', THEMESTUDIO_THEME_NAME.' categories', $widget_ops);

	}



	function widget($args, $instance) {

		extract($args, EXTR_SKIP);
		echo $before_widget;

		$title = empty($instance['title']) ? 'Categories' : apply_filters('widget_title', $instance['title']);

		$number = empty($instance['number']) ? 5 :  $instance['number'];

			echo $before_title.$title.$after_title;

			$args = array('number' => $number, );

			$cats = get_categories($args);

			echo '<ul class="arrows_list1">';

			foreach($cats as $cat):

			echo '<li>

                    <a href="'.get_category_link( $cat->term_id ).'"><i class="fa fa-angle-right"></i> 

                    '.$cat->cat_name;


                	    //echo '<span>('.ts_get_category_count($cat->cat_ID).')</span>';


                    echo'

                    </a>

            	  </li>';

			endforeach; 

			echo '</ul>';				  

		echo $after_widget;

	}



	function update($new_instance, $old_instance) {

		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);

		$instance['number'] = strip_tags($new_instance['number']);



		return $instance;

	}



	function form($instance) {

		$instance = wp_parse_args( (array) $instance, array( 'title' => '','number'=>5,'show_count'=>'' ));

		$title = strip_tags($instance['title']);

		$number = strip_tags($instance['number']);

		



?>

			<p><label for="<?php echo $this->get_field_id('title'); ?>">Title (default "Categories"): <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>

			<p><label for="<?php echo $this->get_field_id('number'); ?>">Number of category (default "5"): <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo esc_attr($number); ?>" /></label></p>

  

<?php

	}

}



register_widget('Custom_Categories');

?>