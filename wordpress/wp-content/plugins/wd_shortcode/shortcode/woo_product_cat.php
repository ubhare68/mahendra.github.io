<?php
/**
 * @package WordPress
 * @since WD_Dance
 */

if(!function_exists('wd_product_category_function')){
	function wd_product_category_function($atts,$content){
		global $woocommerce_loop, $woocommerce;
		extract(shortcode_atts(array(
			'columns' 			=> 4,
			'per_page' 			=> 8,
			'order' 			=> 'date',
			'orderby'			=> 'desc',
			'product_cats' 		=> '',
			'show_type'         => 'grid',
		),$atts));
		
		$_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' )  );
		if ( !in_array( "woocommerce/woocommerce.php", $_actived ) ) {
			return;
		}
		$args = array(
			'post_type'	=> 'product',
			'post_status' => 'publish',
			'ignore_sticky_posts'	=> 1,
			'posts_per_page' => $per_page,
			'order' => $order,
			'orderby' => $orderby,
			'meta_query' => array(
				array(
					'key' => '_visibility',
					'value' => array('catalog', 'visible'),
					'compare' => 'IN'
				),
			),
			'tax_query' => array(
				array(
					'taxonomy' => 'product_cat',
					'terms' => array( esc_attr($product_cats) ),
					'field' => 'id',
					'include_children' => false
				)
			)
		);
		ob_start();
		$_old_woocommerce_loop = $woocommerce_loop['columns'];
		$product_cats = new WP_Query($args);
		$woocommerce_loop['columns'] = 1;
		$class_sub = (24%$columns == 0)?'col-sm-'.(24/$columns):'col-sm-8';
		?>
		<div class="product_category " > 
			<div class="row">
				<div class="products <?php echo esc_attr($show_type); ?>">	
					<?php if ($product_cats->have_posts()): ?>
						<?php while ($product_cats->have_posts()): $product_cats->the_post(); ?>
							<div class="<?php echo esc_attr($class_sub); ?>">
								<?php wc_get_template_part( 'content', 'product' ); ?>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
				
			</div>
		</div>		
		<?php 
		wp_reset_postdata();
		$woocommerce_loop['columns'] = $_old_woocommerce_loop;
		return '<div class="woocommerce">' . ob_get_clean() . '</div>';		
	}
}
add_shortcode('woo_product_cat','wd_product_category_function');

?>