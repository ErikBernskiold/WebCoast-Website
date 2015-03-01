<?php
/**
 * Custom Post Type: "Program"
 *
 * Sets up and registers the custom post type for the programme.
 *
 * @author Erik Bernskiold, XLD Studios
 * @since  WebCoast 1.0
 * @version 1.0
 */

// Register Custom Post Type with WordPress
add_action( 'init', 'register_cpt_program' );

/**
 * Sets up Custom Post Type Options for "Program"
 *
 * @return array
 */
function register_cpt_program() {

    $labels = array(
        'name' => _x( 'Sessioner', 'webcoast' ),
        'singular_name' => _x( 'Session', 'webcoast' ),
        'add_new' => _x( 'Lägg till', 'webcoast' ),
        'add_new_item' => _x( 'Lägg till session', 'webcoast' ),
        'edit_item' => _x( 'Redigera session', 'webcoast' ),
        'new_item' => _x( 'Ny session', 'webcoast' ),
        'view_item' => _x( 'Visa session', 'webcoast' ),
        'search_items' => _x( 'Sök sessioner', 'webcoast' ),
        'not_found' => _x( 'Inga sessioner funna', 'webcoast' ),
        'not_found_in_trash' => _x( 'Inga sessioner funna i papperskorgen', 'webcoast' ),
        'parent_item_colon' => _x( 'Överliggande session:', 'webcoast' ),
        'menu_name' => _x( 'Session', 'webcoast' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,

        'supports' => array( 'title', 'editor' ),

        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 33,
        'menu_icon' => 'dashicons-list-view',
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array( 'slug' => 'session' ),
        'capability_type' => 'post'
    );

    register_post_type( 'program', $args );
}