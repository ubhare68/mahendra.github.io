<?php
/*
Plugin Name: WooCommerce Category Slider
Plugin URI: http://www.gvectors.com/woocommerce-category-slider/
Description: This is the best solution to show all subCategory details on a parent Category page. It includes subCategory image, title, description, price chart, number of products, featured products and lots of more information ...
Author: gVectors Team
Author URI: http://www.gvectors.com
Version: 1.0.0
*/

/*
  Copyright 2015 gVectors.com by gConverter, LLC. (email:support@gconverter.com)
  This program is not a free software; you can not re-sell and re-distribute it.
*/

if (!defined('WP_CONTENT_URL'))
    define('WP_CONTENT_URL', get_option('siteurl') . '/wp-content');
if (!defined('WP_CONTENT_DIR'))
    define('WP_CONTENT_DIR', ABSPATH . 'wp-content');
if (!defined('WP_PLUGIN_URL'))
    define('WP_PLUGIN_URL', WP_CONTENT_URL . '/plugins');
if (!defined('WP_PLUGIN_DIR'))
    define('WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins');

define('WOOCS_FOLDER', dirname(__FILE__) . '/');
define('WOOCS_PATH', WP_PLUGIN_URL . '/' . plugin_basename(dirname(__FILE__)) . '/');

require_once('woocs-scripts.php');
require_once('woocs-options.php');
require_once('woocs-functions.php');

function woocs_activate(){
	add_option('woocs_enabled', '1', '', 'yes');
	add_option('woocs_type', '0', '', 'yes');
	add_option('woocs_bgcolor', 'fbfbfb', '', 'yes');
	
	add_option('woocs_ph_pcats_in_section', 'Product Categories in this Section', '', 'yes');
	add_option('woocs_ph_products', 'Products', '', 'yes');
	add_option('woocs_ph_from', 'From', '', 'yes');
	add_option('woocs_ph_to', 'to', '', 'yes');
	add_option('woocs_ph_veiw_all_prod', 'View All Products', '', 'yes');
	
	add_option('woocs_t1_autoslide', '0', '', 'yes');
	add_option('woocs_t2_autoslide', '0', '', 'yes');
	
	add_option('woocs_t1_pager', '0', '', 'yes');
	add_option('woocs_t2_pager', '0', '', 'yes');
	
	add_option('woocs_t1_controls', '0', '', 'yes');
	add_option('woocs_t2_controls', '0', '', 'yes');
	
	add_option('woocs_t1_speed', '500', '', 'yes');
	add_option('woocs_t2_speed', '500', '', 'yes');
	
	add_option('woocs_t1_title_length', '30', '', 'yes');
	add_option('woocs_t2_title_length', '30', '', 'yes');
	
	add_option('woocs_t2_numberofrows', '2', '', 'yes');
}

register_activation_hook( __FILE__, 'woocs_activate' );


