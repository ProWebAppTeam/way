<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
   Container::make( 'theme_options', 'Настройки темы' )
	 ->add_tab( __( 'Main Page' ), array(
        Field::make( 'image', 'way_main_image', __( 'Backgroung Image' ) ),
        Field::make( 'image', 'first_main_carousel_image', __( 'First carosel image' ) ),
        Field::make( 'image', 'second_main_carousel_image', __( 'Second carosel image' ) ),
        Field::make( 'image', 'third_main_carousel_image', __( 'Third carosel image' ) ),
	) )
	->add_tab( 'Подвал', array(
		Field::make( 'text', 'way_email', 'Notification Email' ),
		Field::make( 'text', 'way_phone', 'Phone Number' )
	) )
	->add_tab( 'Соц сети', array(
		Field::make( 'text', 'way_inst', 'Instagram' ),
	) );
}

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
	load_template( get_template_directory() . '/includes/carbon-fields/vendor/autoload.php' );
	\Carbon_Fields\Carbon_Fields::boot();
}