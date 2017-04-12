<?php
/**
 * wdjewelryfunctions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage WP_Funture
 * @since wdjewelry 1.0
 */

/**
 * wdjewelryonly works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

if ( ! function_exists( 'wdjewelry_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own wdjewelry_setup() function to override in a child theme.
 *
 * @since wdjewelry 1.0
 */
function wdjewelry_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on WP Funiture, use a find and replace
	 * to change 'wdjewelry' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'wdjewelry', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('wdjewelry_portfolio_image',480,300,true); 
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'wdjewelry' ),
		'social'  => esc_html__( 'Social Menu', 'wdjewelry' ),
		'mobile'  => esc_html__( 'Mobile Menu', 'wdjewelry' ),
		'menu-height'  => esc_html__( 'Menu Height', 'wdjewelry' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'image',
		'video',
		'quote',
		'audio',
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', wdjewelry_fonts_url() ) );
}
endif; // wdjewelry_setup
add_action( 'after_setup_theme', 'wdjewelry_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since wdjewelry 1.0
 */
function wdjewelry_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wdjewelry_content_width', 840 );
}
add_action( 'after_setup_theme', 'wdjewelry_content_width', 0 );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since wdjewelry 1.0
 */


if ( ! function_exists( 'wdjewelry_fonts_url' ) ) :
/**
 * Register Google fonts for WP Funiture.
 *
 * Create your own wdjewelry_fonts_url() function to override in a child theme.
 *
 * @since wdjewelry 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function wdjewelry_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Raleway, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Raleway font: on or off', 'wdjewelry' ) ) {
		$fonts[] = 'Raleway:400,700,900,400italic,700italic,900italic';
	}
	
	/* translators: If there are characters in your language that are not supported by Lato, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'wdjewelry' ) ) {
		$fonts[] = 'Lato:400,700,900,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'wdjewelry' ) ) {
		$fonts[] = 'Montserrat:400,700,900,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Playfair Display, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Playfair Display font: on or off', 'wdjewelry' ) ) {
		$fonts[] = 'Playfair Display:400,700,900,400italic,700italic,900italic';
	}
	
	/* translators: If there are characters in your language that are not supported by Playfair Display, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Muli font: on or off', 'wdjewelry' ) ) {
		$fonts[] = 'Muli:400,Light 300 ,Light 300 Italic ,Normal 400 Italic';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}


	return $fonts_url;
}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since wdjewelry 1.0
 */
function wdjewelry_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'wdjewelry_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since wdjewelry 1.0
 */
function wdjewelry_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style('fonts', wdjewelry_fonts_url(), array(), null );
	wp_enqueue_style('fonts1','https://fonts.googleapis.com/css?family=Belleza', array(), null );
	
	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style('genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

	// Theme stylesheet.
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'ie', get_template_directory_uri() . '/css/ie.css', array( 'wdjewelry-style' ), '20150930' );
	wp_style_add_data( 'ie', 'conditional', 'lt IE 10' );

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'ie8', get_template_directory_uri() . '/css/ie8.css', array( 'wdjewelry-style' ), '20151230' );
	wp_style_add_data( 'ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'ie7', get_template_directory_uri() . '/css/ie7.css', array( 'wdjewelry-style' ), '20150930' );
	wp_style_add_data( 'ie7', 'conditional', 'lt IE 8' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3',true );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151112', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20151104',true );
	}

	wp_enqueue_script( 'wdjewelry-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20151204', true );

	wp_localize_script( 'wdjewelry-script', 'screenReaderText', array(
		'expand'   => esc_html__( 'expand child menu', 'wdjewelry' ),
		'collapse' => esc_html__( 'collapse child menu', 'wdjewelry' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'wdjewelry_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since wdjewelry 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function wdjewelry_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	if(function_exists('wdjewelry_background_page')){
		$classes[] = wdjewelry_background_page();
	}
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'wdjewelry_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @since wdjewelry 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function wdjewelry_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since wdjewelry 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function wdjewelry_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

	if ( 'page' === get_post_type() ) {
		840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	} else {
		840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'wdjewelry_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since wdjewelry 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function wdjewelry_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'wdjewelry_post_thumbnail_sizes_attr', 10 , 3 );

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @since wdjewelry1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function wdjewelry_widget_tag_cloud_args( $args ) {
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'wdjewelry_widget_tag_cloud_args' );



// include  class from folder framework/class

$files = array('wd_classgetvar','class-tgm-plugin-activation');
 foreach ($files as $file) {
 	if(file_exists(get_template_directory().'/framework/class/'.$file.'.php')){
 		require_once(get_template_directory().'/framework/class/'.$file.'.php');
 	}
 	# code...
 }


// inlcude widget from folder framework/widget

 $files = array('product_category','product_selling','sidebar','wd_socila','ew_subscriptions','customrecent','flickr');
 foreach ($files as $file) {
 	if(file_exists(get_template_directory().'/framework/widget/'.$file.'.php')){
 		require_once(get_template_directory().'/framework/widget/'.$file.'.php');
 	}
 	# code...
 }

 // include function from folder framework/functions

 $files = array('wd_remove_section','global','scroll_button','filter_theme','list_category_product','wd_social','pagination','main','include_js','item_comment','wd_metabox_page','audios','wd_excerpt','wd_checkplugin','videos','wd_metabox','wd_account','wd_wishlist','background_header','breadcrumbs','customize','header_menu','wd_mini_cart','wd_global','wd_customize_font','wd_customize_layout','wd_customize_banner','wd_customize_color','wd_customize_animate','wd_edit_customize','wd_edit_customize_blog','wd_edit_customize_header','wd_edit_customize_footer','wd_edit_customize_product','wd_edit_customize_sidebar','wd_edit_customize_animate');
 foreach ($files as $file) {
 	if(file_exists(get_template_directory().'/framework/functions/'.$file.'.php')){
 		require_once(get_template_directory().'/framework/functions/'.$file.'.php');
 	}
 	# code...
 }
// include hook from folder framework/hook
// include 
$files = array('wd_hook_woo','wd_hook_filter');
 foreach ($files as $file) {
 	if(file_exists(get_template_directory().'/framework/hook/'.$file.'.php')){
 		require_once(get_template_directory().'/framework/hook/'.$file.'.php');
 	}
 	# code...
 }


 $files = array('style_footer');
 foreach ($files as $file) {
 	if(file_exists(get_template_directory().'/framework/lib/'.$file.'.php')){
 		require_once(get_template_directory().'/framework/lib/'.$file.'.php');
 	}
 	# code...
 }

 //include visual composer 
if(wdjewelry_checkplugin_vc()){
	 $files = array('vc_general','include_vc');
 	foreach ($files as $file) {
	 	if(file_exists(get_template_directory().'/framework/visual_composer/'.$file.'.php')){
	 		require_once(get_template_directory().'/framework/visual_composer/'.$file.'.php');
	 	}
 	# code...
 }
}

?>