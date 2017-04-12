<?php 
	vc_map(array(
			"name"=>esc_html__("WD Slider Logo",'wdjewelry'),
			"base"=>"wd_slider_logo",
			"class"=>"",
			"category"=>esc_html__("WPDance Elements",'wdjewelry'),
			"params"=>array(
				array(
					"type"=>"textfield",
					"heading"=>esc_html__("Total Number",'wdjewelry'),
					"param_name"=>"per_page",
					"value"=>'-1',
					"description"=>esc_html__(" ",'wdjewelry'),
					),
				array(
					"type"=>"textfield",
					"heading"=>esc_html__("Number Item",'wdjewelry'),
					"param_name"=>"number_show",
					"value"=>'6',
					"description"=>esc_html__(" ",'wdjewelry'),
					),
				array(
					"type"      =>  "textfield",
					"heading"   => esc_html__("Category",'wdjewelry' ),
					'param_name' => "logo_category",
					'value'		=> '',
					'description' => esc_html__("category of logo",'wdjewelry')
					)	
				)
			)
	);
?>