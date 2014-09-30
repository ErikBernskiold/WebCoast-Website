<?php
/**
 * Displays Single Videos Page
 *
 * @since WebCoast 1.0
 * @author XLD Studios
 * @version 1.0
 * @package WebCoast
 **/

get_header(); ?>

<div class="main video-page">
	<div class="row">
		<div class="small-24 columns">

			<?php if( have_posts() ) : ?>

				<?php while( have_posts() ) : the_post(); ?>

					<article id="video-<?php the_ID(); ?>" <?php post_class('video-single-item'); ?>>

						<div class="webcoast-page-title-block">
							<div class="inner">
								<h1 class="webcoast-page-title video-page-title"><?php _e('From WebCoast:', 'webcoast'); ?> <?php the_title(); ?></h1>
							</div>
						</div>

						<div class="video-content">
							<?php the_field('video_embedkod'); ?>
						</div>

						<div class="video-meta">
							<?php if( get_field('video_beskrivning') ) : ?>
								<p class="intro"><?php the_field('video_beskrivning'); ?></p>
							<?php endif; ?>
							<ul>
								<li class="video-meta-speaker">
									<span class="video-meta-label"><?php _e('Speaker:', 'webcoast'); ?></span>
									<?php if(get_field('video_talare')) : $speaker_counter = 1; while(the_repeater_field('video_talare')) : ?><?php if( $speaker_counter > 1 ) : ?>, <?php endif; ?><a href="<?php the_sub_field('video_talare_twitter'); ?>"><?php the_sub_field('video_talare_namn'); ?></a><?php $speaker_counter++; endwhile; endif; ?>
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
								'post_type' => array('video'),
								'template' => 'yarpp-template-videos.php',
								'threshold' => 0,
								'limit' => 3
							)); ?>
						</div>

						<div class="archive-back-link">
							<a href="<?php echo home_url( _x( '/videos/', 'session video recording CPT archive slug', 'webcoast' ) ); ?>"><?php _e('&laquo; Back to the video archives', 'webcoast'); ?></a>
						</div>

					</article>

				<?php endwhile; ?>

			<?php endif; ?>

		</div>
	</div>
</div>

<?php get_footer (); ?>