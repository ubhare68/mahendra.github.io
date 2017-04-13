<?php

global $dslc_var_post_options;

$dslc_var_post_options['dslc-testimonials-post-options'] = array(
	'title' => 'Testimonial Options',
	'show_on' => 'dslc_testimonials',
	'options' => array(
		array(
			'label' => 'Position',
			'std' => '',
			'id' => 'dslc_testimonial_author_pos',
			'type' => 'text',
		),
	)
);

function dslc_testimonials_module_cpt() {

	$capability = dslc_get_option( 'lc_min_capability_testimonials_m', 'dslc_plugin_options_access_control' );
	if ( ! $capability ) $capability = 'publish_posts';

	register_post_type( 'dslc_testimonials', array(
		'menu_icon' => 'dashicons-format-quote',
		'labels' => array(
			'name' => __( 'Testimonials', 'dslc_string' ),
			'singular_name' => __( 'Testimonial', 'dslc_string' ),
			'add_new' => __( 'Add Testimonial', 'dslc_string' ),
			'add_new_item' => __( 'Add Testimonial', 'dslc_string' ),
			'edit' => __( 'Edit', 'dslc_string' ),
			'edit_item' => __( 'Edit Testimonial', 'dslc_string' ),
			'new_item' => __( 'New Testimonial', 'dslc_string' ),
			'view' => __( 'View Testimonial', 'dslc_string' ),
			'view_item' => __( 'View Testimonial', 'dslc_string' ),
			'search_items' => __( 'Search Testimonials', 'dslc_string' ),
			'not_found' => __( 'No Testimonials found', 'dslc_string' ),
			'not_found_in_trash' => __( 'No Testimonials found in Trash', 'dslc_string' ),
			'parent' => __( 'Parent Testimonial', 'dslc_string' ),
		),
		'public' => true,
		'rewrite' => array( 'slug' => 'testimonial-view' ),
		'supports' => array( 'title', 'custom-fields', 'excerpt', 'editor', 'author', 'thumbnail' ),
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
	
	register_taxonomy(
		'dslc_testimonials_cats', 
		'dslc_testimonials', 
		array( 
			'label' => 'Categories', 
			'hierarchical' => true, 
			'public' => true,
			'capabilities' => array(
				'manage_terms' => $capability,
				'edit_terms' => $capability,
				'delete_terms' => $capability,
				'assign_terms' => $capability,
			),
		)
	);

} add_action( 'init', 'dslc_testimonials_module_cpt' );

