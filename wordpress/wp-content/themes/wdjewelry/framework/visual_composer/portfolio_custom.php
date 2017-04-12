<?php
// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }
// **********************************************************************// 
// ! Register New Element: WD slider Products By Category Products
// **********************************************************************//
$woo_products_params = array(
	"name" => esc_html__("Portfolio Custom Image", 'wdjewelry'),
	"base" => "wd-portfolio-image",
	"category" => 'WPDance Elements',
	"description"	=> '',
	"params" => array(		
		
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Slug ", 'wdjewelry'),
			"admin_label" => true,
			"param_name" => "slug",
			"value" => "",
			"description" => ''
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Type Image", 'wdjewelry'),
			"admin_label" => true,
			"param_name" => "type",
			"value" => array(
				"Thumbnail" => "thumbnail",
				"Custom" => "custom",
			),
			"description" => ''
		),
		array(
			"type" => "attach_image",
			"class" => "",
			"heading" => esc_html__("Image", 'wdjewelry'),
			"param_name" => "id_image",
			'dependency' => array('element' => 'type','value' =>array('custom')),
			"description" => esc_html__("Designates the ascending or descending order.", 'wdjewelry')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Width ", 'wdjewelry'),
			"admin_label" => true,
			"param_name" => "width",
			"value" => "",
			"description" => ''
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Height ", 'wdjewelry'),
			"admin_label" => true,
			"param_name" => "height",
			"value" => "",
			"description" => ''
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Number Word ", 'wdjewelry'),
			"admin_label" => true,
			"param_name" => "word",
			"value" => "60",
			"description" => ''
		),
	)
);
vc_map( $woo_products_params );
?>