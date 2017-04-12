<?php
/**
 * @package WordPress
 * @since WD_GoMarket
 */

if(!function_exists('tvgiao_wd_product_brand')){
	function tvgiao_wd_product_brand($atts,$content){
		$_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' )  );
		if ( !in_array( "woocommerce/woocommerce.php", $_actived ) ) {
			return;
		}
		global $woocommerce_loop, $woocommerce,$wd_data;
         $shortc_limit =15; 		
		extract(shortcode_atts(array(
			'columns' 			=> 2
			,'title'			=> ''
			,'num_best_selling' => 2
			,'orderby'  		=> 'title'
			,'order'    		=> 'desc'
			,'per_page' 		=> 2
			,'brand'			=> ''
			,'operator' 		=> 'IN'			
		),$atts));
		
		if ( ! $brand ) {
			return '';
		}	
		// Default ordering args
		$ordering_args = WC()->query->get_catalog_ordering_args( $orderby, $order );

		$args = array(
			'post_type'				=> 'product',
			'post_status' 			=> 'publish',
			'ignore_sticky_posts'	=> 1,
			'orderby' 				=> $ordering_args['orderby'],
			'order' 				=> $ordering_args['order'],
			'posts_per_page' 		=> $per_page,
			'meta_query' 			=> array(
				array(
					'key' 			=> '_visibility',
					'value' 		=> array('catalog', 'visible'),
					'compare' 		=> 'IN'
				)
			),
			'tax_query' 			=> array(
				array(
					'taxonomy' 		=> 'product_brand',
					'terms' 		=> array_map( 'sanitize_title', explode( ',', $brand ) ),
					'field' 		=> 'slug',
					'operator' 		=> $operator
				)
			)
		);

		if ( isset( $ordering_args['meta_key'] ) ) {
			$args['meta_key'] = $ordering_args['meta_key'];
		}
		wp_reset_postdata();
		ob_start();
		$brands_list = get_terms( 'product_brand', array(
			'orderby'    => 'name',
			'slug'              => $brand,
			'order'             => 'ASC',
			'hide_empty' => 0
		));		
		$best_selling = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $args, $atts ) );
?>			
		<div class="sd-brand-product-thumbnail">
			<div class="product-bigger-image">
			<div class="product-bigger">
					<?php if ( !empty( $brands_list ) && !is_wp_error( $brands_list ) ){
						//print_r($brands_list[0]->term_id);
						if((get_tax_meta($brands_list[0]->term_id, 'mgwb_image_brand_thumb'))) {
						$brand_image_src_term = get_tax_meta($brands_list[0]->term_id, 'mgwb_image_brand_thumb');
						$brand_image_src = $brand_image_src_term['src'];
						$brands_image_output = '<a href="'.get_term_link( $brands_list[0]->slug, 'product_brand' ).'"><img src="'.esc_attr($brand_image_src) .'" alt="'.esc_attr($brands_list[0]->name).'"/></a>';
						echo '<div class="brand-image">'.$brands_image_output.'</div>';
					    }
					}?>
					<?php wd_woocommerce_product_loop_start('list'); $i =0;?>
					<?php while ( $best_selling->have_posts() ) : $best_selling->the_post(); global $product; ?>
						
						<?php if($i == 0):?>
						<div class="prod_slide_box prod_box_<?php echo absint($product->id)?>" data-prod_box="<?php echo absint($product->id)?>">						
						<?php wc_get_template( 'content-product-custom-thumbnail.php', array( 'columns' => 1,'shortc_limit' => 15) );?>
						<?php else: ?>
						<div class="prod_slide_box hide prod_box_<?php echo absint($product->id)?>" data-prod_box="<?php echo absint($product->id)?>">
						<?php endif; $i++;?>
						
						</div>
						<?php endwhile; // end of the loop. ?>
					<?php woocommerce_product_loop_end(); ?>
				</div>
					<?php $_random_id = 'widget_product_slider_'.rand(); ?>
					<div class="widget_product_slider wd-loading" id="<?php echo esc_attr($_random_id);?>">
						<div class="products">
						<?php while ($best_selling->have_posts()) : $best_selling->the_post();?>
							<?php 
							global $product;
							$prouct_link = (!wp_is_mobile())?
								esc_url( admin_url( 'admin-ajax.php' ) . "?action=widget_product_slide_func1&prod_id=".$product->id."&shortc_limit=".$shortc_limit ):
								get_permalink($product->id);
							?>
							<div class="thumbnail"><a class="<?php echo (!wp_is_mobile())? "wd_brand_product_slide_func1": ''; ?>" title="<?php echo esc_attr($product->get_title());?>" href="<?php echo esc_url($prouct_link);?>" data-prod_id="<?php echo esc_attr($product->id);?>"><?php echo $product->get_image(array( 150, 150 )); ?></a></div>
						<?php endwhile;?>
						</div><!--.products-->
					</div>	
				</div>						
						<script type='text/javascript'>
			//<![CDATA[
				
				jQuery('.wd_brand_product_slide_func1').on('click', function(e){
					e.preventDefault();
					var url = jQuery(this).attr('href');
					var _this = jQuery(this);
					var prod_id = jQuery(this).data('prod_id');
					var curent_id_box = jQuery(this).parents('.woocommerce-brand').find('.products.list .prod_box_'+prod_id);
					if(jQuery.trim(curent_id_box.html()) !== '') {
						_this.parents('.woocommerce-brand').find('.products.list .prod_slide_box').addClass('hide');
						curent_id_box.removeClass('hide');
					} else {
						jQuery.ajax({
							type: "GET",
							url: url,
							beforeSend: function(o){
								_this.parents('.woocommerce-brand').block({message: null, overlayCSS: {background: '#fff url('+wd_loading_icon+') no-repeat center'}});
							},
							success: function(data){
								curent_id_box.html(data);
								_this.parents('.woocommerce-brand').unblock();
								_this.parents('.woocommerce-brand').find('.products.list .prod_slide_box').addClass('hide');
								curent_id_box.removeClass('hide');
							}
						});
					}
	});
			//]]>				
			</script>
			</div>
			<?php wp_reset_postdata();
			return '<div class="woocommerce-brand">' . ob_get_clean() . '</div>';	
	}
}		
add_shortcode('wd_product_brand','tvgiao_wd_product_brand');	
?>