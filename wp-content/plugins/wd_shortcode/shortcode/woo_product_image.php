<?php
/**
 * @package WordPress
 * @since WD_wpdance
 */

if (!function_exists('wd_woo_product_image')) {
  function wd_woo_product_image($atts, $content)
  {
    $_actived = apply_filters('active_plugins', get_option('active_plugins'));
    if (!in_array("woocommerce/woocommerce.php", $_actived)) {
      return;
    }
    global $woocommerce_loop, $woocommerce, $product;

    extract(shortcode_atts(array(
      'id_product' => '',
      'id_image'   => '',
      'size'       => 'thumbnail',
      'alt_image'  => 'image',
    ), $atts));

    wp_reset_postdata();
    $args_query = array(
      'post_type'   => 'product',
      'post_status' => 'publish',
      'post__in'    => array($id_product),

    );
    ob_start();
    $product = new WP_Query($args_query);
    ?>
          <div class="product-image overlay_text_alt">
             <?php if (wp_get_attachment_image_src($id_image, $size)): ?>
              <?php $image_src = wp_get_attachment_image_src($id_image, $size);
    echo '<img src = "' . $image_src[0] . '" width="' . $image_src[1] . '" height="' . $image_src[2] . '" alt ="' . $alt_image . '"/>';?>
             <?php else: ?>
             <?php echo esc_html__('No find image ,plaese enter image of shortcode woo product image in element setting. ', 'wpdance'); ?>
             <?php endif;?>
                <?php if ($product->have_posts()): ?>
                  <?php while ($product->have_posts()): $product->the_post();?>
			                      <div class='overlay_text_alt_mask'>
										<div class='pi-item-content-wrapper'>
											<div class='pi-item-content'>
												<a class="wp_item_title" href="<?php the_permalink();?>">
													<?php do_action('woocommerce_shop_loop_item_title');?>
												</a>
												<?php do_action('woocommerce_template_loop_price');?>
												<div class="wd_hiden_grid wd_des">
													<?php do_action('woocommerce_shop_loop_item_rating');?>
													<?php do_action('woocommerce_shop_loop_item_excerpt');?>
												</div>
												<div class="wd_add_to_cart_list wd_hiden_grid">
													<div class='wd_btn_add_to_cart_list'>
														<?php do_action('woocommerce_after_shop_loop_item_cart');?>
													</div>
												</div>
											</div>
										</div>
			                      </div>
						           <?php endwhile; // end of the loop. ?>
                <?php else: ?>
                  <?php echo esc_html__('No find product ,plaese enter id product of shortcode woo product image in element setting. ', 'wpdance'); ?>
                <?php endif;?>
      </div>
      <?php wp_reset_postdata();
    return '<div class="woocommerce">' . ob_get_clean() . '</div>';
  }
}
add_shortcode('woo_product_image', 'wd_woo_product_image');
?>