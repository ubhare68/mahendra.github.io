<?php
// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }
// **********************************************************************// 
// **********************************************************************//
$woo_products_params = array(
	"name" => esc_html__("Products Sale Month", 'wdjewelry'),
	"base" => "woo_product_sale",
	"icon" => "icon-wpb-woo",
	"category" => 'WPDance Woocommerce',
	"description"	=> '',
	"params" => array(		
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Number Product", 'wdjewelry'),
			"admin_label" => true,
			"param_name" => "per_page",
			"value" => "",
			"description" => ''
		),
		// Columns
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Columns", 'wdjewelry'),
			"admin_label" => true,
			"param_name" => "columns",
			"value" => "4",
			"description" => ''
		),
		
		
	)
);
vc_map( $woo_products_params );
?>