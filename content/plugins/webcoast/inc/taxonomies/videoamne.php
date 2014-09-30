<?php
/**
 * Custom Taxonomy: "Videoamne"
 *
 * Sets up the custom taxonomy for the post type, "Videos".
 *
 * @version 1.0
 * @author Erik Bernskiold, XLD Studios
 * @since WebCoast 1.0
 */

add_action( 'init', 'register_taxonomy_videoamne' );

function register_taxonomy_videoamne() {

    $labels = array( 
        'name' => _x( 'Ämnen', 'webcoast' ),
        'singular_name' => _x( 'Ämne', 'webcoast' ),
        'search_items' => _x( 'Sök ämnen', 'webcoast' ),
        'popular_items' => _x( 'Populära ämnen', 'webcoast' ),
        'all_items' => _x( 'Alla ämnen', 'webcoast' ),
        'parent_item' => _x( 'Parent Ämne', 'webcoast' ),
        'parent_item_colon' => _x( 'Parent Ämne:', 'webcoast' ),
        'edit_item' => _x( 'Redigera ämne', 'webcoast' ),
        'update_item' => _x( 'Uppdatera ämne', 'webcoast' ),
        'add_new_item' => _x( 'Lägg till nytt ämne', 'webcoast' ),
        'new_item_name' => _x( 'Nytt ämne', 'webcoast' ),
        'separate_items_with_commas' => _x( 'Separate Ämnen with commas', 'webcoast' ),
        'add_or_remove_items' => _x( 'Add or remove Ämnen', 'webcoast' ),
        'choose_from_most_used' => _x( 'Choose from the most used Ämnen', 'webcoast' ),
        'menu_name' => _x( 'Ämnen', 'webcoast' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => true,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'videoamne', array('video', 'program'), $args );
}