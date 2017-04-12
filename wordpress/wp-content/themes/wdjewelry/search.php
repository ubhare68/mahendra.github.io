<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage wdjewelry
 * @since wdjewelry 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="main" class="site-main row" role="main">
			<?php $sub_class = (wdjewelry_check_layout('layout_seach')?'col-sm-18':'col-sm-24'); ?>
			<!-- SHOW  SIDEBAR lEFT -->
			<?php
				if(get_theme_mod('layout_seach','sidebar-right') === 'sidebar-left'):
					echo '<div class="col-sm-6 sidebar sidebar__left">';
					wdjewelry_get_sidebar('sidebar_seach','layout_seach');
					echo '</div>';
				endif;
			?>
			<div class="<?php echo esc_attr($sub_class); ?>">
				<div class="wd_content content_blog">
					<div class="wd-products-wrapper small_image">
						<?php if ( have_posts() ) : ?>
							<header class="page-header">
								<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'wdjewelry' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
							</header><!-- .page-header -->

							<?php
							// Start the loop.
							while ( have_posts() ) : the_post();

								/**
								 * Run the loop for the search to output the results.
								 * If you want to overload this in a child theme then include a file
								 * called content-search.php and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'search' );

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
		<?php
			if(get_theme_mod('layout_seach','sidebar-right') === 'sidebar-right'):
				echo '<div class="col-sm-6 sidebar sidebar__right">';
				wdjewelry_get_sidebar('sidebar_seach','layout_seach');
				echo '</div>';
			endif;
		?>
		<div class="clear"></div>
	</div><!-- .site-main -->
		
</div><!-- .content-area -->
<?php get_footer(); ?>
