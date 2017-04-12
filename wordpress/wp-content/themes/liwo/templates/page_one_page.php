<?php
	/*
	Template Name: One Page Template
	*/
	
	/**
	 * page_one_page.php
	 * Used mainly for the page builder
	 * @author Vu Ngoc Linh
	 * @package Liwo
	 * @since 1.0.0
	 */
	get_header();
	the_post();
	
?>

	<div class="container_full">
		<div id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php the_content(); ?>
		</div>
	</div>

<?php
	get_footer();