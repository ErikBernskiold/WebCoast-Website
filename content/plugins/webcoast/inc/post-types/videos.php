<?php
/**
 * Custom Post Type: "Video"
 *
 * Sets up and registers the custom post type for the videos.
 *
 * @author Erik Bernskiold, XLD Studios
 * @since  WebCoast 1.0
 * @version 1.0
 */

// Register Custom Post Type with WordPress
add_action( 'init', 'register_cpt_videos' );

/**
 * Sets up Custom Post Type Options for "Program"
 * 
 * @return array
 */
function register_cpt_videos() {

    $labels = array( 
        'name' => _x( 'Video', 'webcoast' ),
        'singular_name' => _x( 'Video', 'webcoast' ),
        'add_new' => _x( 'Lägg till', 'webcoast' ),
        'add_new_item' => _x( 'Lägg till video', 'webcoast' ),
        'edit_item' => _x( 'Redigera video', 'webcoast' ),
        'new_item' => _x( 'Ny video', 'webcoast' ),
        'view_item' => _x( 'Visa video', 'webcoast' ),
        'search_items' => _x( 'Sök videos', 'webcoast' ),
        'not_found' => _x( 'Inga videos funna', 'webcoast' ),
        'not_found_in_trash' => _x( 'Inga videos funna i papperskorgen', 'webcoast' ),
        'parent_item_colon' => _x( 'Överliggande video:', 'webcoast' ),
        'menu_name' => _x( 'Video', 'webcoast' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title', 'editor' ),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 33,
        'menu_icon' => WC_IMAGES . '/cpt-program-icon.png',
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => false,
        'capability_type' => 'post'
    );

    register_post_type( 'video', $args );
}