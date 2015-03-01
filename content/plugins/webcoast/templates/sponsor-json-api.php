<?php
/**
 * Page Template: Sponsor JSON
 **/

// Get the current program year to display
$current_year = get_field( 'sponsor_display_year', 'option' );

if ( isset( $_GET['year'] ) ) {
	$set_year = wp_strip_all_tags( $_GET['year'] );
	$filter_year = intval( $set_year );
} else {
	$filter_year = $current_year;
}

// Get the conference days and loop through them,
// creating a query on the items that day.
$sponsor_types = get_terms( 'sponsortyp', array(
	'hide_empty' => false,
	'orderby'    => 'ID',
	'order'      => 'ASC',
) );

// Create empty array for program
$sponsors_array = array();

foreach ( $sponsor_types as $sponsor_type ) :

	// Add type to sponsors array
	$sponsors_array[ $sponsor_type->slug ] = array(
		'id'   => $sponsor_type->term_id,
		'name' => $sponsor_type->name,
	);

	// Create the query args
	$json_sponsors_query_args = array(
		'post_type'      => 'sponsor',
		'posts_per_page' => -1,
		'tax_query'      => array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'sponsortyp',
				'field'    => 'id',
				'terms'    => $sponsor_type->term_id,
			),
			array(
				'taxonomy' => 'year',
				'field'    => 'slug',
				'terms'    => $filter_year,
			),
		),
	);

	$json_sponsors_query = new WP_Query( $json_sponsors_query_args );

	if ( $json_sponsors_query->have_posts() ) :

		while ( $json_sponsors_query->have_posts() ) : $json_sponsors_query->the_post();

			$sponsors_array[ $sponsor_type->slug ]['companies'][] = array(
				'company' => get_the_title( get_the_ID() ),
				'link'    => get_post_meta( get_the_ID(), 'sponsor_link', true ),
				'image'   => wp_get_attachment_url( get_post_meta( get_the_ID(), 'sponsor_fpimage', true ) ),
			);

		endwhile;

	endif; wp_reset_postdata();

endforeach;

// Encode JSON
$output = json_encode( $sponsors_array );

// If we have dev mode set in the URL,
// output in human-readable format
if ( $_GET['dev'] == '1' ) {
	echo '<pre>';
		var_dump($sponsors_array);
	echo '</pre>';
} else {
	echo $output;
}