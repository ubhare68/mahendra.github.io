<?php
class Custom_Address_Info extends WP_Widget {
	function Custom_Address_Info() {
		$widget_ops = array('classname' => 'Custom_Address_Info', 'description' => 'The Address Infomation Site' );
		$this->WP_Widget('Custom_Address_Info', THEMESTUDIO_THEME_NAME.' Address Info', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		echo $before_widget;
		$title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
		$link_image = empty($instance['link_image']) ? '' : apply_filters('widget_link_image', $instance['link_image']);
		$address = empty($instance['address']) ? '' : apply_filters('widget_address', $instance['address']);
		$phone 	 = empty($instance['phone']) ? '' : apply_filters('widget_phone', $instance['phone']);
		$fax	 = empty($instance['fax']) ? '' : apply_filters('widget_fax', $instance['fax']);
		$map_img = empty($instance['map_img']) ? '' : apply_filters('widget_map_img', $instance['map_img']);
		
		
		if($title){ 
			echo $before_title.$title.$after_title; 
		}
		
		?>
		<?php if ($link_image): ?>
			<div class="footer_logo"><img src="<?php echo $link_image; ?>" alt="" /></div>
		<?php endif ?>
        <!-- end footer logo -->
        <ul class="contact_address">
			<?php if ($address): ?>
          		<li><i class="fa fa-map-marker fa-lg"></i>&nbsp; <?php echo $address; ?></li>
			<?php endif; ?>
			<?php if ($phone): ?>
          		<li><i class="fa fa-phone"></i>&nbsp; <?php echo $phone; ?></li>
			<?php endif ?>
			<?php if ($fax): ?>
				<li><i class="fa fa-print"></i>&nbsp; <?php echo $fax; ?></li>
			<?php endif ?>
          	<?php if ($map_img): ?>
          		<li><img src="<?php echo $map_img; ?>" alt="" /></li>
          	<?php endif ?>
        </ul>
			
		<?php

		
		echo $after_widget;
		
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] 		= strip_tags($new_instance['title']);
		$instance['link_image'] = strip_tags($new_instance['link_image']);
		$instance['address'] 	= strip_tags($new_instance['address']);
		$instance['phone'] 		= strip_tags($new_instance['phone']);
		$instance['fax'] 		= strip_tags($new_instance['fax']);
		$instance['map_img'] 		= strip_tags($new_instance['map_img']);

		return $instance;
	}

	function form($instance) {
		$instance 	= wp_parse_args( (array) $instance, array('title'=>'Address Info', 'link_image' => get_template_directory_uri().'/assets/images/footer-logo.png', 'address' => '2901 Marmora Road, Glassgow,
     Seattle, WA 98122-1090', 'phone' => '1 -234 -456 -7890', 'fax' => '1 -234 -456 -7890', 'map_img' => get_template_directory_uri().'/assets/images/footer-wmap.png') );
		$title 		= strip_tags($instance['title']);
		$link_image = strip_tags($instance['link_image']);
		$phone 		= strip_tags($instance['phone']);
		$address 	= strip_tags($instance['address']);
		$fax 		= strip_tags($instance['fax']);
		$map_img 	= strip_tags($instance['map_img']);

?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>">
					Widget title: 
					<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('link_image'); ?>">
					Link Image: 
					<input class="widefat" id="<?php echo $this->get_field_id('link_image'); ?>" name="<?php echo $this->get_field_name('link_image'); ?>" type="text" value="<?php echo esc_attr($link_image); ?>" />
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('address'); ?>">
					Address Info: 
					<input class="widefat" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" type="text" value="<?php echo esc_attr($address); ?>" />
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('phone'); ?>">
					Phone: 
					<input class="widefat" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo esc_attr($phone); ?>" />
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('fax'); ?>">
					Fax: 
					<input class="widefat" id="<?php echo $this->get_field_id('fax'); ?>" name="<?php echo $this->get_field_name('fax'); ?>" type="text" value="<?php echo esc_attr($fax); ?>" />
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('map_img'); ?>">
					Link Map: 
					<input class="widefat" id="<?php echo $this->get_field_id('map_img'); ?>" name="<?php echo $this->get_field_name('map_img'); ?>" type="text" value="<?php echo esc_attr($map_img); ?>" />
				</label>
			</p>
<?php
	}
}

register_widget('Custom_Address_Info');
?>