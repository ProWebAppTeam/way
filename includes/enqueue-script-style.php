<?php 
if(!defined('ABSPATH')){
    exit;
}

/**
 * Enqueue scripts and styles.
 */
 
add_action( 'wp_enqueue_scripts', 'way_u_choose_styles' );

function way_u_choose_styles() {
	wp_enqueue_style( 'way_u_choose-style', get_stylesheet_uri());
	wp_enqueue_style( 'way_u_choose-style-animated', get_template_directory_uri() . '/assets/css/animate.css');
    wp_enqueue_style('way_u_choose-style-swiper', get_template_directory_uri() . '/assets/css/swiper/swiper-bundle.min.css');
    wp_enqueue_style('DrukTextWideCyMedium', get_template_directory_uri() . '/assets/fonts/DrukTextWideCyMedium.otf');
    wp_enqueue_style('HelveticaBold', get_template_directory_uri() . '/assets/fonts/HelveticaBold.otf');
    wp_enqueue_style('HelveticaLight', get_template_directory_uri() . '/assets/fonts/HelveticaLight.otf');
}


function way_u_choose_scripts() {

	wp_enqueue_script( 'way_u_choose-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );

    wp_enqueue_script('way_u_choose-jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), _S_VERSION, true);

    wp_enqueue_script('way_u_choose-mask', get_template_directory_uri() . '/assets/js/jquery.maskedinput.js', array(), _S_VERSION, true);

    wp_enqueue_script('way_u_choose-jquery-valid', get_template_directory_uri() . '/assets/js/jquery.validate.min.js', array(), _S_VERSION, true);

    wp_enqueue_script('way_u_choose-modal', get_template_directory_uri() . '/assets/js/modalEffects.js', array(), _S_VERSION, true);

    wp_enqueue_script('way_u_choose-modaleffect', get_template_directory_uri() . '/assets/js/modalEffects.js', array(), _S_VERSION, true);

    wp_enqueue_script('way_u_choose-wow', get_template_directory_uri() . '/assets/js/wow.min.js', array(), _S_VERSION, true);

    wp_enqueue_script('way_u_choose-swiper', get_template_directory_uri() . '/assets/js/swiper/swiper-bundle.min.js', array(), _S_VERSION, true);


    wp_enqueue_script('way_u_choose-classie', get_template_directory_uri() . '/assets/js/classie.js', array(), _S_VERSION, true);

    wp_enqueue_script('way_u_choose-ui', "https://code.jquery.com/ui/1.13.1/jquery-ui.js", array(), _S_VERSION, true);
    
    wp_enqueue_script('way_u_choose-script', get_template_directory_uri() . '/assets/js/script.js', array(), _S_VERSION, true);


    

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'way_u_choose_scripts' );
