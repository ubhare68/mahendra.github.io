<?php

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_Accordion" );')
);

class Liwo_Accordion extends DSLC_Module {

	var $module_id = 'Liwo_Accordion';
	var $module_title = 'Accordion';
	var $module_icon = 'reorder';
	var $module_category = 'Liwo - Elements';

	function options() {	

		$dslc_options = array(

			array(
				'label' => __( '(hidden) Accordion Content', 'dslc_string' ),
				'id' => 'accordion_content',
				'std' => 'Placeholder content. Lorem ipsum dolor sit amet, consectetur tempor incididunt ut labore et dolore magna aliqua.',
				'type' => 'textarea',
				'visibility' => 'hidden',
				'section' => 'styling',
			),
			array(
				'label' => __( '(hidden) Accordion Nav', 'dslc_string' ),
				'id' => 'accordion_nav',
				'std' => 'CLICK TO EDIT',
				'type' => 'textarea',
				'visibility' => 'hidden',
				'section' => 'styling',
			),

			/**
			 * General
			 */
			
			array(
				'label' => __( 'BG Color', 'dslc_string' ),
				'id' => 'css_bg_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
			),
			array(
				'label' => __( 'Border Color', 'dslc_string' ),
				'id' => 'css_border_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
			),
			array(
				'label' => __( 'Border Width', 'dslc_string' ),
				'id' => 'css_border_width',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion',
				'affect_on_change_rule' => 'border-width',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Borders', 'dslc_string' ),
				'id' => 'css_border_trbl',
				'std' => 'top right bottom left',
				'type' => 'checkbox',
				'choices' => array(
					array(
						'label' => __( 'Top', 'dslc_string' ),
						'value' => 'top'
					),
					array(
						'label' => __( 'Right', 'dslc_string' ),
						'value' => 'right'
					),
					array(
						'label' => __( 'Bottom', 'dslc_string' ),
						'value' => 'bottom'
					),
					array(
						'label' => __( 'Left', 'dslc_string' ),
						'value' => 'left'
					),
				),
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Padding Vertical', 'dslc_string' ),
				'id' => 'css_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'styling',
				'ext' => 'px',
			),

			/**
			 * Header
			 */

			array(
				'label' => __( 'BG Color', 'dslc_string' ),
				'id' => 'css_header_bg_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-header',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab' => 'header'
			),
			array(
				'label' => __( 'Border Color', 'dslc_string' ),
				'id' => 'css_header_border_color',
				'std' => '#e8e8e8',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-header',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
				'tab' => 'header'
			),
			array(
				'label' => __( 'Border Width', 'dslc_string' ),
				'id' => 'css_header_border_width',
				'std' => '1',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-header',
				'affect_on_change_rule' => 'border-width',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'header'
			),
			array(
				'label' => __( 'Borders', 'dslc_string' ),
				'id' => 'css_header_border_trbl',
				'std' => 'top right bottom left',
				'type' => 'checkbox',
				'choices' => array(
					array(
						'label' => __( 'Top', 'dslc_string' ),
						'value' => 'top'
					),
					array(
						'label' => __( 'Right', 'dslc_string' ),
						'value' => 'right'
					),
					array(
						'label' => __( 'Bottom', 'dslc_string' ),
						'value' => 'bottom'
					),
					array(
						'label' => __( 'Left', 'dslc_string' ),
						'value' => 'left'
					),
				),
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-header',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
				'tab' => 'header'
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_header_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-header',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'header'
			),
			array(
				'label' => __( 'Padding Vertical', 'dslc_string' ),
				'id' => 'css_header_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-header',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'header'
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_header_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-header',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'header'
			),

			/**
			 * Title
			 */

			array(
				'label' => __( 'BG Color', 'dslc_string' ),
				'id' => 'css_title_bg_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-title',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab' => 'title'
			),
			array(
				'label' => __( 'Border Color', 'dslc_string' ),
				'id' => 'css_title_border_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-title',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
				'tab' => 'title'
			),
			array(
				'label' => __( 'Border Width', 'dslc_string' ),
				'id' => 'css_title_border_width',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-title',
				'affect_on_change_rule' => 'border-width',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'title'
			),
			array(
				'label' => __( 'Borders', 'dslc_string' ),
				'id' => 'css_title_border_trbl',
				'std' => 'top right bottom left',
				'type' => 'checkbox',
				'choices' => array(
					array(
						'label' => __( 'Top', 'dslc_string' ),
						'value' => 'top'
					),
					array(
						'label' => __( 'Right', 'dslc_string' ),
						'value' => 'right'
					),
					array(
						'label' => __( 'Bottom', 'dslc_string' ),
						'value' => 'bottom'
					),
					array(
						'label' => __( 'Left', 'dslc_string' ),
						'value' => 'left'
					),
				),
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-title',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
				'tab' => 'title'
			),
			array(
				'label' => __( 'Color', 'dslc_string' ),
				'id' => 'css_title_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-title',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => 'title'
			),
			array(
				'label' => __( 'Font Size', 'dslc_string' ),
				'id' => 'css_title_font_size',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-title',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'tab' => 'title',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Font Weight', 'dslc_string' ),
				'id' => 'css_title_font_weight',
				'std' => '700',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-title',
				'affect_on_change_rule' => 'font-weight',
				'section' => 'styling',
				'tab' => 'title',
				'ext' => '',
				'min' => 100,
				'max' => 900,
				'increment' => 100
			),
			array(
				'label' => __( 'Font Family', 'dslc_string' ),
				'id' => 'css_title_font_family',
				'std' => 'Open Sans',
				'type' => 'font',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-title',
				'affect_on_change_rule' => 'font-family',
				'section' => 'styling',
				'tab' => 'title',
			),
			array(
				'label' => __( 'Padding Vertical', 'dslc_string' ),
				'id' => 'css_title_padding_vertical',
				'std' => '15',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-title',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'title'
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_title_padding_horizontal',
				'std' => '15',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-title',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'title'
			),

			/**
			 * Content
			 */

			array(
				'label' => __( 'BG Color', 'dslc_string' ),
				'id' => 'css_content_bg_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-content',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab' => 'content'
			),
			array(
				'label' => __( 'Border Color', 'dslc_string' ),
				'id' => 'css_content_border_color',
				'std' => '#e8e8e8',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-content',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
				'tab' => 'content'
			),
			array(
				'label' => __( 'Border Width', 'dslc_string' ),
				'id' => 'css_content_border_width',
				'std' => '1',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-content',
				'affect_on_change_rule' => 'border-width',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'content'
			),
			array(
				'label' => __( 'Borders', 'dslc_string' ),
				'id' => 'css_content_border_trbl',
				'std' => 'right bottom left',
				'type' => 'checkbox',
				'choices' => array(
					array(
						'label' => __( 'Top', 'dslc_string' ),
						'value' => 'top'
					),
					array(
						'label' => __( 'Right', 'dslc_string' ),
						'value' => 'right'
					),
					array(
						'label' => __( 'Bottom', 'dslc_string' ),
						'value' => 'bottom'
					),
					array(
						'label' => __( 'Left', 'dslc_string' ),
						'value' => 'left'
					),
				),
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-content',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
				'tab' => 'content'
			),
			array(
				'label' => __( 'Color', 'dslc_string' ),
				'id' => 'css_content_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-content',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => 'content'
			),
			array(
				'label' => __( 'Font Size', 'dslc_string' ),
				'id' => 'css_content_font_size',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-content',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'tab' => 'content',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Font Weight', 'dslc_string' ),
				'id' => 'css_content_font_weight',
				'std' => '400',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-content',
				'affect_on_change_rule' => 'font-weight',
				'section' => 'styling',
				'tab' => 'content',
				'ext' => '',
				'min' => 100,
				'max' => 900,
				'increment' => 100
			),
			array(
				'label' => __( 'Font Family', 'dslc_string' ),
				'id' => 'css_content_font_family',
				'std' => 'Open Sans',
				'type' => 'font',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-content',
				'affect_on_change_rule' => 'font-family',
				'section' => 'styling',
				'tab' => 'content',
			),
			array(
				'label' => __( 'Line Height', 'dslc_string' ),
				'id' => 'css_content_line_height',
				'std' => '22',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-content',
				'affect_on_change_rule' => 'line-height',
				'section' => 'styling',
				'tab' => 'content',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Padding Vertical', 'dslc_string' ),
				'id' => 'css_content_padding_vertical',
				'std' => '25',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-content',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'content'
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_content_padding_horizontal',
				'std' => '25',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-content',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'content'
			),

