<?php 
if(!function_exists('wdjewelry_remove_section')){
	function wdjewelry_remove_section($wp_customize){
		$wp_customize->remove_section('colors');
		$wp_customize->remove_section('header_image');
		$wp_customize->remove_section('background_image');
	}
}
add_action('customize_register','wdjewelry_remove_section' );