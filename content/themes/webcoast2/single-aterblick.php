<?php get_header(); ?>

<div class="main retrospect-single">

	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

		<article id="aterblick-<?php the_ID(); ?>" <?php post_class('aterblick-item'); ?>>

			<div class="row">
				<div class="small-24 columns">
					<h1><?php printf( __('Retrospect: WebCoast %s', 'webcoast'), get_field('aterblick_ar') ); ?></h1>
				</div>
			</div>

			<div class="aterblick-body">
				<div class="row">

					<div class="large-14 small-24 columns aterblick-intro">
						<p class="intro"><?php the_field('aterblick_introduktion'); ?></p>

						<?php the_field('aterblick_beskrivning'); ?>
					</div>

					<div class="large-10 small-24 columns aterblick-image">
						<img src="<?php the_field('aterblick_image'); ?>" class="drop-border" alt="<?php _e( 'WebCoast Retrospect', 'webcoast' ); ?>">
					</div>

				</div>
			</div>

			<?php
			$display_year = get_field('aterblick_ar');

			$sponsor_types = webcoast_get_transient_terms( 'webcoast_sponsor_types', 'sponsortyp', array(
				'orderby' => 'id',
				'exclude' => array( 88, 69 ),
			), WEEK_IN_SECONDS * 4 );

			if ( ! empty ( $sponsor_types ) ) : ?>
			<div class="light-gray-bg page-section">
				<div class="row">
					<div class="small-24 columns">
						<h2><?php _e( 'Sponsors and Partners', 'webcoast' ); ?></h2>
						<p class="intro"><?php _e('WebCoast would not be anything without our sponsors. Do you or the company that you are working on want to sponsor WebCoast? Take a look at <a href="http://www.webcoast.se/en/for-sponsors/">our sponsor information</a>.', 'webcoast'); ?></p>

						<?php foreach ( $sponsor_types as $sponsor ) :

							$sponsor_query_args = array(
								'post_type'      => 'sponsor',
								'posts_per_page' => -1,
								'tax_query' => array(
									array(
										'taxonomy' => 'sponsortyp',
										'field' => 'slug',
										'terms' => $sponsor->slug,
									),
									array(
										'taxonomy' => 'year',
										'field' => 'slug',
										'terms' => $display_year,
									),
								),
							);

							$sponsor_query = webcoast_get_transient_query( 'webcoast_retrospect_' . $display_year . '_sponsor_' . $sponsor->slug . '_query', $sponsor_query_args, WEEK_IN_SECONDS * 4 );

							$text_link_terms = array( 'bronze', 'media-partner' );

						if ( $sponsor_query->have_posts() ) : ?>
						<article class="sponsor-row">
							<div class="sponsor-title large-4 small-24 columns">
								<?php echo $sponsor->name; ?>
							</div>
							<div class="<?php if ( ! in_array( $sponsor->slug, $text_link_terms ) ) { echo 'sponsor-logos'; } ?> large-19 small-24 columns">
								<ul class="<?php if ( ! in_array( $sponsor->slug, $text_link_terms ) ) { echo 'inline-list'; } else { echo 'no-bullet'; } ?>">
									<?php while ( $sponsor_query->have_posts() ) : $sponsor_query->the_post(); ?>
										<?php if ( in_array( $sponsor->slug, $text_link_terms ) ) : ?>
											<li>
												<a href="<?php the_field( 'sponsor_link' ); ?>"><?php the_title(); ?></a>
											</li>
										<?php else : ?>
											<li>
												<a href="<?php the_field( 'sponsor_link' ); ?>">
													<img src="<?php the_field( 'sponsor_fpimage' ); ?>" alt="<?php the_title(); ?>">
												</a>
											</li>
										<?php endif; ?>
									<?php endwhile; ?>
								</ul>
							</div>

						</article>
						<?php endif; wp_reset_postdata(); endforeach; ?>

					</div>
				</div>
			</div>
			<?php endif; ?>

			<?php
				$video_args = array(
					'post_type'      => 'program',
					'posts_per_page' => -1,
					'meta_query'     => array(
						array(
							'key'   => 'video_exists',
							'value' => true,
						),
					),
					'tax_query' => array(
						array(
							'taxonomy' => 'year',
							'field'    => 'slug',
							'terms'    => $display_year,
						),
					),
				);

				$video = webcoast_get_transient_query( 'webcoast_retrospect_' . $display_year . '_video_query', $video_args, DAY_IN_SECONDS );
			?>

			<?php if($video->have_posts()) : ?>
			<div class="page-section">
				<div class="row">
					<div class="small-24 columns">

						<h2><?php _e( 'Recorded Sessions', 'webcoast' ); ?></h2>
						<p class="intro"><?php _e('Nobody has time to go to all of WebCoast, unfortunately. Luckily, many of the sessions are recorded and made available here below for your viewing pleasure.', 'webcoast'); ?></p>

						<div class="video-archive row">

							<?php while($video->have_posts()) : $video->the_post(); ?>

								<?php get_template_part('content', 'sessionvideo'); ?>

							<?php endwhile; ?>

						</div>
					</div>
				</div>
			</div>
			<?php endif; wp_reset_postdata(); ?>

			<div class="aterblick-lankarmm light-gray-bg page-section">
				<div class="row">
					<div class="small-24 columns">
						<h2><?php _e('Links and more', 'webcoast'); ?></h2>

						<?php the_field('aterblick_lankarmm'); ?>
					</div>
				</div>
			</div>

			<?php if ( $display_year == 2013 ) : ?>
			<div class="aterblick-program page-section">
				<div class="row">
					<div class="small-24 columns">
						<h2><?php _e( 'Program', 'webcoast' ); ?></h2>
						<table id="program" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th>Tid</th>
									<th>Titel</th>
									<th>Plats</th>
									<th>Talare</th>
								</tr>
							</thead>
							<tbody>

							<?php
								$dates = array(
									array(
										'name' => __('15 mars, 2013', 'webcoast'),
										'machine' => '2013-03-15'
									),
									array(
										'name' => __('16 mars, 2013', 'webcoast'),
										'machine' => '2013-03-16'
									),
									array(
										'name' => __('17 mars, 2013', 'webcoast'),
										'machine' => '2013-03-17'
									)
								);

								foreach( $dates as $date ) :

								?>

									<tr>
										<td colspan="5" class="program-event-date">
											<?php echo $date['name']; ?>
										</td>
									</tr>

									<?php
										$program_args = array(
											'post_type' => 'program',
											'posts_per_page' => -1,
											'meta_key' => 'program_starttime',
											'orderby' => 'meta_value_num',
											'order' => 'ASC',
											'meta_query' => array(
												array(
													'key' => 'program_date',
													'value' => $date['machine'],
													'compare' => 'IS'
												)
											)
										);

										$program = new WP_Query($program_args);
									?>

									<?php if($program->have_posts()) : ?>

										<?php while($program->have_posts()) : $program->the_post(); ?>

											<tr id="program-<?php the_ID(); ?>">
												<td class="program-table-time">
													<?php
														if( get_field('program_endtime') ) :
															$time = get_field('program_starttime') . ' - ' . get_field('program_endtime');
														else :
															$time = get_field('program_starttime');
														endif;
													?>

													<?php echo $time; ?>
												</td>
												<td class="program-table-title">
													<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												</td>
												<td class="program-table-location">
													<?php the_field('program_location'); ?>
												</td>
												<td class="program-table-speaker">
													<?php the_field('program_spaker'); ?>
												</td>
											</tr>

										<?php endwhile; wp_reset_postdata(); ?>

									<?php endif; ?>

								<?php endforeach; ?>

							</tbody>
						</table>
					</div>
				</div>
			</div>
			<?php endif; ?>

		</article>

		<?php endwhile; ?>

	<?php endif; ?>

</div>

<?php get_footer (); ?>