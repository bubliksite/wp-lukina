<?php

/** Перечень стилей и скриптов **/
function load_style_script () {
    wp_enqueue_style('bootstrap.min', '//cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-icons', '//cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css');
    wp_enqueue_style('owl.carousel.min', get_template_directory_uri() . '/owlcarousel/owl.carousel.min.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css');

    wp_enqueue_script('jquery-3.4.1.min', '//code.jquery.com/jquery-3.4.1.min.js');
    wp_enqueue_script('bootstrap.min', '//cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js');
    wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js');
    wp_enqueue_script('owl.carousel.min', get_template_directory_uri() . '/owlcarousel/owl.carousel.min.js');
}

/** Отключаем верхнюю админ-панель **/
show_admin_bar(false);

/** Загрузка стилей и скриптов **/
add_action('wp_enqueue_scripts', 'load_style_script');

/** Отключаем визуальный редактор **/
function remove_editor() {
  remove_post_type_support('page', 'editor');
}
add_action('admin_init', 'remove_editor');

/** Ограничение длины цитаты **/
add_filter( 'excerpt_length', function(){
    return 20;
} );
add_filter('excerpt_more', function($more) {
    return '...';
});

/** Включаем меню **/
register_nav_menu('menu', 'Главное меню');

/** Включаем картинки **/
add_theme_support( 'post-thumbnails' );

/** Создаем новый тип записей - Программы **/
add_action('init', 'programs');
function programs() {
	register_post_type('programs', array(
			'public' => true,
			'supports' => array ('title', 'thumbnail'),
			'labels' => array (
				'name' => 'Программы',
				'add_new' => 'Добавить программу',
				'all_items' => 'Все программы',
				'add_new_item' => 'Добавить программу'
			),
			'menu_position' => 4,
			'menu_icon' => 'custom-logo'
		));
}

// Создаем тип таксономии категории
add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){

    register_taxonomy( 'programscategory', [ 'programs' ], [
        'label'                 => '',
        'labels'                => [
            'name'              => 'Категории',
            'singular_name'     => 'Категория',
            'search_items'      => 'Найти категории',
            'all_items'         => 'Все категории',
            'view_item '        => 'Посмотреть категория',
            'parent_item'       => 'Родительская категория',
            'parent_item_colon' => 'Родительская категория:',
            'edit_item'         => 'Изменить категорию',
            'update_item'       => 'Обновить категорию',
            'add_new_item'      => 'Добавить категорию',
            'new_item_name'     => 'Название категории',
            'menu_name'         => 'Категория',
        ],
        'description'           => '',
        'public'                => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'hierarchical'          => true,

        'rewrite'               => true,
        'capabilities'          => array(),

        'show_admin_column'     => true,
        'show_in_rest'          => null,
        'rest_base'             => null,
    ] );
}

?>

