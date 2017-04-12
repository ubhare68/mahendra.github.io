<?php 

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_Services_Section" );')
);

class Liwo_Services_Section extends DSLC_Module {
 		
 	// Module Attributes
    var $module_id = 'Liwo_Services_Section';
    var $module_title = 'Service 0';
    var $module_icon = 'cogs';
    var $module_category = 'Liwo - Block';


 	// Module Options
    function options() { 
    	global $ts_icon_hover;
		$post_choices = array();
		$post_choices[] = array(
			'label' => '-- Select service --',
			'value' => '',
		);
		$myposts = get_posts( 'post_type=service&posts_per_page=50' );
		foreach ( $myposts as $post ) :
			$post_choices[] = array(
				'label' => $post->post_title,
				'value' => $post->ID
			);
		endforeach; 
		wp_reset_postdata();
    	// The options array
    	$dslc_options = array(
			array(
				'label' => 'Service 0 - Services Post',
				'id' => 'services-post',
				'std' => '',
				'type' => 'select',
				'choices' => $post_choices,
				'section' => 'functionality',
			),
			array(
				'label' => __( 'Enable/Disable Button', 'dslc_string' ),
				'id' => 'button_switch',
				'std' => 'enabled',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Enabled', 'dslc_string' ),
						'value' => 'enabled'
					),
					array(
						'label' => __( 'Disabled', 'dslc_string' ),
						'value' => 'disabled'
					),
				),
				'section' => 'functionality',
			),
			array(
				'label' => 'Button Text',
				'id' => 'button_text',
				'std' => 'Read more',
				'type' => 'text',
				'section' => 'functionality'
			),
			array(
				'label' => 'Button Link',
				'id' => 'button_link',
				'std' => 'http://www.google.com',
				'type' => 'text',
				'section' => 'functionality'
			),
			array(
				'label' => __( 'Enable/Disable highlight', 'dslc_string' ),
				'id' => 'helight',
				'std' => 'disabled',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Enabled', 'dslc_string' ),
						'value' => 'enabled'
					),
					array(
						'label' => __( 'Disabled', 'dslc_string' ),
						'value' => 'disabled'
					),
				),
				'section' => 'functionality',
			),
			array(
				'label' => __( 'Icon Size', 'dslc_string' ),
				'id' => 'icon_custom_size',
				'std' => '5x',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Very Small', 'dslc_string' ),
						'value' => '1x'
					),
					array(
						'label' => __( 'Small', 'dslc_string' ),
						'value' => '2x'
					),
					array(
						'label' => __( 'Normal', 'dslc_string' ),
						'value' => '3x'
					),
					array(
						'label' => __( 'Large', 'dslc_string' ),
						'value' => '4x'
					),
					array(
						'label' => __( 'Very Large', 'dslc_string' ),
						'value' => '5x'
					),
				),
				'section' => 'functionality',
			),
			array(
				'label' => __( 'Enable/Disable Title', 'dslc_string' ),
				'id' => 'title_switch',
				'std' => 'enabled',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Enabled', 'dslc_string' ),
						'value' => 'enabled'
					),
					array(
						'label' => __( 'Disabled', 'dslc_string' ),
						'value' => 'disabled'
					),
				),
				'section' => 'functionality',
			),
			array(
				'label' => __( 'Enable/Disable Sub Title', 'dslc_string' ),
				'id' => 'sub_title_switch',
				'std' => 'enabled',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Enabled', 'dslc_string' ),
						'value' => 'enabled'
					),
					array(
						'label' => __( 'Disabled', 'dslc_string' ),
						'value' => 'disabled'
					),
				),
				'section' => 'functionality',
			),
			array(
				'label' => __( 'Enable/Disable Excerpt', 'dslc_string' ),
				'id' => 'excerpt_switch',
				'std' => 'enabled',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Enabled', 'dslc_string' ),
						'value' => 'enabled'
					),
					array(
						'label' => __( 'Disabled', 'dslc_string' ),
						'value' => 'disabled'
					),
				),
				'section' => 'functionality',
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_services',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Float', 'dslc_string' ),
				'id' => 'float_switch',
				'std' => 'none',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Left', 'dslc_string' ),
						'value' => 'left'
					),
					array(
						'label' => __( 'None', 'dslc_string' ),
						'value' => 'none'
					),array(
						'label' => __( 'Right', 'dslc_string' ),
						'value' => 'right'
					),
				),
				'affect_on_change_el' => '.single_services',
				'affect_on_change_rule' => 'float',
				'section' => 'functionality',
			),
			array(
				'label' => __( 'Service Width', 'dslc_string' ),
				'id' => 'width_service',
				'std' => '100',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_services',
				'affect_on_change_rule' => 'max-width',
				'section' => 'styling',
				'ext' => '%',
			),
			array(
				'label' => __( 'Text Align', 'dslc_string' ),
				'id' => 'css_main_text_align',
				'std' => 'center',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.single_services h2, .single_services p, .liwo-service-icon, .liwo-service-button',
				'affect_on_change_rule' => 'text-align',
				'section' => 'styling',
				'choices' => array(
					array(
						'label' => __( 'Left', 'dslc_string' ),
						'value' => 'left',
					),
					array(
						'label' => __( 'Center', 'dslc_string' ),
						'value' => 'center',
					),
					array(
						'label' => __( 'Right', 'dslc_string' ),
						'value' => 'right',
					),
				)
			),

			/*
			 * Style button
			*/
			// array(
			// 	'label' => __( ' Button Background Color', 'dslc_string' ),
			// 	'id' => 'button_css_color',
			// 	'std' => '#19A3EB',
			// 	'type' => 'color',
			// 	'refresh_on_change' => false,
			// 	'affect_on_change_el' => '.more1',
			// 	'affect_on_change_rule' => 'background-color',
			// 	'section' => 'styling',
			// 	'tab' => 'Button',
			// ),
			array(
				'label' => __( ' Text Color', 'dslc_string' ),
				'id' => 'buttom_icon_color',
				'std' => '#FFFFFF',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.more1',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => 'Button',
			),
			array(
				'label' => __( 'Font Size', 'dslc_string' ),
				'id' => 'button_css_font_size',
				'std' => '13',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.more1',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Button',
			),
			array(
				'label' => __( 'Margin Top', 'dslc_string' ),
				'id' => 'button_css_margin_top',
				'std' => '15',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.more1',
				'affect_on_change_rule' => 'margin-top',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Button',
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'button_css_margin_bottom',
				'std' => '30',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.more1',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Button',
			),
			array(
				'label' => __( 'Padding Top/Bottom', 'dslc_string' ),
				'id' => 'button_css_padding_top_bottom',
				'std' => '5',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.more1',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Button',
			),
			array(
				'label' => __( 'Padding Right/Left', 'dslc_string' ),
				'id' => 'button_css_padding_right_left',
				'std' => '15',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.more1',
				'affect_on_change_rule' => 'padding-right,padding-left',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Button',
			),
			array(
				'label' => __( 'Border Radius', 'dslc_string' ),
				'id' => 'button_css_border_radius',
				'std' => '5',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.more1',
				'affect_on_change_rule' => 'border-radius',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Button',
			),
			array(
				'label' => __( 'Display', 'dslc_string' ),
				'id' => 'button_css_display',
				'std' => 'inline-block',
				'type' => 'text',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.more1',
				'affect_on_change_rule' => 'display',
				'section' => 'styling',
				'visibility' => 'hidden',
				'tab' => 'Button',
			),

			array(
				'label' => __( ' Border Radius', 'dslc_string' ),
				'id' => 'icon_border-radius',
				'std' => '100',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-service-icon i',
				'affect_on_change_rule' => 'border-radius',
				'ext' => '%',
				'section' => 'styling',
				'tab' => 'Icon',
			),
			array(
				'label' => __( ' Font Size', 'dslc_string' ),
				'id' => 'icon_font-size',
				'std' => '80',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-service-icon i',
				'affect_on_change_rule' => 'font-size',
				'ext' => 'px',
				'section' => 'styling',
				'tab' => 'Icon',
			),
			// array(
			// 	'label' => __( ' Border Width', 'dslc_string' ),
			// 	'id' => 'icon_border_width',
			// 	'std' => '3',
			// 	'type' => 'slider',
			// 	'refresh_on_change' => false,
			// 	'affect_on_change_el' => '.liwo-service-icon i',
			// 	'affect_on_change_rule' => 'border-width',
			// 	'ext' => 'px',
			// 	'section' => 'styling',
			// 	'tab' => 'Icon',
			// ),
			// array(
			// 	'label' => __( ' Border Color', 'dslc_string' ),
			// 	'id' => 'icon_border_color',
			// 	'std' => '#19A3EB',
			// 	'type' => 'color',
			// 	'refresh_on_change' => false,
			// 	'affect_on_change_el' => '.liwo-service-icon i',
			// 	'affect_on_change_rule' => 'border-color',
			// 	'section' => 'styling',
			// 	'tab' => 'Icon',
			// ),
			// array(
			// 	'label' => __( ' Border Style', 'dslc_string' ),
			// 	'id' => 'icon_border_style',
			// 	'std' => 'solid',
			// 	'type' => 'select',
			// 	'refresh_on_change' => false,
			// 	'affect_on_change_el' => '.liwo-service-icon i',
			// 	'affect_on_change_rule' => 'border-style',
			// 	'section' => 'styling',
			// 	'choices' => array(
			// 		array(
			// 			'label' => __( 'Solid', 'dslc_string' ),
			// 			'value' => 'solid',
			// 		),
			// 		array(
			// 			'label' => __( 'Dotted', 'dslc_string' ),
			// 			'value' => 'dotted',
			// 		),
			// 		array(
			// 			'label' => __( 'Dash', 'dslc_string' ),
			// 			'value' => 'dash',
			// 		),
			// 		array(
			// 			'label' => __( 'Double', 'dslc_string' ),
			// 			'value' => 'double',
			// 		),
			// 		array(
			// 			'label' => __( 'Groove', 'dslc_string' ),
			// 			'value' => 'groove',
			// 		),
			// 		array(
			// 			'label' => __( 'Ridge', 'dslc_string' ),
			// 			'value' => 'ridge',
			// 		),
			// 		array(
			// 			'label' => __( 'Inset', 'dslc_string' ),
			// 			'value' => 'inset',
			// 		),
			// 		array(
			// 			'label' => __( 'Outset', 'dslc_string' ),
			// 			'value' => 'outset',
			// 		),
			// 		array(
			// 			'label' => __( 'Initial', 'dslc_string' ),
			// 			'value' => 'initial',
			// 		),
			// 		array(
			// 			'label' => __( 'None', 'dslc_string' ),
			// 			'value' => 'none',
			// 		),
			// 		array(
			// 			'label' => __( 'Hidden', 'dslc_string' ),
			// 			'value' => 'hidden',
			// 		),
			// 	),
			// 	'tab' => 'Icon',
			// ),
			array(
				'label' => __( ' Icon BG Color', 'dslc_string' ),
				'id' => 'css_icon_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.fa',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
			),
			// array(
			// 	'label' => __( ' Icon Color', 'dslc_string' ),
			// 	'id' => 'icon_style_color',
			// 	'std' => '#19A3EB',
			// 	'type' => 'color',
			// 	'refresh_on_change' => false,
			// 	'affect_on_change_el' => '.liwo-service-icon i',
			// 	'affect_on_change_rule' => 'color',
			// 	'section' => 'styling',
			// 	'tab' => 'Icon',
			// ),
			array(
				'label' => __( ' Icon Height', 'dslc_string' ),
				'id' => 'icon_style_height',
				'std' => '165',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-service-icon i',
				'affect_on_change_rule' => 'height',
				'ext' => 'px',
				'section' => 'styling',
				'tab' => 'Icon',
				'min' => 10,
				'max' => 300
			),
			array(
				'label' => __( ' Icon Width', 'dslc_string' ),
				'id' => 'icon_style_width',
				'std' => '165',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-service-icon i',
				'affect_on_change_rule' => 'width',
				'ext' => 'px',
				'section' => 'styling',
				'tab' => 'Icon',
				'min' => 10,
				'max' => 300
			),
			array(
				'label' => __( ' Line Height', 'dslc_string' ),
				'id' => 'icon_style_line_height',
				'std' => '160',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-service-icon i',
				'affect_on_change_rule' => 'line-height',
				'ext' => 'px',
				'section' => 'styling',
				'tab' => 'Icon',
				'min' => 10,
				'max' => 300
			),

			/*
			 * Sub title style
			*/
			array(
				'label' => __( ' Text Color', 'dslc_string' ),
				'id' => 'subtitle_title_text_color',
				'std' => '#272727',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_services h5',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => 'Sub Title',
			),
			array(
				'label' => __( 'Font Size', 'dslc_string' ),
				'id' => 'subtitle_title_font_size',
				'std' => '16',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_services h5',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Sub Title',
			),
			array(
				'label' => __( 'Line Height', 'dslc_string' ),
				'id' => 'subtitle_title_line_height',
				'std' => '22',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_services h5',
				'affect_on_change_rule' => 'line-height',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Sub Title',
			),
			array(
				'label' => __( 'Margin Top', 'dslc_string' ),
				'id' => 'subtitle_title_margin_top',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_services h5',
				'affect_on_change_rule' => 'margin-top',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Sub Title',
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'subtitle_title_margin_bottom',
				'std' => '18',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_services h5',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Sub Title',
			),
			array(
				'label' => __( 'Padding Bottom', 'dslc_string' ),
				'id' => 'subtitle_title_padding_bottom',
				'std' => '7',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_services h5',
				'affect_on_change_rule' => 'padding-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Sub Title',
			),
			array(
				'label' => __( 'Text Align', 'dslc_string' ),
				'id' => 'subtitle_title_text_align',
				'std' => 'center',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_services h5',
				'affect_on_change_rule' => 'text-align',
				'section' => 'styling',
				'choices' => array(
					array(
						'label' => __( 'Left', 'dslc_string' ),
						'value' => 'left',
					),
					array(
						'label' => __( 'Center', 'dslc_string' ),
						'value' => 'center',
					),
					array(
						'label' => __( 'Right', 'dslc_string' ),
						'value' => 'right',
					),
				),
				'tab' => 'Sub Title',
			),
			array(
				'label' => __( 'Border Bottom', 'dslc_string' ),
				'id' => 'subtitle_title_border_bottom',
				'std' => '1px solid #D4D4D4',
				'type' => 'text',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_services h5',
				'affect_on_change_rule' => 'border-bottom',
				'section' => 'styling',
				'visibility' => 'hidden',
				'tab' => 'Sub Title',
			),

			/*
			 * Responsive css_res_t
			*/
			array(
				'label' => __( 'Responsive', 'dslc_string' ),
				'id' => 'css_res_t',
				'std' => 'disabled',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Disabled', 'dslc_string' ),
						'value' => 'disabled'
					),
					array(
						'label' => __( 'Enabled', 'dslc_string' ),
						'value' => 'enabled'
					),
				),
				'section' => 'responsive',
				'tab' => 'tablet',
			),
			array(
				'label' => __( 'Width', 'dslc_string' ),
				'id' => 'css_res_t_width',
				'std' => '100',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_services',
				'affect_on_change_rule' => 'max-width',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => '%',
			),

			/*
			 * Responsive css_res_p
			*/
			array(
				'label' => __( 'Responsive', 'dslc_string' ),
				'id' => 'css_res_p',
				'std' => 'enabled',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Disabled', 'dslc_string' ),
						'value' => 'disabled'
					),
					array(
						'label' => __( 'Enabled', 'dslc_string' ),
						'value' => 'enabled'
					),
				),
				'section' => 'responsive',
				'tab' => 'phone',
			),
			array(
				'label' => __( 'Width', 'dslc_string' ),
				'id' => 'css_res_p_width',
				'std' => '100',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_services',
				'affect_on_change_rule' => 'max-width',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => '%',
			),

			/*
			 * Icon hover effects
			*/
			array(
				'label' => __( 'Icon Hover Style', 'dslc_string' ),
				'id' => 'css_icon_hover_class',
				'std' => '7',
				'type' => 'select',
				'choices' => $ts_icon_hover,
				'section' => 'styling',
				'tab' => 'Icon Hover',
			),
		);

		$dslc_options = array_merge( $dslc_options, $this->animation_options );
		
    	// Return the array
    	return apply_filters( 'dslc_module_options', $dslc_options, $this->module_id );

    }
 
 	// Module Output
    function output( $options ) {

    	global $dslc_active;
    	
		if ( $dslc_active && is_user_logged_in() && current_user_can( DS_LIVE_COMPOSER_CAPABILITY ) )
			$dslc_is_admin = true;
		else
			$dslc_is_admin = false;
		
		//REQUIRED
		$this->module_start( $options );
		
		$services_active = '';
		if ( $dslc_active )
			$services_active .= 'helight';
		
		
		/**
		 * Create column class for services
		*/
		
		?>

		<?php 
		if ($options['services-post']) {
			$services = get_post($options['services-post']);
		?>	
		    <div class="liwo fusection1 liwo_services single_services">
				<div class=" <?php if($options['helight']=='enabled'){ echo 'helight'; } ?>"> 
					<div class="liwo-service-icon">
						<div class="hi-icon-wrap hi-icon-effect-<?php echo $options['css_icon_hover_class']; ?> hi-icon-effect-<?php echo $options['css_icon_hover_class']; ?>a">
							<i class="fa <?php echo get_post_meta( $services->ID, "liwo_service_select_icon", true ); ?> fa-<?php echo $options['icon_custom_size']; ?>"></i>
						</div>
					</div>
					<?php if ($options['sub_title_switch']=='enabled'): ?>
			      		<h5><?php echo get_post_meta( $services->ID, "liwo_sub_title", true ); ?></h5>
			      	<?php endif ?>
			      	<div class="clearfix"></div>
			      	<?php if ($options['title_switch']=='enabled'): ?>
			      		<h2><?php echo $services->post_title; ?></h2>
			      	<?php endif ?>
			      	<?php if ($options['excerpt_switch']=='enabled'): ?>
			      		<p><?php echo $services->post_excerpt; ?></p>
			      	<?php endif ?>
			      	<?php if ($options['button_switch']=='enabled'): ?>
			      		<div class="liwo-service-button">
			      			<?php if ($options['button_link']): ?>
			      				<a href="<?php echo $options['button_link']; ?>" class="more1"><?php echo $options['button_text']; ?></a> 
			      			<?php else: ?>
			      				<a href="<?php echo get_post_meta( get_the_id(), "liwo_services_url", true ); ?>" class="more1"><?php echo $options['button_text']; ?></a> 
			      			<?php endif ?>
			      		</div>
			      	<?php endif ?>
			    </div>
	        </div>
	    	<?php wp_reset_postdata(); ?>
	    <?php } else { ?>
			<div class="dslc-notification dslc-red"><?php echo __( 'No data has been set yet, edit the module to set one.', 'themestudio' ); ?></div>
	    <?php } ?>
		<div class="clearfix"></div>
	<?php
    	// REQUIRED
    	$this->module_end( $options );

    }
 
}