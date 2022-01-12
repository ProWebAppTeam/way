<?php 
if(!defined('ABSPATH')){
    exit;
}

/**
 * Enqueue scripts and styles.
 */
add_action('wp_enqueue_scripts', 'way_u_choose_styles');
function way_u_choose_styles() {
	wp_enqueue_style( 'way_u_choose-style', get_stylesheet_uri());
	wp_enqueue_style('way_u_style', get_template_directory_uri() . '/assets/css/style.css', array('way_u_choose-style'), null, "all" );
	// wp_style_add_data( 'way_u_choose-style', 'rtl', 'replace' );
}

add_action('wp_enqueue_scripts', 'way_u_choose_scripts');
function way_u_choose_scripts() {

	wp_enqueue_script( 'way_u_choose-navigation', get_template_directory_uri() . 'assets/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
