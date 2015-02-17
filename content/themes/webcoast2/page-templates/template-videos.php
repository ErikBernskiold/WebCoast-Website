<?php
/**
 * Page Template: Videos Page
 *
 * Videos archive page that shows session videos from webcoast.
 *
 * @since WebCoast 1.0
 * @author XLD Studios
 * @version 1.0
 * @package WebCoast
 *
 * Template Name: Videos
 *
 **/

get_header(); ?>

<div class="main fullwidth-page">
	<div class="row">
		<div class="small-24 columns">

			<div class="webcoast-page-title-block">
				<h1 class="webcoast-page-title"><?php _e('Videos from WebCoast', 'webcoast'); ?></h1>
				<p class="intro"><?php _e('Nobody has time to go to all of WebCoast, unfortunately. Luckily, many of the sessions are recorded and made available here below for your viewing pleasure.', 'webcoast'); ?></p>
			</div>

			<div class="program-filter row">
				<form action="<?php the_permalink(); ?>" method="post">

					<div class="small-24 medium-10 large-5 columns program-filter-item">
						<h3 class="program-filter-title"><?php _e( 'Filter', 'webcoast' ); ?></h3>
						<p><?php _e( 'Drill down further into the videos.', 'webcoast' ); ?></p>
					</div>

					<?php
					$years = webcoast_get_transient_terms( 'webcoast_years', 'year', array(
						'hide_empty' => true,
						'order' => 'DESC',
					), WEEK_IN_SECONDS * 4 );

					if ( $years ) : ?>

						<div class="small-24 medium-14 large-4 columns program-filter-item" id="year-filter">
							<label class="program-filter-heading" for="webcoast_year"><?php _e( 'Year', 'webcoast' ); ?></label>

							<div class="inline-checkboxes-group">

								<?php foreach ( $years as $year ) : ?>

									<div class="inline-checkbox">
										<input type="checkbox" class="video-filter-trigger trigger-checkbox" name="year_filter[]" value="<?php echo $year->term_id; ?>" id="<?php echo $year->slug; ?>" data-year="<?php echo $year->term_id; ?>"> <label for="<?php echo $year->slug; ?>" class="inline-label"><?php echo $year->name; ?></label>
									</div>

								<?php endforeach; ?>

							</div>

						</div>

					<?php endif; ?>

					<?php
					$subjects = webcoast_get_transient_terms( 'webcoast_videoamne', 'videoamne', array(
						'hide_empty' => true,
					), WEEK_IN_SECONDS * 4 );

					if ( $subjects ) : ?>

						<div class="small-24 medium-24 large-15 columns program-filter-item" id="category-filter">
							<label class="program-filter-heading"><?php _e( 'Subject', 'webcoast' ); ?></label>
							<div class="inline-checkboxes-group">

								<?php foreach ( $subjects as $subject ) : ?>

									<div class="inline-checkbox">
										<input type="checkbox" class="video-filter-trigger trigger-checkbox" name="subject_filter[]" value="<?php echo $subject->term_id; ?>" id="<?php echo $subject->slug; ?>" data-subject="<?php echo $subject->term_id; ?>"> <label for="<?php echo $subject->slug; ?>" class="inline-label"><?php echo $subject->name; ?></label>
									</div>

								<?php endforeach; ?>

							</div>
						</div>

					<?php endif; ?>

				</form>
			</div>

			<div id="loading-animation" style="display: none;">
				<div class="meter animate">
					<span style="width: 90%; height: 20px; margin: -10px;"><span></span></span>
				</div>
			</div>

			<div id="videos-display">

				<?php
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

				<?php endif; wp_reset_postdata(); ?>

			</div>

		</div>
	</div>
</div>

<?php get_footer (); ?>