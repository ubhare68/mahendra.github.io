<?php
/**
 * @package WordPress
 * @since WD_Dance
 */

if(!function_exists('wd_product_slider_function')){
	function wd_product_slider_function($atts){
		global $woocommerce_loop, $woocommerce;
		extract(shortcode_atts(array(
			'columns' 			=> 4,
			'per_page' 			=> 8,
			'order' 			=> 'date',
			'orderby'			=> 'desc',
			'product_cats' 		=> '',
			'show_type'         => 'grid',
			'show_feature'		=> 'no',
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
		);

		if(strcmp('yes',$show_feature) == 0){
			$args['meta_query'] = array(
				array(
					'key' => '_featured',
					'value' => 'yes',
				),
			);
		}
		
		ob_start();
		$_old_woocommerce_loop = $woocommerce_loop['columns'];
		$product_cats = new WP_Query($args);
		$woocommerce_loop['columns'] = $columns;
		?>
		<div class="product_category " > 
				<div class="products <?php echo esc_attr($show_type); ?>">	
					 <?php if ($product_cats->have_posts()): ?>
						<div id="wd_product_slider" class="owl-carousel owl-theme">
						<?php while ($product_cats->have_posts()): $product_cats->the_post(); ?>
							<div id="item">
								<?php wc_get_template_part( 'content', 'product' ); ?>
							</div>
						<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
		</div>		
		<?php 
		wp_reset_postdata();
		$woocommerce_loop['columns'] = $_old_woocommerce_loop;
		return '<div class="woocommerce">' . ob_get_clean() . '</div>';		
	}
}

add_shortcode('wd_product_cat_slider','wd_product_slider_function');
?>