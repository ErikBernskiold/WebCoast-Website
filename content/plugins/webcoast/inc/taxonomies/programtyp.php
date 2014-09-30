<?php
/**
 * Custom Taxonomy: "Programtyp"
 *
 * Sets up the custom taxonomy for the programme type, "programtyp".
 *
 * @version 1.0
 * @author Erik Bernskiold, XLD Studios
 * @since WebCoast 1.0
 */

add_action( 'init', 'register_taxonomy_programtyp' );

function register_taxonomy_programtyp() {

    $labels = array( 
        'name' => _x( 'Typer', 'webcoast' ),
        'singular_name' => _x( 'Typ', 'webcoast' ),
        'search_items' => _x( 'Sök typer', 'webcoast' ),
        'popular_items' => _x( 'Populära typer', 'webcoast' ),
        'all_items' => _x( 'Alla typer', 'webcoast' ),
        'parent_item' => _x( 'Parent typ', 'webcoast' ),
        'parent_item_colon' => _x( 'Parent typ:', 'webcoast' ),
        'edit_item' => _x( 'Redigera typ', 'webcoast' ),
        'update_item' => _x( 'Uppdatera typ', 'webcoast' ),
        'add_new_item' => _x( 'Lägg till ny typ', 'webcoast' ),
        'new_item_name' => _x( 'Ny typ', 'webcoast' ),
        'separate_items_with_commas' => _x( 'Separate typer with commas', 'webcoast' ),
        'add_or_remove_items' => _x( 'Add or remove typer', 'webcoast' ),
        'choose_from_most_used' => _x( 'Choose from the most used typ', 'webcoast' ),
        'menu_name' => _x( 'Typer', 'webcoast' ),
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

    register_taxonomy( 'programtyp', array('program'), $args );
}