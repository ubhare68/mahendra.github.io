<?php 
if(!function_exists ('heading_function')){
	function heading_function($atts, $content = null){
		extract(shortcode_atts(array(
			'size' 		=> 'h1',
			'style'		=> 'heading_style1'
		), $atts));

		return "<div class='heading-title-block {$style}'><{$size}>".do_shortcode($content)."</{$size}></div>";
		
	}
}
add_shortcode('wd_heading','heading_function');
?>