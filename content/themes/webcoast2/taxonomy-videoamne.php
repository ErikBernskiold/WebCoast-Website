<?php
/**
 * Taxonomy Archive: Videoämne
 *
 * Shows the special video category archives.
 *
 * @since WebCoast 1.0
 * @author XLD Studios
 * @version 1.0
 * @package WebCoast
 **/

// Taxonomy ID
$taxonomy_id = get_queried_object()->term_id;

get_header(); ?>

<div class="main taxonomy-videoamne">
	<div class="row">
		<div class="small-24 columns">

			<div class="webcoast-page-title-block">
				<h1 class="webcoast-page-title"><?php single_term_title(); ?></h1>
				<div class="intro"><?php echo term_description(); ?></div>
			</div>

			<div class="video-archive">

				<?php
					$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

					$videoamne_query_args = array(
						'post_type'      => 'program',
						'posts_per_page' => 9,
						'tax_query'      => array(
							array(
								'taxonomy' => 'videoamne',
								'field'    => 'id',
								'terms'    => $taxonomy_id,
							),
						),
						'meta_query'     => array(
							array(
								'key'   => 'video_exists',
								'value' => true,
							)
						),
					);

					$videoamne_query = new WP_Query( $videoamne_query_args );
				?>

				<?php if ( $videoamne_query->have_posts() ) : ?>

					<?php while ( $videoamne_query->have_posts() ) : $videoamne_query->the_post(); ?>

						<?php get_template_part('content', 'sessionvideo'); ?>

					<?php endwhile; ?>

					<?php
						if(function_exists('wp_pagenavi')) :
							wp_pagenavi(); // Add support for the WP-Pagenavi plugin if it is installed. Otherwise use the default.
						else :
							webcoast_pagination();
						endif;
					?>

				<?php endif; wp_reset_postdata();  ?>

				<div class="archive-back-link">
					<a href="<?php echo home_url( _x( '/videos/', 'session video recording CPT archive slug', 'webcoast' ) ); ?>"><?php _e('&laquo; Back to the video archives', 'webcoast'); ?></a>
				</div>

			</div>

		</div>
	</div>
</div>

<?php get_footer (); ?>