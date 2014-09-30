<?php

if ( ! function_exists( 'webcoast_wp_head_cleanup' ) ) :

	/**
	 * Clean up wp_head() from uncessecary bloat.
	 *
	 * Remove unnecessary <link>'s
	 */
	function webcoast_wp_head_cleanup() {

		remove_action('wp_head', 'feed_links', 2);
		remove_action('wp_head', 'feed_links_extra', 3);
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wlwmanifest_link');
		remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
		remove_action('wp_head', 'wp_generator');
		remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

	}

	add_action( 'init', 'webcoast_wp_head_cleanup' );

endif;

/**
 * Remove WordPress Version from RSS Feeds
 */
add_filter('the_generator', '__return_false');

if ( ! function_exists( 'webcoast_wrap_oembed' ) ) :

	/**
	 * Wrap content embedded using oembed in div
	 *
	 * This can be styled using media queries etc.
	 *
	 * @link https://gist.github.com/965956
	 */
	function webcoast_wrap_oembed( $cache, $url, $attr = '', $post_ID = '' ) {

		return '<div class="flex-video">' . $cache . '</div>';

	}

	add_filter( 'embed_oembed_html', 'webcoast_wrap_oembed', 10, 4 );

endif;

if ( ! function_exists( 'webcoast_nice_search_url' ) ) :

	/**
	 * Redirects search results from /?s=query to /search/query/, converts %20 to +
	 *
	 * @link http://txfx.net/wordpress-plugins/nice-search/
	 * @link https://github.com/roots/roots/blob/master/lib/cleanup.php
	 */
	function webcoast_nice_search_url() {

		global $wp_rewrite;

		if ( ! isset( $wp_rewrite ) || ! is_object( $wp_rewrite ) || ! $wp_rewrite->using_permalinks() )
			return;

		$search_base = $wp_rewrite->search_base;

		if ( is_search() && ! is_admin() && strpos( $_SERVER['REQUEST_URI'], "/{$search_base}/" ) === false ) {
			wp_redirect( home_url( "/{$search_base}/" . urlencode( get_query_var('s') ) ) );
			exit();
		}

	}

	add_action( 'template_redirect', 'webcoast_nice_search_url' );

endif;

if ( ! function_exists( 'ilmnenite_blank_search_fix' ) ) :

	/**
	 * Fix for empty search queries redirecting to home page
	 *
	 * @link http://wordpress.org/support/topic/blank-search-sends-you-to-the-homepage#post-1772565
	 * @link http://core.trac.wordpress.org/ticket/11330
	 * @link https://github.com/roots/roots/blob/master/lib/cleanup.php
	 */
	function ilmnenite_blank_search_fix( $query_vars ) {

		if ( isset($_GET['s'] ) && empty( $_GET['s'] ) && ! is_admin() ) {
			$query_vars['s'] = ' ';
		}

		return $query_vars;
	}

	add_filter( 'request', 'ilmnenite_blank_search_fix' );

endif;