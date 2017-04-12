<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage wdjewelry
 * @since wdjewelry 1.0
 */
?>
		</div><!-- .site-content -->
		<?php if (wdjewelry_get_footer_style() != 'footer_hidden'): ?>
			<?php if (wdjewelry_get_footer_style() === 'footer_white') {
				require_once(get_template_directory().'/framework/lib/footer_vs2.php');
			}elseif (wdjewelry_get_footer_style() === 'footer_line') {
				require_once(get_template_directory().'/framework/lib/footer_vs3.php');
			}elseif (wdjewelry_get_footer_style() === 'footer_custom') {
				require_once(get_template_directory().'/framework/lib/footer_vs4.php');			
			}else{
				require_once(get_template_directory().'/framework/lib/footer_vs1.php');
			} ?>
			
		<?php endif; ?>
</div><!-- .site -->
<?php do_action('wdjewelry_scroll_button');?>
<?php wp_footer(); ?>
</body>
</html>
