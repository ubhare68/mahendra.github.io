<?php
vc_map(array(
  "name"     => esc_html__("WD Blogs Custom", 'wdjewelry'),
  "base"     => "wd_custom_blog",
  "class"    => "",
  "category" => esc_html__("WPDance Elements", 'wdjewelry'),
  "params"   => array(
     array(
      "type"        => "dropdown",
      "heading"     => esc_html__("Show Post", 'wdjewelry'),
      "param_name"  => "show_style",
      "value"       => array("All Category " => "all", "Single Category" => "category",'Single Post'=>'single'),
      "description" => esc_html__("Show Post of Category", 'wdjewelry'),
    ),
    array(
      "type"        => "dropdown",
      "heading"     => esc_html__("Category", 'wdjewelry'),
      "param_name"  => "category",
      'dependency' => array('element' => 'show_style','value' =>array('category')),
      "value"       => wdjewelry_list_category_post(),
      "description" => esc_html__("Categoty of Post", 'wdjewelry'),
    ),
     array(
      "type"        => "dropdown",
      "heading"     => esc_html__("Show Childern Category ", 'wdjewelry'),
      "param_name"  => "cat_childern",
      'dependency' => array('element' => 'show_style','value' =>array('category')),
      "value"       => array("NO" => "false", "Yes" => "true"),
      "description" => esc_html__("Show all post in Childern Category", 'wdjewelry'),
    ),
    array(
    "type"        => "textfield",
    "heading"     => esc_html__("Slug", 'wdjewelry'),
    "param_name"  => "slug",
    'dependency' => array('element' => 'show_style','value' =>array('single')),
    "value"       => '',
    "description" => esc_html__("", 'wdjewelry'),
  ),
    
    
    array(
      "type"        => "textfield",
      "heading"     => esc_html__("Coloumn", 'wdjewelry'),
      "param_name"  => "columns",
      'dependency' => array('element' => 'show_style','value' =>array('category','all')),
      "value"       => '3',
      "description" => esc_html__("", 'wdjewelry'),
    ),
    array(
      'type'        => 'textfield',
      'heading'     => esc_html__('Number', 'wdjewelry'),
      'param_name'  => 'per_page',
      'dependency' => array('element' => 'show_style','value' =>array('category','all')),
      'value'       => '1',
      'description' => esc_html__('Show number product in the page', 'wdjewelry'),
    ),
    array(
    "type"        => "textfield",
    "heading"     => esc_html__("Offset", 'wdjewelry'),
    "param_name"  => "offset",
    'dependency' => array('element' => 'show_style','value' =>array('category','all')),
    "value"       => '0',
    "description" => esc_html__("", 'wdjewelry'),
  ),
    array(
      "type"        => "dropdown",
      "heading"     => esc_html__("Display Stick Post", 'wdjewelry'),
      "param_name"  => "ignore_sticky_posts",
      "value"       => array("Top" => "top", "Normal" => "normal", "Hide" => "hide"),

      "description" => esc_html__("Position dispaly Stick Post ", 'wdjewelry'),
    ),
    array(
      "type"        => "dropdown",
      "heading"     => esc_html__("OrderBy", 'wdjewelry'),
      "param_name"  => "orderby",
      "value"       => array("Author" => "author", "Title" => "title", "Date" => "date", "Random" => "rand", "Comment Count" => "comment_count"),

      "description" => esc_html__("", 'wdjewelry'),
    ),
    array(
      "type"        => "dropdown",
      "heading"     => esc_html__("Order", 'wdjewelry'),
      "param_name"  => "order",
      "value"       => array("ASC" => "ASC", "DESC" => "DESC"),

      "description" => esc_html__("", 'wdjewelry'),
    ),
     array(
      "type"        => "dropdown",
      "heading"     => esc_html__("Show Link Home ", 'wdjewelry'),
      "param_name"  => "show_home",
      "value"       => array("Yes" => "yes", "No" => "no"),
      "description" => esc_html__("Show Link Home", 'wdjewelry'),
    ),
     array(
      "type"        => "dropdown",
      "heading"     => esc_html__("Show Thumbnail ", 'wdjewelry'),
      "param_name"  => "show_thumbnail",
      "value"       => array("Yes" => "yes", "No" => "no"),
      "description" => esc_html__("Show Thumbnail", 'wdjewelry'),
    ),
      array(
      "type"        => "dropdown",
      "heading"     => esc_html__("Show Date/comment/author ", 'wdjewelry'),
      "param_name"  => "show_infor",
      "value"       => array("Yes" => "yes", "No" => "no"),
      "description" => esc_html__("Show Date/comment/author", 'wdjewelry'),
    ),
    array(
      "type"        => "dropdown",
      "heading"     => esc_html__("Show Excerpt ", 'wdjewelry'),
      "param_name"  => "show_excerpt",
      "value"       => array("Yes" => "yes", "No" => "no"),
      "description" => esc_html__("Show Excerpt", 'wdjewelry'),
    ),
    array(
      'type'        => 'textfield',
      'heading'     => esc_html__('Excerpt Words', 'wdjewelry'),
      'param_name'  => 'excerpt_words',
      'value'       => '10',
      'description' => esc_html__('Show Excerpt Words', 'wdjewelry'),
    ),
  ),

)
);
