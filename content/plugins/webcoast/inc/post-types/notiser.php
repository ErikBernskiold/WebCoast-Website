<?php
/**
 * Custom Post Type: "Notises"
 *
 * Sets up and registers the custom post type for notifications.
 */

// Register Custom Post Type with WordPress
add_action( 'init', 'register_cpt_notifications' );

/**
 * Sets up Custom Post Type Options for "Notis"
 *
 * @return array
 */
function register_cpt_notifications() {

    $labels = array(
        'name' => _x( 'Notiser', 'webcoast' ),
        'singular_name' => _x( 'Notis', 'webcoast' ),
        'add_new' => _x( 'Lägg till', 'webcoast' ),
        'add_new_item' => _x( 'Lägg till notis', 'webcoast' ),
        'edit_item' => _x( 'Redigera notis', 'webcoast' ),
        'new_item' => _x( 'Ny notis', 'webcoast' ),
        'view_item' => _x( 'Visa notis', 'webcoast' ),
        'search_items' => _x( 'Sök notiser', 'webcoast' ),
        'not_found' => _x( 'Inga notiser funna', 'webcoast' ),
        'not_found_in_trash' => _x( 'Inga notiser funna i papperskorgen', 'webcoast' ),
        'parent_item_colon' => _x( 'Överliggande notis:', 'webcoast' ),
        'menu_name' => _x( 'Notiser', 'webcoast' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'supports' => array( 'title', 'editor' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 35,
        'menu_icon' => 'dashicons-megaphone',
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => false,
        'capability_type' => 'post'
    );

    register_post_type( 'wc_notis', $args );
}