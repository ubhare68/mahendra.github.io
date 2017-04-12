<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 *
 * @package WordPress
 * @subpackage wdjewelry
 * @since wdjewelry 1.0
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<div id="main" class="site-main row" role="main">
			<?php $sub_class = (wdjewelry_check_layout('layout_page')?'col-sm-18':'col-sm-24'); ?>
			<!-- SHOW  SIDEBAR lEFT -->
			<?php
				if(get_theme_mod('layout_page','sidebar-right') === 'sidebar-left'):
					echo '<div class="col-sm-6 sidebar sidebar__left">';
					wdjewelry_get_sidebar('sidebar_page','layout_page');
					echo '</div>';
				endif;
			?>
			<div class='<?php echo esc_attr($sub_class); ?>'>
				<div class="wd_content">
					<?php if ( have_posts() ) : ?>
						<?php if ( is_home() && ! is_front_page() ) : ?>
							<header>
								<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
							</header>
						<?php endif; ?>

						<?php
						// Start the loop.
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
			<?php
			if(get_theme_mod('layout_page','sidebar-right') === 'sidebar-right'):
				echo '<div class="col-sm-6 sidebar sidebar__right">';
				wdjewelry_get_sidebar('sidebar_page','layout_page');
				echo '</div>';
			endif;
		?>
		</div><!-- .site-main -->
	</div><!-- .content-area -->
<?php get_footer(); ?>
