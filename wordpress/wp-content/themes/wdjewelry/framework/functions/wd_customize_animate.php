<?php
if(!function_exists ('wdjewelry_customize_animate')){
	function wdjewelry_customize_animate($wp_customize){
		/*--------------------------------------------------------------*/
		/*					 CUSTOM THEME OPTION						*/
		/*--------------------------------------------------------------*/
		 $wp_customize->add_panel( 'tvlgiao_wpdance_animate', array(
		        'title' 			=> esc_html__( 'Jewelry Animate', 'wdjewelry' ),
		        'description' 		=> esc_html__( 'Custom site', 'wdjewelry'),
		        'priority' 			=> 1,
		    ));

 		$section = array(
 			"Custom_animate_header"=>esc_html__('Header','wdjewelry'),
 			"Custom_animate_footer"=>esc_html__('Footer','wdjewelry'),
 			"Custom_animate_Product"=>esc_html__('Product','wdjewelry'),
 			"Custom_animate_post"=>esc_html__('Item Post','wdjewelry'),
 		);
		$animate = array(
			'nonanimate'	=> 'nonanimate',
			'fadeIn' 		=> 'fadeIn',
			'fadeInDown'  	=> 'fadeInDown',
			'fadeInDownBig'	=> 'fadeInDownBig',
			'fadeInLeft'	=> 'fadeInLeft',
			'fadeInLeftBig'	=> 'fadeInLeftBig',
			'fadeInRight'	=> 'fadeInRight',
			'fadeInRightBig'=> 'fadeInRightBig',
			'fadeInUp'		=> 'fadeInUp',
			'fadeInUpBig'	=> 'fadeInUpBig',
			'bounceIn'		=> 'bounceIn',
			'bounceInDown'	=>  'bounceInDown',
			'bounceInLeft'	=> 'bounceInLeft',
			'bounceInRight'	=> 	'bounceInRight',
			'bounceInUp'	=> 'bounceInUp',
			'lightSpeedIn'	=> 'lightSpeedIn',
			'rotateIn'		=> 'rotateIn',
			'rotateInDownLeft'=> 'rotateInDownLeft',
			'rotateInDownRight'=> 'rotateInDownRight',
			'rotateInUpLeft'		=> 'rotateInUpLeft',
			'rotateInUpRight'	=>  'rotateInUpRight',
			'slideInUp'	=> 'slideInUp',
			'slideInDown'	=> 	'slideInDown',
			'slideInLeft'	=> 'slideInLeft',
			'slideInRight'	=> 'slideInRight',
			'zoomIn'		=> 'zoomIn',
			'zoomInDown'=> 'zoomInDown',
			'zoomInLeft'=> 'zoomInLeft',
			'zoomInRight'		=> 'zoomInRight',
			'zoomInUp'=> 'zoomInUp',
			'rollIn'=> 'rollIn',
			);

		foreach ($section as $key => $value) {
			$wp_customize->add_section( $key , array(
 				'title'       		=> $value,
 				'description' 		=> esc_html__( '', 'wdjewelry'),
 				'panel'	 			=> 'tvlgiao_wpdance_animate',
 				'priority'    		=> 1,
 			));
 			$wp_customize->add_setting($key.'_animate', array(
				'default' => 'fadeInUp',
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				/*'transport'   => 'refresh',*/
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control($key.'_animate', array(
					'label'   			=> __( 'Animate', 'wdjewelry' ),
					'description' 		=> esc_html__( '', 'wdjewelry'),
					'section'  			=> $key,
					'settings' 			=> $key.'_animate',
					'type'    			=> 'select',
					'choices' 			=> $animate,
			));

		}
	}
}
add_action('customize_register','wdjewelry_customize_animate' );
?>
