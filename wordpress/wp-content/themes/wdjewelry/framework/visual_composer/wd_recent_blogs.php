<?php 
	vc_map(array(
			"name"=>esc_html__("WD Recent Blogs",'wdjewelry'),
			"base"=>"wd_recent_blogs",
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
					"type"=>"textfield",
					"heading"=>esc_html__("Number Blogs",'wdjewelry'),
					"param_name"=>"per_page",
					"value"=>'-1',
					"description"=>esc_html__(" ",'wdjewelry'),
					),
				array(
					"type"=>"textfield",
					"heading"=>esc_html__("Number Words",'wdjewelry'),
					"param_name"=>"excerpt_words",
					"value"=>'10',
					"description"=>esc_html__(" ",'wdjewelry'),
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
				)

			)
	);
?>