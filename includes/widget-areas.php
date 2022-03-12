<?php 
if(!defined('ABSPATH')){
    exit;
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function way_u_choose_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'way_u_choose' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'way_u_choose' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
			'before_sidebar' => '', // WP 5.6
			'after_sidebar'  => '',
			'description'   => '',
			'class'         => '',
		)
	);
		register_sidebar(
		array(
			'name'          => esc_html__( 'For Price filter', 'way_u_choose' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'way_u_choose' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
			'before_sidebar' => '', // WP 5.6
			'after_sidebar'  => '',
			'description'   => '',
			'class'         => '',
		)
	);
}
add_action( 'widgets_init', 'way_u_choose_widgets_init' );