<?php
/**
 * AJAX Handler File
 *
 * In this file, all of the theme AJAX calls are registered,
 * together with the actual JavaScript call in scripts.js
 */

if( ! function_exists( 'webcoast_program_filter_callback' ) ) :
/**
 * Program Filter
 *
 * Sets up the program list based on the program filter.
 *
 * @author  Erik Bernskiold
 */
add_action( 'wp_ajax_nopriv_webcoast_program_filter', 'webcoast_program_filter_callback' );
add_action( 'wp_ajax_webcoast_program_filter', 'webcoast_program_filter_callback' );

function webcoast_program_filter_callback() {

	// Check that the nonce verifies for the post request
	if( ! wp_verify_nonce( $_POST['nonce'], 'webcoast-ajax-nonce' ) )
		die( 'Error, the nonce did not verify for your request.' );

	// Get query variables
	$rooms          = $_POST['rooms'];
	$dates          = $_POST['dates'];
	//$current_year = get_field( 'program_display_year', 'option' );
	$current_year   = 2015;

	// Get the conference days and loop through them,
	// creating a query on the items that day.
	$days = get_terms( 'webcoast_day', array( 'hide_empty' => false ) );

	// If we have dates set in the post query, use the date filter display
	if ( $dates ) :

		$program_query_args = array(
			'post_type'      => 'program',
			'posts_per_page' => -1,
			'orderby'		  => 'meta_value_num',
			'meta_key'		  => 'program_starttime',
			'order'			  => 'ASC',
			'tax_query'      => array(
				array(
					'taxonomy' => 'year',
					'field'    => 'slug',
					'terms'    => $current_year,
				),
				array(
					'taxonomy' => 'webcoast_day',
					'field'    => 'id',
					'terms'    => $dates,
				),
			),
		);

		if ( $rooms ) {
			if ( ! in_array( 'all', $rooms ) ) {
				$program_query_args['tax_query'][] = array(
					'taxonomy' => 'webcoast_room',
					'field'    => 'id',
					'terms'    => $rooms,
				);
			}
		}

		ob_start();

		$program_query = new WP_Query( $program_query_args );
		?>

		<?php if ( $program_query->have_posts() ) : ?>

			<ul class="program-table">

				<?php while ( $program_query->have_posts() ) : $program_query->the_post(); ?>
					<?php get_template_part( 'content', 'program-list' ); ?>
				<?php endwhile; ?>

			</ul>

		<?php else : ?>

			<div class="alert-box alert">
				<?php _e( 'No program items could be found with this filter. Please try again with another filter applied.', 'webcoast' ); ?>
			</div>

		<?php endif; wp_reset_postdata(); ?>

	<?php
	// If we don't have dates selected, show the default program, divided into dates
	else :

		foreach ( $days as $day ) :

			$program_query_args = array(
				'post_type'      => 'program',
				'posts_per_page' => -1,
				'orderby'		  => 'meta_value_num',
				'meta_key'		  => 'program_starttime',
				'order'			  => 'ASC',
				'tax_query'      => array(
					array(
						'taxonomy' => 'webcoast_day',
						'field'    => 'id',
						'terms'    => $day->term_id,
					),
					array(
						'taxonomy' => 'year',
						'field'    => 'slug',
						'terms'    => $current_year,
					),
				),
			);

			if ( $rooms ) {
				if ( ! in_array( 'all', $rooms ) ) {
					$program_query_args['tax_query'][] = array(
						'taxonomy' => 'webcoast_room',
						'field'    => 'id',
						'terms'    => $rooms,
					);
				}
			}

			ob_start();

			$program_query = new WP_Query( $program_query_args );
			?>

			<h2 class="program-day-title"><?php echo $day->name; ?></h2>

			<?php if ( $program_query->have_posts() ) : ?>

				<ul class="program-table">

					<?php while ( $program_query->have_posts() ) : $program_query->the_post(); ?>
						<?php get_template_part( 'content', 'program-list' ); ?>
					<?php endwhile; ?>

				</ul>

			<?php else : ?>

				<div class="alert-box alert">
					<?php _e( 'No program items could be found with this filter. Please try again with another filter applied.', 'webcoast' ); ?>
				</div>

			<?php endif; wp_reset_postdata(); ?>

		<?php endforeach;

	endif;

	$output = ob_get_clean();

	echo $output;

	die();

}
endif;

if( ! function_exists( 'webcoast_video_filter_callback' ) ) :

	/**
	 * Videos Filter
	 *
	 * AJAX callback for the videos archive filtering.
	 */
	function webcoast_video_filter_callback() {

		// Check that the nonce verifies for the post request
		if( ! wp_verify_nonce( $_POST['nonce'], 'webcoast-ajax-nonce' ) )
			die( 'Error, the nonce did not verify for your request.' );

		// Get query variables
		$subjects = $_POST['subjects'];
		$years    = $_POST['years'];

		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

		$video_args = array(
			'post_type'      => 'program',
			'paged'          => $paged,
			'posts_per_page' => 24,
			'meta_query'     => array(
				array(
					'key'   => 'video_exists',
					'value' => true,
				)
			),
		);

		if ( $subjects ) {

			// No pagination
			$video_args['posts_per_page'] = -1;

			// Set subject query
			$video_args['tax_query'] = array(
				array(
					'taxonomy' => 'videoamne',
					'field'    => 'ID',
					'terms'    => $subjects,
				),
			);

		}

		if ( $years ) {

			// No pagination
			$video_args['posts_per_page'] = -1;

			// Set the years query
			$video_args['tax_query'] = array(
				array(
					'taxonomy' => 'year',
					'field'    => 'ID',
					'terms'    => $years,
				),
			);

		}

		$video = new WP_Query( $video_args );
		?>

		<?php if( $video->have_posts() ) : ?>

			<ul class="video-archive small-block-grid-1 medium-block-grid-2 large-block-grid-3">

				<?php while( $video->have_posts() ) : $video->the_post(); ?>

					<?php get_template_part('content', 'sessionvideo'); ?>

				<?php endwhile; ?>

			</ul>

			<?php
		   	if(function_exists('wp_pagenavi')) :
		   		wp_pagenavi(); // Add support for the WP-Pagenavi plugin if it is installed. Otherwise use the default.
		   	else :
		   		webcoast_pagination( $video->max_num_pages );
		   	endif;
		   ?>

		<?php endif; wp_reset_postdata();

		$output = ob_get_clean();

		echo $output;

		die();

	}

	add_action( 'wp_ajax_nopriv_webcoast_video_filter', 'webcoast_video_filter_callback' );
	add_action( 'wp_ajax_webcoast_video_filter', 'webcoast_video_filter_callback' );

endif;