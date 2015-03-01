<?php
/**
 * Page Template: Program
 *
 * @since WebCoast 1.0
 * @author XLD Studios
 * @version 1.0
 * @package WebCoast
 *
 * Template Name: Program
 *
 **/

// Get the current program year to display
$current_year = get_field( 'program_display_year', 'option' );

get_header(); ?>

<div class="main program-archive">
	<div class="row">
		<div class="small-24 columns">

			<h1><?php _e( 'Program', 'webcoast' ); ?></h1>
			<p class="intro"><?php _e( 'Your ticket is valid for the entire weekend and we hope that you have the ability to participate in all activites and meals, however, you are fully free to choose what to participate in yoruself. Below, you can get a more detailed insight into the program of this years WebCoast.', 'webcoast' ); ?></p>

			<div class="program-filter row">
				<form>
					<div class="small-24 medium-24 large-8 columns program-filter-item">
						<h3 class="program-filter-title"><?php _e( 'Filter', 'webcoast' ); ?></h3>
						<p><?php _e( 'Drill down further into the program.', 'webcoast' ); ?></p>
					</div>

					<?php
					$days = webcoast_get_transient_terms( 'webcoast_days', 'webcoast_day', array(
						'hide_empty' => false,
					), WEEK_IN_SECONDS * 4 );

					if ( $days ) : ?>

						<div class="small-24 medium-12 large-8 columns program-filter-item">
							<label class="program-filter-heading"><?php _e( 'Day', 'webcoast' ); ?></label>
							<div class="inline-checkboxes-group">

								<?php foreach ( $days as $day ) : ?>

									<div class="inline-checkbox">
										<input type="checkbox" class="program-filter-trigger trigger-checkbox" name="day_filter[]" value="<?php echo $day->term_id; ?>" id="<?php echo $day->slug; ?>" data-date="<?php echo $day->term_id; ?>"> <label for="<?php echo $day->slug; ?>" class="inline-label"><?php echo $day->name; ?></label>
									</div>

								<?php endforeach; ?>

							</div>
						</div>

					<?php endif; ?>

					<?php
					$rooms = get_terms( 'webcoast_room', array(
						'hide_empty' => false,
					) );

					if ( $rooms ) : ?>

						<div class="small-24 medium-12 large-8 columns program-filter-item">
							<label for="room_filter" class="program-filter-heading"><?php _e( 'Room', 'webcoast' ); ?></label>

								<select name="room_filter" id="room_filter" class="program-filter-trigger">
									<option value="all" data-room="all"><?php _e( 'All Rooms', 'webcoast' ); ?></option>

									<?php foreach ( $rooms as $room ) : ?>
										<option value="<?php echo $room->term_id; ?>" data-room="<?php echo $room->term_id; ?>"><?php echo $room->name; ?></option>
									<?php endforeach; ?>
								</select>

						</div>

					<?php endif; ?>

				</form>
			</div>

			<div id="loading-animation" style="display: none;">
				<div class="meter animate">
					<span style="width: 90%; height: 20px; margin: -10px;"><span></span></span>
				</div>
			</div>

			<div id="program-display">

				<?php

				// Get the conference days and loop through them,
				// creating a query on the items that day.
				$days = webcoast_get_transient_terms( 'webcoast_days', 'webcoast_day', array(
					'hide_empty' => false,
				), WEEK_IN_SECONDS * 4 );

				foreach ( $days as $day ) : ?>

					<h2 class="program-day-title"><?php echo $day->name; ?></h2>

					<?php
						$program_query_args = array(
							'post_type'      => 'program',
							'posts_per_page' => -1,
							'orderby'		  => 'meta_value',
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

						$program_query = webcoast_get_transient_query( 'webcoast_program_unfiltered_query_' . $day->slug, $program_query_args, 60*5 );
					?>

					<?php if ( $program_query->have_posts() ) : ?>
					<ul class="program-table">

						<?php while ( $program_query->have_posts() ) : $program_query->the_post(); ?>
							<?php get_template_part( 'content', 'program-list' ); ?>
						<?php endwhile; ?>

					</ul>
					<?php endif; wp_reset_postdata(); ?>

				<?php endforeach; ?>

			</div>

			<p><em><?php _e( 'We reserve ourselves the right to change the program at any given time. Please also always keep yourself up to date with the program as sessions tend to shift.', 'webcoast' ); ?></em></p>

		</div>
	</div>
</div>

<?php get_footer (); ?>