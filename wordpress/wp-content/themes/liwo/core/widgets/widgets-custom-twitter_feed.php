<?php

class Custom_Twitter_Feed extends WP_Widget {

	function Custom_Twitter_Feed() {

		$widget_ops = array('classname' => 'Custom_Twitter_Feed ', 'description' => 'The Twitter Feed' );

		$this->WP_Widget('Custom_Twitter_Feed', THEMESTUDIO_THEME_NAME.' Twitter Feed', $widget_ops);

	}



	function widget($args, $instance) {

		extract($args, EXTR_SKIP);
		echo $before_widget;

		$title = empty($instance['title']) ? 'Twitter Feed' : apply_filters('widget_title', $instance['title']);

		$number = empty($instance['number']) ? 5 :  $instance['number'];

		echo $before_title.$title.$after_title;
		
		$dem	= (int)$number;
		$tweets = getTweets($dem);
		echo '<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>';
	?>
		<div class="twitter_feed">
			<?php foreach($tweets as $tweet){ ?>
	          	<div class="left"><i class="fa fa-twitter fa-lg"></i></div>
	          	<div class="right">
	          		<a href="https://twitter.com/<?php echo get_option('tdf_user_timeline'); ?>" target="_blank"><?php echo get_option('tdf_user_timeline'); ?></a>: <?php echo $tweet['text']; ?><br />
	            	<a href="<?php echo 'https://twitter.com/'.get_option('tdf_user_timeline').'/status/'.$tweet['id_str']; ?>" class="small">.<?php echo human_time_diff( strtotime($tweet['created_at']), current_time('timestamp') ) . ' ago'; ?></a> .
	            	<a href="https://twitter.com/intent/tweet?in_reply_to=<?php echo $tweet['id_str']; ?>" class="small">reply</a> .
	            	<a href="https://twitter.com/intent/retweet?tweet_id=<?php echo $tweet['id_str']; ?>" class="small">retweet</a> .
	            	<a href="https://twitter.com/intent/favorite?tweet_id=<?php echo $tweet['id_str']; ?>" class="small">favorite</a>
	          	</div>
	          	<div class="clearfix divider_line4"></div>
	        <?php } ?>
        </div>
	<?php			  

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

			<p><label for="<?php echo $this->get_field_id('title'); ?>">Title (default "Twitter Feed"): <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>

			<p><label for="<?php echo $this->get_field_id('number'); ?>">Number of twitter feed (default "5"): <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo esc_attr($number); ?>" /></label></p>

  

<?php

	}

}



register_widget('Custom_Twitter_Feed');

?>