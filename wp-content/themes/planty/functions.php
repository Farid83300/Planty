<?php

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
}

function planty_register_menus() {
    register_nav_menus(
        array(
            'menu-header' => __( 'Menu Header', 'planty' ),
            'menu_footer' => __( 'Menu Footer', 'planty' ),
        )
    );
}
add_action( 'after_setup_theme', 'planty_register_menus' );