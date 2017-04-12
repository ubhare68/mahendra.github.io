<?php

class Custom_Form_Search extends WP_Widget {

	function Custom_Form_Search() {

		$widget_ops = array('classname' => 'Custom_Form_Search ', 'description' => 'The form search' );

		$this->WP_Widget('Custom_Form_Search', THEMESTUDIO_THEME_NAME.' form search', $widget_ops);

	}



	function widget($args, $instance) {

		extract($args, EXTR_SKIP);
		echo $before_widget;

		$title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);

		//echo $before_title.$title.$after_title;

	?>
		
		<div class="site-search-area">
	        <form method="get" id="site-searchform" action="<?php echo home_url(); ?>">
	          <div>
	            <input class="input-text" name="s" id="s" value="<?php echo __('Enter Search keywords...','themestudio'); ?>" onFocus="if (this.value == '<?php echo __('Enter Search keywords...','themestudio'); ?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php echo __('Enter Search keywords...','themestudio'); ?>';}" type="text" />
	            <input id="searchsubmit" value="Search" type="submit" />
	          </div>
	        </form>
	    </div>
	<?php

		echo $after_widget;

	}



	function update($new_instance, $old_instance) {

		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);



		return $instance;

	}



	function form($instance) {

		$instance = wp_parse_args( (array) $instance, array( 'title' => ''));

		$title = strip_tags($instance['title']);

		



?>

			<p><label for="<?php echo $this->get_field_id('title'); ?>">Title (default "Search"): <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>

  

<?php

	}

}



register_widget('Custom_Form_Search');

?>