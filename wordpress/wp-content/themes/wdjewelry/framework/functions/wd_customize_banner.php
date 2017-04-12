<?php
	if(!function_exists ('wdjewelry_customize_banner')){
		function wdjewelry_customize_banner($wp_customize){
			/*--------------------------------------------------------------*/
			/*					 CUSTOM LAYOUT						*/
			/*--------------------------------------------------------------*/

		   $wp_customize->add_panel( 'tvlgiao_wpdance_banner', array(
		        'title' 			=> esc_html__( 'Jewelry Config Banner', 'wdjewelry' ),
		        'description' 		=> esc_html__( 'Custom site', 'wdjewelry'),
		        'priority' 			=> 1,
		    ));

 			$wp_customize->add_section( 'tvlgiao_wpdance_banner_shop_section' , array(
 				'title'       		=> esc_html__( 'Banner Shop', 'wdjewelry' ),
 				'description' 		=> esc_html__( '', 'wdjewelry'),
 				'panel'	 			=> 'tvlgiao_wpdance_banner',
 				'priority'    		=> 1,
 			));

			$wp_customize->add_setting('tvlgiao_wpdance_banner_shop', array(
				'default' => esc_url( get_template_directory_uri()."/images/banner-cat.jpg"),
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'tvlgiao_wpdance_banner_shop', array(
		    'label'    => esc_html__( 'Baner Shop', 'wdjewelry' ),
		    'section'  => 'tvlgiao_wpdance_banner_shop_section',
		    'settings' => 'tvlgiao_wpdance_banner_shop',
				) 
			));

			/*********************ADD BANNER NEWSLETTER ******************************************/
		
 			/*$wp_customize->add_section( 'tvlgiao_wpdance_banner_newsletter_section' , array(
 				'title'       		=> esc_html__( 'Banner NewsLetter', 'wdjewelry' ),
 				'description' 		=> esc_html__( '', 'wdjewelry'),
 				'panel'	 			=> 'tvlgiao_wpdance_banner',
 				'priority'    		=> 1,
 			));

			$wp_customize->add_setting('tvlgiao_wpdance_banner_newsletter', array(
				'default' => esc_url( get_template_directory_uri()."/images/logo.png"),
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'tvlgiao_wpdance_banner_newsletter', array(
		    'label'    => esc_html__( 'Baner Shop', 'wdjewelry' ),
		    'section'  => 'tvlgiao_wpdance_banner_newsletter_section',
		    'settings' => 'tvlgiao_wpdance_banner_newsletter',
				) 
			));*/
			
		/*****************************ADD LAYOUT FOOTER*************************************************/
	/*	$wp_customize->add_section( 'tvlgiao_wpdance_layout_footer_section' , array(
 				'title'       		=> esc_html__( 'Header', 'wdjewelry' ),
 				'description' 		=> esc_html__( 'setting  header for site', 'wdjewelry'),
 				'panel'	 			=> 'tvlgiao_wpdance_theme_layout',
 				'priority'    		=> 1,
 			));

			$wp_customize->add_setting('tvlgiao_wpdance_layout_footer_setting', array(
				'default'        	=> 'sidebar-left',
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'tvlgiao_wpdance_layout_footer_control', array(
				'label'   			=> esc_html__('Header Style' ),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'tvlgiao_wpdance_layout_footer_section',
				'settings' 			=> 'tvlgiao_wpdance_layout_footer_setting',
				'type'    			=> 'select',
				'choices' 			=> array(
									'default' => __("Default", 'wpdancebootstrap')),				
				));*/

			/**************************** ADD 	*****************************************/
	}
}
add_action('customize_register','wdjewelry_customize_banner' );
?>
