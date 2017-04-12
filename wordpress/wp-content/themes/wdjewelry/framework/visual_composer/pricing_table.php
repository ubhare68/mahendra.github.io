<?php
// **********************************************************************// 
// ! Register New Element:Pricing Table
// **********************************************************************//
$ptable_params = array(
	"name" => esc_html__("Pricing Table", 'wdjewelry'),
	"base" => "wd_ptable",
	"icon" => "icon-wpb-wpdance",
	"category" => esc_html__('WPDance Elements', 'wdjewelry'),
	"allowed_container_element" => 'vc_row',
	"params" => array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Title", 'wdjewelry'),
			"param_name" => "title",
			"value" => esc_html__("Basic Plan", 'wdjewelry'),
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Price", 'wdjewelry'),
			"param_name" => "price",
			'value' => '0',
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Currency", 'wdjewelry'),
			"param_name" => "currency",
			'value' => '$',
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Price Period", 'wdjewelry'),
			"param_name" => "price_period",
			'value' => '/ month',
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Link", 'wdjewelry'),
			"param_name" => "link",
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Style", 'wdjewelry'),
			"param_name" => "style",
			"value" => array(
				"Style 1" => "wd_pricing_style_image",
				"Style 2" => "wd_princing_style_text",	
			),
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Button Text", 'wdjewelry'),
			"param_name" => "button_text",
			"description" => ""
		),
		array(
			"type" => "attach_image",
			"heading" => esc_html__("Image", 'wdjewelry'),
			"param_name" => "image",
			'dependency' => array('element' => 'style','value' =>array('wd_pricing_style_image')),
			"description" => ""
		),
		array(
			"type" => "textarea_html",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Content", 'wdjewelry'),
			"param_name" => "content_pricing",
			"value" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit.",
			"description" => ""
		)
	)
);
vc_map($ptable_params);
?>
