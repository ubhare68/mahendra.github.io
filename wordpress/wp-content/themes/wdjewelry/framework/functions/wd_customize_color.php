<?php
	if(!function_exists ('wdjewelry_customize_color')){
		function wdjewelry_customize_color($wp_customize){
			/*--------------------------------------------------------------*/
			/*					 CUSTOM COLOR						*/
			/*--------------------------------------------------------------*/

		   $wp_customize->add_panel( 'tvlgiao_wpdance_color', array(
		        'title' 			=> esc_html__( 'Jewelry Color', 'wdjewelry' ),
		        'description' 		=> esc_html__( 'Custom site', 'wdjewelry'),
		        'priority' 			=> 1,
		    ));

		   $wp_customize->add_section( 'custom_general' , array(
 				'title'       		=> esc_html__( 'Custom General', 'wdjewelry' ),
 				'description' 		=> esc_html__( '', 'wdjewelry'),
 				'panel'	 			=> 'tvlgiao_wpdance_color',
 				'priority'    		=> 1,
 			));
		  $wp_customize->add_section( 'custom_header' , array(
 				'title'       		=> esc_html__( 'Custom Header', 'wdjewelry' ),
 				'description' 		=> esc_html__( '', 'wdjewelry'),
 				'panel'	 			=> 'tvlgiao_wpdance_color',
 				'priority'    		=> 2,
 			));
 			$wp_customize->add_section( 'custom_footer' , array(
 				'title'       		=> esc_html__( 'Custom Footer', 'wdjewelry' ),
 				'description' 		=> esc_html__( '', 'wdjewelry'),
 				'panel'	 			=> 'tvlgiao_wpdance_color',
 				'priority'    		=> 3,
 			));
 			$wp_customize->add_section( 'custom_sidebar' , array(
 				'title'       		=> esc_html__( 'Custom Sidebar', 'wdjewelry' ),
 				'description' 		=> esc_html__( '', 'wdjewelry'),
 				'panel'	 			=> 'tvlgiao_wpdance_color',
 				'priority'    		=> 4,
 			));
 			$wp_customize->add_section( 'custom_product' , array(
 				'title'       		=> esc_html__( 'Custom Product', 'wdjewelry' ),
 				'description' 		=> esc_html__( '', 'wdjewelry'),
 				'panel'	 			=> 'tvlgiao_wpdance_color',
 				'priority'    		=> 5,
 			));
 			$wp_customize->add_section( 'custom_blog' , array(
 				'title'       		=> esc_html__( 'Custom Blog', 'wdjewelry' ),
 				'description' 		=> esc_html__( '', 'wdjewelry'),
 				'panel'	 			=> 'tvlgiao_wpdance_color',
 				'priority'    		=> 5,
 			));

	   	$array = array(
	   		"custom_general" => array(
	   				'primary_bg'=> array('label'=>__('Primary Color','wdjewelry'),'color'=>'#a07936'),
	   				'secondary_bg'=> array('label'=>__('Secondary Color','wdjewelry'),'color'=>'#f2e4cc'),
	   				'body_bg'=> array('label'=>__('Body Background','wdjewelry'),'color'=>'#f7f7f7'),
	   				'breadcrumb_bg'=> array('label'=>__('Breadcrumb Background','wdjewelry'),'color'=>'#f2e4cc'),
	   				'breadcrumb_color'=> array('label'=>__('Breadcrumb Color','wdjewelry'),'color'=>'#a07936'),
	   				'breadcrumb_link'=> array('label'=>__('Breadcrumb Link Color','wdjewelry'),'color'=>'#808080'),
	   				'breadcrumb_link_hover'=> array('label'=>__('Breadcrumb Link Hover','wdjewelry'),'color'=>'#a07936'),
	   				'heading_h1_color'=> array('label'=>__('Heading H1','wdjewelry'),'color'=>'#010101'),
	   				'heading_h2_color'=> array('label'=>__('Heading H2','wdjewelry'),'color'=>'#010101'),
	   				'heading_h3_color'=> array('label'=>__('Heading H3','wdjewelry'),'color'=>'#010101'),
	   				'heading_h4_color'=> array('label'=>__('Heading H4','wdjewelry'),'color'=>'#010101'),
	   				'heading_h5_color'=> array('label'=>__('Heading H5','wdjewelry'),'color'=>'#010101'),
	   				'heading_h6_color'=> array('label'=>__('Heading H6','wdjewelry'),'color'=>'#010101'),
	   				'text'=> array('label'=>__('Text','wdjewelry'),'color'=>'#272727'),
	   				'border_color'=> array('label'=>__('Border Color','wdjewelry'),'color'=>'#d9d9d9'),
	   				'link'=> array('label'=>__('Link','wdjewelry'),'color'=>'#eec989'),
	   				'link_hover'=> array('label'=>__('Link Hover','wdjewelry'),'color'=>'#272727'),
	   				'icon'=> array('label'=>__('Icon','wdjewelry'),'color'=>'#808080'),
	   				'background_btn'=> array('label'=>__('Button background color','wdjewelry'),'color'=>'#a07936'),
	   				'border_btn'=> array('label'=>__('Button border color','wdjewelry'),'color'=>'#a07936'),
	   				'color_btn'=> array('label'=>__('Button color','wdjewelry'),'color'=>'#fff'),
	   				'background_hover'=> array('label'=>__('Button background color hover','wdjewelry'),'color'=>'#010101'),
	   				'border_hover'=> array('label'=>__('Button border color hover','wdjewelry'),'color'=>'#010101'),
	   				'color_hover'=> array('label'=>__('Button color hover','wdjewelry'),'color'=>'#fff'),
	   			),
	   		"custom_header" => array(
	   				'header_top_bg'=> array('label'=>__('Header Top Background','wdjewelry'),'color'=>'#f4f4f4'),
	   				'header_middle_bg'=> array('label'=>__('Header Middle Background','wdjewelry'),'color'=>'#f4f4f4'),
	   				'header_color'=> array('label'=>__('Header Color','wdjewelry'),'color'=>'#202020'),
	   				'header_heading'=> array('label'=>__('Header Heading ','wdjewelry'),'color'=>'#202020'),
	   				'header_link'=> array('label'=>__('Header Link','wdjewelry'),'color'=>'#202020'),
	   				'header_link_hover'=> array('label'=>__('Header Link Hover','wdjewelry'),'color'=>'#a07936'),
	   				'header_border'=> array('label'=>__('Header Border','wdjewelry'),'color'=>'#dbdbdb'),
	   				'header_btn_bg'=> array('label'=>__('Header Button Background','wdjewelry'),'color'=>'#fff'),
	   				'header_btn_bd'=> array('label'=>__('Header Button Border','wdjewelry'),'color'=>'#cccccc'),
	   				'header_btn_color'=> array('label'=>__('Header Button Color','wdjewelry'),'color'=>'#6b6b6b'),
	   				'header_hover_bd'=> array('label'=>__('Header Button Hover Border','wdjewelry'),'color'=>'#a07936'),
	   				'header_hover_bg'=> array('label'=>__('Header Button Hover Background','wdjewelry'),'color'=>'#a07936'),
	   				'header_hover_color'=> array('label'=>__('Header Button Hover Color','wdjewelry'),'color'=>'#fff'),
	   			),
	   		"custom_footer" => array(
	   				'footer_top_bg'=> array('label'=>__('Footer Top Background','wdjewelry'),'color'=>'#fff'),
	   				'footer_top_border'=> array('label'=>__('Footer Top Border','wdjewelry'),'color'=>'#e5e5e5'),
	   				'footer_top_heading'=> array('label'=>__('Footer Top Heading','wdjewelry'),'color'=>'#000'),
	   				'footer_top_text'=> array('label'=>__('Footer Top Text','wdjewelry'),'color'=>'#000000'),
	   				'footer_top_link'=> array('label'=>__('Footer Top Link','wdjewelry'),'color'=>'#fff'),
	   				'footer_top_link_hover'=> array('label'=>__('Footer Top Link Hover','wdjewelry'),'color'=>'#000'),
	   				'footer_main_bg'=> array('label'=>__('Footer Main background','wdjewelry'),'color'=>'#fff'),
	   				'footer_main_bd'=> array('label'=>__('Footer Main Border','wdjewelry'),'color'=>'#e5e5e5'),
	   				'footer_main_heading'=> array('label'=>__('Footer Main Heading','wdjewelry'),'color'=>'#000'),
	   				'footer_main_text'=> array('label'=>__('Footer Main Text','wdjewelry'),'color'=>'#000000'),
	   				'footer_main_link'=> array('label'=>__('Footer Main Link','wdjewelry'),'color'=>'#000000'),
	   				'footer_main_link_hover'=> array('label'=>__('Footer Main Link Hover','wdjewelry'),'color'=>'#a07936'),
	   				'footer_bottom_bg'=> array('label'=>__('Footer Bottom Background','wdjewelry'),'color'=>'#21201f'),
	   				'footer_bottom_heading'=> array('label'=>__('Footer Bottom Heading','wdjewelry'),'color'=>'#e0e0e0'),
	   				'footer_bottom_link'=> array('label'=>__('Footer Bottom Link','wdjewelry'),'color'=>'#fff'),
	   				'footer_bottom_link_hover'=> array('label'=>__('Footer Bottom Link Hover','wdjewelry'),'color'=>'#e0e0e0'),
	   				'footer_bottom_text'=> array('label'=>__('Footer Bottom Text','wdjewelry'),'color'=>'#9e9e9e'),
	   				'footer_bottom_border'=> array('label'=>__('Footer Bottom Border','wdjewelry'),'color'=>'#9e9e9e'),
	   				'footer_btn_bg'=> array('label'=>__('Footer Button Background','wdjewelry'),'color'=>'#a07936'),
	   				'footer_btn_bd'=> array('label'=>__('Footer Button Border','wdjewelry'),'color'=>'#a07936'),
	   				'footer_btn_color'=> array('label'=>__('Footer Button Color','wdjewelry'),'color'=>'#fff'),
	   				'footer_btn_bg_hv'=> array('label'=>__('Footer Button Background Hover','wdjewelry'),'color'=>'#fff'),
	   				'footer_btn_bd_hv'=> array('label'=>__('Footer Button Border Hover','wdjewelry'),'color'=>'#9e9e9e'),
	   				'footer_btn_color_hv'=> array('label'=>__('Footer Button Color Hover','wdjewelry'),'color'=>'#9e9e9e'),
	   			),
	   		"custom_sidebar" => array(
	   				'sidebar_bg'=> array('label'=>__('Sidebar Background','wdjewelry'),'color'=>'transparent'),
	   				'sidebar_heading'=> array('label'=>__('Sidebar Heading','wdjewelry'),'color'=>'#000'),
	   				'sidebar_text'=> array('label'=>__('Sidebar Text','wdjewelry'),'color'=>'#808080'),
	   				'sidebar_link'=> array('label'=>__('Sidebar Link','wdjewelry'),'color'=>'#a07936'),
	   				'sidebar_link_hover'=> array('label'=>__('Sidebar Link Hover','wdjewelry'),'color'=>'#808080'),
	   				'sidebar_border'=> array('label'=>__('Sidebar Border','wdjewelry'),'color'=>'#cccccc'),
	   				'sidebar_btn_bg'=> array('label'=>__('Sidebar Button Background','wdjewelry'),'color'=>'#fff'),
	   				'sidebar_btn_bd'=> array('label'=>__('Sidebar Button Border','wdjewelry'),'color'=>'#cccccc'),
	   				'sidebar_btn_color'=> array('label'=>__('Sidebar Button Color','wdjewelry'),'color'=>'#6b6b6b'),
	   				'sidebar_btn_bg_hv'=> array('label'=>__('Sidebar Button Background Hover','wdjewelry'),'color'=>'#a07936'),
	   				'sidebar_btn_bd_hv'=> array('label'=>__('Sidebar Button Border Hover','wdjewelry'),'color'=>'#a07936'),
	   				'sidebar_btn_color_hv'=> array('label'=>__('Sidebar Button Color Hover','wdjewelry'),'color'=>'#fff'),
	   			),
	   		"custom_product" => array(
	   				'pro_bg'=> array('label'=>__('Product Background','wdjewelry'),'color'=>'#fff'),
	   				'pro_label'=> array('label'=>__('Product Label Background','wdjewelry'),'color'=>'#a07936'),
	   				'pro_label_color'=> array('label'=>__('Product Tabel Color','wdjewelry'),'color'=>'#fff'),
	   				'pro_title'=> array('label'=>__('Product Title','wdjewelry'),'color'=>'#202020'),
	   				'pro_title_hover'=> array('label'=>__('Product Title Hover','wdjewelry'),'color'=>'#a07936'),
	   				
	   				'pro_rating'=> array('label'=>__('Product Rating','wdjewelry'),'color'=>'#a07936'),
	   				'pro_price'=> array('label'=>__('Product Price','wdjewelry'),'color'=>'#202020'),
	   				'pro_price_sale'=> array('label'=>__('Product Price Sale','wdjewelry'),'color'=>'#a07936'),
	   				'pro_options_bg'=> array('label'=>__('Product Option Background','wdjewelry'),'color'=>'#fff'),
	   				'pro_options_border'=> array('label'=>__('Product Option Border','wdjewelry'),'color'=>'#ebebeb'),
	   				'pro_options_color'=> array('label'=>__('Product Option Color','wdjewelry'),'color'=>'#c7c7c7'),
	   				'pro_options_active_bg'=> array('label'=>__('Product Option Active Background','wdjewelry'),'color'=>'#a07936'),
	   				'pro_options_active_bd'=> array('label'=>__('Product Option Active Border','wdjewelry'),'color'=>'#a07936'),
	   				'pro_btn_bg'=> array('label'=>__('Product Button Background (Product Detail Page) ','wdjewelry'),'color'=>'#f7f7f7'),
	   				'pro_btn_bd'=> array('label'=>__('Product Button Border','wdjewelry'),'color'=>'#a07936'),
	   				'pro_btn_color'=> array('label'=>__('Product Button Color','wdjewelry'),'color'=>'#a07936'),
	   				'pro_btn_bg_hv'=> array('label'=>__('Product Button Background Hover','wdjewelry'),'color'=>'#a07936'),
	   				'pro_btn_bd_hv'=> array('label'=>__('Product Button Border Hover','wdjewelry'),'color'=>'#a07936'),
	   				'pro_btn_color_hv'=> array('label'=>__('Product Button Color Hover','wdjewelry'),'color'=>'#f7f7f7'),
	   			),
	   		"custom_blog" => array(
	   				'blog_bg'=> array('label'=>__('Blog Background','wdjewelry'),'color'=>'#fff'),
	   			)
	   	);

 			foreach ($array as $id_section => $section) {
 					foreach ($section as $key => $value) {
 						$wp_customize->add_setting($key, array(
	          'default'         => $value['color'],
	          'sanitize_callback' => 'wdjewelry_sanitize_text',
	          'capability'    => 'edit_theme_options'
        	));
        	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $key, array(
            'label'       => $value['label'],
            'section'     => $id_section,
            'settings'    =>  $key
            ) ) );
 					}
 			}
	}
}
add_action('customize_register','wdjewelry_customize_color' );
?>
