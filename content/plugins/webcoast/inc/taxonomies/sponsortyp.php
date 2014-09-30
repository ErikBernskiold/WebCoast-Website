<?php
/**
 * Custom Taxonomy: "Sponsortyp"
 *
 * Sets up the custom taxonomy for the sponsor type, "sponsortyp".
 *
 * @version 1.0
 * @author Erik Bernskiold, XLD Studios
 * @since WebCoast 1.0
 */

add_action( 'init', 'register_taxonomy_sponsortype' );

function register_taxonomy_sponsortype() {

    $labels = array( 
        'name' => _x( 'Sponsortyp', 'webcoast' ),
        'singular_name' => _x( 'Sponsortyp', 'webcoast' ),
        'search_items' => _x( 'Sök sponsortyper', 'webcoast' ),
        'popular_items' => _x( 'Populära sponsortyper', 'webcoast' ),
        'all_items' => _x( 'Alla sponsortyper', 'webcoast' ),
        'parent_item' => _x( 'Parent Sponsortyp', 'webcoast' ),
        'parent_item_colon' => _x( 'Parent Sponsortyp:', 'webcoast' ),
        'edit_item' => _x( 'Redigera sponsortyp', 'webcoast' ),
        'update_item' => _x( 'Uppdatera sponsortyp', 'webcoast' ),
        'add_new_item' => _x( 'Lägg till nytt sponsortyp', 'webcoast' ),
        'new_item_name' => _x( 'Nytt sponsortyp', 'webcoast' ),
        'separate_items_with_commas' => _x( 'Separate Sponsortyp with commas', 'webcoast' ),
        'add_or_remove_items' => _x( 'Add or remove Sponsortyp', 'webcoast' ),
        'choose_from_most_used' => _x( 'Choose from the most used Sponsortyp', 'webcoast' ),
        'menu_name' => _x( 'Sponsortyp', 'webcoast' ),
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

    register_taxonomy( 'sponsortyp', array('sponsor'), $args );
}