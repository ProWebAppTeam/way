<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_meta_options' );
function crb_attach_meta_options() {
Container::make( 'post_meta', 'Custom Data' )
         ->show_on_post_type('product')
         //->show_on_template( 'templates/main-page.php' )
         ->add_fields( array(
	         Field::make( 'image', 'crb_photo' ),
         ) );
}