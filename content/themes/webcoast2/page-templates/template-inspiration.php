<?php
/**
 * Page Template: Inspiration
 *
 * Adds a custom page template to display the inspiration page.
 *
 * @since WebCoast 1.0
 * @author XLD Studios
 * @version 1.0
 * @package WebCoast
 *
 * Template Name: Inspiration
 *
 **/

get_header(); ?>

<div class="main inspiration-page">

	<section class="bg-primary inspiration-page-header">
		<div class="row">
			<div class="small-24 large-18 large-centered columns">
				<h1 class="page-title mb0"><?php _e( 'Inspiration', 'webcoast' ); ?></h1>
				<p class="intro"><?php _e( 'Experience just how fun WebCoast is through the imagery gathered by attendees over the years.', 'webcoast' ); ?></p>
			</div>
		</div>
	</section>

	<?php
		$inspiration_query_args = array(
			'post_type' => 'portgallery',
			'posts_per_page' => -1,
		);

		$inspiration_query = new WP_Query( $inspiration_query_args );
	?>

	<?php if ( $inspiration_query->have_posts() ) : ?>

		<div class="inspiration-container">

			<?php while ( $inspiration_query->have_posts() ) : $inspiration_query->the_post(); ?>

				<div class="inspiration-item">
					<a href="<?php echo get_post_meta( $post->ID, 'portgallerylink', true ); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
				</div>

			<?php endwhile; ?>

		</div>

	<?php else : ?>

		<?php get_template_part('content', '404'); ?>

	<?php endif; wp_reset_postdata(); ?>

</div>

<?php get_footer(); ?>