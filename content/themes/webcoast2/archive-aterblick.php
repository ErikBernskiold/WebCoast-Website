<?php
/**
 * Archive Template: Reviews
 *
 * This page template controls the archive page style for the "återblickar",
 * retrospects on previous years.
 *
 * @since WebCoast 1.0
 * @author XLD Studios
 * @version 1.0
 * @package WebCoast
 **/

get_header(); ?>

<div class="main retrospect-archive">
	<div class="row">
		<div class="content small-24 medium-14 large-16 columns">

			<h1 class="page-title"><?php _e( 'Retrospects', 'webcoast' ); ?></h1>

			<div class="page-body">
				<p class="intro"><?php _e( 'Now we are doing WebCoast for the fourth time, even better!', 'webcoast' ); ?></p>
				<p><?php _e( 'Be inspired what we have done on the past WebCoast\'s. The results of the trip that started with an idea that became a tweet, that became a group of people who made the unconference WebCoast, a meeting place where hundreds of people meet to talk about communication ont he internet. For both developers and users, independent of their area.', 'webcoast' ); ?></p>
				<p><?php _e( 'When we look back at the last years it is easy to start reminiscing over the highlights, such as when the participants started to fill the lobby at Lindholmen to finally greet eachother over a prawn sandwhich, the energy in front of the grid which is the center of the unconference, the difficulty of choosing between the many excellent sessions, when participants find new friends to hold a session with or the open atmosphere that makes us take the conversations to unknown heights, or depths.', 'webcoast' ); ?></p>
				<p><?php _e( 'The buzz when several hundred people are intensively talking to eachother.', 'webcoast' ); ?></p>
				<p><?php _e( 'We are doing this trip together. Because we want to meet and talk possibilities on the web. Here you can see retrospects on what we did then, in the form of blog posts from participants, news items and articles in different media, recordings from Bambuser, image slideshows and much more.', 'webcoast' ); ?></p>
			</div>

		</div>

		<div class="retrospect-years small-24 medium-10 large-8 columns">
			<div class="gray-bg fullborder panel">
				<?php
					$aterblick_year_args = array(
						'post_type'      => 'aterblick',
						'posts_per_page' => -1,
						'order'          => 'DESC',
						'orderby'		  => 'name',
						'post__not_in'   => array( 4371 ), // Exclude "Hur det började"
					);

					$aterblick_year = webcoast_get_transient_query( 'webcoast_rp_years_' ICL_LANGUAGE_CODE , $aterblick_year_args, WEEK_IN_SECONDS * 4 );
				?>

				<?php if($aterblick_year->have_posts()) : ?>

				<h3><?php _e('Choose a year', 'webcoast'); ?></h3>
				<p><?php _e('Please choose a year from the list below to see everything that happened at WebCoast that year.', 'webcoast'); ?></p>

				<ul class="no-bullet">

					<?php while($aterblick_year->have_posts()) : $aterblick_year->the_post(); ?>

						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

					<?php endwhile; ?>

						<li><a href="<?php echo get_permalink( 4371 ); ?>"><?php echo get_the_title( 4371 ); ?></a></li>

				</ul>

				<?php endif; wp_reset_postdata(); ?>
			</div>

			<p style="margin-top: 2rem;"><a href="<?php echo home_url( _x( '/videos/', 'video archive slug', 'webcoast' ) ); ?>" class="button expand"><?php _e( 'Till videoarkivet &raquo;', 'webcoast' ); ?></a></p>

		</div>

	</div>
</div>

<?php get_footer (); ?>