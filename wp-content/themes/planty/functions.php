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


add_filter('wp_nav_menu_items', 'add_admin_link', 10, 2);

function add_admin_link($items, $args) {
    if (is_user_logged_in() && $args->theme_location == 'menu-header') {
        // Convertir les éléments de menu en tableau
        $items_array = explode('</li>', $items);
        array_pop($items_array); // Supprime l'élément vide dû au dernier explode

        // Déterminer la position centrale
        $middle_index = floor(count($items_array) / 2);

        // Le lien admin à insérer
        $admin_link = '<li class="navbar"><a href="' . get_admin_url() . '">Admin</a></li>';

        // Insérer l'élément à la position souhaitée
        array_splice($items_array, $middle_index, 0, $admin_link);

        // Reconstruire le menu en HTML
        $items = implode('</li>', $items_array) . '</li>';
    }

    return $items;
}