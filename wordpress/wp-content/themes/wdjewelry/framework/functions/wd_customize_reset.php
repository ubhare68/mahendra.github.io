<?php
	if(!function_exists ('wdjewelry_customize_color')){
		function wdjewelry_customize_color($wp_customize){
			/*--------------------------------------------------------------*/
			/*					 CUSTOM COLOR						*/
			/*--------------------------------------------------------------*/
		   $wp_customize->add_section( 'custom_reset' , array(
 				'title'       		=> esc_html__( 'Jewelry Reset ', 'wdjewelry' ),
 				'description' 		=> esc_html__( '', 'wdjewelry'),
 				'priority'    		=> 1,
 			));
		   $wp_customize->add_setting('custom_reset', array(
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'custom_reset', array(
				'label'   			=> esc_html__('Header Style','wdjewelry' ),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'tvlgiao_wpdance_layout_header_section',
				'settings' 			=> 'tvlgiao_wpdance_layout_header_setting',
				'type'    			=> 'select',
				'choices' 			=> array(
									'default' => __("Default", 'wdjewelry')),				
			));

	   
	}
}
add_action('customize_register','wdjewelry_customize_color' );
?>
