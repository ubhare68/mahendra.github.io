<?php
if(!function_exists('wdjewelry_mini_cart')){
	function wdjewelry_mini_cart(){
		$_actived = apply_filters('active_plugins',get_option('active_plugins'));
		if(!in_array('woocommerce/woocommerce.php', $_actived)){
			return ;
		}
		global $woocommerce;
		$_cart_empty = sizeof($woocommerce->cart->get_cart()) > 0 ? false : true;
		ob_start();
		?>
			<div class="cart-mini-content">
			<div class="mobile_cart visible-xs">
				<?php printf(__('<a href="%s"><i class="fa fa-shopping-cart fa-lg"></i><span>%s</span></a>','wdjewelry'), esc_url($woocommerce->cart->get_cart_url()),$woocommerce->cart->get_cart_contents_count()); ?>
			</div>
			<div class="cart_content hidden-xs">
			<div class='wd_mini_cart'><?php printf(__('<span class="text-cart"><a href="%s" title="cart">Cart</a><span class="text-cart__count">%s</span> </span>','wdjewelry'), esc_url($woocommerce->cart->get_cart_url()),$woocommerce->cart->get_cart_contents_count()); ?></div>
			<div class ='wd_content_mini_cart'>
				<?php 
					if($_cart_empty):
						echo '<span>'.esc_html__('you have not items in your shopping cart.','wdjewelry').'</span>';
					else:
						$count_max =2;
						$count = 0;
						$_items_cart = $woocommerce->cart->get_cart();
						foreach ($_items_cart as $cart_item_key => $cart_item) {
							/*if($count >= $count_max){
								echo '.............';
								break;
							}else{ $count++; }*/
							$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
							$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

							if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

								$product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
								$thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
								$product_price = apply_filters( 'woocommerce_cart_item_price', $woocommerce->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
								?>
								<div class='wd_cart_item'>
									<a href='<?php echo esc_url(get_permalink($product_id)); ?>'><?php echo wp_kses_post($thumbnail); ?></a>
									<div class='content_item'>
										<a href='<?php echo esc_url(get_permalink($product_id)); ?>'><?php echo wp_kses_post($product_name); ?></a>
										<div class='item_price'>
										<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
										</div>
									</div>
								</div>
							<?php
							}
						}
					endif;

				?>
				<?php if ( ! $_cart_empty ) : ?>
					<div class='footer'>
					<p class="total"><strong><?php esc_html_e( 'Subtotal', 'wdjewelry' ); ?>:</strong> <?php echo WC()->cart->get_cart_subtotal(); ?></p>
					<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>
					<p class="buttons">
						<a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="button wc-forward"><?php esc_html_e( 'View Cart', 'wdjewelry' ); ?></a>
						<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="button checkout wc-forward"><?php echo esc_html__( 'Checkout', 'wdjewelry' ); ?></a>
					</p>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>

		<?php
		$mini_cart = ob_get_clean();
		return $mini_cart;
	}
} 
if ( !function_exists( 'wdjewelry_wd_update_tini_cart' ) ) {
	function wdjewelry_wd_update_tini_cart() {
		die($cart_html = wdjewelry_mini_cart());
	}
}
add_action('wp_ajax_update_tini_cart', 'wdjewelry_wd_update_tini_cart');
add_action('wp_ajax_nopriv_update_tini_cart', 'wdjewelry_wd_update_tini_cart');