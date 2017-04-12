<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage wdjewelry
 * @since wdjewelry 1.0
 */
?>

<aside id="content-bottom-widgets" class="content-bottom-widgets" role="complementary">
	<?php if( is_active_sidebar('sidebar-1' ) ) : ?>
		<div class="widget-area">
			<?php dynamic_sidebar('sidebar-1' ); ?>
		</div><!-- .widget-area -->
	<?php endif; ?>
</aside><!-- .content-bottom-widgets -->