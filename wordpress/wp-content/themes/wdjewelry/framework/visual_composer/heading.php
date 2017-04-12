<?php

// **********************************************************************// 

// ! Register New Element: WD Heading

// **********************************************************************//

// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

// **********************************************************************// 
// ! Register New Element: WD Heading
// **********************************************************************//
$heading_params = array(
	"name" => esc_html__("Heading", 'wdjewelry'),
	"base" => "wd_heading",
	"icon" => "icon-wpb-wpdance",
	"category" => esc_html__('WPDance Elements', 'wdjewelry'),
	"params" => array(
	
		// Heading
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Size", 'wdjewelry'),
			"admin_label" => true,
			"param_name" => "size",
			"value" => array(
				"H1" => 'h1',
				"H2" => 'h2',
				"H3" => 'h3',
				"H4" => 'h4',
				"H5" => 'h5',
				"H6" => 'h6'
			),
			"description" => '',
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Style", 'wdjewelry'),
			"admin_label" => true,
			"param_name" => "style",
			"value" => array(
				"Style 1" => 'heading_style1',
				"Style 2" => 'heading_style2',
				"Style 3" => 'heading_style3',
				"Style 4" => 'heading_style4',
				"Style 5" => 'heading_style5',
				"Style 6" => 'heading_style6'
			),
			"description" => '',
		),
		array(
			"type" => "textarea_html",
			"class" => "",
			"heading" => esc_html__("Content", 'wdjewelry'),
			"admin_label" => true,
			"param_name" => "content",
			"value" => "",
			"description" => '',
		),
	)
);
vc_map( $heading_params );
?>