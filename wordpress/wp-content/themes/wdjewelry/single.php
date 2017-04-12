<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage wdjewelry
 * @since wdjewelry 1.0
 */

get_header(); ?>
<div id="primary" class="content-area">
	<div id="main" class="site-main row" role="main">
		<?php $sub_class = (wdjewelry_check_layout('layout_single')?'col-sm-18':'col-sm-24'); ?>
		<!-- SHOW  SIDEBAR lEFT -->
		<?php
			if(get_theme_mod('layout_single','sidebar-right') === 'sidebar-left'):
				echo '<div class="col-sm-6 sidebar sidebar__left">';
				wdjewelry_get_sidebar('sidebar_singe','layout_single');
				echo '</div>';
			endif;
		?>

		<!-- SHOW CONTENT  -->
		<div class='<?php echo esc_attr($sub_class); ?>'>
			<div class="wd_content_single">
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();

					// Include the single post content template.
					get_template_part( 'template-parts/content', 'single' );

					// If comments are open or we have at least one comment, load up the comment template.
					?>
					<div class="related_post">
						<?php get_template_part( 'templates/related_posts' ); ?>
					</div>
					<?php if ( comments_open() || get_comments_number() ) { ?>
						<div class="comment comment-blog">
							<?php comments_template(); ?>
						</div>
					<?php } ?>
					<?php
					// End of the loop.
				endwhile;
				?>
				
			</div>
		</div>

		<!-- SHOW SIDEBAR LEFT -->
		<?php
			if(get_theme_mod('layout_single','sidebar-right') === 'sidebar-right'):
				echo '<div class="col-sm-6 sidebar sidebar__right">';
				wdjewelry_get_sidebar('sidebar_singe','layout_single');
				echo '</div>';
			endif;
		?>
		<div class="clear"></div>
	</div><!-- .site-main -->
</div><!-- .content-area -->
<?php get_footer(); ?>