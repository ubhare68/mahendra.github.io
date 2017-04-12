<?php
// **********************************************************************//

// ! File Security Check
if (!defined('ABSPATH')) {exit;}

if (!function_exists('wdjewelry_include_add_map')) {
  function wdjewelry_include_add_map()
  {
    $files = array('wd_slider_logo','wd_recent_blogs','count_down_icon','vc_testimonial','portfolio_custom','wd_owl_instagarm','wd_featured','woo_product_image', 'wd_blog_custom', 'woo_product_feature', 'woo_product_slider', 'wd_blog_owl', 'woo_product_sale', 'wd_image', 'woo_product', 'woo_product_cat', 'pricing_table', 'wd_member', 'heading', 'portfolio', 'wd_blogs_style1', 'wd_blogs_style2');
    foreach ($files as $file) {
      if (file_exists(get_template_directory() . '/framework/visual_composer/' . $file . '.php')) {
        require_once get_template_directory() . '/framework/visual_composer/' . $file . '.php';
      }
      # code...
    }
  }
  add_action("vc_before_init", "wdjewelry_include_add_map");

}
