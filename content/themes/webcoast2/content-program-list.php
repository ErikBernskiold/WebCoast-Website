<?php
/**
 * Content: Program List
 *
 * @since WebCoast 1.0
 * @author XLD Studios
 * @version 1.0
 * @package WebCoast
 **/
?>
<li class="program-table-item">
	<ul>
		<li class="program-table-item-time small-24 medium-24 large-4 columns">
			<?php
				if( get_field('program_endtime') ) :
					$time = get_field('program_starttime') . ' - ' . get_field('program_endtime');
				else :
					$time = get_field('program_starttime');
				endif;
			?>

			<?php echo $time; ?>
		</li>
		<li class="program-table-item-info small-24 medium-17 large-14 columns">
			<div class="program-table-item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
			<div class="program-table-item-excerpt">
				<span class="program-table-item-speaker">
					<?php if(get_field('program_talare')) : $speaker_counter = 1; while(the_repeater_field('program_talare')) : ?>
						<?php if( $speaker_counter > 1 ) : ?>, <?php endif; ?>

						<?php if ( get_sub_field( 'program_talare_url' ) ) : ?>
							<a href="<?php the_sub_field('program_talare_url'); ?>">
								<?php the_sub_field('program_talare_namn'); ?>
							</a>
						<?php else : ?>
							<a href="https://twitter.com/<?php echo str_replace( '@', '', get_sub_field( 'program_talare_url' ) ); ?>">
								<?php the_sub_field('program_talare_namn'); ?>
							</a>
						<?php endif; ?>
					<?php $speaker_counter++; endwhile; endif; ?>
				</span> - <?php echo webcoast_get_excerpt( 25 ); ?></div>
		</li>
		<li class="program-table-item-location small-24 medium-5 large-5 columns">
			<?php $rooms = get_the_terms( $post->ID, 'webcoast_room' );
			if ( $rooms ) : ?>
			<span><?php foreach ( $rooms as $room ) echo $room->name; ?></span>
			<?php endif; ?>
		</li>
	</ul>
</li>