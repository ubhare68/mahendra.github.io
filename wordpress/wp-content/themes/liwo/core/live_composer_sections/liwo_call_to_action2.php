<?php 

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_Call_To_Action_Block2" );')
);

class Liwo_Call_To_Action_Block2 extends DSLC_Module {
 		
 	// Module Attributes
    var $module_id = 'Liwo_Call_To_Action_Block2';
    var $module_title = 'Call To Action 2';
    var $module_icon = 'hand-right';
    var $module_category = 'Liwo - Misc';
 
 	// Module Options
    function options() {
    	global $ts_theme_color;
		global $ts_theme_color_hover;
    	// The options array
    	$dslc_options = array(
    		array(
				'label' => 'Call To Action 2 - Title 1',
				'id' => 'title1',
				'std' => 'Aktuelles Highlight:',
				'type' => 'text',
				'section' => 'functionality'
			),
			array(
				'label' => 'Title 2',
				'id' => 'title2',
				'std' => 'Mattis Commodo',
				'type' => 'text',
				'section' => 'functionality'
			),
			array(
				'label' => 'Content',
				'id' => 'content',
				'std' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit Suspendisse et justo Praesent mattis commodo Lorem ipsum dolor sit amet, consectetuer adipiscing elit Suspendisse et justo Praesent mattis commodo.',
				'type' => 'textarea',
				'section' => 'functionality'
			),
			array(
				'label' => 'Button Text 1',
				'id' => 'button_text_1',
				'std' => 'View All',
				'type' => 'text',
				'section' => 'functionality'
			),
			array(
				'label' => 'Button Text 2',
				'id' => 'button_text_2',
				'std' => 'Join Us',
				'type' => 'text',
				'section' => 'functionality'
			),
			array(
				'label' => 'Button Link 1',
				'id' => 'button_link_1',
				'std' => '#',
				'type' => 'text',
				'section' => 'functionality'
			),
			array(
				'label' => 'Button Link 2',
				'id' => 'button_link_2',
				'std' => '#',
				'type' => 'text',
				'section' => 'functionality'
			),

			array(
				'label' => __( 'Enable/Disable Title 1', 'dslc_string' ),
				'id' => 'custom_title_1',
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
				'section' => 'styling',
			),
			array(
				'label' => __( 'Enable/Disable Title 2', 'dslc_string' ),
				'id' => 'custom_title_2',
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
				'section' => 'styling',
			),
			array(
				'label' => __( 'Enable/Disable Content', 'dslc_string' ),
				'id' => 'custom_content',
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
				'section' => 'styling',
			),
			array(
				'label' => __( 'Enable/Disable Button 1', 'dslc_string' ),
				'id' => 'custom_button_1',
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
				'section' => 'styling',
			),
			array(
				'label' => __( 'Enable/Disable Button 2', 'dslc_string' ),
				'id' => 'custom_button_2',
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
				'section' => 'styling',
			),
			array(
				'label' => __( 'Width', 'dslc_string' ),
				'id' => 'width_ctat',
				'std' => '100',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo.fusection5 .left',
				'affect_on_change_rule' => 'width',
				'section' => 'styling',
				'ext' => '%',
			),
			array(
				'label' => __( 'Padding', 'dslc_string' ),
				'id' => 'padding_ctat',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo.fusection5',
				'affect_on_change_rule' => 'padding',
				'section' => 'styling',
				'ext' => 'px',
			),

			/*
			 * Button 1
			*/
			array(
				'label' => __( ' Background Color', 'dslc_string' ),
				'id' => 'button1_css_bg_color',
				'std' => $ts_theme_color,
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ts_cta_button1',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab' => 'Button 1',
			),
			array(
				'label' => __( ' Background Color Hover', 'dslc_string' ),
				'id' => 'button1_css_color',
				'std' => $ts_theme_color_hover,
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ts_cta_button1:hover',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab' => 'Button 1',
			),
			array(
				'label' => __( ' Text Color', 'dslc_string' ),
				'id' => 'buttom1_css_color',
				'std' => '#FFFFFF',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ts_cta_button1',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => 'Button 1',
			),
			array(
				'label' => __( 'Font Size', 'dslc_string' ),
				'id' => 'button1_css_font_size',
				'std' => '18',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ts_cta_button1',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Button 1',
			),
			array(
				'label' => __( 'Margin Top', 'dslc_string' ),
				'id' => 'button1_css_margin_top',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ts_cta_button1',
				'affect_on_change_rule' => 'margin-top',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Button 1',
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'button1_css_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ts_cta_button1',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Button 1',
			),
			array(
				'label' => __( 'Padding Top/Bottom', 'dslc_string' ),
				'id' => 'button1_css_padding_top_bottom',
				'std' => '13',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ts_cta_button1',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Button 1',
			),
			array(
				'label' => __( 'Padding Right/Left', 'dslc_string' ),
				'id' => 'button1_css_padding_right_left',
				'std' => '57',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ts_cta_button1',
				'affect_on_change_rule' => 'padding-right,padding-left',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Button 1',
			),
			array(
				'label' => __( 'Border Radius', 'dslc_string' ),
				'id' => 'button1_css_border_radius',
				'std' => '4',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ts_cta_button1',
				'affect_on_change_rule' => 'border-radius',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Button 1',
			),
			array(
				'label' => __( 'Float', 'dslc_string' ),
				'id' => 'button1_css_float',
				'std' => 'left',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ts_cta_button1',
				'affect_on_change_rule' => 'float',
				'section' => 'styling',
				'choices' => array(
					array(
						'label' => __( 'Left', 'dslc_string' ),
						'value' => 'left',
					),
					array(
						'label' => __( 'None', 'dslc_string' ),
						'value' => 'none',
					),
					array(
						'label' => __( 'Right', 'dslc_string' ),
						'value' => 'right',
					),
				),
				'tab' => 'Button 1',
			),
			array(
				'label' => __( 'Text Align', 'dslc_string' ),
				'id' => 'button1_css_text_align',
				'std' => 'center',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ts_cta_button1',
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
				'tab' => 'Button 1',
			),


			/*
			 * Button 2
			*/
			array(
				'label' => __( ' Background Color', 'dslc_string' ),
				'id' => 'button2_css_bg_color',
				'std' => '#FFFFFF',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ts_cta_button2',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab' => 'Button 2',
			),
			array(
				'label' => __( ' Background Color Hover', 'dslc_string' ),
				'id' => 'button2_css_color',
				'std' => '#EEEEEE',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ts_cta_button2:hover',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab' => 'Button 2',
			),
			array(
				'label' => __( ' Text Color', 'dslc_string' ),
				'id' => 'buttom2_css_color',
				'std' => '#393939',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ts_cta_button2',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => 'Button 2',
			),
			array(
				'label' => __( 'Font Size', 'dslc_string' ),
				'id' => 'button2_css_font_size',
				'std' => '18',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ts_cta_button2',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Button 2',
			),
			array(
				'label' => __( 'Margin Top', 'dslc_string' ),
				'id' => 'button2_css_margin_top',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ts_cta_button2',
				'affect_on_change_rule' => 'margin-top',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Button 2',
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'button2_css_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ts_cta_button2',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Button 2',
			),
			array(
				'label' => __( 'Padding Top/Bottom', 'dslc_string' ),
				'id' => 'button2_css_padding_top_bottom',
				'std' => '13',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ts_cta_button2',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Button 2',
			),
			array(
				'label' => __( 'Padding Right/Left', 'dslc_string' ),
				'id' => 'button2_css_padding_right_left',
				'std' => '57',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ts_cta_button2',
				'affect_on_change_rule' => 'padding-right,padding-left',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Button 2',
			),
			array(
				'label' => __( 'Border Radius', 'dslc_string' ),
				'id' => 'button2_css_border_radius',
				'std' => '4',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ts_cta_button2',
				'affect_on_change_rule' => 'border-radius',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Button 2',
			),
			array(
				'label' => __( 'Float', 'dslc_string' ),
				'id' => 'button2_css_float',
				'std' => 'left',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ts_cta_button2',
				'affect_on_change_rule' => 'float',
				'section' => 'styling',
				'choices' => array(
					array(
						'label' => __( 'Left', 'dslc_string' ),
						'value' => 'left',
					),
					array(
						'label' => __( 'None', 'dslc_string' ),
						'value' => 'none',
					),
					array(
						'label' => __( 'Right', 'dslc_string' ),
						'value' => 'right',
					),
				),
				'tab' => 'Button 2',
			),
			array(
				'label' => __( 'Text Align', 'dslc_string' ),
				'id' => 'button2_css_text_align',
				'std' => 'center',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ts_cta_button2',
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
				'tab' => 'Button 2',
			),

			/*
			 * Responsive css_res_t
			*/
			array(
				'label' => __( 'Responsive', 'dslc_string' ),
				'id' => 'css_res_t',
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
				'tab' => 'tablet',
			),
			array(
				'label' => __( ' Button 1 padding', 'dslc_string' ),
				'id' => 'css_res_t_margin_left',
				'std' => '40',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ts_cta_button1',
				'affect_on_change_rule' => 'padding-right,padding-left',
				'ext' => 'px',
				'section' => 'responsive',
				'tab' => 'tablet',
			),
			array(
				'label' => __( ' Button 2 padding', 'dslc_string' ),
				'id' => 'css_res_t_margin_left',
				'std' => '40',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ts_cta_button2',
				'affect_on_change_rule' => 'padding-right,padding-left',
				'ext' => 'px',
				'section' => 'responsive',
				'tab' => 'tablet',
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
				'label' => __( ' Button 1 padding', 'dslc_string' ),
				'id' => 'css_res_p_margin_top',
				'std' => '35',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ts_cta_button1',
				'affect_on_change_rule' => 'padding-right,padding-left',
				'ext' => 'px',
				'section' => 'responsive',
				'tab' => 'phone',
			),
			array(
				'label' => __( ' Button 2 padding', 'dslc_string' ),
				'id' => 'css_res_p_margin_top',
				'std' => '35',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ts_cta_button2',
				'affect_on_change_rule' => 'padding-right,padding-left',
				'ext' => 'px',
				'section' => 'responsive',
				'tab' => 'phone',
			),
		);

		$dslc_options = array_merge( $dslc_options, $this->animation_options );
		
    	// Return the array
    	return apply_filters( 'dslc_module_options', $dslc_options, $this->module_id );

    }
 
