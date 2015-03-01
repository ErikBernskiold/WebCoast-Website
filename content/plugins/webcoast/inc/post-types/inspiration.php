<?php
add_action( 'init', 'register_cpt_inspiration' );

function register_cpt_inspiration() {

    $labels = array(
        'name' => _x( 'Inspiration', 'webcoast' ),
        'singular_name' => _x( 'Bild', 'webcoast' ),
        'add_new' => _x( 'Lägg till', 'webcoast' ),
        'add_new_item' => _x( 'Lägg till bild', 'webcoast' ),
        'edit_item' => _x( 'Redigera bild', 'webcoast' ),
        'new_item' => _x( 'Ny bild', 'webcoast' ),
        'view_item' => _x( 'Visa bild', 'webcoast' ),
        'search_items' => _x( 'Sök bilder', 'webcoast' ),
        'not_found' => _x( 'Inga bilder funna', 'webcoast' ),
        'not_found_in_trash' => _x( 'Inga bilder funna i papperskorgen', 'webcoast' ),
        'parent_item_colon' => _x( 'Överliggande bild:', 'webcoast' ),
        'menu_name' => _x( 'Inspiration', 'webcoast' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,

        'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),

        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,

        'menu_icon' => 'dashicons-lightbulb',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'portgallery', $args );
}