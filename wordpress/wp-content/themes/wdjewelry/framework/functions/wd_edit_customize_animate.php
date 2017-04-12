<?php
add_action( 'wp_enqueue_scripts', 'wdjewelry_eidt_customize_animate' );
if(!function_exists('wdjewelry_eidt_customize_animate')){
	function wdjewelry_eidt_customize_animate(){ 
		/********SETTING CUSSTOM CSS HEADER*******/ 
		//btn
	$custom_js = "jQuery(document).ready(function(){";
	$custom_js .= 'jQuery("header").attr("data-animate","'.get_theme_mod('Custom_animate_header_animate','fadeInUp').'");';
$custom_js .= 'jQuery("footer .footer-content-top").attr("data-animate","'.get_theme_mod('Custom_animate_footer_animate','fadeInUp').'");';
$custom_js .= 'jQuery("footer .footer-content-main__area1").attr("data-animate","'.get_theme_mod('Custom_animate_footer_animate','fadeInUp').'");';
$custom_js .= 'jQuery("footer .footer-content-main__area2").attr("data-animate","'.get_theme_mod('Custom_animate_footer_animate','fadeInUp').'");';
$custom_js .= 'jQuery("footer .footer-content-main__area3").attr("data-animate","'.get_theme_mod('Custom_animate_footer_animate','fadeInUp').'");';
$custom_js .= 'jQuery("footer .footer-content-main__area4").attr("data-animate","'.get_theme_mod('Custom_animate_footer_animate','fadeInUp').'");';
$custom_js .= 'jQuery(".wd_item_blog,.wd_item_blog_list").attr("data-animate","'.get_theme_mod('Custom_animate_post_animate','fadeInUp').'");';

/*$custom_js .= 'jQuery(".products").each(function(){';
	$custom_js .= 'var delay = 300;';
		$custom_js .= 'jQuery(this).find("li.product").each(function(){';
			$custom_js .= 'jQuery(this).attr("data-animate","'.get_theme_mod('Custom_animate_Product_animate','fadeInUp').'");';
			$custom_js .= 'jQuery(this).attr("data-delay",delay);';
			$custom_js .= 'delay = delay+100;';	
		$custom_js .= '});';
		$custom_js .= '});';*/
	$custom_js .= 'dataAnimate();';
	$custom_js .= "})";
		wp_add_inline_script('wdjewelry-main.js',$custom_js);
	}

}		