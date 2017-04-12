<?php 
	vc_map(array(
			"name"=>esc_html__("WD Blogs Owl",'wdjewelry'),
			"base"=>"WD_Blogs_Owl",
			"class"=>"",
			"category"=>esc_html__("WPDance Elements",'wdjewelry'),
			"params"=>array(
				array(
					"type"=>"dropdown",
					"heading"=>esc_html__("Display Stick Post",'wdjewelry'),
					"param_name"=>"ignore_sticky_posts",
					"value"=>array( "Top"=>"top" ,"Normal" => "normal" ,"Hide"=>"hide"),
					
					"description"=>esc_html__("Position dispaly Stick Post ",'wdjewelry'),
					),
				array(
					"type"=>"dropdown",
					"heading"=>esc_html__("OrderBy",'wdjewelry'),
					"param_name"=>"orderby",
					"value"=>array( "Author"=>"author" ,"Title" => "title" ,"Date"=>"date" ,"Random" => "rand","Comment Count" => "comment_count"),
					
					"description"=>esc_html__("",'wdjewelry'),
					),
				array(
					"type"=>"dropdown",
					"heading"=>esc_html__("Order",'wdjewelry'),
					"param_name"=>"order",
					"value"=>array( "ASC"=>"ASC" ,"DESC" => "DESC"),
					
					"description"=>esc_html__("",'wdjewelry'),
					),
				array(
					"type"=>"textfield",
					"heading"=>esc_html__("Number",'wdjewelry'),
					"param_name"=>"per_posts",
					"value"=>'4',
					"description"=>esc_html__("",'wdjewelry'),
					),
				
				)

			)
	);
?>