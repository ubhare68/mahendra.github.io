<?php

if (!defined('ABSPATH')) {exit;}

/// ! Team
vc_map(array(
  "name"     => esc_html__("Image", 'wdjewelry'),
  "base"     => "wd_image",
  "icon"     => "icon-wpb-wpdance",
  "category" => "WPDance Elements",
  "params"   => array(
    array(
      "type"        => "attach_image",
      "class"       => "",
      "heading"     => esc_html__("Image", 'wdjewelry'),
      "param_name"  => "id_thumb",
      "admin_label" => true,
      "description" => '',
    ),
    array(
      'type'        => 'dropdown',
      'class'       => '',
      'heading'     => esc_html__('Size', 'wdjewelry'),
      'param_name'  => 'size',
      'admin_label' => true,
      'value'       => array(
                  'Thumbnail'                        => 'thumbnail',
                  'Medium'                           => 'medium',
                  'Medium Large'                     => 'medium_large',
                  'Large'                            => 'large',
                  'Full Size'                        => 'full-size',
                  'Custom'                           => 'custom',
      ),
      'description' => '',
    ),
    array(
      'type'        => 'textfield',
      'class'       => '',
      'heading'     => esc_html__('Height', 'wdjewelry'),
      'param_name'  => 'height',
      'admin_label' => true,
      'value'       => '',
      'dependency' => array('element' => 'size','value' =>array('custom')),
      'description' => '',
    ),
      array(
      'type'        => 'textfield',
      'class'       => '',
      'heading'     => esc_html__('Width', 'wdjewelry'),
      'param_name'  => 'width',
      'admin_label' => true,
      'value'       => '',
      'dependency' => array('element' => 'size','value' =>array('custom')),
      'description' => '',
    ),
    array(
      'type'        => 'dropdown',
      'class'       => '',
      'heading'     => esc_html__('Position Content', 'wdjewelry'),
      'param_name'  => 'position_content',
      'admin_label' => true,
      'value'       => array('Center' => 'image_content_center',
        'Top'                           => 'image_content_top',
        'Right'                         => 'image_content_right',
        'Bottom'                        => 'image_content_bottom',
        'Left'                          => 'image_content_left',
      ),
      'description' => '',
    ),
    array(
      'type'        => 'dropdown',
      'class'       => '',
      'heading'     => esc_html__('Style Image', 'wdjewelry'),
      'param_name'  => 'style_image',
      'admin_label' => true,
      'value'       => array('Style 1' => 'image_style_default',
        'Style 2'                        => 'image_style_2',
        'Style 3'                        => 'image_style_3',
        'Style 4'                        => 'image_style_4',
        'Style 5'                        => 'image_style_5',
      ),
      'description' => '',
    ),
    array(
      "type"        => "textarea_html",
      "class"       => "",
      "heading"     => esc_html__("Content Image", 'wdjewelry'),
      'admin_label' => true,
      "param_name"  => "content",

    ),

  ),
)
);
