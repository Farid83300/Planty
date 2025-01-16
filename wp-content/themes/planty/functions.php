<?php

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
}

function my_theme_register_menus() {
    register_nav_menus(
        array(
            'menu-1' => __( 'Menu header', 'your-text-domain' ),
        )
    );
}
add_action( 'after_setup_theme', 'my_theme_register_menus' );