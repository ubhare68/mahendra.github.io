<?php

if (!defined('ABSPATH')) {exit;}

/// ! Team
vc_map(array(
  "name"     => esc_html__("Woo Product Image", 'wdjewelry'),
  "base"     => "woo_product_image",
  "icon"     => "icon-wpb-wpdance",
  "category" => "WPDance Woocommerce",
  "params"   => array(
    array(
      "type"        => "attach_image",
      "class"       => "",
      "heading"     => esc_html__("Image", 'wdjewelry'),
      "param_name"  => "id_image",
      "admin_label" => true,
      "description" => '',
    ),
    array(
      "type"        => "textfield",
      "class"       => "",
      "heading"     => esc_html__('ID Product', 'wdjewelry'),
      "param_name"  => 'id_product',
      "admin_label" => true,
      "description" => esc_html__('enter id product', 'wdjewelry'),
    ),

    array(
      'type'        => 'dropdown',
      'class'       => '',
      'heading'     => esc_html__('Size', 'wdjewelry'),
      'param_name'  => 'size',
      'admin_label' => true,
      'value'       => array('Thumbnail' => 'thumbnail',
        'Medium'                           => 'medium',
        'Medium Large'                     => 'medium_large',
        'Large'                            => 'large',
        'Full Size'                        => 'full-size',
        /* 'Custom' => 'custom'*/
      ),
      'description' => '',
    ),

  ),
)
);
