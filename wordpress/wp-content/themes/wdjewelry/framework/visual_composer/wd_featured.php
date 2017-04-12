<?php 
	vc_map(array(
			"name"=>esc_html__("FEATURE NEW ",'wdjewelry'),
			"base"=>"wd_feature",
			"class"=>"",
			"category"=>esc_html__("WPDance Elements",'wdjewelry'),
			"params"=>array(
				array(
					"type"=>"dropdown",
					"heading"=>esc_html__("OrderBy",'wdjewelry'),
					"param_name"=>"orderby",
					"value"=>array( "Date"=>"date","Author"=>"author" ,"Title" => "title" ,"Random" => "rand","Comment Count" => "comment_count"),
					"description"=>esc_html__("",'wdjewelry'),
					),
				array(
					"type"=>"dropdown",
					"heading"=>esc_html__("Order",'wdjewelry'),
					"param_name"=>"order",
					"value"=>array( "DESC" => "DESC","ASC"=>"ASC"),
					"description"=>esc_html__("",'wdjewelry'),
					),
          array(
          "type"        => "textfield",
          "heading"     => esc_html__("Coloumn", 'wdjewelry'),
          "param_name"  => "columns",
          "value"       => '1',
          "description" => esc_html__("", 'wdjewelry'),
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__('Number', 'wdjewelry'),
          'param_name'  => 'number',
          'value'       => '1',
          'description' => esc_html__('Show number product in the page', 'wdjewelry'),
        ),
				)

			)
	);
?>