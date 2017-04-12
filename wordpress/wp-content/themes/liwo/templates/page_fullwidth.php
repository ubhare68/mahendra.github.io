<?php
	/*
	Template Name: Full Width Template
	*/
	
	/**
	 * page_fullwidth.php
	 * Used mainly for the page builder
	 * @author Vu Ngoc Linh
	 * @package Liwo
	 * @since 1.0.0
	 */
	get_header();
	the_post();
	get_template_part('loop/content','pagetitle');
?>
<div class="container">
	<div class="content_fullwidth">
		<div id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php the_content(); ?>
		</div>
	</div>
</div>
<?php get_footer();