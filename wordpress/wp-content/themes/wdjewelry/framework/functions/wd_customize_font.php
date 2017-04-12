<?php
	if(!function_exists ('wdjewelry_customize_font')){
		function wdjewelry_customize_font($wp_customize){
			/*--------------------------------------------------------------*/
			/*					 CUSTOM THEME OPTION						*/
			/*--------------------------------------------------------------*/
		//$wp_customize->remove_section('colors');
		$wp_customize->remove_section('header_image');
		$wp_customize->remove_section('background_image');

		$font_family = array(
          "Abril Fatface" => "Abril Fatface",
          "Arimo" => "Arimo",
          "Arvo" => "Arvo",
		  "Bitter" => "Bitter",
		  "Cabin" => "Cabin",
		  "Cinzel" => "Cinzel",
		  "Coda" => "Coda",
		  "Belleza" => 'Belleza',
		  "Condiment" => "Condiment",
		  "Delius" => "Delius",
		  "Dosis" => "Dosis",
		  "Droid Sans" => "Droid Sans",
		  "Droid Serif" => "Droid Serif",
		  "Exo" => "Exo",
		  "Istok Web" => "Istok Web",
		  "Josefin Sans" => "Josefin Sans",
		  "Josefin Slab" => "Josefin Slab",
		  "Lato" => "Lato",
		  "Libre Baskerville" => "Libre Baskerville",
		  "Lobster" => "Lobster",
		  "Lora" => "Lora",
		  "Merienda" => "Merienda",
		  "Merriweather" => "Merriweather",
		  "Merriweather Sans" => "Merriweather Sans",
		  "Montserrat" => "Montserrat",
		  "Muli" => "Muli",
		  "Neuton" => "Neuton",
		  "Nothing You Could Do" => "Nothing You Could Do",
		  "Noto Sans" => "Noto Sans",
		  "Noto Serif" => "Noto Serif",
		  "Old Standard TT" => "Old Standard TT",
		  "Oleo Script" => "Oleo Script",
		  "Open Sans" => "Open Sans",
		  "Open Sans Condensed" => "Open Sans Condensed",
		  "Orbitron" => "Orbitron",
		  "Oswald" => "Oswald",
		  "Oxygen" => "Oxygen",
		  "PT Sans" => "PT Sans",
		  "PT Serif" => "PT Serif",
		  "Pacifico" => "Pacifico",
		  "Permanent Marker" => "Permanent Marker",
		  "Philosopher" => "Philosopher",
		  "Playfair Display" => "Playfair Display",
		  "Radley" => "Radley",
		  "Raleway" => "Raleway",
		  "Roboto" => "Roboto",
		  "Roboto Condensed" => "Roboto Condensed",
		  "Roboto Slab" => "Roboto Slab",
		  "Satisfy" => "Satisfy",
		  "Signika" => "Signika",
		  "Source Code Pro" => "Source Code Pro",
		  "Ubuntu" => "Ubuntu",
		  "Ubuntu Mono" => "Ubuntu Mono",
		  "Vollkorn" => "Vollkorn",
		  "Yeseva One" => "Yeseva One"
        );
		$type_html = array(
					'h1'  => array('family'=> 'Belleza','size'=>'30px','color'=>'black'),
					'h2'  => array('family'=> 'Belleza','size'=>'28px','color'=>'black'),
					'h3'  => array('family'=> 'Belleza','size'=>'24px','color'=>'black'),
					'h4'  => array('family'=> 'Belleza','size'=>'20px','color'=>'black'),
					'h5'  => array('family'=> 'Belleza','size'=>'16px','color'=>'black'),
					'h6'  => array('family'=> 'Belleza','size'=>'14px','color'=>'black'),
					'body'=> array('family'=> 'lato',  'size'=>'14px','color'=>'black'),
					);
		   $wp_customize->add_panel( 'tvlgiao_wpdance_theme_option', array(
		        'title' 			=> esc_html__( 'Jewelry Option', 'wdjewelry' ),
		        'description' 		=> esc_html__( 'Custom site', 'wdjewelry'),
		        'priority' 			=> 1,
		    ));


		$wp_customize->add_section("themeslug_logo_section",array(
			"title" => esc_html__("Jewelry logo",'wdjewelry'),
			"priority" => 1,
			"description" => esc_html__(" ",'wdjewelry'),
			'panel'	 			=> 'tvlgiao_wpdance_theme_option',
			));

		$wp_customize->add_setting( 'logo_header_default',array('default' => esc_url( get_template_directory_uri()."/images/logo.png"),'sanitize_callback'=>'esc_url_raw') );

		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'logo_header_default', array(
		    'label'    => esc_html__( 'Logo Default', 'wdjewelry' ),
		    'section'  => 'themeslug_logo_section',
		    'settings' => 'logo_header_default',
				) 
		) );
		/***********************************************************/
		$wp_customize->add_section( 'ubermenu_setion' , array(
 				'title'       		=> esc_html__( 'Ubermenu', 'wdjewelry' ),
 				'description' 		=> esc_html__( '', 'wdjewelry'),
 				'panel'	 			=> 'tvlgiao_wpdance_theme_option',
 				'priority'    		=> 1,
 			));

			$wp_customize->add_setting('ubermenu', array(
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'ubermenu', array(
				'label'   			=> esc_html__('check if you want ubermenu in mobile','wdjewelry' ),
				'description' 		=> esc_html__( 'if you uncheck it .please you go to ubermenu in admin and remove all setting of mobile menu in ubermenu . ', 'wdjewelry'),
				'section'  			=> 'ubermenu_setion',
				'settings' 			=> 'ubermenu',
				'type'    			=> 'checkbox',
				));
		   /*********************ADD Layout Header ******************************************/
		$wp_customize->add_section( 'header_section' , array(
 				'title'       		=> esc_html__( 'Header', 'wdjewelry' ),
 				'description' 		=> esc_html__( 'setting  header for site', 'wdjewelry'),
 				'panel'	 			=> 'tvlgiao_wpdance_theme_option',
 				'priority'    		=> 1,
 			));

			$wp_customize->add_setting('tvlgiao_wpdance_layout_header_setting', array(
				'default'        	=> 'default',
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'tvlgiao_wpdance_layout_header_control', array(
				'label'   			=> esc_html__('Header Style','wdjewelry' ),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'header_section',
				'settings' 			=> 'tvlgiao_wpdance_layout_header_setting',
				'type'    			=> 'select',
				'choices' 			=> array(
									'default' => __("Default", 'wdjewelry')),				
				));

			$wp_customize->add_setting('show_account', array(
				'default'        	=> true,
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'show_account', array(
				'label'   			=> esc_html__('uncheck if you do not want show account in header ','wdjewelry' ),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'header_section',
				'settings' 			=> 'show_account',
				'type'    			=> 'checkbox',
				));

			$wp_customize->add_setting('show_cart', array(
				'default'        	=> true,
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'show_cart', array(
				'label'   			=> esc_html__('uncheck if you do not want show cart in header ','wdjewelry' ),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'header_section',
				'settings' 			=> 'show_cart',
				'type'    			=> 'checkbox',
				));
			$wp_customize->add_setting('show_wishlist', array(
				'default'        	=> true,
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'show_wishlist', array(
				'label'   			=> esc_html__('uncheck if you do not want show wishlist in header ','wdjewelry' ),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'header_section',
				'settings' 			=> 'show_wishlist',
				'type'    			=> 'checkbox',
				));

			$wp_customize->add_setting('show_seach', array(
				'default'        	=> true,
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'show_seach', array(
				'label'   			=> esc_html__('uncheck if you do not want show seach in header ','wdjewelry' ),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'header_section',
				'settings' 			=> 'show_seach',
				'type'    			=> 'checkbox',
				));

		/****************ADD LAYOUT FOOTER***************************/
		$wp_customize->add_section( 'tvlgiao_wpdance_layout_footer_section' , array(
 				'title'       		=> esc_html__( 'Footer', 'wdjewelry' ),
 				'description' 		=> esc_html__( 'setting  header for site', 'wdjewelry'),
 				'panel'	 			=> 'tvlgiao_wpdance_theme_option',
 				'priority'    		=> 1,
 			));

			$wp_customize->add_setting('tvlgiao_wpdance_layout_footer_setting', array(
				'default'        	=> 'default',
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'tvlgiao_wpdance_layout_footer_control', array(
				'label'   			=> esc_html__('Footer Style','wdjewelry' ),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'tvlgiao_wpdance_layout_footer_section',
				'settings' 			=> 'tvlgiao_wpdance_layout_footer_setting',
				'type'    			=> 'select',
				'choices' 			=> array(
									'default' => __("Default", 'wdjewelry')),				
				));


			$wp_customize->add_setting('layout_copyright_footer',array(
									  'default'=> "Copyright Jewelry . All Rights Reserved.",
									  'sanitize_callback' => 'wdjewelry_sanitize_text',
									  'capability' => "edit_theme_options",
									  ));
			$wp_customize -> add_control('layout_copyright_footer',array(
										'settings' => 'layout_copyright_footer',
										'type' => 'textarea',
										'section' => 'tvlgiao_wpdance_theme_option',
										'description' => '',
										'label' => esc_html__('Footer Copyright','wdjewelry'),
										));

        	/*******************EDIT TYPE HTML********************************/
			
			foreach ($type_html as $key => $value) {
				$wp_customize->add_section( 'tvlgiao_wpdance_'.$key.'_font_section' , array(
 				'title'       		=> esc_html( $key),
 				'description' 		=> esc_html__('', 'wdjewelry'),
 				'panel'	 			=> 'tvlgiao_wpdance_theme_option',
 				'priority'    		=> 1,
 				));
				$wp_customize->add_setting('tvlgiao_wpdance_'.$key.'_font', array(
				'default'        	=> $value['family'],
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
				));
				$wp_customize->add_control( 'tvlgiao_wpdance_'.$key.'_font', array(
					'label'   			=> __( 'Family', 'wdjewelry' ),
					'description' 		=> esc_html__( '', 'wdjewelry'),
					'section'  			=> 'tvlgiao_wpdance_'.$key.'_font_section',
					'settings' 			=> 'tvlgiao_wpdance_'.$key.'_font',
					'type'    			=> 'select',
					'choices' 			=> $font_family,
					));
				/********************** ADD Size *******************************/
  			$wp_customize->add_setting('tvlgiao_wpdance_'.$key.'_font_size', array(
  				'default'        	=> $value['size'],
  				'sanitize_callback' => 'wdjewelry_sanitize_text',
  				'capability' 		=> 'edit_theme_options'
  			));
  			$wp_customize->add_control( 'tvlgiao_wpdance_'.$key.'_font_size', array(
  				'label'   			=> __( 'Size', 'wdjewelry' ),
  				'description' 		=> esc_html__( '', 'wdjewelry'),
  				'section'  			=> 'tvlgiao_wpdance_'.$key.'_font_section',
  				'settings' 			=> 'tvlgiao_wpdance_'.$key.'_font_size',
  				'type'    			=> 'textfilder',
  				));
        /**************************ADD COLOR ***************************************/
        $wp_customize->add_setting('tvlgiao_wpdance_'.$key.'_font_color', array(
          'default'         => $value['color'],
          'sanitize_callback' => 'wdjewelry_sanitize_text',
          'capability'    => 'edit_theme_options'
        ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tvlgiao_wpdance_'.$key.'_font_color', array(
            'label'       => __( 'Color', 'wdjewelry' ),
            'section'     => 'tvlgiao_wpdance_'.$key.'_font_section',
            'settings'    =>  'tvlgiao_wpdance_'.$key.'_font_color'
            ) ) );
     
		}
	}
}
add_action('customize_register','wdjewelry_customize_font' );
?>
