<?php
// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }
// **********************************************************************// 
// ! Register New Element: WD Recent Products By Category Products
// **********************************************************************//
$woo_product_params = array(
	"name" => esc_html__("Product", 'wdjewelry'),
	"base" => "woo_product",
	"icon" => "icon-wpb-woo",
	"category" => 'WPDance Woocommerce',
	"description"	=> '',
	"params" => array(		
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("ID", 'wdjewelry'),
			"admin_label" => true,
			"param_name" => "id_product",
			"value" => "",
			"description" => ''
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Position Thumbnail", 'wdjewelry'),
			"admin_label" => true,
			"param_name" =>'thumbnail_product',
			"value" => array('Left' =>'left','Right'=>'right'),
			"description" => ''
		),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => esc_html__("Background", 'wdjewelry'),
			"admin_label" => true,
			"param_name" =>'background_product',
			"value" => 'white',
			"description" => ''
		),
	
		
	)
);
vc_map($woo_product_params );
?>