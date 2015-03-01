<?php
/**
 * Page Template: JSON Program
 *
 * @since WebCoast 1.0
 * @author XLD Studios
 * @version 1.0
 * @package WebCoast
 *
 * Template Name: JSON Program
 *
 **/

// Get the current program year to display
$current_year = get_field( 'program_display_year', 'option' );

if ( isset( $_GET['year'] ) ) {
	$set_year = wp_strip_all_tags( $_GET['year'] );
	$filter_year = intval( $set_year );
} else {
	$filter_year = $current_year;
}

// Get the conference days and loop through them,
// creating a query on the items that day.
$days = webcoast_get_transient_terms( 'webcoast_days', 'webcoast_day', array(
	'hide_empty' => false,
), WEEK_IN_SECONDS * 4 );

// Create empty array for program
$program_array = array();

foreach ( $days as $day ) :

	// Add day to program array
	$program_array[ $day->slug ] = array();

	// Create the query args
	$json_program_query_args = array(
		'post_type'      => 'program',
		'posts_per_page' => -1,
		'tax_query'      => array(
			array(
				'taxonomy' => 'webcoast_day',
				'field'    => 'id',
				'terms'    => $day->term_id,
			),
			array(
				'taxonomy' => 'year',
				'field'    => 'slug',
				'terms'    => $filter_year,
			),
		),
	);

	// $json_program_query = webcoast_get_transient_query( 'webcoast_program_json_query_' . $day->slug, $json_program_query_args, DAY_IN_SECONDS );
	$json_program_query = new WP_Query( $json_program_query_args );

	if ( $json_program_query->have_posts() ) :

		while ( $json_program_query->have_posts() ) : $json_program_query->the_post();

			// Get custom fields
			$date = get_post_meta( get_the_ID(), 'program_date', true );
			$summary = get_post_meta( get_the_ID(), 'program_summary', true );
			$start_time = get_post_meta( get_the_ID(), 'program_starttime', true );
			$end_time = get_post_meta( get_the_ID(), 'program_endtime', true );
			$video_thumbnail = get_post_meta( get_the_ID(), 'video_thumbnail', true );
			$video_embed = get_post_meta( get_the_ID(), 'video_embed', true );

			$program_date_object = new DateTime( $date );

			$start_time_with_day = $date . ' ' . $start_time;
			$start_time_object = new DateTime( $start_time_with_day );

			$end_time_with_day = $date . ' ' . $end_time;
			$end_time_object = new DateTime( $end_time_with_day );

			$speakers_array = array();

			// Speakers
			if( get_field( 'program_talare' ) ) {
				while( the_repeater_field( 'program_talare' ) ) {

					// Add the speakers to the array
					$speakers_array[] = array(
						'name' => get_sub_field( 'program_talare_namn' ),
						'twitter' => get_sub_field( 'program_talare_twitter' ),
						'url'  => get_sub_field( 'program_talare_url' ),
					);

				}
			} else {
				$speakers_array[] = array(
					'name' => '',
					'url'	 => '',
				);
			}

			// Rooms
			$rooms = get_the_terms( $post->ID, 'webcoast_room' );

			if ( $rooms ) {
				foreach ( $rooms as $room ) {
					$rooms_array = array(
						'room_id'              => $room->term_id,
						'room_slug'            => $room->slug,
						'room_name'            => $room->name,
						'room_sponsored_names' => array(),
						'room_size'			  	  => get_field( 'room_size', $room ),
					);

					// Add Room Sponsored Names
					if ( get_field( 'room_sponsored_names', $room ) ) {

						while ( the_repeater_field( 'room_sponsored_names', $room ) ) {

							$rooms_array['room_sponsored_names'][]['year'] = get_sub_field( 'room_sponsored_names_year' );
							$rooms_array['room_sponsored_names'][]['name'] = get_sub_field( 'room_sponsored_names_name' );

						}
					}
				}
			} else {
				$rooms_array = array(
					'room_id'              => '',
					'room_slug'            => '',
					'room_name'            => '',
					'room_sponsored_names' => array(),
				);
			}

			// Days
			$program_days = get_the_terms( $post->ID, 'webcoast_day' );

			if ( $program_days ) {
				foreach ( $program_days as $program_day ) {
					$program_days_array = array(
						'program_day_id'   => $program_day->term_id,
						'program_day_slug' => $program_day->slug,
						'program_day_name' => $program_day->name,
					);
				}
			} else {
				$program_days_array = array(
					'program_day_id'   => '',
					'program_day_slug' => '',
					'program_day_name' => '',
				);
			}

			// Subjects
			$subjects = get_the_terms( $post->ID, 'videoamne' );

			if ( $subjects ) {
				foreach ( $subjects as $subject ) {
					$subjects_array = array(
						'subject_id' 	  => $subject->term_id,
						'subject_slug'   => $subject->slug,
						'subject_name'   => $subject->name,
					);
				}
			} else {
				$subjects_array = array(
					'subject_id' 	  => '',
					'subject_slug'   => '',
					'subject_name'   => '',
				);
			}

			// Types
			$types = get_the_terms( $post->ID, 'programtyp' );

			if ( $types ) {
				foreach ( $types as $type ) {
					$types_array = array(
						'type_id' 	  => $type->term_id,
						'type_slug'   => $type->slug,
						'type_name'   => $type->name,
					);
				}
			} else {
				$types_array = array(
					'type_id' 	  => '',
					'type_slug'   => '',
					'type_name'   => '',
				);
			}

			// Add all the items to the array
			$program_array[ $day->slug ][] = array(
				'id'              => get_the_id(),
				'title'           => get_the_title(),
				'date'            => $program_date_object->format( 'Y-m-d' ),
				'summary'         => $summary,
				'start_time'      => $start_time_object->format( 'Y-m-d H:i:s O' ),
				'end_time'        => $end_time_object->format( 'Y-m-d H:i:s O' ),
				'video_embed'     => $video_embed,
				'video_thumbnail' => $video_thumbnail,
				'content'         => get_the_content(),
				'speaker'         => $speakers_array,
				'room'            => $rooms_array,
				'program_day'     => $program_days_array,
				'subject'         => $subjects_array,
				'type'            => $types_array,
			);

		endwhile;

	endif; wp_reset_postdata();

endforeach;

// Encode JSON
$output = json_encode( $program_array );

// If we have dev mode set in the URL,
// output in human-readable format
if ( $_GET['dev'] == '1' ) {
	echo '<pre>';
		var_dump($program_array);
	echo '</pre>';
} else {
	echo $output;
}