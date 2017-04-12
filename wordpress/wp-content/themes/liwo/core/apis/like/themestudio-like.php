<?php

class ThemeStudioLike {

	 function __construct()   {
        add_action('wp_enqueue_scripts', array(&$this, 'enqueue_scripts'));
        add_action('wp_ajax_themestudio-like', array(&$this, 'ajax'));
		add_action('wp_ajax_nopriv_themestudio-like', array(&$this, 'ajax'));
	}

	function enqueue_scripts() {

		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'themestudio-like', get_template_directory_uri() . '/core/apis/like/js/themestudio-like.js', 'jquery', '1.0', TRUE );

		wp_localize_script( 'themestudio-like', 'ThemeStudioLike', array(
			'ajaxurl' => admin_url('admin-ajax.php')
		));
	}

	function ajax($post_id) {

		//update
		if( isset($_POST['likes_id']) ) {
			$post_id = str_replace('themestudio-like-', '', $_POST['likes_id']);
			echo $this->like_post($post_id, 'update');
		}

		//get
		else {
			$post_id = str_replace('themestudio-like-', '', $_POST['likes_id']);
			echo $this->like_post($post_id, 'get');
		}

		exit;
	}

	function like_post($post_id, $action = 'get')
	{
		if(!is_numeric($post_id)) return;
		switch($action) {

			case 'get':
				$love_count = get_post_meta($post_id, '_themestudio_like', true);
				if( !$love_count ){
					$love_count = 'Add to Favorites';
					add_post_meta($post_id, '_themestudio_like', $love_count, true);
				}

				// return '<span class="themestudio-like-count">'. $love_count .'</span>';
				return '<span class="themestudio-like-count">'. $love_count .'</span>';
				break;

			case 'update':
				$love_count = get_post_meta($post_id, '_themestudio_like', true);
				if( isset($_COOKIE['themestudio_like_'. $post_id]) ) return $love_count;

				$love_count++;
				update_post_meta($post_id, '_themestudio_like', $love_count);
				setcookie('themestudio_like_'. $post_id, $post_id, time()*20, '/');

				return '<span class="themestudio-like-count">'. $love_count .'</span>';
				break;

		}
	}


	function add_love() {
		global $post;

		$output = $this->like_post($post->ID);
  		$class = 'themestudio-like';
  		$title = __('Add to Favorites', 'themestudio');
		if( isset($_COOKIE['themestudio_like_'. $post->ID]) ){
			$class = 'themestudio-like liked';
			$title = __('You already liked this!', 'themestudio');
		}

		return '<a href="#" class="'. $class .'" id="themestudio-like-'. $post->ID .'" title="'. $title .'"> '. $output .' <i class="fa fa-heart"></i> </a>';
	}
}


global $themestudio_like;
$themestudio_like = new ThemeStudioLike();

// get the ball rollin'
function themestudio_like($return = '') {
	global $themestudio_like;

	if($return == 'return') {
		return $themestudio_like->add_love();
	} else {
		echo $themestudio_like->add_love();
	}

}

?>
