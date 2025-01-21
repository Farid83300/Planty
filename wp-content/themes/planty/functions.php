<?php

// Import du CSS du thème enfant
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
}


// Ajout des menus Header et Footer
function planty_register_menus() {
    register_nav_menus(
        array(
            'menu-header' => __( 'Menu Header', 'planty' ),
            'menu_footer' => __( 'Menu Footer', 'planty' ),
        )
    );
}
add_action( 'after_setup_theme', 'planty_register_menus' );


// Hook
add_filter('wp_nav_menu_items', 'add_admin_link', 10, 2);

function add_admin_link($items, $args) {
    if (is_user_logged_in() && $args->theme_location == 'menu-header') {
        // Convertie les éléments du menu en tableau
        $items_array = explode('</li>', $items);
        array_pop($items_array); // Supprime l'élément vide du au dernier explode

        // Détermine la position centrale
        $middle_index = floor(count($items_array) / 2);

        // Le lien admin à insérer
        $admin_link = '<li class="navbar"><a href="' . get_admin_url() . '">Admin</a></li>';

        // Insertion de l'élément à la position souhaitée
        array_splice($items_array, $middle_index, 0, $admin_link);

        // Reconstruction menu en HTML
        $items = implode('</li>', $items_array) . '</li>';
    }

    return $items;
}



function ajouter_scripts_personnalises() {
    // Chargement du JavaScript pour le menu mobile
    wp_enqueue_script('menu-js', get_template_directory_uri() . '/menu.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'ajouter_scripts_personnalises');