			/**
			 * Responsive Tablet
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
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_t_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_t_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_t_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Header - Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_t_header_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-header',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Header - Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_t_header_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-header',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Header - Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_t_header_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-header',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Title - Font Size', 'dslc_string' ),
				'id' => 'css_res_t_title_font_size',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-title',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Title - Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_t_title_padding_vertical',
				'std' => '15',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-title',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Title - Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_t_title_padding_horizontal',
				'std' => '15',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-title',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Content - Font Size', 'dslc_string' ),
				'id' => 'css_res_t_content_font_size',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-content',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Content - Line Height', 'dslc_string' ),
				'id' => 'css_res_t_content_line_height',
				'std' => '22',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-content',
				'affect_on_change_rule' => 'line-height',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Content - Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_t_content_padding_vertical',
				'std' => '25',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-content',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Content - Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_t_content_padding_horizontal',
				'std' => '25',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-content',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px',
			),

			/**
			 * Responsive phone
			 */

			array(
				'label' => __( 'Responsive', 'dslc_string' ),
				'id' => 'css_res_p',
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
				'tab' => 'phone',
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_p_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_p_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_p_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Header - Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_p_header_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-header',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Header - Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_p_header_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-header',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Header - Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_p_header_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-header',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Title - Font Size', 'dslc_string' ),
				'id' => 'css_res_p_title_font_size',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-title',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Title - Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_p_title_padding_vertical',
				'std' => '15',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-title',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Title - Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_p_title_padding_horizontal',
				'std' => '15',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-title',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Content - Font Size', 'dslc_string' ),
				'id' => 'css_res_p_content_font_size',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-content',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Content - Line Height', 'dslc_string' ),
				'id' => 'css_res_p_content_line_height',
				'std' => '22',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-content',
				'affect_on_change_rule' => 'line-height',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Content - Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_p_content_padding_vertical',
				'std' => '25',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-content',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Content - Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_p_content_padding_horizontal',
				'std' => '25',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-accordion-content',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px',
			),

		);

		$dslc_options = array_merge( $dslc_options, $this->animation_options );

		return apply_filters( 'dslc_module_options', $dslc_options, $this->module_id );

	}

	function output( $options ) {

		global $dslc_active;

		if ( $dslc_active && is_user_logged_in() && current_user_can( DS_LIVE_COMPOSER_CAPABILITY ) )
			$dslc_is_admin = true;
		else
			$dslc_is_admin = false;		

		$this->module_start( $options );

		/* Module output stars here */ 

			$accordion_nav = explode( '(dslc_sep)', trim( $options['accordion_nav'] ) );

			if ( empty( $options['accordion_content'] ) )
				$accordion_contents = false;
			else
				$accordion_contents = explode( '(dslc_sep)', trim( $options['accordion_content'] ) );

			$count = 0;

		?>
			<?php if($dslc_is_admin): ?>
				<div class="dslc-accordion">

					<?php if ( is_array( $accordion_contents ) && count( $accordion_contents ) > 0 ) : ?>

						<?php foreach ( $accordion_contents as $accordion_content ) : ?>

							<div class="dslc-accordion-item">

								<div class="dslc-accordion-header dslc-accordion-hook">
									<span class="dslc-accordion-title" <?php if ( $dslc_is_admin ) echo 'contenteditable'; ?>><?php echo $accordion_nav[$count]; ?></span>
									<?php if ( $dslc_is_admin ) : ?>
										<span class="dslca-delete-accordion-hook"><span class="dslca-icon dslc-icon-remove"></span></span>
									<?php endif; ?>
								</div>

								<div class="dslc-accordion-content">
									<div class="dslca-editable-content" data-id="accordion_content">
										<?php echo stripslashes( $accordion_content ); ?>
									</div>
									<?php if ( $dslc_is_admin ) : ?>
										<div class="dslca-wysiwyg-actions-edit"><span class="dslca-wysiwyg-actions-edit-hook">Edit Content</span></div>
									<?php endif; ?>
								</div><!-- .dslc-accordion-content -->

							</div><!-- .dslc-accordion-item -->

						<?php $count++; endforeach; ?>

					<?php else : ?>

						<div class="dslc-accordion-item">

							<div class="dslc-accordion-header dslc-accordion-hook">
								<span class="dslc-accordion-title" <?php if ( $dslc_is_admin ) echo 'contenteditable'; ?>><?php _e( 'CLICK TO EDIT', 'dslc_string' ); ?></span>
								<?php if ( $dslc_is_admin ) : ?>
									<span class="dslca-delete-accordion-hook"><span class="dslca-icon dslc-icon-remove"></span></span>
								<?php endif; ?>
							</div>

							<div class="dslc-accordion-content">
								<div class="dslca-editable-content" data-id="accordion_content">
									Placeholder content. Lorem ipsum dolor sit amet, consectetur
									tempor incididunt ut labore et dolore magna aliqua.
								</div>
								<?php if ( $dslc_is_admin ) : ?>
									<div class="dslca-wysiwyg-actions-edit"><span class="dslca-wysiwyg-actions-edit-hook">Edit Content</span></div>
								<?php endif; ?>
							</div><!-- .dslc-accordion-content -->

						</div><!-- .dslc-accordion-item -->

					<?php endif; ?>

					<?php if ( $dslc_is_admin ) : ?>
						<div class="dslca-add-accordion">
							<span class="dslca-add-accordion-hook"><span class="dslca-icon dslc-icon-plus"></span></span>
						</div>
					<?php endif; ?>

				</div><!-- .dslc-accordion -->
			<?php else : ?>
				<?php $dem = 0; ?>
				<?php if ( is_array( $accordion_contents ) && count( $accordion_contents ) > 0 ) : ?>
					<?php foreach ( $accordion_contents as $accordion_content ) : ?>
						<span class="acc-trigger <?php if($dem==0) echo 'active'; ?>"><a href="#"><?php echo $accordion_nav[$dem]; ?></a></span>
				        <div class="acc-container">
				        	<div class="content"> <?php echo stripslashes( $accordion_content ); ?></div>
				        </div>
					<?php $dem++; endforeach; ?>
				<?php endif; ?>
			<?php endif; ?>

		<?php /* Module output ends here */

		$this->module_end( $options );

	}

}