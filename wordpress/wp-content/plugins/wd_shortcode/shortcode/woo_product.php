<?php
/**
 * @package WordPress
 * @since WD_wpdance
 */

if(!function_exists('wd_woo_product')){
    function wd_woo_product($atts,$content){
        $_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' )  );
        if ( !in_array( "woocommerce/woocommerce.php", $_actived ) ) {
            return;
        }
        global $woocommerce_loop, $woocommerce , $product;
        
        extract(shortcode_atts(array(
            'id_product'            => '',
            'background_product'    => 'white',
            'thumbnail_product'     => 'left',
        ),$atts));

        wp_reset_postdata(); 
        $args_query = array(
                'post_type'             => 'product',
                'post_status'           => 'publish',
                'ignore_sticky_posts'   => 1,
                'posts_per_page'        => 1,
                'post__in'          =>array($id_product),
                                    
        );          
            ob_start();
            $product = new WP_Query( $args_query );
?>          
        <div class="product-single" style="background:<?php echo esc_attr($background_product); ?>">
            <div class="product-bigger-image <?php echo esc_attr($thumbnail_product); ?>">
                <div class="product list">
                    <?php while ( $product->have_posts() ) : $product->the_post(); ?>
                            <?php if($thumbnail_product == 'left'):?>
                                <div class="wd-item-header">
                                    <?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
                                </div>
                            <?php endif; ?>

                            <div class='wd_content_list'>
                            <a href="<?php the_permalink(); ?>">
                                <?php do_action( 'woocommerce_shop_loop_item_title' );?>
                            </a>
                            <?php
                            /**
                             * woocommerce_after_shop_loop_item_title hook.
                             *
                             * 
                             * @hooked woocommerce_template_loop_price - 10
                             */
                            do_action( 'woocommerce_template_loop_price' );
                            ?>
                                <div class="wd_hiden_grid">
                            <?php
                                do_action('woocommerce_shop_loop_item_rating' );
                                do_action('woocommerce_shop_loop_item_excerpt' );
                            ?>
                                </div>
                                <div class="wd_add_to_cart_list wd_hiden_grid">
                                    <div class='wd_btn_add_to_cart_list'><?php do_action('woocommerce_after_shop_loop_item_cart' ); ?></div>
                                 </div>
                             </div>
                             
                             <?php if($thumbnail_product == 'right'):?>
                                <div class="wd-item-header">
                                    <?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
                                </div>
                            <?php endif; ?>
                        
                    <?php endwhile; // end of the loop. ?>
                    
                </div>
            </div>
        </div>  
        <?php   wp_reset_postdata();
        return '<div class="woocommerce">' . ob_get_clean() . '</div>'; 
    }
}       
add_shortcode('woo_product','wd_woo_product');  
?>