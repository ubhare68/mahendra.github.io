<?php
function wdjewelry_lib_footer() {
	global $wdjewelry_type_footer;
	global $wdjewelry_background_footer;

	$wdjewelry_type_footer = array(
	array(
		'name'          => esc_html__( 'Column 3', 'wdjewelry' ),
		'value'         => 'default',
	),
	array(
		'name'          => esc_html__( 'Column 1', 'wdjewelry' ),
		'value'         => 'column_1',
	),
	array(
		'name'          => esc_html__( 'Column 2', 'wdjewelry' ),
		'value'         => 'column_2',
	),
	array(
		'name'          => esc_html__( 'Hidden', 'wdjewelry' ),
		'value'         => 'footer_hidden',
	));
	$wdjewelry_background_footer = array(
	array(
		'name'          => esc_html__( 'Black', 'wdjewelry' ),
		'value'         => 'footer_black',
	),
	array(
		'name'          => esc_html__( 'White', 'wdjewelry' ),
		'value'         => 'footer_white',
	));
}
add_action( 'widgets_init', 'wdjewelry_lib_footer' ); 