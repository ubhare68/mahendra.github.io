<?php
// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }
// **********************************************************************// 
// ! Register New Element: WD slider Products By Category Products
// **********************************************************************//
$woo_products_params = array(
	"name" => esc_html__("Products Slider", 'wdjewelry'),
	"base" => "wd_product_cat_slider",
	"category" => 'WPDance Woocommerce',
	"description"	=> '',
	"params" => array(		
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Category", 'wdjewelry'),
			"admin_label" => true,
			"param_name" => "product_cats",
			"value" => wdjewelry_list_category_product(),
			"description" => ''
		),
		array(
			"type" => 'dropdown',
			"class"  => "",
			"heading" =>esc_html__("Feature Product",'wdjewelry'),
			'admin_label' => true,
			"param_name"  => "show_feature",
			"value" => array(
				"No" => 'no',
				"Yes"  => 'yes'
				),
			'description' => '',
			),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Number Product", 'wdjewelry'),
			"admin_label" => true,
			"param_name" => "per_page",
			"value" => "",
			"description" => ''
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Order By", 'wdjewelry'),
			"admin_label" => true,
			"param_name" => "orderby",
			"value" => array(
				"Date" => "date",
				"Title" => "title",
				"Rand" => "rand"
			),
			"description" => ''
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Order way", 'wdjewelry'),
			"param_name" => "order",
			"value" => array(
				"Descending" => "desc",
				"Ascending" => "asc",
			),
			"description" => esc_html__("Designates the ascending or descending order.", 'wdjewelry')
		),
	)
);
vc_map( $woo_products_params );
?>