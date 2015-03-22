<div id="video-<?php the_ID(); ?>" <?php post_class('video-item small-24 medium-12 large-8 columns'); ?>>

	<?php $image = get_field('video_thumbnail'); ?>

	<?php if( $image ) : ?>
		<div class="video-thumbnail">
			<a href="<?php the_permalink(); ?>"><img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>"></a>
		</div>
	<?php endif; ?>

	<h3 class="video-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

	<?php if ( get_field( 'program_talare' ) ) : $speaker_counter = 1; ?>

		<p class="video-speaker">

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

		</p>

	<?php endif; ?>

</div>