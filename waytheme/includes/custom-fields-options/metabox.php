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
		Field::make( 'complex', 'faq_single', 'Вопрос-ответ' )
			->add_fields( array(
				Field::make( 'text', 'question', 'Вопрос' )
					->set_width( 33 ),
				Field::make( 'text', 'answer', 'Ответ' )
					->set_width( 33 )
					) )));
         
         
Container::make( 'post_meta', 'FAQ Data' )
        //->show_on_post_type('page')
        ->show_on_template( 'templates/faq.php' )
        ->add_fields( array(
		Field::make( 'complex', 'fio', 'Вопрос-ответ' )
			->add_fields( array(
				Field::make( 'text', 'question', 'Вопрос' )
					->set_width( 33 ),
				Field::make( 'text', 'answer', 'Ответ' )
					->set_width( 33 )
					) )));
					
Container::make( 'post_meta', 'Custom Data' )
         ->show_on_post_type('collection')
         //->show_on_template( 'templates/main-page.php' )
         ->add_fields( array(
		Field::make( 'complex', 'collection_gallery', 'Галерея' )
			->add_fields( array(
				Field::make( 'image', 'collection_image', 'Изображение' )
					->set_width( 33 ),
				Field::make( 'text', 'collection_image_alt', 'Описание' )
					->set_width( 33 )
					) )));
					
Container::make( 'post_meta', 'Custom Data' )
         ->show_on_post_type('collaboration')
         //->show_on_template( 'templates/main-page.php' )
         ->add_fields( array(
		Field::make( 'complex', 'collaboration_gallery', 'Галерея' )
			->add_fields( array(
				Field::make( 'image', 'collaboration_image', 'Изображение' )
					->set_width( 33 ),
				Field::make( 'text', 'ccollaboration_image_alt', 'Описание' )
					->set_width( 33 )
					) )));
}