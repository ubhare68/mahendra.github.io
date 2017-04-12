<?php 
	/**
	 * page.php
	 * The standard page template in Liwo
	 * @author Vu Ngoc Linh
	 * @package Liwo
	 * @since 1.0.0
	 */
	get_header();
	the_post();
get_template_part('loop/content','pagetitle');
?>
<div class="content_fullwidth">
<div class="container">
		<div id="page-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php
				the_content();
				wp_link_pages();
			?>
		</div>
		<div class="clearfix divider_line"></div>
		<?php if(comments_open()) comments_template(); ?>
	</div>
</div>

<?php
	
	get_footer();