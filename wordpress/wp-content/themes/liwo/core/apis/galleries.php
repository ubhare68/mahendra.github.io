<?php
// Register Galleries Type
function studio_gallery() {

  $labels = array(
    'name'                => _x( 'Galleries', 'Galleries Type General Name', 'themestudio' ),
    'singular_name'       => _x( 'Galleries', 'Galleries Type Singular Name', 'themestudio' ),
    'menu_name'           => __( 'Galleries', 'themestudio' ),
    'parent_item_colon'   => __( 'Parent Item:', 'themestudio' ),
    'all_items'           => __( 'All Items', 'themestudio' ),
    'view_item'           => __( 'View Item', 'themestudio' ),
    'add_new_item'        => __( 'Add New Item', 'themestudio' ),
    'add_new'             => __( 'Add New', 'themestudio' ),
    'edit_item'           => __( 'Edit Item', 'themestudio' ),
    'update_item'         => __( 'Update Item', 'themestudio' ),
    'search_items'        => __( 'Search Item', 'themestudio' ),
    'not_found'           => __( 'Not found', 'themestudio' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'themestudio' ),
  );
  $args = array(
    'label'               => __( 'studio_gallery', 'themestudio' ),
    'description'         => __( 'Galleries Type Description', 'themestudio' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'thumbnail' ),
    'taxonomies'          => array( ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'menu_icon'           => 'dashicons-images-alt',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
  );
  register_post_type( 'studio_gallery', $args );

}

// Hook into the 'init' action
add_action( 'init', 'studio_gallery', 0 );
?>