<?php
/**
 * Template for the Category Archives
 *
 * @since WebCoast 1.0
 * @author XLD Studios
 * @version 1.0
 * @package WebCoast
 **/

get_header(); ?>

<div class="main category-archive">
	<div class="row">
		<div class="content small-24 medium-16 columns">

			<?php if ( have_posts() ) : ?>

				<h1 class="page-title category-heading">
					<?php single_cat_title( '', true ); ?>
				</h1>

				<?php
					$cat_description = category_description();
					if ( ! empty( $cat_description ) )
						echo apply_filters( 'cat_archive_meta', '<div class="cat-archive-meta">' . $cat_description . '</div>' );
				?>

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