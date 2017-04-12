<?php
function wdjewelry_widgets_init() {
	global $wdjewelry_default_sidebar;
	$wdjewelry_default_sidebar = array(
	array(
		'name'          => esc_html__( 'Sidebar', 'wdjewelry' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'wdjewelry' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	),
	array(
		'name'          => esc_html__( 'Sidebar 2', 'wdjewelry' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'wdjewelry' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	),
	array(
		'name'          => esc_html__( 'Sidebar 3', 'wdjewelry' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'wdjewelry' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	),
	array(
		'name'          => esc_html__( 'Sidebar 4', 'wdjewelry' ),
		'id'            => 'sidebar-4',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'wdjewelry' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	),
	array(
		'name'          => esc_html__( 'Widget Top Header 1 ', 'wdjewelry' ),
		'id'            => 'header-1',
		'description'   => esc_html__( 'Appears at the header of the content on posts and pages.', 'wdjewelry' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	),
	array(
		'name'          => esc_html__( 'Wiget Top Header 2', 'wdjewelry' ),
		'id'            => 'header-2',
		'description'   => esc_html__( 'Appears at the header of the content on posts and pages.', 'wdjewelry' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	),

	array(
		'name'          => esc_html__( 'News Letter ', 'wdjewelry' ),
		'id'            => 'newletter',
		'description'   => esc_html__( 'Appears at the Footer of the content on posts and pages.', 'wdjewelry' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	),

	array(
		'name'          => esc_html__( 'Wiget Footer 1', 'wdjewelry' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Appears at the Footer of the content on posts and pages.', 'wdjewelry' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	),
	array(
		'name'          => esc_html__( 'Wiget Footer 2', 'wdjewelry' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Appears at the Footer of the content on posts and pages.', 'wdjewelry' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	),
	array(
		'name'          => esc_html__( 'Wiget Footer 3', 'wdjewelry' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Appears at the Footer of the content on posts and pages.', 'wdjewelry' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	),
	array(
		'name'          => esc_html__( 'Wiget Footer 4', 'wdjewelry' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Appears at the Footer of the content on posts and pages.', 'wdjewelry' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	),
	array(
		'name'          => esc_html__( 'Payment ', 'wdjewelry' ),
		'id'            => 'widget-payment',
		'description'   => esc_html__( 'Appears at the Footer of the content on posts and pages.', 'wdjewelry' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	),
);

	foreach ($wdjewelry_default_sidebar as $sidebar) {
		register_sidebar( $sidebar );
	}

}

add_action( 'widgets_init', 'wdjewelry_widgets_init' ); 

?>