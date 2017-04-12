<?php
/**
 * wdjewelryback compat functionality
 *
 * Prevents wdjewelryfrom running on WordPress versions prior to 4.4,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.4.
 *
 * @package WordPress
 * @subpackage wdjewelry
 * @since wdjewelry 1.0
 */

/**
 * Prevent switching to wdjewelryon old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since wdjewelry 1.0
 */
function wdjewelry_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );

	unset( $_GET['activated'] );

	add_action( 'admin_notices', 'wdjewelry_upgrade_notice' );
}
add_action( 'after_switch_theme', 'wdjewelry_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * wdjewelryon WordPress versions prior to 4.4.
 *
 * @since wdjewelry 1.0
 *
 * @global string $wp_version WordPress version.
 */
function wdjewelry_upgrade_notice() {
	$message = sprintf( esc_html__( 'wdjewelryrequires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'wdjewelry' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.4.
 *
 * @since wdjewelry 1.0
 *
 * @global string $wp_version WordPress version.
 */
function wdjewelry_customize() {
	wp_die( sprintf( esc_html__( 'wdjewelryrequires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'wdjewelry' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'wdjewelry_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.4.
 *
 * @since wdjewelry 1.0
 *
 * @global string $wp_version WordPress version.
 */
function wdjewelry_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( esc_html__( 'wdjewelryrequires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'wdjewelry' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'wdjewelry_preview' );
