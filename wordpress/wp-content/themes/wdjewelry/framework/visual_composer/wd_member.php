<?php

// **********************************************************************// 

// ! Register New Element: WD Teammate

// **********************************************************************//

// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

// **********************************************************************// 
// ! Register New Element: WD Heading
// **********************************************************************//
$teammate_params = array(
	"name" => esc_html__("WD Temamate", 'wdjewelry'),
	"base" => "wd_teammate",
	"icon" => "icon-wpb-wpdance",
	"category" => esc_html__('WPDance Elements', 'wdjewelry'),
	"params" => array(
	
		// Heading
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Limit", 'wdjewelry'),
			"admin_label" => true,
			"param_name" =>'posts_per_page',
			"value" => "-1",
			"description" => '',
		),
		array(
			"type"=>"dropdown",
			"heading"=>esc_html__("OrderBy",'wdjewelry'),
			"param_name"=>"orderby",
			"value"=>array("Title" => "title","Author"=>"author","Date"=>"date" ,"Random" => "rand","Comment Count" => "comment_count"),
			
			"description"=>esc_html__("",'wdjewelry'),
		),
		array(
			"type"=>"dropdown",
			"heading"=>esc_html__("Order",'wdjewelry'),
			"param_name"=>"order",
			"value"=>array( "ASC"=>"ASC" ,"DESC" => "DESC"),
			
			"description"=>esc_html__("",'wdjewelry'),
			)
	));
vc_map( $teammate_params );
?>