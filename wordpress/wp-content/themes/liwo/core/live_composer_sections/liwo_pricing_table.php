<?php 

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_Pricing_Table" );')
);

class Liwo_Pricing_Table extends DSLC_Module {
 		
 	// Module Attributes
    var $module_id = 'Liwo_Pricing_Table';
    var $module_title = 'Pricing Table';
    var $module_icon = 'dollar';
    var $module_category = 'Liwo - Elements';
 
 	// Module Options
    function options() { 
				
    	// The options array
    	$dslc_options = array(
			array(
				'label' => 'Columns Pricing Table',
				'id' => 'columns',
				'std' => '4',
				'type' => 'select',
				'section' => 'styling',
				'choices' => array(
					array(
						'label' => '3 Columns',
						'value' => '3'
					),
					array(
						'label' => '4 Columns',
						'value' => '4'
					),
				)
			),
			array(
				'label' => 'Price per month/year',
				'id' => 'price_per',
				'std' => 'per month',
				'type' => 'text',
				'section' => 'styling',
			),
			array(
				'label' => 'Price Type',
				'id' => 'price_before_affter',
				'std' => '1',
				'type' => 'select',
				'section' => 'styling',
				'choices' => array(
					array(
						'label' => 'Before',
						'value' => '1'
					),
					array(
						'label' => 'Affter',
						'value' => '2'
					),
				)
			),

			/*
			 * Column 1
			*/
			array(
				'label' => 'Title',
				'id' => 'title1',
				'std' => 'Economy',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 1',
			),
			array(
				'label' => 'Content',
				'id' => 'content1',
				'std' => '
						Unlimited Bandwidth
						100 Space
						10 Databases
						Free Ad Credits
						One Free Domains
						24/7 Unlimited Support
						100 Email Addresses',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 1',
			),
			array(
				'label' => 'Currency',
				'id' => 'currency1',
				'std' => '$',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 1',
			),
			array(
				'label' => 'Price',
				'id' => 'price1',
				'std' => '3.99',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 1',
			),
			array(
				'label' => 'Button Text',
				'id' => 'buttontext1',
				'std' => 'Order Now',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 1',
			),
			array(
				'label' => 'Button Link URL',
				'id' => 'button_link1',
				'std' => '#',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 1',
			),
			array(
				'label' => 'Highlights',
				'id' => 'highlights1',
				'std' => '0',
				'type' => 'select',
				'section' => 'styling',
				'tab'		=> 'Column 1',
				'choices' => array(
					array(
						'label' => 'No',
						'value' => '0'
					),
					array(
						'label' => 'Yes',
						'value' => '1'
					),
				)
			),
			
		    /*
		    * Column 1 Style Buttom
		    */
		    array(
				'label' => __( ' Background Color', 'dslc_string' ),
				'id' => 'css_button1_bg_color',
				'std' => '#666666',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_1',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab'		=> 'Column 1',
			),
		    array(
				'label' => __( ' Background Color Hover', 'dslc_string' ),
				'id' => 'css_button1_bg_color_hover',
				'std' => '#727272',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_1:hover',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab'		=> 'Column 1',
			),
			array(
				'label' => __( ' Color', 'dslc_string' ),
				'id' => 'css_button1_color',
				'std' => '#FFFFFF',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_1',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab'		=> 'Column 1',
			),
			array(
				'label' => __( 'Border Radius', 'dslc_string' ),
				'id' => 'css_button1_border-radius',
				'std' => '3',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_1',
				'affect_on_change_rule' => 'border-radius',
				'section' => 'styling',
				'tab'		=> 'Column 1',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Border Width', 'dslc_string' ),
				'id' => 'css_button1_border-width',
				'std' => '1',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_1',
				'affect_on_change_rule' => 'border-width',
				'section' => 'styling',
				'tab'		=> 'Column 1',
				'ext' => 'px',
			),
			array(
				'label' => __( ' Border Color', 'dslc_string' ),
				'id' => 'css_button1_border_color',
				'std' => '#454545',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_1',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
				'tab' => 'Column 1',
			),
			array(
				'label' => __( ' Border Style', 'dslc_string' ),
				'id' => 'css_button1_border_style',
				'std' => 'solid',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_1',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
				'choices' => array(
					array(
						'label' => __( 'solid', 'dslc_string' ),
						'value' => 'solid',
					),
					array(
						'label' => __( 'dotted', 'dslc_string' ),
						'value' => 'dotted',
					),
					array(
						'label' => __( 'dashed', 'dslc_string' ),
						'value' => 'dashed',
					),
					array(
						'label' => __( 'double', 'dslc_string' ),
						'value' => 'double',
					),
					array(
						'label' => __( 'groove', 'dslc_string' ),
						'value' => 'groove',
					),
					array(
						'label' => __( 'ridge', 'dslc_string' ),
						'value' => 'ridge',
					),
					array(
						'label' => __( 'inset', 'dslc_string' ),
						'value' => 'inset',
					),
					array(
						'label' => __( 'outset', 'dslc_string' ),
						'value' => 'outset',
					),
					array(
						'label' => __( 'none', 'dslc_string' ),
						'value' => 'none',
					),
				),
				'tab' => 'Column 1',
			),
			array(
				'label' => __( 'Padding Top/Bottom', 'dslc_string' ),
				'id' => 'css_button1_padding_top_bottom',
				'std' => '10',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_1',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'styling',
				'tab'		=> 'Column 1',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Padding Right/Left', 'dslc_string' ),
				'id' => 'css_button1_padding_right_left',
				'std' => '18',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_1',
				'affect_on_change_rule' => 'padding-right,padding-left',
				'section' => 'styling',
				'tab'		=> 'Column 1',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Font Size', 'dslc_string' ),
				'id' => 'css_button1_font-size',
				'std' => '',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_1',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'tab'		=> 'Column 1',
				'min' => 8,
				'max' => 72,
				'ext' => 'px',
			),
			array(
				'label' => __( 'Font Family', 'dslc_string' ),
				'id' => 'css_button1_font_family',
				'std' => 'Open Sans',
				'type' => 'font',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_1',
				'affect_on_change_rule' => 'font-family',
				'section' => 'styling',
				'tab' => 'Column 1',
			),
			array(
				'label' => __( 'Font Weight', 'dslc_string' ),
				'id' => 'css_button1_font_weight',
				'std' => '400',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_1',
				'affect_on_change_rule' => 'font-weight',
				'section' => 'styling',
				'tab' => 'Column 1',
				'ext' => '',
				'min' => 100,
				'max' => 900,
				'increment' => 100
			),
			array(
				'label' => __( ' Border Style', 'dslc_string' ),
				'id' => 'css_button1_border_style',
				'std' => 'normal',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_1',
				'affect_on_change_rule' => 'font-style',
				'section' => 'styling',
				'choices' => array(
					array(
						'label' => __( 'normal', 'dslc_string' ),
						'value' => 'normal',
					),
					array(
						'label' => __( 'italic', 'dslc_string' ),
						'value' => 'italic',
					),
					array(
						'label' => __( 'oblique', 'dslc_string' ),
						'value' => 'oblique',
					),
				),
				'tab' => 'Column 1',
			),

			array(
				'label' => __( 'Highligh Width', 'dslc_string' ),
				'id' => 'css_button_width',
				'std' => '27',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.pricing-tables-helight',
				'affect_on_change_rule' => 'width',
				'section' => 'styling',
				'ext' => '%',
				'increment' =>'0.1'
			),

			/*
			 * Column 2
			*/
			array(
				'label' => 'Title',
				'id' => 'title2',
				'std' => 'Standard',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 2',
			),
			array(
				'label' => 'Content',
				'id' => 'content2',
				'std' => 'Unlimited Bandwidth
							Unlimited Space
							100 Databases
							Free Ad Credits
							2 Free Domains
							24/7 Unlimited Support
							1000 Email Addresses',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 2',
			),
			array(
				'label' => 'Currency',
				'id' => 'currency2',
				'std' => '$',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 2',
			),
			array(
				'label' => 'Price',
				'id' => 'price2',
				'std' => '9.99',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 2',
			),
			array(
				'label' => 'Button Text',
				'id' => 'buttontext2',
				'std' => 'Order Now',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 2',
			),
			array(
				'label' => 'Button Link URL',
				'id' => 'button_link2',
				'std' => '#',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 2',
			),
			array(
				'label' => 'Highlights',
				'id' => 'highlights2',
				'std' => '1',
				'type' => 'select',
				'section' => 'styling',
				'tab'		=> 'Column 2',
				'choices' => array(
					array(
						'label' => 'No',
						'value' => '0'
					),
					array(
						'label' => 'Yes',
						'value' => '1'
					),
				)
			),

			/*
		    * Column 2 Style Buttom
		    */
		    array(
				'label' => __( ' Background Color', 'dslc_string' ),
				'id' => 'css_button2_bg_color',
				'std' => '#19A3EB',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_2',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab'		=> 'Column 2',
			),

		    array(
				'label' => __( ' Background Color Hover', 'dslc_string' ),
				'id' => 'css_button2_bg_color_hover',
				'std' => '#272727',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_2:hover',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab'		=> 'Column 2',
			),
			array(
				'label' => __( ' Color', 'dslc_string' ),
				'id' => 'css_button2_color',
				'std' => '#FFFFFF',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_2',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab'		=> 'Column 2',
			),
			array(
				'label' => __( 'Border Radius', 'dslc_string' ),
				'id' => 'css_button2_border-radius',
				'std' => '3',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_2',
				'affect_on_change_rule' => 'border-radius',
				'section' => 'styling',
				'tab'		=> 'Column 2',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Border Width', 'dslc_string' ),
				'id' => 'css_button2_border-width',
				'std' => '1',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_2',
				'affect_on_change_rule' => 'border-width',
				'section' => 'styling',
				'tab'		=> 'Column 2',
				'ext' => 'px',
			),
			array(
				'label' => __( ' Border Color', 'dslc_string' ),
				'id' => 'css_button2_border_color',
				'std' => '#FFFFFF',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_2',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
				'tab' => 'Column 2',
			),
			array(
				'label' => __( ' Border Style', 'dslc_string' ),
				'id' => 'css_button2_border_style',
				'std' => 'solid',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_2',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
				'choices' => array(
					array(
						'label' => __( 'solid', 'dslc_string' ),
						'value' => 'solid',
					),
					array(
						'label' => __( 'dotted', 'dslc_string' ),
						'value' => 'dotted',
					),
					array(
						'label' => __( 'dashed', 'dslc_string' ),
						'value' => 'dashed',
					),
					array(
						'label' => __( 'double', 'dslc_string' ),
						'value' => 'double',
					),
					array(
						'label' => __( 'groove', 'dslc_string' ),
						'value' => 'groove',
					),
					array(
						'label' => __( 'ridge', 'dslc_string' ),
						'value' => 'ridge',
					),
					array(
						'label' => __( 'inset', 'dslc_string' ),
						'value' => 'inset',
					),
					array(
						'label' => __( 'outset', 'dslc_string' ),
						'value' => 'outset',
					),
					array(
						'label' => __( 'none', 'dslc_string' ),
						'value' => 'none',
					),
				),
				'tab' => 'Column 2',
			),
			array(
				'label' => __( 'Padding Top/Bottom', 'dslc_string' ),
				'id' => 'css_button2_padding_top_bottom',
				'std' => '10',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_2',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'styling',
				'tab'		=> 'Column 2',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Padding Right/Left', 'dslc_string' ),
				'id' => 'css_button2_padding_right_left',
				'std' => '18',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_2',
				'affect_on_change_rule' => 'padding-right,padding-left',
				'section' => 'styling',
				'tab'		=> 'Column 2',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Font Size', 'dslc_string' ),
				'id' => 'css_button2_font-size',
				'std' => '',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_2',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'tab'		=> 'Column 2',
				'min' => 8,
				'max' => 72,
				'ext' => 'px',
			),
			array(
				'label' => __( 'Font Family', 'dslc_string' ),
				'id' => 'css_button2_font_family',
				'std' => 'Open Sans',
				'type' => 'font',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_2',
				'affect_on_change_rule' => 'font-family',
				'section' => 'styling',
				'tab' => 'Column 2',
			),
			array(
				'label' => __( 'Font Weight', 'dslc_string' ),
				'id' => 'css_button2_font_weight',
				'std' => '400',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_2',
				'affect_on_change_rule' => 'font-weight',
				'section' => 'styling',
				'tab' => 'Column 2',
				'ext' => '',
				'min' => 100,
				'max' => 900,
				'increment' => 100
			),
			array(
				'label' => __( ' Border Style', 'dslc_string' ),
				'id' => 'css_button2_border_style',
				'std' => 'normal',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_2',
				'affect_on_change_rule' => 'font-style',
				'section' => 'styling',
				'choices' => array(
					array(
						'label' => __( 'normal', 'dslc_string' ),
						'value' => 'normal',
					),
					array(
						'label' => __( 'italic', 'dslc_string' ),
						'value' => 'italic',
					),
					array(
						'label' => __( 'oblique', 'dslc_string' ),
						'value' => 'oblique',
					),
				),
				'tab' => 'Column 2',
			),

			/*
			 * Column 3
			*/
			array(
				'label' => 'Title',
				'id' => 'title3',
				'std' => 'Professional',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 3',
			),
			array(
				'label' => 'Content',
				'id' => 'content3',
				'std' => 'Unlimited Bandwidth
							Unlimited Space
							1000 Databases
							Free Ad Credits
							5 Free Domains
							24/7 Unlimited Support
							Unlimited Email Addresses',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 3',
			),
			array(
				'label' => 'Currency',
				'id' => 'currency3',
				'std' => '$',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 3',
			),
			array(
				'label' => 'Price',
				'id' => 'price3',
				'std' => '18.99',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 3',
			),
			array(
				'label' => 'Button Text',
				'id' => 'buttontext3',
				'std' => 'Order Now',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 3',
			),
			array(
				'label' => 'Button Link URL',
				'id' => 'button_link3',
				'std' => '#',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 3',
			),
			array(
				'label' => 'Highlights',
				'id' => 'highlights3',
				'std' => '0',
				'type' => 'select',
				'section' => 'styling',
				'tab'		=> 'Column 3',
				'choices' => array(
					array(
						'label' => 'No',
						'value' => '0'
					),
					array(
						'label' => 'Yes',
						'value' => '1'
					),
				)
			),

			/*
		    * Column 3 Style Buttom
		    */
		    array(
				'label' => __( ' Background Color', 'dslc_string' ),
				'id' => 'css_button3_bg_color',
				'std' => '#666666',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_3',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab'		=> 'Column 3',
			),
		    array(
				'label' => __( ' Background Color Hover', 'dslc_string' ),
				'id' => 'css_button3_bg_color_hover',
				'std' => '#727272',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_3:hover',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab'		=> 'Column 3',
			),
			array(
				'label' => __( ' Color', 'dslc_string' ),
				'id' => 'css_button3_color',
				'std' => '#FFFFFF',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_3',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab'		=> 'Column 3',
			),
			array(
				'label' => __( 'Border Radius', 'dslc_string' ),
				'id' => 'css_button3_border-radius',
				'std' => '3',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_3',
				'affect_on_change_rule' => 'border-radius',
				'section' => 'styling',
				'tab'		=> 'Column 3',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Border Width', 'dslc_string' ),
				'id' => 'css_button3_border-width',
				'std' => '1',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_3',
				'affect_on_change_rule' => 'border-width',
				'section' => 'styling',
				'tab'		=> 'Column 3',
				'ext' => 'px',
			),
			array(
				'label' => __( ' Border Color', 'dslc_string' ),
				'id' => 'css_button3_border_color',
				'std' => '#454545',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_3',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
				'tab' => 'Column 3',
			),
			array(
				'label' => __( ' Border Style', 'dslc_string' ),
				'id' => 'css_button3_border_style',
				'std' => 'solid',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_3',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
				'choices' => array(
					array(
						'label' => __( 'solid', 'dslc_string' ),
						'value' => 'solid',
					),
					array(
						'label' => __( 'dotted', 'dslc_string' ),
						'value' => 'dotted',
					),
					array(
						'label' => __( 'dashed', 'dslc_string' ),
						'value' => 'dashed',
					),
					array(
						'label' => __( 'double', 'dslc_string' ),
						'value' => 'double',
					),
					array(
						'label' => __( 'groove', 'dslc_string' ),
						'value' => 'groove',
					),
					array(
						'label' => __( 'ridge', 'dslc_string' ),
						'value' => 'ridge',
					),
					array(
						'label' => __( 'inset', 'dslc_string' ),
						'value' => 'inset',
					),
					array(
						'label' => __( 'outset', 'dslc_string' ),
						'value' => 'outset',
					),
					array(
						'label' => __( 'none', 'dslc_string' ),
						'value' => 'none',
					),
				),
				'tab' => 'Column 3',
			),
			array(
				'label' => __( 'Padding Top/Bottom', 'dslc_string' ),
				'id' => 'css_button3_padding_top_bottom',
				'std' => '10',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_3',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'styling',
				'tab'		=> 'Column 3',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Padding Right/Left', 'dslc_string' ),
				'id' => 'css_button3_padding_right_left',
				'std' => '18',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_3',
				'affect_on_change_rule' => 'padding-right,padding-left',
				'section' => 'styling',
				'tab'		=> 'Column 3',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Font Size', 'dslc_string' ),
				'id' => 'css_button3_font-size',
				'std' => '',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_3',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'tab'		=> 'Column 3',
				'min' => 8,
				'max' => 72,
				'ext' => 'px',
			),
			array(
				'label' => __( 'Font Family', 'dslc_string' ),
				'id' => 'css_button3_font_family',
				'std' => 'Open Sans',
				'type' => 'font',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_3',
				'affect_on_change_rule' => 'font-family',
				'section' => 'styling',
				'tab' => 'Column 3',
			),
			array(
				'label' => __( 'Font Weight', 'dslc_string' ),
				'id' => 'css_button3_font_weight',
				'std' => '400',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_3',
				'affect_on_change_rule' => 'font-weight',
				'section' => 'styling',
				'tab' => 'Column 3',
				'ext' => '',
				'min' => 100,
				'max' => 900,
				'increment' => 100
			),
			array(
				'label' => __( ' Border Style', 'dslc_string' ),
				'id' => 'css_button3_border_style',
				'std' => 'normal',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_3',
				'affect_on_change_rule' => 'font-style',
				'section' => 'styling',
				'choices' => array(
					array(
						'label' => __( 'normal', 'dslc_string' ),
						'value' => 'normal',
					),
					array(
						'label' => __( 'italic', 'dslc_string' ),
						'value' => 'italic',
					),
					array(
						'label' => __( 'oblique', 'dslc_string' ),
						'value' => 'oblique',
					),
				),
				'tab' => 'Column 3',
			),

			/*
			 * Column 4
			*/
			array(
				'label' => 'Title',
				'id' => 'title4',
				'std' => 'Ultimate',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 4',
			),
			array(
				'label' => 'Content',
				'id' => 'content4',
				'std' => 'Unlimited Bandwidth
							Unlimited Space
							Unlimited Databases
							Free Ad Credits
							10 Free Domains
							24/7 Unlimited Support
							Unlimited Email Addresses',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 4',
			),
			array(
				'label' => 'Currency',
				'id' => 'currency4',
				'std' => '$',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 4',
			),
			array(
				'label' => 'Price',
				'id' => 'price4',
				'std' => '60.99',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 4',
			),
			array(
				'label' => 'Button Text',
				'id' => 'buttontext4',
				'std' => 'Order Now',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 4',
			),
			array(
				'label' => 'Button Link URL',
				'id' => 'button_link4',
				'std' => '#',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 4',
			),
			array(
				'label' => 'Highlights',
				'id' => 'highlights4',
				'std' => '0',
				'type' => 'select',
				'section' => 'styling',
				'tab'		=> 'Column 4',
				'choices' => array(
					array(
						'label' => 'No',
						'value' => '0'
					),
					array(
						'label' => 'Yes',
						'value' => '1'
					),
				)
			),

			/*
		    * Column 4 Style Buttom
		    */
		    array(
				'label' => __( ' Background Color', 'dslc_string' ),
				'id' => 'css_button4_bg_color',
				'std' => '#666666',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_4',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab'		=> 'Column 4',
			),
		    array(
				'label' => __( ' Background Color Hover', 'dslc_string' ),
				'id' => 'css_button4_bg_color_hover',
				'std' => '#727272',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_4:hover',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab'		=> 'Column 4',
			),
			array(
				'label' => __( ' Color', 'dslc_string' ),
				'id' => 'css_button4_color',
				'std' => '#FFFFFF',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_4',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab'		=> 'Column 4',
			),
			array(
				'label' => __( 'Border Radius', 'dslc_string' ),
				'id' => 'css_button4_border-radius',
				'std' => '3',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_4',
				'affect_on_change_rule' => 'border-radius',
				'section' => 'styling',
				'tab'		=> 'Column 4',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Border Width', 'dslc_string' ),
				'id' => 'css_button4_border-width',
				'std' => '1',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_4',
				'affect_on_change_rule' => 'border-width',
				'section' => 'styling',
				'tab'		=> 'Column 4',
				'ext' => 'px',
			),
			array(
				'label' => __( ' Border Color', 'dslc_string' ),
				'id' => 'css_button4_border_color',
				'std' => '#454545',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_4',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
				'tab' => 'Column 4',
			),
			array(
				'label' => __( ' Border Style', 'dslc_string' ),
				'id' => 'css_button4_border_style',
				'std' => 'solid',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_4',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
				'choices' => array(
					array(
						'label' => __( 'solid', 'dslc_string' ),
						'value' => 'solid',
					),
					array(
						'label' => __( 'dotted', 'dslc_string' ),
						'value' => 'dotted',
					),
					array(
						'label' => __( 'dashed', 'dslc_string' ),
						'value' => 'dashed',
					),
					array(
						'label' => __( 'double', 'dslc_string' ),
						'value' => 'double',
					),
					array(
						'label' => __( 'groove', 'dslc_string' ),
						'value' => 'groove',
					),
					array(
						'label' => __( 'ridge', 'dslc_string' ),
						'value' => 'ridge',
					),
					array(
						'label' => __( 'inset', 'dslc_string' ),
						'value' => 'inset',
					),
					array(
						'label' => __( 'outset', 'dslc_string' ),
						'value' => 'outset',
					),
					array(
						'label' => __( 'none', 'dslc_string' ),
						'value' => 'none',
					),
				),
				'tab' => 'Column 4',
			),
			array(
				'label' => __( 'Padding Top/Bottom', 'dslc_string' ),
				'id' => 'css_button4_padding_top_bottom',
				'std' => '10',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_4',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'styling',
				'tab'		=> 'Column 4',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Padding Right/Left', 'dslc_string' ),
				'id' => 'css_button4_padding_right_left',
				'std' => '18',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_4',
				'affect_on_change_rule' => 'padding-right,padding-left',
				'section' => 'styling',
				'tab'		=> 'Column 4',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Font Size', 'dslc_string' ),
				'id' => 'css_button4_font-size',
				'std' => '',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_4',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'tab'		=> 'Column 4',
				'min' => 8,
				'max' => 72,
				'ext' => 'px',
			),
			array(
				'label' => __( 'Font Family', 'dslc_string' ),
				'id' => 'css_button4_font_family',
				'std' => 'Open Sans',
				'type' => 'font',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_4',
				'affect_on_change_rule' => 'font-family',
				'section' => 'styling',
				'tab' => 'Column 4',
			),
			array(
				'label' => __( 'Font Weight', 'dslc_string' ),
				'id' => 'css_button4_font_weight',
				'std' => '400',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_4',
				'affect_on_change_rule' => 'font-weight',
				'section' => 'styling',
				'tab' => 'Column 4',
				'ext' => '',
				'min' => 100,
				'max' => 900,
				'increment' => 100
			),
			array(
				'label' => __( ' Border Style', 'dslc_string' ),
				'id' => 'css_button4_border_style',
				'std' => 'normal',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.price_order_4',
				'affect_on_change_rule' => 'font-style',
				'section' => 'styling',
				'choices' => array(
					array(
						'label' => __( 'normal', 'dslc_string' ),
						'value' => 'normal',
					),
					array(
						'label' => __( 'italic', 'dslc_string' ),
						'value' => 'italic',
					),
					array(
						'label' => __( 'oblique', 'dslc_string' ),
						'value' => 'oblique',
					),
				),
				'tab' => 'Column 4',
			),


			/*
			 * Highlights
			*/
			array(
				'label' => __( ' Background Color', 'dslc_string' ),
				'id' => 'css_highlight_bg_color',
				'std' => '#19A3EB',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.pricing-tables-helight .title',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab'		=> 'Highlights',
			),
			array(
				'label' => __( ' Background Color Price', 'dslc_string' ),
				'id' => 'css_highlight_bg_color',
				'std' => '#19A3EB',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.pricing-tables-helight .price',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab'		=> 'Highlights',
			),
			array(
				'label' => __( 'Border Width', 'dslc_string' ),
				'id' => 'css_highlight_border-width',
				'std' => '3',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.pricing-tables-helight .title',
				'affect_on_change_rule' => 'border-top-width',
				'section' => 'styling',
				'tab'		=> 'Highlights',
				'ext' => 'px',
			),
			array(
				'label' => __( ' Border Color', 'dslc_string' ),
				'id' => 'css_highlight_border_color',
				'std' => '#19A3EB',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.pricing-tables-helight .title',
				'affect_on_change_rule' => 'border-top-color',
				'section' => 'styling',
				'tab' => 'Highlights',
			),
			array(
				'label' => __( ' Border Style', 'dslc_string' ),
				'id' => 'css_highlight_border_style',
				'std' => 'solid',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.pricing-tables-helight .title',
				'affect_on_change_rule' => 'border-top-style',
				'section' => 'styling',
				'choices' => array(
					array(
						'label' => __( 'solid', 'dslc_string' ),
						'value' => 'solid',
					),
					array(
						'label' => __( 'dotted', 'dslc_string' ),
						'value' => 'dotted',
					),
					array(
						'label' => __( 'dashed', 'dslc_string' ),
						'value' => 'dashed',
					),
					array(
						'label' => __( 'double', 'dslc_string' ),
						'value' => 'double',
					),
					array(
						'label' => __( 'groove', 'dslc_string' ),
						'value' => 'groove',
					),
					array(
						'label' => __( 'ridge', 'dslc_string' ),
						'value' => 'ridge',
					),
					array(
						'label' => __( 'inset', 'dslc_string' ),
						'value' => 'inset',
					),
					array(
						'label' => __( 'outset', 'dslc_string' ),
						'value' => 'outset',
					),
					array(
						'label' => __( 'none', 'dslc_string' ),
						'value' => 'none',
					),
				),
				'tab' => 'Highlights',
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
				'affect_on_change_el' => '.pricing-tables-helight, .pricing-tables, .pricing-tables-two,.pricing-tables-helight-two',
				'affect_on_change_rule' => 'width',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => '%',
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_t_margin-bottom',
				'std' => '50',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.pricing-tables-helight, .pricing-tables, .pricing-tables-two,.pricing-tables-helight-two',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px',
			),

			/*
			 * Responsive Phone
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
				'affect_on_change_el' => '.pricing-tables-helight, .pricing-tables, .pricing-tables-two,.pricing-tables-helight-two',
				'affect_on_change_rule' => 'width',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => '%',
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_p_margin-bottom',
				'std' => '50',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.pricing-tables-helight, .pricing-tables, .pricing-tables-two,.pricing-tables-helight-two',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px',
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

	?>
		<?php if($options['columns']==4){ ?>
			<?php for($i=1; $i<5; $i++){ ?>
				<div class="pricing-tables<?php if($options['highlights'.$i]==1){ echo '-helight'; } ?>">
		          	<div class="title"><?php echo $options['title'.$i]; ?></div>
		          	<div class="price">
		          		<?php if ($options['price_before_affter']==1): ?>
		          			<?php echo $options['currency'.$i].$options['price'.$i]; ?> <i>/ <?php echo $options['price_per']; ?></i>
		          		<?php else: ?>
		          			<?php echo $options['price'.$i].$options['currency'.$i]; ?> <i>/ <?php echo $options['price_per']; ?></i>
		          		<?php endif ?>
		          	</div>
		          	<div class="cont-list">
			            <ul>
			              	<?php 
								$content = stripcslashes( $options['content'.$i] );
								$items = preg_split( '/\r\n|\r|\n/', $content );

								$output = '';
								$dem    = 1;
								foreach($items as $item){
									if($dem==count($items)){
										$output .= '<li class="last">' . htmlspecialchars_decode( $item ) . '</li>';
									} else {
								   		$output .= '<li>' . htmlspecialchars_decode( $item ) . '</li>';
								   	}
								}
								
								echo $output;
							?>
			            </ul>
		          	</div>
		          	<div class="ordernow"><a href="<?php echo $options['button_link'.$i]; ?>" class="normalbut price_order_<?php echo $i; ?>"><?php echo $options['buttontext'.$i] ?></a></div>
		        </div>
		    <?php } ?>
		<?php } else { ?>
			<?php for($i=1; $i<4; $i++){ ?>
				<div class="pricing-tables<?php if($options['highlights'.$i]==1){ echo '-helight'; } ?>-two">
		          	<div class="title"><?php echo $options['title'.$i]; ?></div>
		          	<div class="price">
		          		<?php if ($options['price_before_affter']==1): ?>
		          			<?php echo $options['currency'.$i].$options['price'.$i]; ?> <i>/ <?php echo $options['price_per']; ?></i>
		          		<?php else: ?>
		          			<?php echo $options['price'.$i].$options['currency'.$i]; ?> <i>/ <?php echo $options['price_per']; ?></i>
		          		<?php endif ?>
		          	</div>
		          	<div class="cont-list">
			            <ul>
			              	<?php 
								$content = stripcslashes( $options['content'.$i] );
								$items = preg_split( '/\r\n|\r|\n/', $content );

								$output = '';
								$dem    = 1;
								foreach($items as $item){
									if($dem==count($item)){
										$output .= '<li class="last">' . htmlspecialchars_decode( $item ) . '</li>';
									} else {
								   		$output .= '<li>' . htmlspecialchars_decode( $item ) . '</li>';
								   	}
								}
								
								echo $output;
							?>
			            </ul>
		          	</div>
		          	<div class="ordernow"><a href="<?php echo $options['button_link'.$i]; ?>" class="normalbut price_order_<?php echo $i; ?>"><?php echo $options['buttontext'.$i] ?></a></div>
		        </div>
		    <?php } ?>
		<?php } ?>
		<div class="clearfix"></div>
	<?php
    	// REQUIRED
    	$this->module_end( $options );

    }
 
}