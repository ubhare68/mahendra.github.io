<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Centum
 */
?>
<!--  Page Title -->

	<!-- 960 Container Start -->
	<div class="container page-title-container">
		<div class="sixteen columns">
			
		</div>
	</div>
	<!-- 960 Container End -->

<!-- Page Title End -->
<!-- 960 Container -->
<div class="container">
	<?php

	$sidebar_side = get_post_meta($post->ID, 'incr_sidebar_layout', true);

	?>
<!-- Blog Posts
	================================================== -->
	<div class="twelve columns tooltips <?php if($sidebar_side == "left-sidebar") { echo "left-sb"; } ?>">

		<?php while (have_posts()) : the_post(); ?>
		<!-- Post -->
		<div <?php post_class('post'); ?> id="post-<?php the_ID(); ?>" >
			<?php the_content() ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'centum' ),
					'after'  => '</div>',
				) );
			?>
			<footer class="entry-footer">
				<?php edit_post_link( __( 'Edit', 'centum' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-footer -->
		</div>
		<!-- Post -->
	<?php endwhile; // End the loop. Whew.  ?>
	<?php
	if(ot_get_option('centum_page_comments','on') == 'off') {
		if ( comments_open() || '0' != get_comments_number() ) { comments_template('', true); }
	}
	?>
	</div> <!-- eof eleven column -->


