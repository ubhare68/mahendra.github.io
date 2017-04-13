<?php

function dslc_partners_module_cpt() {

	$capability = dslc_get_option( 'lc_min_capability_partners_m', 'dslc_plugin_options_access_control' );
	if ( ! $capability ) $capability = 'publish_posts';

	register_post_type( 'dslc_partners', array(
		'menu_icon' => 'dashicons-groups',
		'labels' => array(
			'name' => __( 'Partners', 'dslc_string' ),
			'singular_name' => __( 'Partner', 'dslc_string' ),
			'add_new' => __( 'Add Partner', 'dslc_string' ),
			'add_new_item' => __( 'Add Partner', 'dslc_string' ),
			'edit' => __( 'Edit', 'dslc_string' ),
			'edit_item' => __( 'Edit Partner', 'dslc_string' ),
			'new_item' => __( 'New Partner', 'dslc_string' ),
			'view' => __( 'View Partner', 'dslc_string' ),
			'view_item' => __( 'View Partner', 'dslc_string' ),
			'search_items' => __( 'Search Partner', 'dslc_string' ),
			'not_found' => __( 'No Partner found', 'dslc_string' ),
			'not_found_in_trash' => __( 'No Partner found in Trash', 'dslc_string' ),
			'parent' => __( 'Parent Partner', 'dslc_string' ),
		),
		'public' => true,
		'rewrite' => array( 'slug' => dslc_get_option( 'partners_slug', 'dslc_plugin_options_cpt_slugs' ) ),
		'supports' => array( 'title', 'custom-fields', 'excerpt', 'editor', 'author', 'thumbnail'  ),
		'capabilities' => array(
			'publish_posts' => $capability,
			'edit_posts' => $capability,
			'edit_others_posts' => $capability,
			'delete_posts' => $capability,
			'delete_others_posts' => $capability,
			'read_private_posts' => $capability,
			'edit_post' => $capability,
			'delete_post' => $capability,
			'read_post' => $capability
		),
	));
	
	register_taxonomy('dslc_partners_cats', 'dslc_partners', array( 'label' => 'Categories', 'hierarchical' => true, 'public' => true, 'rewrite' => array( 'slug' => dslc_get_option( 'partners_cats_slug', 'dslc_plugin_options_cpt_slugs' ) )));

} add_action( 'init', 'dslc_partners_module_cpt' );