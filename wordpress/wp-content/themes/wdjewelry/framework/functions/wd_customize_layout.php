<?php
	if(!function_exists ('wdjewelry_customize_layout')){
		function wdjewelry_customize_layout($wp_customize){
			/*--------------------------------------------------------------*/
			/*					 CUSTOM LAYOUT						*/
			/*--------------------------------------------------------------*/
		   $wp_customize->add_panel( 'tvlgiao_wpdance_theme_layout', array(
		        'title' 			=> esc_html__( 'Jewelry Layout', 'wdjewelry' ),
		        'description' 		=> esc_html__( 'Custom site', 'wdjewelry'),
		        'priority' 			=> 1,
		    ));

		   /************************Layout Shop**********************************************/
 			$wp_customize->add_section( 'tvlgiao_wpdance_layout_section' , array(
 				'title'       		=> esc_html__( 'Layout Shop', 'wdjewelry' ),
 				'description' 		=> esc_html__( 'Layout For Site', 'wdjewelry'),
 				'panel'	 			=> 'tvlgiao_wpdance_theme_layout',
 				'priority'    		=> 1,
 			));

			//add banner shop
			$wp_customize->add_setting('tvlgiao_wpdance_layout_banner_shop', array(
				'default' => esc_url( get_template_directory_uri()."/images/banner-cat.jpg"),
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'tvlgiao_wpdance_layout_banner_shop', array(
		    'label'    => esc_html__( 'Baner Shop', 'wdjewelry' ),
		    'section'  => 'tvlgiao_wpdance_layout_section',
		    'settings' => 'tvlgiao_wpdance_layout_banner_shop',
				) 
			));
			//columns shop
			$wp_customize->add_setting('tvlgiao_wpdance_layout_column_shop', array(
				'default'        	=> '4',
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'tvlgiao_wpdance_layout_column_shop', array(
				'label'   			=> esc_html__('Colums','wdjewelry' ),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'tvlgiao_wpdance_layout_section',
				'settings' 			=> 'tvlgiao_wpdance_layout_column_shop',
				'type'    			=> 'select',
				'choices' 			=> array(
									'2' => __("2", 'wdjewelry'),
									'3' => __("3", 'wdjewelry'),
									'4' => __("4", 'wdjewelry'),
									'6' => __("6", 'wdjewelry')),
				));
			// number item in page
			$wp_customize->add_setting('tvlgiao_wpdance_layout_number_shop', array(
				'default'        	=> '4',
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'tvlgiao_wpdance_layout_number_shop', array(
				'label'   			=> esc_html__('Number Product In A Page','wdjewelry' ),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'tvlgiao_wpdance_layout_section',
				'settings' 			=> 'tvlgiao_wpdance_layout_number_shop',
				'type'    			=> 'text',
			));

			//layout shop 
			$wp_customize->add_setting('tvlgiao_wpdance_layout_shop', array(
				'default'        	=> 'fullwidth',
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'tvlgiao_wpdance_layout_shop', array(
				'label'   			=> esc_html__('Layout','wdjewelry' ),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'tvlgiao_wpdance_layout_section',
				'settings' 			=> 'tvlgiao_wpdance_layout_shop',
				'type'    			=> 'select',
				'choices' 			=> array(
									'fullwidth' => __("Full Width", 'wdjewelry'),
									'sidebar-left' => __("Left Sidebar", 'wdjewelry'),
									'sidebar-right' => __("Right Sidebar", 'wdjewelry')),
			));
			//Sidebar
			$wp_customize->add_setting('tvlgiao_wpdance_layout_sidebar_shop', array(
				'default'        	=> 'sidebar-1',
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'tvlgiao_wpdance_layout_sidebar_shop', array(
				'label'   			=> esc_html__('Sidebar','wdjewelry' ),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'tvlgiao_wpdance_layout_section',
				'settings' 			=> 'tvlgiao_wpdance_layout_sidebar_shop',
				'type'    			=> 'select',
				'choices' 			=> wdjewelry_get_list_sidebar(),
				));
			
			/************************Layout Category Product**************************/
 			$wp_customize->add_section( 'layout_section_category' , array(
 				'title'       		=> esc_html__( 'Category Product', 'wdjewelry' ),
 				'description' 		=> esc_html__( 'Layout For Site', 'wdjewelry'),
 				'panel'	 			=> 'tvlgiao_wpdance_theme_layout',
 				'priority'    		=> 1,
 			));

			//add banner shop
			$wp_customize->add_setting('layout_banner_category', array(
				'default' => esc_url( get_template_directory_uri()."/images/banner-cat.jpg"),
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'layout_banner_category', array(
		    'label'    => esc_html__( 'Baner Category', 'wdjewelry' ),
		    'section'  => 'layout_section_category',
		    'settings' => 'layout_banner_category',
				) 
			));
			//layout shop 
			$wp_customize->add_setting('layout_category_product', array(
				'default'        	=> 'sidebar-right',
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'layout_category_product', array(
				'label'   			=> esc_html__('Layout','wdjewelry' ),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'layout_section_category',
				'settings' 			=> 'layout_category_product',
				'type'    			=> 'select',
				'choices' 			=> array(
									'fullwidth' => __("Full Width", 'wdjewelry'),
									'sidebar-left' => __("Left Sidebar", 'wdjewelry'),
									'sidebar-right' => __("Right Sidebar", 'wdjewelry')),
			));
			//Sidebar
			$wp_customize->add_setting('sidebar_category_product', array(
				'default'        	=> 'sidebar-1',
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'sidebar_category_product', array(
				'label'   			=> esc_html__('Sidebar','wdjewelry' ),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'layout_section_category',
				'settings' 			=> 'sidebar_category_product',
				'type'    			=> 'select',
				'choices' 			=> wdjewelry_get_list_sidebar(),
				));


			/************************Layout Tag Product**************************/
 			$wp_customize->add_section( 'layout_section_tag' , array(
 				'title'       		=> esc_html__( 'Tag Product', 'wdjewelry' ),
 				'description' 		=> esc_html__( 'Layout For Site', 'wdjewelry'),
 				'panel'	 			=> 'tvlgiao_wpdance_theme_layout',
 				'priority'    		=> 1,
 			));

			//add banner shop
			$wp_customize->add_setting('layout_banner_tag', array(
				'default' => esc_url( get_template_directory_uri()."/images/banner-cat.jpg"),
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'layout_banner_tag', array(
		    'label'    => esc_html__( 'Baner Shop', 'wdjewelry' ),
		    'section'  => 'layout_section_tag',
		    'settings' => 'layout_banner_tag',
				) 
			));
			//layout shop 
			$wp_customize->add_setting('layout_tag_product', array(
				'default'        	=> 'sidebar-right',
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'layout_tag_product', array(
				'label'   			=> esc_html__('Layout','wdjewelry'),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'layout_section_tag',
				'settings' 			=> 'layout_tag_product',
				'type'    			=> 'select',
				'choices' 			=> array(
									'fullwidth' => __("Full Width", 'wdjewelry'),
									'sidebar-left' => __("Left Sidebar", 'wdjewelry'),
									'sidebar-right' => __("Right Sidebar", 'wdjewelry')),
			));
			//Sidebar
			$wp_customize->add_setting('sidebar_tag_product', array(
				'default'        	=> 'sidebar-1',
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'sidebar_tag_product', array(
				'label'   			=> esc_html__('Left Sidebar','wdjewelry'),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'layout_section_tag',
				'settings' 			=> 'sidebar_tag_product',
				'type'    			=> 'select',
				'choices' 			=> wdjewelry_get_list_sidebar(),
				));

			/************************ADD lAYOUT SINGE PRODUCT*****************************/
 			$wp_customize->add_section( 'layout_section_singe' , array(
 				'title'       		=> esc_html__( 'SINGE Product', 'wdjewelry' ),
 				'description' 		=> esc_html__( 'Layout For Site', 'wdjewelry'),
 				'panel'	 			=> 'tvlgiao_wpdance_theme_layout',
 				'priority'    		=> 1,
 			));
			
			//layout
			$wp_customize->add_setting('layout_singe_product', array(
				'default'        	=> 'sidebar-right',
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'layout_singe_product', array(
				'label'   			=> esc_html__('Layout','wdjewelry' ),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'layout_section_singe',
				'settings' 			=> 'layout_singe_product',
				'type'    			=> 'select',
				'choices' 			=> array(
									'fullwidth' => __("Full Width", 'wdjewelry'),
									'sidebar-left' => __("Left Sidebar", 'wdjewelry'),
									'sidebar-right' => __("Right Sidebar", 'wdjewelry')),
			));
			//Sidebar
			$wp_customize->add_setting('sidebar_singe_product', array(
				'default'        	=> 'sidebar-1',
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'sidebar_singe_product', array(
				'label'   			=> esc_html__('Sidebar','wdjewelry'),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'layout_section_singe',
				'settings' 			=> 'sidebar_singe_product',
				'type'    			=> 'select',
				'choices' 			=> wdjewelry_get_list_sidebar(),
				));

			$wp_customize->add_setting('singe_product_check_measurement', array(
				'default'        	=> 'sidebar-1',
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'singe_product_check_measurement', array(
				'label'   			=> esc_html__('Show Measurement','wdjewelry'),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'layout_section_singe',
				'settings' 			=> 'singe_product_check_measurement',
				'type'    			=> 'checkbox',
				));

			$wp_customize->add_setting('singe_product_measurement', array(
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));

			$wp_customize->add_control( 'singe_product_measurement', array(
				'label'   			=> esc_html__('Content Measurement','wdjewelry' ),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'layout_section_singe',
				'settings' 			=> 'singe_product_measurement',
				'type'    			=> 'textarea',
				));

			$wp_customize->add_setting('singe_product_check_shipping', array(
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'singe_product_check_shipping', array(
				'label'   			=> esc_html__('Show Shipping & Return','wdjewelry' ),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'layout_section_singe',
				'settings' 			=> 'singe_product_check_shipping',
				'type'    			=> 'checkbox',
				));

			$wp_customize->add_setting('singe_product_shipping', array(
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));

			$wp_customize->add_control( 'singe_product_shipping', array(
				'label'   			=> esc_html__('Content Shipping & Return','wdjewelry' ),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'layout_section_singe',
				'settings' 			=> 'singe_product_shipping',
				'type'    			=> 'textarea',
				));

			$wp_customize->add_setting('singe_product_check_size_chart', array(
			
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'singe_product_check_size_chart', array(
				'label'   			=> esc_html__('Show Size Chart','wdjewelry' ),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'layout_section_singe',
				'settings' 			=> 'singe_product_check_size_chart',
				'type'    			=> 'checkbox',
				));

			$wp_customize->add_setting('singe_product_size_chart', array(
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));

			$wp_customize->add_control( 'singe_product_size_chart', array(
				'label'   			=> esc_html__('Content Size Chart','wdjewelry' ),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'layout_section_singe',
				'settings' 			=> 'singe_product_size_chart',
				'type'    			=> 'textarea',
				));
			/************************ADD lAYOUT SINGE *****************************/
			$wp_customize->add_section( 'layout_single_section' , array(
 				'title'       		=> esc_html__( 'Layout Singe', 'wdjewelry' ),
 				'description' 		=> esc_html__( 'Layout For Site', 'wdjewelry'),
 				'panel'	 			=> 'tvlgiao_wpdance_theme_layout',
 				'priority'    		=> 1,
 			));

			$wp_customize->add_setting('layout_single', array(
				'default'        	=> 'sidebar-right',
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'layout_single', array(
				'label'   			=> esc_html__('Layout Single','wdjewelry' ),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'layout_single_section',
				'settings' 			=> 'layout_single',
				'type'    			=> 'select',
				'choices' 			=> array(
									// 'default' => __("Default", 'wdjewelry'),
									'sidebar-left' => __("Left Sidebar", 'wdjewelry'),
									'sidebar-right' => __("Right Sidebar", 'wdjewelry'),
									'fullwidth' => __("Full Width", 'wdjewelry')),
				));
			//Sidebar
			$wp_customize->add_setting('sidebar_singe', array(
				'default'        	=> 'sidebar-1',
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'sidebar_singe', array(
				'label'   			=> esc_html__('Sidebar','wdjewelry' ),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'layout_single_section',
				'settings' 			=> 'sidebar_singe',
				'type'    			=> 'select',
				'choices' 			=> wdjewelry_get_list_sidebar(),
			));

			/************************ADD lAYOUT PAGE*****************************/
			$wp_customize->add_section( 'layout_page_section' , array(
 				'title'       		=> esc_html__( 'Layout Page Default', 'wdjewelry' ),
 				'description' 		=> esc_html__( 'Layout For Site', 'wdjewelry'),
 				'panel'	 			=> 'tvlgiao_wpdance_theme_layout',
 				'priority'    		=> 1,
 			));

			$wp_customize->add_setting('layout_page', array(
				'default'        	=> 'fullwidth',
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'layout_page', array(
				'label'   			=> esc_html__('Layout Page','wdjewelry'),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'layout_page_section',
				'settings' 			=> 'layout_page',
				'type'    			=> 'select',
				'choices' 			=> array(
									'sidebar-left' => __("Left Sidebar", 'wdjewelry'),
									'sidebar-right' => __("Right Sidebar", 'wdjewelry'),
									'fullwidth' => __("Full Width", 'wdjewelry')),
				));
			//Sidebar
			$wp_customize->add_setting('sidebar_page', array(
				'default'        	=> 'sidebar-1',
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'sidebar_page', array(
				'label'   			=> esc_html__('Sidebar','wdjewelry' ),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'layout_page_section',
				'settings' 			=> 'sidebar_page',
				'type'    			=> 'select',
				'choices' 			=> wdjewelry_get_list_sidebar(),
			));

			/************************ADD lAYOUT ARCHIVE *****************************/
			$wp_customize->add_section( 'layout_archive_section' , array(
 				'title'       		=> esc_html__( 'Layout Archive', 'wdjewelry' ),
 				'description' 		=> esc_html__( 'Layout For Site', 'wdjewelry'),
 				'panel'	 			=> 'tvlgiao_wpdance_theme_layout',
 				'priority'    		=> 1,
 			));

			$wp_customize->add_setting('layout_archive', array(
				'default'        	=> 'sidebar-right',
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'layout_archive', array(
				'label'   			=> esc_html__('Layout Archive','wdjewelry'),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'layout_archive_section',
				'settings' 			=> 'layout_archive',
				'type'    			=> 'select',
				'choices' 			=> array(
									'sidebar-left' => __("Left Sidebar", 'wdjewelry'),
									'sidebar-right' => __("Right Sidebar", 'wdjewelry'),
									'fullwidth' => __("Full Width", 'wdjewelry')),
				));
			//Sidebar
			$wp_customize->add_setting('sidebar_archive', array(
				'default'        	=> 'sidebar-1',
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'sidebar_archive', array(
				'label'   			=> esc_html__('Sidebar','wdjewelry'),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'layout_archive_section',
				'settings' 			=> 'sidebar_archive',
				'type'    			=> 'select',
				'choices' 			=> wdjewelry_get_list_sidebar(),
			));

			/************************ADD lAYOUT SEACH *****************************/
			$wp_customize->add_section( 'layout_seach_section' , array(
 				'title'       		=> esc_html__( 'Layout Seach', 'wdjewelry' ),
 				'description' 		=> esc_html__( 'Layout For Site', 'wdjewelry'),
 				'panel'	 			=> 'tvlgiao_wpdance_theme_layout',
 				'priority'    		=> 1,
 			));

			$wp_customize->add_setting('layout_seach', array(
				'default'        	=> 'sidebar-right',
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'layout_seach', array(
				'label'   			=> esc_html__('Layout Seach','wdjewelry' ),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'layout_seach_section',
				'settings' 			=> 'layout_seach',
				'type'    			=> 'select',
				'choices' 			=> array(
									'sidebar-left' => __("Sidebar", 'wdjewelry'),
									'sidebar-right' => __("Right Sidebar", 'wdjewelry'),
									'fullwidth' => __("Full Width", 'wdjewelry')),
				));
			//Sidebar
			$wp_customize->add_setting('sidebar_seach', array(
				'default'        	=> 'sidebar-1',
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'sidebar_seach', array(
				'label'   			=> esc_html__('Sidebar','wdjewelry'),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'layout_seach_section',
				'settings' 			=> 'sidebar_seach',
				'type'    			=> 'select',
				'choices' 			=> wdjewelry_get_list_sidebar(),
			));
			/************************ADD lAYOUT TEMPLATE FIRST*****************************/
			$wp_customize->add_section( 'layout_template_first_section' , array(
 				'title'       		=> esc_html__( 'Layout Template first', 'wdjewelry' ),
 				'description' 		=> esc_html__( 'Layout For Site', 'wdjewelry'),
 				'panel'	 			=> 'tvlgiao_wpdance_theme_layout',
 				'priority'    		=> 1,
 			));

			$wp_customize->add_setting('layout_template_first', array(
				'default'        	=> 'sidebar-right',
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'layout_template_first', array(
				'label'   			=> esc_html__('Layout Template First','wdjewelry'),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'layout_template_first_section',
				'settings' 			=> 'layout_template_first',
				'type'    			=> 'select',
				'choices' 			=> array(
									'sidebar-left' => __("Left Sidebar", 'wdjewelry'),
									'sidebar-right' => __("Right Sidebar", 'wdjewelry'),
									'fullwidth' => __("Full Width", 'wdjewelry')),
				));
			//Sidebar
			$wp_customize->add_setting('sidebar_template_first', array(
				'default'        	=> 'sidebar-1',
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'sidebar_template_first', array(
				'label'   			=> esc_html__('Sidebar','wdjewelry'),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'layout_template_first_section',
				'settings' 			=> 'sidebar_template_first',
				'type'    			=> 'select',
				'choices' 			=> wdjewelry_get_list_sidebar(),
			));

			/************************ADD lAYOUT TEMPLATE SECOND*****************************/
			$wp_customize->add_section( 'layout_template_second_section' , array(
 				'title'       		=> esc_html__( 'Layout Template Second', 'wdjewelry' ),
 				'description' 		=> esc_html__( 'Layout For Site', 'wdjewelry'),
 				'panel'	 			=> 'tvlgiao_wpdance_theme_layout',
 				'priority'    		=> 1,
 			));

			$wp_customize->add_setting('layout_template_second', array(
				'default'        	=> 'sidebar-right',
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'layout_template_second', array(
				'label'   			=> esc_html__('Layout Template Second','wdjewelry' ),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'layout_template_second_section',
				'settings' 			=> 'layout_template_second',
				'type'    			=> 'select',
				'choices' 			=> array(
									'sidebar-left' => __("Left Sidebar", 'wdjewelry'),
									'sidebar-right' => __("Right Sidebar", 'wdjewelry'),
									'fullwidth' => __("Full Width", 'wdjewelry')),
				));
			//Sidebar
			$wp_customize->add_setting('sidebar_template_second', array(
				'default'        	=> 'sidebar-1',
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'sidebar_template_second', array(
				'label'   			=> esc_html__('Sidebar','wdjewelry'),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'layout_template_second_section',
				'settings' 			=> 'sidebar_template_second',
				'type'    			=> 'select',
				'choices' 			=> wdjewelry_get_list_sidebar(),
			));
			/************************ADD lAYOUT TEMPLATE THIRD*****************************/
			$wp_customize->add_section( 'layout_template_third_section' , array(
 				'title'       		=> esc_html__( 'Layout Template Third', 'wdjewelry' ),
 				'description' 		=> esc_html__( 'Layout For Site', 'wdjewelry'),
 				'panel'	 			=> 'tvlgiao_wpdance_theme_layout',
 				'priority'    		=> 1,
 			));

			$wp_customize->add_setting('layout_template_third', array(
				'default'        	=> 'sidebar-right',
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'layout_template_third', array(
				'label'   			=> esc_html__('Layout Template Second','wdjewelry'),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'layout_template_third_section',
				'settings' 			=> 'layout_template_third',
				'type'    			=> 'select',
				'choices' 			=> array(
									'sidebar-left' => __("Left Sidebar", 'wdjewelry'),
									'sidebar-right' => __("Right Sidebar", 'wdjewelry'),
									'fullwidth' => __("Full Width", 'wdjewelry')),
				));
			//Sidebar
			$wp_customize->add_setting('sidebar_template_third', array(
				'default'        	=> 'sidebar-1',
				'sanitize_callback' => 'wdjewelry_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'sidebar_template_third', array(
				'label'   			=> esc_html__('Sidebar','wdjewelry' ),
				'description' 		=> esc_html__( '', 'wdjewelry'),
				'section'  			=> 'layout_template_third_section',
				'settings' 			=> 'sidebar_template_third',
				'type'    			=> 'select',
				'choices' 			=> wdjewelry_get_list_sidebar(),
			));
			
			/**************************** ADD 	*****************************************/
	}
}
add_action('customize_register','wdjewelry_customize_layout' );
?>
