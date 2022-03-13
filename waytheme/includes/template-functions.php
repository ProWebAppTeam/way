<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Way_u_choose
 */
 
 
 // Тип записи коллекция
add_action( 'init', 'register_collection_post_type' );
function register_collection_post_type() {

	// Раздел вопроса - faqcat
	register_taxonomy( 'collectioncat', [ 'collection' ], [
		'label'                 => 'Раздел коллекции', // определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Разделы коллекций',
			'singular_name'     => 'Раздел коллекция',
			'search_items'      => 'Искать Раздел коллекции',
			'all_items'         => 'Все Разделы коллекций',
			'parent_item'       => 'Родит. раздел коллекции',
			'parent_item_colon' => 'Родит. раздел коллекции:',
			'edit_item'         => 'Ред. Раздел коллекции',
			'update_item'       => 'Обновить Раздел коллекции',
			'add_new_item'      => 'Добавить Раздел коллекции',
			'new_item_name'     => 'Новый Раздел коллекции',
			'menu_name'         => 'Раздел коллекции',
		),
		'description'           => 'Рубрики для раздела коллекций', // описание таксономии
		'public'                => true,
		'show_in_nav_menus'     => false, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_tagcloud'         => false, // равен аргументу show_ui
		'hierarchical'          => true,
		'rewrite'               => array('slug'=>'collection', 'hierarchical'=>false, 'with_front'=>false, 'feed'=>false ),
		'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
	] );

	// тип записи - вопросы - faq
	register_post_type( 'collection', [
		'label'               => 'Collection',
		'labels'              => array(
			'name'          => 'Коллекции',
			'singular_name' => 'Коллекция',
			'menu_name'     => 'Коллекции',
			'all_items'     => 'Все коллекции',
			'add_new'       => 'Добавить коллекцию',
			'add_new_item'  => 'Добавить новую коллекцию',
			'edit'          => 'Редактировать',
			'edit_item'     => 'Редактировать коллекцию',
			'new_item'      => 'Новыая коллекция',
		),
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_rest'        => false,
		'rest_base'           => '',
		'show_in_menu'        => true,
		'exclude_from_search' => false,
		'capability_type'     => 'post',
		'map_meta_cap'        => true,
		'hierarchical'        => false,
		'rewrite'             => array( 'slug'=>'сollection/%collaborationcat%', 'with_front'=>false, 'pages'=>false, 'feeds'=>false, 'feed'=>false ),
		'has_archive'         => 'сollection',
		'query_var'           => true,
		'supports'            => array( 'title', 'editor' ),
		'taxonomies'          => array( 'сollectioncat' ),
		'supports' => array( 
                          'title',    
                          'editor', 
                          'excerpt', 
                          'thumbnail', 
                          'custom-fields', 
                          'revisions')
	] );

}


add_filter( 'post_type_link', 'сollection_permalink', 1, 2 );
function сollection_permalink( $permalink, $post ){

	// выходим если это не наш тип записи: без холдера %faqcat%
	if( strpos( $permalink, '%сollectioncat%' ) === false )
		return $permalink;

	// Получаем элементы таксы
	$terms = get_the_terms( $post, 'сollectioncat' );
	// если есть элемент заменим холдер
	if( ! is_wp_error( $terms ) && !empty( $terms ) && is_object( $terms[0] ) )
		$term_slug = array_pop( $terms )->slug;
	// элемента нет, а должен быть...
	else
		$term_slug = 'no-сollectioncat';

	return str_replace( '%сollectioncat%', $term_slug, $permalink );
}


// Тип записи коллаборация
add_action( 'init', 'register_collaboration_post_type' );
function register_collaboration_post_type() {

	
	register_taxonomy( 'collaborationcat', [ 'collaboration' ], [
		'label'                 => 'Раздел коллаборации', // определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Разделы коллабораций',
			'singular_name'     => 'Раздел коллаборация',
			'search_items'      => 'Искать Раздел коллабораций',
			'all_items'         => 'Все Разделы коллабораций',
			'parent_item'       => 'Родит. раздел коллабораций',
			'parent_item_colon' => 'Родит. раздел коллабораций:',
			'edit_item'         => 'Ред. Раздел коллаборации',
			'update_item'       => 'Обновить Раздел коллаборации',
			'add_new_item'      => 'Добавить Раздел коллаборации',
			'new_item_name'     => 'Новый Раздел коллаборации',
			'menu_name'         => 'Раздел коллаборации',
		),
		'description'           => 'Рубрики для раздела коллабораций', // описание таксономии
		'public'                => true,
		'show_in_nav_menus'     => false, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_tagcloud'         => false, // равен аргументу show_ui
		'hierarchical'          => true,
		'rewrite'               => array('slug'=>'collaboration', 'hierarchical'=>false, 'with_front'=>false, 'feed'=>false ),
		'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
	] );

	// тип записи - вопросы - faq
	register_post_type( 'collaboration', [
		'label'               => 'Collaboration',
		'labels'              => array(
			'name'          => 'Коллаборации',
			'singular_name' => 'Коллаборации',
			'menu_name'     => 'Коллаборации',
			'all_items'     => 'Все коллаборации',
			'add_new'       => 'Добавить коллаборацию',
			'add_new_item'  => 'Добавить новую коллаборацию',
			'edit'          => 'Редактировать',
			'edit_item'     => 'Редактировать коллаборацию',
			'new_item'      => 'Новая коллаборация',
		),
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_rest'        => false,
		'rest_base'           => '',
		'show_in_menu'        => true,
		'exclude_from_search' => false,
		'capability_type'     => 'post',
		'map_meta_cap'        => true,
		'hierarchical'        => false,
		'rewrite'             => array( 'slug'=>'collaboration/%collaborationcat%', 'with_front'=>false, 'pages'=>false, 'feeds'=>false, 'feed'=>false ),
		'has_archive'         => 'collaboration',
		'query_var'           => true,
		'supports'            => array( 'title', 'editor' ),
		'taxonomies'          => array( 'collaborationcat' ),
		'supports' => array( 
                          'title',    
                          'editor', 
                          'excerpt', 
                          'thumbnail', 
                          'custom-fields', 
                          'revisions')
	] );

}

apply_filters( 'post_type_link', $post_link, $post, $leavename, $sample );
add_filter( 'post_type_link', 'collaboration_permalink', 1, 2 );
function collaboration_permalink( $permalink, $post ){

	// выходим если это не наш тип записи: без холдера %faqcat%
	if( strpos( $permalink, '%collaborationcat%' ) === false )
		return $permalink;

	// Получаем элементы таксы
	$terms = get_the_terms( $post, 'collaborationcat' );
	// если есть элемент заменим холдер
	if( ! is_wp_error( $terms ) && !empty( $terms ) && is_object( $terms[0] ) )
		$term_slug = array_pop( $terms )->slug;
	// элемента нет, а должен быть...
	else
		$term_slug = 'no-collaborationcat';

	return str_replace( '%collaborationcat%', $term_slug, $permalink );
}

## Отфильтруем ЧПУ произвольного типа


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function way_u_choose_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'way_u_choose_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function way_u_choose_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'way_u_choose_pingback_header' );
