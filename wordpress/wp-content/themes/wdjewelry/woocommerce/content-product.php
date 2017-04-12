<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;


// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<li <?php post_class(); ?>>

	<?php
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked wdjewelry_start_before_shop_title -5
	 */
	do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * woocommerce_before_shop_loop_item_title hook.
	 *
	 * @hooked wdjewelry_before_shop_title 5
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 * @hooked wdjewelry_after_shop_title -100
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );

	/**
	 * woocommerce_shop_loop_item_title hook.
	 *
	 * @hooked wdjewelry_start_row_right -5
	 * @hooked wdjewelry_start_product_left -7
	 * @hooked woocommerce_template_loop_product_title - 10
	 * @hooked woocommerce_template_loop_rating -15
	 * @hooked wdjewelry_end_produc_left -100
	 */
	do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * woocommerce_after_shop_loop_item_title hook.
	 *
	 * @hooked wdjewelry_start_product_right - 5
	 * @hooked woocommerce_template_loop_price - 10
	 * @hooked wdjewelry_end_produc_right -15
	 */
	do_action( 'woocommerce_after_shop_loop_item_title' );
	/*
	* wdjewelry_desciption_shop_loop_item
	*
	* @hooked wdjewelry_start_description -5
	* @hooked woocommerce_template_single_excerpt -10
	* @hooked wdjewelry_end_description -15
	*/
	do_action('wdjewelry_desciption_shop_loop_item' );
	/**
	 * woocommerce_after_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 * @hooked wdjewelry_end_row_right -20
	 * @hooked wdjewelry_end_before_shop_title - 100
	 * 
	 */
	do_action( 'woocommerce_after_shop_loop_item' );
	?>
</li>
