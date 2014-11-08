<?php
/**
 * Transient Queries
 *
 * These queries are saved to transients, ie. are cached
 * for a given number of seconds to increase performance.
 *
 * Queries in here are used throughout the various
 * parts of the site.
 */

if ( ! function_exists( 'webcoast_get_transient_query' ) ) :

	/**
	 * Transients Query Function
	 *
	 * General function that saves a query as a transient.
	 *
	 * @param  string $transient_name The name of the transient that will be saved.
	 * @param  array  $query_args     The arguments for the custom query.
	 * @param  int 	$transient_time A time for how long the data should be cached.
	 */
	function webcoast_get_transient_query( $transient_name, $query_args, $transient_time = HOUR_IN_SECONDS ) {

		// Get the transient
		$results = get_transient( $transient_name );

		// If the transient doesn't exist, set it
		if ( false === $results ) {

			// Create the query
			$results = new WP_Query( $query_args );

			// Save the query to a transient
			set_transient( $transient_name, $results, $transient_time );

		}

		// Return the query
		return $results;

	}

endif;

if ( ! function_exists( 'webcoast_get_transient_terms' ) ) :

	function webcoast_get_transient_terms( $transient_name, $taxonomy_name, $taxonomy_args, $transient_time = HOUR_IN_SECONDS ) {

		// Get the transient
		$results = get_transient( $transient_name );

		// If the transient doesn't exist, set it
		if ( false === $results ) {

			// Get the terms
			$results = get_terms( $taxonomy_name, $taxonomy_args );

			// Save the terms to a transient
			set_transient( $transient_name, $results, $transient_time );

		}

		return $results;

	}

endif;

if ( ! function_exists( 'webcoast_delete_query_transients' ) ) :

	/**
	 * webcoast_delete_query_transients()
	 *
	 * This function is run on the edit post hook
	 * and will go through some cases and clear transients that we have set
	 * elsewhere in the theme. This is to make sure
	 * the page displays up to date.
	 *
	 * @return void
	 */
	function webcoast_delete_query_transients( $post_id, $post ) {

		// Set the available languages
		// @todo This should ideally be retrieved automatically from WPML
		$languages = array( 'en', 'sv' );

		// If this is just a revision, don't do anything
		if ( wp_is_post_revision( $post_id ) )
			return;

		// If we update the slider, clear its transient for all languages
		if ( 'ilmenite_slider' == $post->post_type ) {
			foreach ( $languages as $language ) {
				delete_transient( 'wc_slider_' . $language );
			}
		}

		// If we update a post, clear its transient for all languages
		if ( 'post' == $post->post_type ) {
			foreach ( $languages as $language ) {
				delete_transient( 'wc_fp_blogq_' . $language );
			}
		}

		// If we update a sponsor, clear its transient for all languages
		if ( 'sponsor' == $post->post_type ) {

			// Get the sponsor types for the saved post
			$sponsors = get_the_terms( $post->ID, 'sponsortyp' );

			// Loop through the sponsor tyupes
			foreach ( $sponors as $sponsor ) {

				// Also loop through all languages
				foreach ( $languages as $language ) {
					delete_transient( 'wc_sp_' . $sponsor->slug . '_' . $language );
				}

			}

		}

		if ( 'aterblick' == $post->post_type ) {
			foreach ( $languages as $language ) {
				delete_transient( 'webcoast_rp_years_' . $language );
			}
		}

	}

	add_action( 'edit_post', 'webcoast_delete_query_transients' );

endif;

if ( ! function_exists( 'webcoast_delete_terms_transients' ) ) :

	/**
	 * webcoast_delete_terms_transients()
	 *
	 * Clear transients for certain terms when a term is updated.
	 *
	 * @return void
	 */
	function webcoast_delete_terms_transients() {



	}

	add_action( 'edit_term', 'webcoast_delete_terms_transients' );

endif;