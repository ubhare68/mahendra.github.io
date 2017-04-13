<?php
if(!function_exists('tvlgiao_wpdance_url')){
	function tvlgiao_wpdance_url(){
		return home_url('/');
	}
	add_shortcode('url_home','tvlgiao_wpdance_url' );
}
?>