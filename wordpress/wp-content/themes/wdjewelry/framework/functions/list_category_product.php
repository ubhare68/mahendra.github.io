<?php
if (!function_exists("wdjewelry_list_category_product")) {
  define("SELECT_CATEGORY_PRODUCT", esc_html__("select",'wdjewelry'));

  function wdjewelry_list_category_product()
  {
    if (!wdjewelry_checkplugin_woocommerce()) {
      return;
    }

    $array = array("taxonomy" => "product_cat");

    $terms = get_terms("product_cat", $array);

    $array_cat = null;

    $array_cat['--select--'] = SELECT_CATEGORY_PRODUCT;

    if (!empty($terms) && !is_wp_error($terms)) {

      foreach ($terms as $term) {
        //print_r($term);
        $array_cat[$term->name] = $term->term_id;
        # code...
      }
    }

    return $array_cat;
  }
}

 function wdjewelry_list_category_logo()
  {
    if (!wdjewelry_checkplugin_extention()) {
      return;
    }
    $array = array("taxonomy" => "ts_logos_category");
    $terms = get_terms("ts_logos_category", $array);
    $array_cat =null;
    $array_cat['--select--'] = '';
  
    if (!empty($terms) && !is_wp_error($terms)) {
      foreach ($terms as $term) {
        $array_cat[$term->name] = $term->slug;
      }
    }
    return $array_cat;
  }

if (!function_exists("wdjewelry_list_category_post")) {
  define("SELECT_CATEGORY_POST", "select");

  function wdjewelry_list_category_post()
  {
    if (!wdjewelry_checkplugin_woocommerce()) {
      return;
    }

    $array = array("taxonomy" => "category");

    $terms = get_terms("category", $array);

    $array_cat = null;

    $array_cat['--select--'] = SELECT_CATEGORY_POST;

    if (!empty($terms) && !is_wp_error($terms)) {

      foreach ($terms as $term) {
        //print_r($term);
        $array_cat[$term->name] = $term->term_id;
        # code...
      }
    }

    return $array_cat;
  }
}