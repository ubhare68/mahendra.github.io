<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage wdjewelry
 * @since wdjewelry 1.0
 */
?>
<?php $page_id = wdjewelry_page_id(); ?>
<?php if(get_post_meta($page_id,'_sidebar_left',true )): ?>
	<?php if ( is_active_sidebar(get_post_meta($page_id,'_sidebar_left',true )) ) : ?>
			<aside id="secondary" class="sidebar widget-area" role="complementary">
				<?php dynamic_sidebar(get_post_meta($page_id,'_sidebar_left',true )); ?>
			</aside><!-- .sidebar .widget-area -->
	<?php endif; ?>
<?php else: ?>
	<aside id="content-bottom-widgets" class="content-bottom-widgets" role="complementary">
		<?php if( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<div class="widget-area">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div><!-- .widget-area -->
		<?php endif; ?>
	</aside><!-- .content-bottom-widgets -->
<?php endif; ?>

