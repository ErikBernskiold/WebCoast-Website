<?php
/**
 * Displays Post Index Page
 *
 * @since WebCoast 1.0
 * @author XLD Studios
 * @version 1.0
 * @package WebCoast
 **/

get_header(); ?>

<div class="main index">
	<div class="row">
		<div class="small-24 medium-16 columns">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			    <?php get_template_part('content', get_post_format()); // This is where the specific post formatting is done. ?>

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