function woocs_show_current_category_children(){
	if(is_product_category()){
		$woocs_bgcolor = get_option('woocs_bgcolor');
		
		$woocs_t1_title_length = get_option('woocs_t1_title_length');
		$woocs_t2_title_length = get_option('woocs_t2_title_length');
		
		$woocs_t1_autoslide = get_option('woocs_t1_autoslide');
		$woocs_t2_autoslide = get_option('woocs_t2_autoslide');
		
		$woocs_t1_pager = get_option('woocs_t1_pager');
		$woocs_t2_pager = get_option('woocs_t2_pager');
		
		$woocs_t1_controls = get_option('woocs_t1_controls');
		$woocs_t2_controls = get_option('woocs_t2_controls');
		
		$woocs_t1_speed = get_option('woocs_t1_speed');
		$woocs_t2_speed = get_option('woocs_t2_speed');
		
		$woocs_enabled = get_option('woocs_enabled');
		
		
		global $wp_query;
		$cat_obj = $wp_query->get_queried_object();
		$t_id = $cat_obj->term_id;
		$term_meta = get_option( "taxonomy_$t_id" );
		$cterm = intval($term_meta['custom_term_meta']);
		if($term_meta !== false && $cterm != 9999){
			$woocs_type = $cterm;
		}
		else{
			$woocs_type = get_option('woocs_type');	
		}
		
		if($woocs_type == -1) $woocs_enabled = 0;
		$woocs_currency = get_woocommerce_currency_symbol();
		
		if(($woocs_type == 0 && $woocs_t1_controls == 0) || ($woocs_type == 1 && $woocs_t2_controls == 0)
		|| ($woocs_type == 2 && $woocs_t3_controls == 0) || ($woocs_type == 3 && $woocs_t4_controls == 0) || 
		($woocs_type == 4 && $woocs_t5_controls == 0)){
			wp_enqueue_style('woocs-controls-css', plugins_url('styles/controls.css', __FILE__));
		}
		
		$woocs_subcats = woocs_subcats_from_parentcat();
		$woocs_subcat_count = count($woocs_subcats);
		if($woocs_enabled == 1){
			if(!empty($woocs_subcats)){
				if( $woocs_type == 0 ) {
					$woocs_height = 'height:230px!important';
				}
				elseif( $woocs_type == 1 ) {
					$woocs_height = '';
				}
				elseif( $woocs_type == 2 ) {
					$woocs_height = 'height:182px!important';
				}
				elseif( $woocs_type == 4 ) {
					$woocs_height = '';
				}
				echo '<style type="text/css">.woocs-head .woocs-head-title{ background:#'.$woocs_bgcolor.'; } .wcs-wrapper{ background:#'.$woocs_bgcolor.'; } .wcs-wrapper .wcs-viewport { background:#'.$woocs_bgcolor.'; '.$woocs_height.' } </style>
					  <div class="woocs-head">
							<span class="woocs-head-title">'.get_option('woocs_ph_pcats_in_section').'</span>
					  </div>';
				if( $woocs_subcat_count < 4 && $woocs_type == 0 ){ echo '<style type="text/css">.woocs1, .woocs2 { background:#'.$woocs_bgcolor.'; display:table; width:100%; } .woocs1 li, .woocs2 li{ padding:1px 10px; }</style>'; }
				if( $woocs_subcat_count < 8 && $woocs_type == 1 ){ echo '<style type="text/css">.woocs1, .woocs2 { background:#'.$woocs_bgcolor.'; display:table; width:100%; } .woocs1 li, .woocs2 li{ padding:1px 10px; }</style>'; }
			}
			if($woocs_type == 0){
				
				if(!empty($woocs_subcats)){
					echo "<div class='woocs1' autoslide='$woocs_t1_autoslide' speed='$woocs_t1_speed' pager='$woocs_t1_pager' count='$woocs_subcat_count' control='$woocs_t1_controls'>";
					foreach($woocs_subcats as $woocsub){
					
						if( $woocsub->count == 0 ) continue;
						
						$woocs_image = woocs_get_thumbnail_by_id($woocsub->term_id, 'thumbnail');
						if(!empty($woocs_image)){
							$woocs_thumb = $woocs_image;
						}
						else{
							$woocs_thumb = plugins_url()."/woocommerce/assets/images/placeholder.png";
						}
						
						$woocs_term_link = get_category_link($woocsub);
						$woocs_title = (strlen(strip_tags($woocsub->name)) > $woocs_t1_title_length) ? woocs_text($woocsub->name, $woocs_t1_title_length) : strip_tags($woocsub->name);
						
						echo "<li><div class='woocs_container'>";
						echo "<div class='woocs_thumb'><a href='$woocs_term_link'><img src='$woocs_thumb'/></a></div>";
						echo "<div class='woocs_title'><a href='$woocs_term_link'>$woocs_title</a></div>";
						echo "<div class='woocs_count'>$woocsub->count ".get_option('woocs_ph_products')."</div>";
						
						$woocs_prices = woocs_get_products_by_category($woocsub->slug);
						if(!empty($woocs_prices)/*count($woocs_prices) > 1*/){
							$woocs_max_price = max($woocs_prices);
							$woocs_min_price = min($woocs_prices);
							if($woocs_max_price == $woocs_min_price){
								echo "<div class='woocs_price_range'><span style='font-size:13px;'>".get_option('woocs_ph_all_for')."</span> ".$woocs_currency.$woocs_min_price."</div>";
							}
							else{
								echo "<div class='woocs_price_range'><span style='font-size:12px;'>".get_option('woocs_ph_from')."</span> ".$woocs_currency.$woocs_min_price." <span style='font-size:12px;'>".get_option('woocs_ph_to')."</span> ".$woocs_currency.$woocs_max_price."</div>";
							}
						}
						echo "</div></li>";
					}
					echo '</div>';
				}
				
				
			}
			elseif($woocs_type == 1){
				$woocs_numberofrows = get_option('woocs_t2_numberofrows');
				if(!empty($woocs_subcats)){
					echo "<div class='woocs2' autoslide='$woocs_t2_autoslide' speed='$woocs_t2_speed' pager='$woocs_t2_pager' count='".ceil($woocs_subcat_count/$woocs_numberofrows)."' control='$woocs_t2_controls'>";
					$i = 0;
					foreach($woocs_subcats as $woocsub){
					//	echo '<pre>';print_r($woocsub);echo '</pre>';
					
						if( $woocsub->count == 0 ) continue;
					
						$woocs_image = woocs_get_thumbnail_by_id($woocsub->term_id, 'thumbnail');
						if(!empty($woocs_image)){
							$woocs_thumb = $woocs_image;
						}
						else{
							$woocs_thumb = plugins_url()."/woocommerce/assets/images/placeholder.png";
						}
						$woocs_term_link = get_category_link($woocsub);
						$woocs_title = (strlen(strip_tags($woocsub->name)) > $woocs_t2_title_length) ? woocs_text($woocsub->name, $woocs_t2_title_length) : strip_tags($woocsub->name);
						if($i % $woocs_numberofrows == 0){
							echo "<li><div class='woocs_col'>";
						}
						echo "<div class='woocs_container'>";
						echo "<div class='woocs_thumb'><a href='$woocs_term_link'><img src='$woocs_thumb'/></a></div>";
						echo "<div class='woocs_title'><a href='$woocs_term_link'>$woocs_title</a></div>";
						echo "</div><br>";
						$i++;
						if($i % $woocs_numberofrows == 0 || $i == count($woocs_subcats)){
							echo "</div></li>";
						}

					}
					echo '</div>';
				}
			}
			//Other Layouts///////////////////////////////
			
			
		}
	}
	if(!empty($woocs_subcats)){
		echo '<div class="woocs-clear"></div><hr class="woocs-hr" />';
	}
}

add_action('woocommerce_before_shop_loop', 'woocs_show_current_category_children');


?>