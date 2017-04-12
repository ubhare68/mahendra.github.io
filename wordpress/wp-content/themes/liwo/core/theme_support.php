<?php
/**
 * ThemeStudio Framework functions and definitions.
 *
 * @package WordPress
 * @subpackage ThemeStudio.Net
 * @since ThemeStudio Framework 1.0
 */

if ( ! isset( $content_width ) )
	$content_width = 960;

if ( ! function_exists('themestudio_setup') ){
	/**
	 * Sets up theme defaults and registers the various WordPress features that
	 * ThemeStudio Framework supports.
	 *
	 * @uses load_theme_textdomain() For translation/localization support.
	 * @uses add_editor_style() To add a Visual Editor stylesheet.
	 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
	 * 	custom background, and post formats.
	 * @uses register_nav_menu() To add support for navigation menus.
	 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
	 *
	 * @since ThemeStudio Framework 1.0
	 */
	function themestudio_setup() {

		load_theme_textdomain( 'themestudio', get_template_directory() . '/languages/'.get_locale() .'mo' );

		add_editor_style();

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'post-formats', array(  'image', 'gallery','video','audio' ) );

		add_theme_support( 'woocommerce' );
			
		//add image sizes
		if(function_exists('add_image_size')) {
			add_image_size('full-size',  9999, 9999, false);
			add_image_size('small-thumb',  90, 90, true);
		}

		global $liwo;
	
		if(isset($liwo['body_background'])){
			$args = array(
			   'default-image' => $liwo['body_background']['background-image'],
			);
			add_theme_support( 'custom-header', $args );
			add_theme_support( 'custom-background', $args );
		}

	}
	add_action( 'after_setup_theme', 'themestudio_setup' );
}

if ( ! function_exists('ts_add_thumbnail_size')){
	
	#
	#Creates wordpress image thumb sizes for the theme
	#
	function ts_add_thumbnail_size($thumb_size)
	{	
		foreach ($thumb_size['imgSize'] as $sizeName => $size)
		{
			if($sizeName == 'base')
			{
				set_post_thumbnail_size($thumb_size['imgSize'][$sizeName]['width'], $thumb_size[$sizeName]['height'], true);
			}
			else
			{	
				add_image_size(	 
					$sizeName,
					$thumb_size['imgSize'][$sizeName]['width'], 
					$thumb_size['imgSize'][$sizeName]['height'], 
					true);
			}
		}
	}
}

/*======== Add theme support thumbnails ========*/
add_theme_support('post-thumbnails', array('post', 'dslc_projects', 'dslc_staff'));

$thumb_size['imgSize']['size-recent-post'] = array('width'=>57,  'height'=>43);
$thumb_size['imgSize']['team-4columns'] = array('width'=>260,  'height'=>260);
$thumb_size['imgSize']['portfolio-popup'] = array('width'=>520,  'height'=>280);
$thumb_size['imgSize']['portfolio-4columns'] = array('width'=>319,  'height'=>319);
$thumb_size['imgSize']['recent-post-image'] = array('width'=>50,  'height'=>50);

ts_add_thumbnail_size($thumb_size);

if ( ! function_exists('themestudio_scripts_styles')){
	/**
	 * Enqueues scripts and styles for front-end.
	 *
	 * @since ThemeStudio Framework 1.0
	 */
	function themestudio_scripts_styles() {
		global $wp_styles;

		/*
		 * Adds JavaScript to pages with the comment form to support
		 * sites with threaded comments (when in use).
		 */
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

		// IE style

		wp_enqueue_style( 'themestudio-ie', get_template_directory_uri() . '/css/ie.css', array( 'themestudio-style' ), '30042013' );
		$wp_styles->add_data( 'themestudio-ie', 'conditional', 'lt IE 9' );
	}
	add_action( 'wp_enqueue_scripts', 'themestudio_scripts_styles' );
}

if ( ! function_exists( 'themestudio_content_nav' ) ) :
	/**
	 * Displays navigation to next/previous pages when applicable.
	 *
	 * @since ThemeStudio Framework 1.0
	 */
	function themestudio_content_nav( $html_id ) {
		global $wp_query;

		$html_id = esc_attr( $html_id );

		if ( $wp_query->max_num_pages > 1 ) : ?>
			<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
				<h3 class="assistive-text"><?php _e( 'Post navigation', 'themestudio' ); ?></h3>
				<div class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'themestudio' ) ); ?></div>
				<div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'themestudio' ) ); ?></div>
			</nav><!-- #<?php echo $html_id; ?> .navigation -->
		<?php endif;
	}
endif;

