<?php
if ( ! function_exists( 'webcoast_clear_menu_transient' ) ) :

    /**
     * Clear the menu transient (above) when a menu is saved.
     */
    function webcoast_clear_menu_transient() {
        delete_transient( 'webcoast_menu' );
    }

    dd_action( 'wp_update_nav_menu', 'webcoast_clear_menu_transient' );

endif;