 	// Module Output
    function output( $options ) {

    	global $dslc_active;
    	global $ts_theme_color;
    	global $ts_theme_color_hover;
    	
		if ( $dslc_active && is_user_logged_in() && current_user_can( DS_LIVE_COMPOSER_CAPABILITY ) )
			$dslc_is_admin = true;
		else
			$dslc_is_admin = false;
		
		//REQUIRED
		$this->module_start( $options );

	?>
		
		<div class="liwo fusection5">
	      	<div class="left"> 
	      		<?php if ($options['custom_title_1']=='enabled'): ?>
	      			<b><?php echo $options['title1']; ?></b> 
	      		<?php endif ?>

	      		<?php if ($options['custom_title_2']=='enabled'): ?>
	      			<strong><?php echo $options['title2']; ?></strong>	
	      		<?php endif ?>
	      		
	      		<?php if ($options['custom_content']=='enabled'): ?>
	        		<p><?php echo $options['content']; ?></p>
	      		<?php endif ?>
	      			
	        	<br>
	        	<br>
	        	<?php if ($options['custom_button_1']=='enabled'): ?>
	        		<a class="one ts_cta_button1" href="<?php echo $options['button_link_1']; ?>"><?php echo $options['button_text_1']; ?></a> 
	        	<?php endif ?>
	        	
	        	<?php if ($options['custom_button_2']=='enabled'): ?>
	        		<a class="two ts_cta_button2" href="<?php echo $options['button_link_2']; ?>"><?php echo $options['button_text_2']; ?></a> 
	        	<?php endif ?>
	        </div>
	      	<!-- end left -->
		</div>
		
	<?php
    	// REQUIRED
    	$this->module_end( $options );

    }
 
}