<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
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

get_header('shop'); ?>
	<div class="main row">
	<?php $sub_class = (wdjewelry_check_layout('layout_singe_product')?'col-sm-18':'col-sm-24'); ?>
		<!-- SHOW  SIDEBAR lEFT -->
		<?php
			if(get_theme_mod('layout_singe_product','sidebar-right') === 'sidebar-left'):
				echo '<div class="col-sm-6 sidebar sidebar__left">';
				wdjewelry_get_sidebar('sidebar_singe_product','layout_singe_product');
				echo '</div>';
			endif;
			?>

		<!-- CONTENT -->
		<div class="<?php echo esc_attr($sub_class); ?>">
			<?php
				/**
				 * woocommerce_before_main_content hook.
				 *
				 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
				 * @hooked woocommerce_breadcrumb - 20
				 */
				do_action( 'woocommerce_before_main_content' );
			?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'single-product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php
				/**
				 * woocommerce_after_main_content hook.
				 *
				 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
				 */
				do_action( 'woocommerce_after_main_content' );
			?>
		
		<?php
			if(get_theme_mod('layout_singe_product','sidebar-right') === 'sidebar-right'):
				echo '<div class="col-sm-6 sidebar sidebar__right">';
				wdjewelry_get_sidebar('sidebar_singe_product','layout_singe_product');
				echo '</div>';
			endif;
		?>
	<div class="clear"></div>
</div>
<?php get_footer('shop'); ?>
