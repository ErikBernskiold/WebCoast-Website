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

			<ul class="video-archive small-block-grid-1 medium-block-grid-2 large-block-grid-3">

				<?php
					$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

					$video_args = array(
						'post_type'      => 'program',
						'paged'          => $paged,
						'posts_per_page' => 9,
						'meta_query'     => array(
							array(
								'key'   => 'video_exists',
								'value' => true
							)
						),
					);

					$video = new WP_Query( $video_args );
				?>

				<?php if( $video->have_posts() ) : ?>

					<?php while( $video->have_posts() ) : $video->the_post(); ?>

						<?php get_template_part('content', 'sessionvideo'); ?>

					<?php endwhile; ?>

					<?php
				   	if(function_exists('wp_pagenavi')) :
				   		wp_pagenavi(); // Add support for the WP-Pagenavi plugin if it is installed. Otherwise use the default.
				   	else :
				   		webcoast_pagination();
				   	endif;
				   ?>

				<?php endif; wp_reset_postdata(); ?>

			</ul>

		</div>
	</div>
</div>

<?php get_footer (); ?>