<?php
/**
 * Template for displaying the post archives
 *
 * @since WebCoast 1.0
 * @author XLD Studios
 * @version 1.0
 * @package WebCoast
 **/

get_header(); ?>

<div class="main blog-archive">
	<div class="row">
		<div class="content small-24 medium-16 columns">

			<?php if ( have_posts() ) : ?>

		    	<h1 class="page-title archives-heading">
				<?php if ( is_day() ) : ?>
					<?php printf( __( 'Daily Archives: %s', 'webcoast' ), '<span>' . get_the_date() . '</span>' ); ?>
				<?php elseif ( is_month() ) : ?>
					<?php printf( __( 'Monthly Archives: %s', 'webcoast' ), '<span>' . get_the_date( 'F Y' ) . '</span>' ); ?>
				<?php elseif ( is_year() ) : ?>
					<?php printf( __( 'Yearly Archives: %s', 'webcoast' ), '<span>' . get_the_date( 'Y' ) . '</span>' ); ?>
				<?php else : ?>
					<?php _e( 'Blog Archives', 'webcoast' ); ?>
				<?php endif; ?>
			</h1>

		   <?php while ( have_posts() ) : the_post(); ?>

		   <?php get_template_part('content', get_post_format()); ?>

		 	<?php endwhile; ?>

			<?php
				if(function_exists('wp_pagenavi')) :
					wp_pagenavi(); // Add support for the WP-Pagenavi plugin if it is installed. Otherwise use the default.
				else :
					webcoast_pagination();
				endif;
			?>

			<?php else : ?>

				<?php get_template_part('content', '404'); // Streamline and get the 404 content from a unified file. ?>

			<?php endif; ?>

		</div>

		<?php get_sidebar(); ?>

	</div>
</div>

<?php get_footer(); ?>