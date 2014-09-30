<?php
add_action( 'init', 'register_cpt_aterblick' );

function register_cpt_aterblick() {

    $labels = array(
        'name' => _x( 'Återblickar', 'webcoast' ),
        'singular_name' => _x( 'Återblick', 'webcoast' ),
        'add_new' => _x( 'Lägg till', 'webcoast' ),
        'add_new_item' => _x( 'Lägg till återblick', 'webcoast' ),
        'edit_item' => _x( 'Redigera återblick', 'webcoast' ),
        'new_item' => _x( 'Ny återblick', 'webcoast' ),
        'view_item' => _x( 'Visa återblick', 'webcoast' ),
        'search_items' => _x( 'Sök återblickar', 'webcoast' ),
        'not_found' => _x( 'Inga återblickar funna', 'webcoast' ),
        'not_found_in_trash' => _x( 'Inga återblickar funna i papperskorgen', 'webcoast' ),
        'parent_item_colon' => _x( 'Överliggande återblick:', 'webcoast' ),
        'menu_name' => _x( 'Återblickar', 'webcoast' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,

        'supports' => array( 'title', 'editor' ),

        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,

        'menu_icon' => get_template_directory_uri() . '/img/cpt-aterblick-icon.png',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'aterblick', $args );
}