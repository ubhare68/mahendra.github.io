<?php
add_action( 'wp_enqueue_scripts', 'wdjewelry_eidt_customize_css_blog' );
if(!function_exists('wdjewelry_eidt_customize_css_blog')){
	function wdjewelry_eidt_customize_css_blog(){ 
		/********SETTING CUSSTOM CSS HEADER*******/ 
		//btn
		$custom_css = '';
		$custom_css .= '.blog_bg, .content_blog .wd_item_blog > div, .content_blog .large_image > div, .content_blog .small_image > div {background-color:'.get_theme_mod('blog_bg','#fff').'}';
		wp_add_inline_style('wdjewelry-main.css',$custom_css);
	}

}		