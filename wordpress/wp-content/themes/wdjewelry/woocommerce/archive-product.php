<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
	<div class='Shop__content'>
		
		<?php $col_content = (wdjewelry_check_layout('tvlgiao_wpdance_layout_shop','fullwidth')?'col-sm-18':'col-sm-24'); ?>
		<?php if(get_theme_mod( 'tvlgiao_wpdance_banner_shop')): ?>
			<div class="shop__banner">
				<img src="<?php echo get_theme_mod( 'tvlgiao_wpdance_banner_shop'); ?>" title='baner' >
			</div>
		<?php endif; ?>

		<div class="row">
			
			<?php
			if(get_theme_mod('tvlgiao_wpdance_layout_shop','fullwidth') === 'sidebar-left'):
				echo '<div class="col-sm-6 sidebar sidebar__left">';
				wdjewelry_get_sidebar('tvlgiao_wpdance_layout_sidebar_shop','tvlgiao_wpdance_layout_shop');
				echo '</div>';
			endif;
			?>
			<div class='<?php echo esc_attr($col_content); ?>'>
				<div class="wd-products-wrapper grid-list-action">
				<?php if ( have_posts() ) : ?>
					<div class="wd_before_shop_loop">
					<?php
						/**
						 * woocommerce_before_shop_loop hook.
						 *
						 * @hooked woocommerce_result_count - 20
						 * @hooked woocommerce_catalog_ordering - 30
						 */

						do_action( 'woocommerce_before_shop_loop' );
					?>
					</div>
					<?php woocommerce_product_loop_start(); ?>

						<?php woocommerce_product_subcategories(); ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php $woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 2 ); ?>
								<?php wc_get_template_part( 'content', 'product' ); ?>
						<?php endwhile; // end of the loop. ?>

					<?php woocommerce_product_loop_end(); ?>
					
					<?php
						/**
						 * woocommerce_after_shop_loop hook.
						 *
						 * @hooked woocommerce_pagination - 10
						 */
						do_action( 'woocommerce_after_shop_loop' );
					?>

				<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

					<?php wc_get_template( 'loop/no-products-found.php' ); ?>

				<?php endif; ?>
			</div>
		</div>
			<?php
				if(get_theme_mod('tvlgiao_wpdance_layout_shop','fullwidth') === 'sidebar-right'):
					echo '<div class="col-sm-6 sidebar sidebar__right">';
					wdjewelry_get_sidebar('tvlgiao_wpdance_layout_sidebar_shop','tvlgiao_wpdance_layout_shop');
					echo '</div>';
				endif;
			?>
		</div>
	<div class="clear"></div>
	</div>
<?php get_footer( 'shop' ); ?>
