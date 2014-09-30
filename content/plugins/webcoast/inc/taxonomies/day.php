<?php
/**
 * Custom Taxonomy: "Day"
 *
 * @version 1.0
 * @author Erik Bernskiold, XLD Studios
 * @since WebCoast 1.0
 */

add_action( 'init', 'register_taxonomy_days' );

function register_taxonomy_days() {

    $labels = array(
        'name' => _x( 'Days', 'webcoast' ),
        'singular_name' => _x( 'Day', 'webcoast' ),
        'search_items' => _x( 'Search days', 'webcoast' ),
        'popular_items' => _x( 'Popular days', 'webcoast' ),
        'all_items' => _x( 'All days', 'webcoast' ),
        'parent_item' => _x( 'Parent Day', 'webcoast' ),
        'parent_item_colon' => _x( 'Parent Day:', 'webcoast' ),
        'edit_item' => _x( 'Edit day', 'webcoast' ),
        'update_item' => _x( 'Edit day', 'webcoast' ),
        'add_new_item' => _x( 'Add new day', 'webcoast' ),
        'new_item_name' => _x( 'Add day', 'webcoast' ),
        'separate_items_with_commas' => _x( 'Separate days with commas', 'webcoast' ),
        'add_or_remove_items' => _x( 'Add or remove days', 'webcoast' ),
        'choose_from_most_used' => _x( 'Choose from the most used days', 'webcoast' ),
        'menu_name' => _x( 'Days', 'webcoast' ),
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

    register_taxonomy( 'webcoast_day', array( 'program' ), $args );
}