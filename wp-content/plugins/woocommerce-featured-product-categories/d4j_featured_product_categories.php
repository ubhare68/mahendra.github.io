<?php
    /*
    Plugin Name: Woocommerce featured product categories
    Plugin URI: http://joomquery.com/how-to-installation-woocommerce-multiple-tabs-plugin-for-wordpress
    Description: woocommerce featured products plugin for WooCommerce products to show featured products by catergories with Shortcode.
	WooCommerce Shortcode to list Categories and Featured Products Shortcode:[d4j_featured_product_categories cats="" tax="" per_cat="" columns="" /]
    Author: Lamvt - Vu Thanh Lam
    Version: 3.9.1
    Author URI: http://www.joomquery.com
	Shortcode:[d4j_featured_product_categories cats="" tax="" per_cat="" columns="" /]
    */
add_shortcode( 'd4j_featured_product_categories', 'd4j_featured_products' );
function d4j_featured_products($atts){
 
	//global $woocommerce_loop;
 
	extract(shortcode_atts(array(
		'cats' => '',
		'tax' => 'product_cat',
		'per_cat' => '3',
		'columns' => '3',
	), $atts));
	
	if(empty($cats)){
		$terms = get_terms( 'product_cat', array('hide_empty' => true, 'fields' => 'ids'));
		$cats = implode(',', $terms);
	}
	
	$cats = explode(',', $cats);
	
	if(empty($cats)){
		return '';
	}
 
	ob_start();
 
	foreach($cats as $cat){
 
		$term = get_term( $cat, $tax);
 
		$args = array(
			'post_type'	=> 'product',
			'post_status' => 'publish',
			'ignore_sticky_posts'	=> 1,
			'posts_per_page' => $per_cat,
			'tax_query' => array(
				array(
					'taxonomy' => $tax,
					'field' => 'id',
					'terms' => $cat,
				)
			),
			'meta_query' => array(
				array(
					'key' => '_visibility',
					'value' => array('catalog', 'visible'),
					'compare' => 'IN'
				),
				array(
					'key' => '_featured',
					'value' => 'yes'
				)
			)
		);
 
		$products = new WP_Query( $args );
 
		$woocommerce_loop['columns'] = $columns;
 
		if ( $products->have_posts() ) : ?>
 
			<h2><a href="<?php echo get_term_link($term, $tax ); ?>"><?php echo $term->name; ?></a></h2>
			
				<?php while ( $products->have_posts() ) : $products->the_post(); ?>
 
					<?php woocommerce_get_template_part( 'content', 'product' ); ?>
 
				<?php endwhile; ?>
 
			<?php woocommerce_product_loop_end(); ?>
 
		<?php endif;
 
		wp_reset_postdata();
	}
 
	return '<div class="woocommerce d4j_featured_product_categories">' . ob_get_clean() . '</div>';
}
?>