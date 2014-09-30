<?php
/**
 * Custom Post Type: "Sponsors"
 *
 * Sets up and registers the custom post type for sponsors.
 *
 * @author Erik Bernskiold, XLD Studios
 * @since  WebCoast 1.0
 * @version 1.0
 */

// Register Custom Post Type with WordPress
add_action( 'init', 'register_cpt_sponsor' );

/**
 * Sets up Custom Post Type Options for "Sponsor"
 * 
 * @return array
 */
function register_cpt_sponsor() {

    $labels = array( 
        'name' => _x( 'Sponsorer', 'webcoast' ),
        'singular_name' => _x( 'Sponsor', 'webcoast' ),
        'add_new' => _x( 'Lägg till', 'webcoast' ),
        'add_new_item' => _x( 'Lägg till sponsor', 'webcoast' ),
        'edit_item' => _x( 'Redigera sponsor', 'webcoast' ),
        'new_item' => _x( 'Ny sponsor', 'webcoast' ),
        'view_item' => _x( 'Visa sponsor', 'webcoast' ),
        'search_items' => _x( 'Sök sponsorer', 'webcoast' ),
        'not_found' => _x( 'Inga sponsorer funna', 'webcoast' ),
        'not_found_in_trash' => _x( 'Inga sponsorer funna i papperskorgen', 'webcoast' ),
        'parent_item_colon' => _x( 'Överliggande sponsor:', 'webcoast' ),
        'menu_name' => _x( 'Sponsorer', 'webcoast' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 33,
        'menu_icon' => WC_IMAGES . '/cpt-sponsor-icon.png',
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array( 'slug' => 'sponsor' ),
        'capability_type' => 'post'
    );

    register_post_type( 'sponsor', $args );
}