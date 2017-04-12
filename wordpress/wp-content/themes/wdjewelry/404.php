<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage WP_Funture
 * @since wdjewelry 1.0
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="number-404"><span><?php echo esc_html__('404','wdjewelry'); ?></span></h1>
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'wdjewelry' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'wdjewelry' ); ?></p>

					<a class="button" href="<?php echo esc_url(home_url('/' )); ?>"><?php echo esc_html__('GO BACK TO HOME PAGE','wdjewelry' ); ?></a>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- .site-main -->

	</div><!-- .content-area -->
<?php get_footer(); ?>