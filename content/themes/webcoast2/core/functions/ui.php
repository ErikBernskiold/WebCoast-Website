<?php

/**
 * Contains various tweaks for UI purposes
 *
 * @since WebCoast 1.0
 * @author XLD Studios
 * @version 1.0
 * @package WebCoast
 **/

/**
 * Custom Pagination
 *
 * @since WebCoast 1.0
 **/
function webcoast_pagination($pages = '', $range = 2) {

     $showitems = ($range * 2)+1;

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '') {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }

     if(1 != $pages) {
         $output .= "<div class='pagination-centered'>";

            $output .= '<ul class="pagination">';

             if($paged > 2 && $paged > $range+1 && $showitems < $pages) $output .= "<li class='arrow'><a href='".get_pagenum_link(1)."'>&laquo;</a></li>";
             if($paged > 1 && $showitems < $pages) $output .= "<li class='arrow'><a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a></li>";

             for ($i=1; $i <= $pages; $i++)
             {
                 if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
                 {
                     $output .= ($paged == $i)? "<li class='current'>".$i."</li>":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>";
                 }
             }

             if ($paged < $pages && $showitems < $pages) $output .= "<li class='arrow'><a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a></li>";
             if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) $output .= "<li class='arrow'><a href='".get_pagenum_link($pages)."'>&raquo;</a></li>";

            $output .= '</ul>';

         $output .= "</div>\n";
     }

     echo $output;
}

/**
 * Language Switcher Code
 */
function webcoast_language_switcher(){

    $languages = icl_get_languages('skip_missing=1');
    if(1 < count($languages)){
      foreach($languages as $l){
        if(!$l['active']) $langs[] = '<li class="language-'.$l['language_code'].'"><a href="'.$l['url'].'">'.$l['native_name'].'</a></li>';
      }
      echo join('', $langs);
    }

}

if ( ! function_exists( 'webcoast_get_excerpt' ) ) :
/**
 * Custom Excerpt Function
 *
 * @param  integer $limit Amount of characters to show.
 */
function webcoast_get_excerpt( $limit ) {

    global $post;


    $excerpt = explode(' ', get_the_excerpt(), $limit);

    if (count($excerpt)>=$limit) {
    array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    }

    $excerpt = strip_tags( preg_replace( '`\[[^\]]*\]`', '', $excerpt ) );

    return $excerpt;
}
endif;

if ( ! function_exists( 'webcoast_get_nav_menu' ) ) :
/**
 * Navigation Menu
 *
 * Get the navigation menu and cache it using transients
 */
function webcoast_get_nav_menu() {

    $current_language = ICL_LANGUAGE_CODE;

    // Get the webcoast menu from the transients if exists
    $menu = get_transient( 'webcoast_menu' . $current_language );

    // If the transient doesn't exist, save it
    if ( false === $menu ) {

        // Define menu variable
        $menu = '';

        $menu .= wp_nav_menu(array(
            'theme_location'  => 'primary-menu',
            'container'       => 'nav',
            'container_class' => 'primary-navigation hide-for-small',
            'menu_class'      => 'row',
            'echo'            => 0,
        ));

        $menu .= '<div class="show-for-small">';
            $menu .= '<div class="responsive-navigation-toggle">';
                $menu .= '<a href="#"><i class="icon-reorder"></i>' . __( 'Navigation', 'webcoast' ) . '</a>';
            $menu .= '</div>';

            $menu .= wp_nav_menu(array(
                'theme_location'  => 'primary-menu',
                'container'       => 'nav',
                'container_class' => 'responsive-navigation',
                'echo'            => 0,
            ));

        $menu .= '</div>';

        // Save the menu as a transient
        set_transient( 'webcoast_menu', $menu, WEEK_IN_SECONDS );

    }

    return $menu;

}
endif;