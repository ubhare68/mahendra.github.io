<?php
if (!class_exists("WD_follow")) {
    class WD_follow extends WP_Widget
    {

        public function __construct()
        {
            parent::__construct("wd_follow", esc_html__("WD - Social ", 'wdjewelry'), array(
                "description" => esc_html__("show icon follow", 'wdjewelry'),
            ));
        }
        public function form($instance)
        {

            $instance_defaults = array(
                'title' => '',
                'facebook' => '',
                'twitter' => '',
                'google_plus' => '',
                'pin' => '',
                'rss' => '',
                'rss' => '',
            );
            $instance = wp_parse_args((array) $instance, $instance_defaults);

            ?>
			<p><label  class="widefat" for="<?php echo esc_attr($this->get_field_id("title")); ?>"><?php echo esc_html__("Title", 'wdjewelry') ?></label><br>
			<input  class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" type="text" name="<?php echo esc_attr($this->get_field_name("title")); ?>" value="<?php echo esc_attr($instance['title']); ?>"></p>

			<p><label  class="widefat" for="<?php echo esc_attr($this->get_field_id("facebook")); ?>"><?php echo esc_html__("Url Facebook", 'wdjewelry') ?></label><br>
			<input  class="widefat" id="<?php echo esc_attr($this->get_field_id('facebook')); ?>" type="text" name="<?php echo esc_attr($this->get_field_name("facebook")); ?>" value="<?php echo esc_attr($instance['facebook']); ?>"></p>

			<p><label  class="widefat"  for ="<?php echo esc_attr($this->get_field_id("twitter")); ?>"><?php echo esc_html__("Url Twitter", 'wdjewelry'); ?></label><br>
			<input  class="widefat" id="<?php echo esc_attr($this->get_field_id("twitter")); ?>" type="text" name="<?php echo esc_attr($this->get_field_name("twitter")); ?>" value="<?php echo esc_attr($instance['twitter']); ?>"></p>

			<p><label   class="widefat" for ="<?php echo esc_attr($this->get_field_id("google")); ?>"><?php echo esc_html__("Url Google", 'wdjewelry'); ?></label><br>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id("google_plus")); ?>" type="text" name="<?php echo esc_attr($this->get_field_name("google_plus")); ?>" value="<?php echo esc_attr($instance['google_plus']); ?>"></p>

			<p><label  class="widefat"  for ="<?php echo esc_attr($this->get_field_id("pin")); ?>"><?php echo esc_html__("Url Pin", 'wdjewelry'); ?></label><br>
			<input  class="widefat"id="<?php echo esc_attr($this->get_field_id("pin")); ?>" type="text" name="<?php echo esc_attr($this->get_field_name("pin")); ?>" value="<?php echo esc_attr($instance['pin']); ?>"></p>

		<?php }

        public function update($new_instance, $old_instance)
        {

            $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
            $instance['facebook'] = (!empty($new_instance['facebook'])) ? strip_tags($new_instance['facebook']) : '';
            $instance['pin'] = (!empty($new_instance['pin'])) ? strip_tags($new_instance['pin']) : '';
            $instance['twitter'] = (!empty($new_instance['twitter'])) ? strip_tags($new_instance['twitter']) : '';
            $instance['google_plus'] = (!empty($new_instance['google_plus'])) ? strip_tags($new_instance['google_plus']) : '';

            return $instance;
        }

        public function widget($agr, $instance)
        {
          echo wp_kses_post($agr["before_widget"]);
          echo wp_kses_post($agr['before_title']);
          echo esc_html($instance['title']);
          echo wp_kses_post($agr['after_title']);
        ?>
			<div class="social-icons">
				<ul>
          <?php if($instance['facebook']!=''):?>
					<li class="icon-facebook"><a class="fa fa-facebook" href="<?php echo esc_attr($instance['facebook']); ?>" target="_blank" title="<?php esc_html_e('Facebook', 'wdjewelry');?>" ></a></li>
          <?php endif;?>
          <?php if($instance['twitter']!=''):?>
					<li class="icon-twitter"><a class="fa fa-twitter" href="<?php echo esc_attr($instance['twitter']); ?>" target="_blank" title="<?php esc_html_e('Twitter', 'wdjewelry');?>" ></a></li>
          <?php endif; ?>
          <?php if($instance['pin']!=''):?>
					<li class="icon-pin hidden-xs"><a class="fa fa-pinterest" href="<?php echo esc_attr($instance['pin']); ?>" target="_blank" title="<?php esc_html_e('Pinterest', 'wdjewelry');?>" ></a></li>
          <?php endif; ?>
          <?php if($instance['google_plus']!=''):?>
					<li class="icon-google"><a class="fa fa-google-plus" href="<?php echo esc_attr($instance['google_plus']); ?>" target="_blank" title="<?php esc_html_e('Google Plus', 'wdjewelry');?>" ></a></li>
          <?php endif; ?>
				</ul>
				</div>

			<?php
      echo wp_kses_post($agr["after_widget"]);
    }
  }
}
register_widget("WD_follow");
?>