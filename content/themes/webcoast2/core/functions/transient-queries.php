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