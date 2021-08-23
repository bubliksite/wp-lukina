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

/** Включаем меню **/
register_nav_menu('menu', 'Главное меню');

/** Включаем картинки **/
add_theme_support( 'post-thumbnails' );

 ?>

