<?php
/**
 * Custom Taxonomy: "Room"
 *
 * @version 1.0
 * @author Erik Bernskiold, XLD Studios
 * @since WebCoast 1.0
 */

add_action( 'init', 'register_taxonomy_rooms' );

function register_taxonomy_rooms() {

    $labels = array(
        'name' => _x( 'Rooms', 'webcoast' ),
        'singular_name' => _x( 'Room', 'webcoast' ),
        'search_items' => _x( 'Search rooms', 'webcoast' ),
        'popular_items' => _x( 'Popular rooms', 'webcoast' ),
        'all_items' => _x( 'All rooms', 'webcoast' ),
        'parent_item' => _x( 'Parent Room', 'webcoast' ),
        'parent_item_colon' => _x( 'Parent Room:', 'webcoast' ),
        'edit_item' => _x( 'Edit room', 'webcoast' ),
        'update_item' => _x( 'Edit room', 'webcoast' ),
        'add_new_item' => _x( 'Add new room', 'webcoast' ),
        'new_item_name' => _x( 'Add room', 'webcoast' ),
        'separate_items_with_commas' => _x( 'Separate rooms with commas', 'webcoast' ),
        'add_or_remove_items' => _x( 'Add or remove rooms', 'webcoast' ),
        'choose_from_most_used' => _x( 'Choose from the most used rooms', 'webcoast' ),
        'menu_name' => _x( 'Rooms', 'webcoast' ),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => true,
        'hierarchical' => true,

        'rewrite' => false,
        'query_var' => true,
    );

    register_taxonomy( 'webcoast_room', array( 'program' ), $args );
}