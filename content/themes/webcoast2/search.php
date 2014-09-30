<?php
/**
 * Displays Search Results
 *
 * @since WebCoast 1.0
 * @author XLD Studios
 * @version 1.0
 * @package WebCoast
 **/

get_header(); ?>

<div class="main search-page">
	<div class="row">
		<div class="small-24 columns">
			<div class="search-page-form">
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="small-24 columns">

			<?php if ( have_posts() ) : ?>

				<h1 class="page-title search-heading"><?php printf( __( 'Search Results for: %s', 'webcoast' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

				<?php while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class( 'search-item' ); ?>>

						<?php if ( has_post_thumbnail() ) : ?>
						<div class="search-item-thumbnail">
							<?php the_post_thumbnail( 'thumbnail' ); ?>
						</div>
						<?php endif; ?>

						<h2 class="search-item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

						<div class="search-item-excerpt">
							<?php the_excerpt(); ?>
						</div>

					</article>

				<?php endwhile; ?>

				<?php
			    		if(function_exists('wp_pagenavi')) :
			    			wp_pagenavi(); // Add support for the WP-Pagenavi plugin if it is installed. Otherwise use the default.
			    		else :
			    			webcoast_pagination();
			    		endif;
				?>

			<?php else : ?>

				<p><?php _e( 'No search results could be found for your query. Please try again with another query.', 'webcoast' ); ?></p>

			<?php endif; ?>

		</div>
	</div>
</div>

<?php get_footer(); ?>