if ( ! function_exists( 'themestudio_comment' ) ) :
	/**
	 * Template for comments and pingbacks.
	 *
	 * To override this walker in a child theme without modifying the comments template
	 * simply create your own themestudio_comment(), and that function will be used instead.
	 *
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 *
	 * @since ThemeStudio Framework 1.0
	 */
	function themestudio_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
			// Display trackbacks differently than normal comments.
		?>
		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
			<p><?php _e( 'Pingback:', 'themestudio' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'themestudio' ), '<span class="edit-link">', '</span>' ); ?></p>
		<?php
				break;
			default :
			// Proceed with normal comments.
			global $post;
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<article id="comment-<?php comment_ID(); ?>" class="comment">
				<header class="comment-meta comment-author vcard">
					<?php
						echo get_avatar( $comment, 44 );
						printf( '<cite class="fn">%1$s %2$s</cite>',
							get_comment_author_link(),
							// If current post author is also comment author, make it known visually.
							( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'themestudio' ) . '</span>' : ''
						);
						printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
							esc_url( get_comment_link( $comment->comment_ID ) ),
							get_comment_time( 'c' ),
							/* translators: 1: date, 2: time */
							sprintf( __( '%1$s at %2$s', 'themestudio' ), get_comment_date(), get_comment_time() )
						);
					?>
				</header><!-- .comment-meta -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'themestudio' ); ?></p>
				<?php endif; ?>

				<section class="comment-content comment">
					<?php comment_text(); ?>
					<?php edit_comment_link( __( 'Edit', 'themestudio' ), '<p class="edit-link">', '</p>' ); ?>
				</section><!-- .comment-content -->

				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'themestudio' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div><!-- .reply -->
			</article><!-- #comment-## -->
		<?php
			break;
		endswitch; // end comment_type check
	}
endif;

if ( ! function_exists( 'themestudio_entry_meta' ) ) :
	/**
	 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
	 *
	 * Create your own themestudio_entry_meta() to override in a child theme.
	 *
	 * @since ThemeStudio Framework 1.0
	 */
	function themestudio_entry_meta() {
		// Translators: used between list items, there is a space after the comma.
		$categories_list = get_the_category_list( __( ', ', 'themestudio' ) );

		// Translators: used between list items, there is a space after the comma.
		$tag_list = get_the_tag_list( '', __( ', ', 'themestudio' ) );

		$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);

		$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'themestudio' ), get_the_author() ) ),
			get_the_author()
		);

		// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
		if ( $tag_list ) {
			$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'themestudio' );
		} elseif ( $categories_list ) {
			$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'themestudio' );
		} else {
			$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'themestudio' );
		}

		printf(
			$utility_text,
			$categories_list,
			$tag_list,
			$date,
			$author
		);
	}
endif;

// Un register post types
if ( ! function_exists( 'unregister_post_type' ) ) :
	function unregister_post_type( $post_type ) {
	    global $wp_post_types;
	    if ( isset( $wp_post_types[ $post_type ] ) ) {
	        unset( $wp_post_types[ $post_type ] );
	        return true;
	    }
	    return false;
	}
endif;

if( ! function_exists('remove_default_post_type')){
	// Remove default custom post types
	function remove_default_post_type(){
		unregister_post_type('dslc_downloads');	
		//unregister_post_type('dslc_partners');	
		unregister_post_type('dslc_galleries');	
		unregister_post_type('dslc_templates');	
	}
	add_action( 'init', 'remove_default_post_type');
}

// Define constant
$get_theme = wp_get_theme();

define('THEMESTUDIO_THEME_NAME', $get_theme);
define('THEMESTUDIO_THEME_VERSION', '1.0.0.0');

define('THEMESTUDIO_THEME_SLUG', 'liwo');

define('THEMESTUDIO_BASE_URL', get_template_directory_uri());

define('THEMESTUDIO_BASE', get_template_directory());
define('THEMESTUDIO_LIBRARIES', THEMESTUDIO_BASE . '/core');
define('THEMESTUDIO_LOOP', THEMESTUDIO_BASE . '/loop/');


define('THEMESTUDIO_SHORTCODE', THEMESTUDIO_BASE . '/core/shortcodes');
define('THEMESTUDIO_FUNCTIONS', THEMESTUDIO_BASE . '/core');
define('THEMESTUDIO_METAS', THEMESTUDIO_BASE . '/core/functions');
define('THEMESTUDIO_OPTION', THEMESTUDIO_BASE . '/core/admin');

define('THEMESTUDIO_API', THEMESTUDIO_FUNCTIONS . '/apis');

define('THEMESTUDIO_ASSETS', THEMESTUDIO_BASE_URL . '/assets');

define('THEMESTUDIO_JS', THEMESTUDIO_BASE_URL . '/assets/js');
define('THEMESTUDIO_CSS', THEMESTUDIO_BASE_URL . '/assets/css');
define('THEMESTUDIO_FANCYBOX', THEMESTUDIO_BASE_URL . '/assets/fancybox');

define('THEMESTUDIO_IMAGES', THEMESTUDIO_BASE_URL . '/assets/images');
define('THEMESTUDIO_TEMPLATE', THEMESTUDIO_BASE_URL . '/templates');
define('THEMESTUDIO_THEME_LIBS_URL', THEMESTUDIO_BASE_URL . '/core');
define('THEMESTUDIO_THEME_FUNCTION_URL', THEMESTUDIO_THEME_LIBS_URL . '/functions');
define('THEMESTUDIO_THEME_OPTION_URL', THEMESTUDIO_BASE_URL . '/core/admin');