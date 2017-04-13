<?php
/**
 * @package WordPress
 * @since WD_Dance
 */

if (!function_exists('wd_product_sale')) {
    function wd_product_sale($atts, $content)
    {
        global $woocommerce_loop, $woocommerce;
        extract(shortcode_atts(array(
            'columns'      => 4,
            'per_page'     => 8,
            'orderby'      => 'desc',
            'product_cats' => '',
            'show_type'    => 'grid',
        ), $atts));

        $_actived = apply_filters('active_plugins', get_option('active_plugins'));
        if (!in_array("woocommerce/woocommerce.php", $_actived)) {
            return;
        }
        $args = array(
            'post_type'           => 'product',
            'post_status'         => 'publish',
            'ignore_sticky_posts' => 1,
            'date_query'          => array(array('after' => '1 month ago')),
            'posts_per_page'      => $per_page,
            'meta_key'            => 'total_sales',
            'order'               => 'meta_value_num',
            'meta_query'          => WC()->query->get_meta_query(),
            'orderby'             => $orderby,
        );

        ob_start();
        $_old_woocommerce_loop       = $woocommerce_loop['columns'];
        $product_cats                = new WP_Query($args);
        $woocommerce_loop['columns'] = 1;
        $class_sub                   = (24 % $columns == 0) ? 'col-sm-' . (24 / $columns) : 'col-sm-8';
        ?>
		<div class="product_category " >
			<div class="row">
				<div class="products <?php echo esc_attr($show_type); ?>">
					<?php if ($product_cats->have_posts()): ?>
						<?php while ($product_cats->have_posts()): $product_cats->the_post();?>
									<div class="<?php echo esc_attr($class_sub); ?>">
										<?php wc_get_template_part('content', 'product');?>
									</div>
								<?php endwhile;?>
					<?php endif;?>
				</div>

			</div>
		</div>
		<?php
wp_reset_postdata();
        $woocommerce_loop['columns'] = $_old_woocommerce_loop;
        return '<div class="woocommerce">' . ob_get_clean() . '</div>';
    }
}
add_shortcode('woo_product_sale', 'wd_product_sale');

?>