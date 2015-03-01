<?php
/**
 * Displays Single Session Page
 *
 * @since WebCoast 1.0
 * @author XLD Studios
 * @version 1.0
 * @package WebCoast
 **/

get_header(); ?>

<div class="main program-session-page">
	<div class="row">
		<div class="small-24 columns">

			<?php if( have_posts() ) : ?>

				<?php while( have_posts() ) : the_post(); ?>

					<article id="program-<?php the_ID(); ?>" <?php post_class('program-item'); ?>>

						<div class="webcoast-page-title-block">
							<div class="inner">
								<h1 class="webcoast-page-title"><?php the_title(); ?></h1>
							</div>
						</div>

						<?php
						/**
						 * Check for video content
						 *
						 * If we don't have video content, we show the display
						 * for a session item. If we have video content, we instead
						 * show a layout optimized for the video.
						 *
						 * First display here is for program items.
						 */
						if( ! get_field('video_exists') ) : ?>

							<?php if( get_field('program_summary') ) : ?>
							<p class="intro"><?php the_field('program_summary'); ?></p>
							<?php endif; ?>

							<div class="event-details">

								<div class="event-detail-item" id="event-day">
									<?php

										setlocale( LC_TIME, __('sv_SE', 'webcoast') );

										$machine_date			=	get_field('program_date');
										$machine_date_timestamp	=	strtotime( $machine_date );
										$human_date				=	strftime( '%e %B %Y', $machine_date_timestamp );
									?>

									<?php _e('Day?', 'webcoast'); ?>
									<span class="event-time-date"><?php echo $human_date; ?></span>
								</div>

								<?php if( get_field('program_starttime') ) : ?>
								<div class="event-detail-item" id="event-time">
									<?php
										if( get_field('program_endtime') ) :
											$time = get_field('program_starttime') . ' - ' . get_field('program_endtime');
										else :
											$time = get_field('program_starttime');
										endif;
									?>

									<?php _e('When?', 'webcoast'); ?>
									<span class="event-time-time"><?php echo $time; ?></span>
								</div>
								<?php endif; ?>

								<?php if( get_field('program_location') ) : ?>
								<div class="event-detail-item" id="event-location">
									<?php _e('Where?', 'webcoast'); ?>
									<span><?php the_field('program_location'); ?></span>
								</div>
								<?php endif; ?>

								<?php if( get_field('program_talare') ) : ?>
								<div class="event-detail-item" id="event-speaker">
									<?php _e('Who?', 'webcoast'); ?>
									<span>

										<?php if ( get_field( 'program_talare' ) ) : $speaker_counter = 1; ?>

											<?php while ( the_repeater_field( 'program_talare' ) ) : ?>

												<?php if( $speaker_counter >= 2 ) : ?>, <?php endif; ?>

												<?php if ( get_sub_field( 'program_talare_url' ) ) : ?>
													<a href="<?php the_sub_field('program_talare_url'); ?>">
														<?php the_sub_field('program_talare_namn'); ?>
													</a>
												<?php elseif ( get_sub_field( 'program_talare_twitter' ) ) : ?>
													<a href="https://twitter.com/<?php echo str_replace( '@', '', get_sub_field( 'program_talare_twitter' ) ); ?>">
														<?php the_sub_field('program_talare_namn'); ?>
													</a>
												<?php else : ?>
													<?php the_sub_field( 'program_talare_namn' ); ?>
												<?php endif; ?>

												<?php $speaker_counter++; ?>

											<?php endwhile; ?>

										<?php endif; ?>

									</span>
								</div>
								<?php endif; ?>

								<div class="event-detail-item" id="event-type">
									<?php _e('What?', 'webcoast'); ?>
									<span><?php the_terms( $post->ID, 'programtyp', '', ' / ', '' ); ?></span>
								</div>

							</div>

							<div class="event-content">
								<?php the_content(); ?>
							</div>

							<div class="alert-box secondary"><a href="<?php echo home_url( _x( '/program/', 'slug of schedule archive page', 'webcoast' ) ); ?>" class="event-return-link"><?php _e('&laquo; To the schedule'); ?></a></div>

						<?php
						/**
						 * Video Content Part
						 *
						 * If we have video content, show the video style instead.
						 */
						else :
						?>

							<div class="video-content">
								<?php the_field('video_embed'); ?>
							</div>

							<div class="video-meta">
								<?php if( get_field('program_summary') ) : ?>
									<p class="intro"><?php the_field('program_summary'); ?></p>
								<?php endif; ?>
								<ul>
									<li class="video-meta-speaker">
										<span class="video-meta-label"><?php _e('Speaker:', 'webcoast'); ?></span>
										<?php if(get_field('program_talare')) : $speaker_counter = 1; while(the_repeater_field('program_talare')) : ?><?php if( $speaker_counter > 1 ) : ?>, <?php endif; ?><a href="<?php the_sub_field('program_talare_url'); ?>"><?php the_sub_field('program_talare_namn'); ?></a><?php $speaker_counter++; endwhile; endif; ?>
									</li>
									<li class="video-meta-subject">
										<?php echo get_the_term_list( $post->ID, 'videoamne', '<span class="video-meta-label">' . __('Subject:', 'webcoast') .' </span>', ', ', '' ); ?>
									</li>
									<li class="video-meta-year">
										<?php echo get_the_term_list( $post->ID, 'year', '<span class="video-meta-label">' . __('Year:', 'webcoast') .' </span>', ', ', '' ); ?>
									</li>
								</ul>
							</div>

							<div class="clear"></div>

							<div class="video-description">
								<?php the_content(); ?>
							</div>

							<div class="video-related">
								<?php yarpp_related(array(
									'post_type' => array('program'),
									'template' => 'yarpp-template-videos.php',
									'threshold' => 0,
									'limit' => 3
								)); ?>
							</div>

							<div class="archive-back-link">
								<a href="<?php echo home_url( _x( '/videos/', 'session video recording CPT archive slug', 'webcoast' ) ); ?>">&laquo; <?php _e('To the video archive', 'webcoast'); ?></a>
							</div>

						<?php endif; ?>

					</article>

				<?php endwhile; ?>

			<?php endif; ?>

		</div>
	</div>
</div>

<?php get_footer (); ?>