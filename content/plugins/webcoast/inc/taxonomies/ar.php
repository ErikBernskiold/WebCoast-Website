<?php
/**
 * Custom Taxonomy: "År"
 *
 * Sets up the custom taxonomy for years, "år".
 *
 * @version 1.0
 * @author Erik Bernskiold, XLD Studios
 * @since WebCoast 1.0
 */

add_action( 'init', 'register_taxonomy_year' );

function register_taxonomy_year() {

    $labels = array( 
        'name' => _x( 'År', 'webcoast' ),
        'singular_name' => _x( 'År', 'webcoast' ),
        'search_items' => _x( 'Sök år', 'webcoast' ),
        'popular_items' => _x( 'Populära år', 'webcoast' ),
        'all_items' => _x( 'Alla år', 'webcoast' ),
        'parent_item' => _x( 'Parent År', 'webcoast' ),
        'parent_item_colon' => _x( 'Parent År:', 'webcoast' ),
        'edit_item' => _x( 'Redigera år', 'webcoast' ),
        'update_item' => _x( 'Uppdatera år', 'webcoast' ),
        'add_new_item' => _x( 'Lägg till nytt år', 'webcoast' ),
        'new_item_name' => _x( 'Nytt år', 'webcoast' ),
        'separate_items_with_commas' => _x( 'Separate År with commas', 'webcoast' ),
        'add_or_remove_items' => _x( 'Add or remove År', 'webcoast' ),
        'choose_from_most_used' => _x( 'Choose from the most used År', 'webcoast' ),
        'menu_name' => _x( 'År', 'webcoast' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => false,
        'show_ui' => true,
        'show_tagcloud' => false,
        'hierarchical' => true,

        'rewrite' => false,
        'query_var' => true
    );

    register_taxonomy( 'year', array('sponsor', 'program', 'video'), $args );
}