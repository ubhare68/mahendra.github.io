<?php

// **********************************************************************// 

// ! Register New Element: WD Portfolio

// **********************************************************************//

// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

// **********************************************************************// 
// ! Register New Element: WD Portfolio
// **********************************************************************//
if( class_exists('WD_Portfolio') ){
	
	$portfolio_params = array(
		"name" => esc_html__("WD Portfolio", 'wdjewelry'),
		"base" => "wd-portfolio",
		"icon" => "icon-wpb-wpdance",
		"category" => esc_html__('WPDance Elements', 'wdjewelry'),
		"params" => array(
		
			// Heading
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Columns", 'wdjewelry'),
				"admin_label" => true,
				"param_name" => "columns",
				"value" => '4',
				"description" => '',
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Style", 'wdjewelry'),
				"admin_label" => true,
				"param_name" => "portf_style",
				"value" => array(
						'Full Style' => 'full',
						'Wide style' => 'wide'
					),
				"description" => ''
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Show Filter", 'wdjewelry'),
				"admin_label" => true,
				"param_name" => "show_filter",
				"value" => array(
						'Yes' => 'yes',
						'No' => 'no'
					),
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Show Title", 'wdjewelry'),
				"admin_label" => true,
				"param_name" => "show_title",
				"value" => array(
						'Yes' => 'yes',
						'No' => 'no'
					),
				"dependency" => Array('element' => "portf_style", 'value' => array('full'))
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Show Description", 'wdjewelry'),
				"admin_label" => true,
				"param_name" => "show_desc",
				"value" => array(
						'Yes' => 'yes',
						'No' => 'no'
					),
				"dependency" => Array('element' => "portf_style", 'value' => array('full'))
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Show Navigation", 'wdjewelry'),
				"admin_label" => true,
				"param_name" => "show_navi",
				"value" => array(
						'Yes' => 'yes',
						'No' => 'no'
					),
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Limit", 'wdjewelry'),
				"admin_label" => true,
				"param_name" => "count",
				"value" => '-1',
				"description" => ''
			),
		)
	);
	vc_map( $portfolio_params );

	$portfolio_params = array(
		"name" => esc_html__("WD Portfolio Slider", 'wdjewelry'),
		"base" => "wd-portfolio-carousel",
		"icon" => "icon-wpb-wpdance",
		"category" => esc_html__('WPDance Elements', 'wdjewelry'),
		"params" => array(
		
			// Heading
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Limit", 'wdjewelry'),
				"admin_label" => true,
				"param_name" => "limit",
				"value" => -1,
				"description" => '',
			),
		)
	);
	vc_map( $portfolio_params );

}
?>