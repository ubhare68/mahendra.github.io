<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage wdjewelry
 * @since wdjewelry 1.0
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<div id="main" class="site-main row" role="main">
		<?php $sub_class = (wdjewelry_check_layout('layout_archive')?'col-sm-18':'col-sm-24'); ?>
		<!-- SHOW  SIDEBAR lEFT -->
		<?php
			if(get_theme_mod('layout_archive','sidebar-right') === 'sidebar-left'):
				echo '<div class="col-sm-6 sidebar sidebar__left">';
				wdjewelry_get_sidebar('sidebar_archive','layout_archive');
				echo '</div>';
			endif;
		?>

			<div class='<?php echo esc_attr($sub_class); ?>'>
				<div class="wd_content content_blog">
					<div class="wd-products-wrapper small_image">
						<?php if ( have_posts() ) : ?>
							<header class="page-header">
								<?php
									the_archive_title( '<h1 class="page-title">', '</h1>' );
									the_archive_description( '<div class="taxonomy-description">', '</div>' );
								?>
							</header><!-- .page-header -->

							<?php
							// Start the Loop.
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', get_post_format() );

							// End the loop.
							endwhile;

							// Previous/next page navigation.
							the_posts_pagination( array(
								'prev_text'          => esc_html__( 'Previous page', 'wdjewelry' ),
								'next_text'          => esc_html__( 'Next page', 'wdjewelry' ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'wdjewelry' ) . ' </span>',
							) );

						// If no content, include the "No posts found" template.
						else :
							get_template_part( 'template-parts/content', 'none' );

						endif;
						?>
					</div>
				</div>
			</div>
			<!-- SHOW SIDEBAR LEFT -->
		<?php
			if(get_theme_mod('layout_archive','sidebar-right') === 'sidebar-right'):
				echo '<div class="col-sm-6 sidebar sidebar__right">';
				wdjewelry_get_sidebar('sidebar_archive','layout_archive');
				echo '</div>';
			endif;
		?>
		<div class="clear"></div>
		</div><!-- .site-main -->
	</div><!-- .content-area -->
<?php get_footer(); ?>
