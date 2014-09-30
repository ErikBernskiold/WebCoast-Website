<?php
/**
 * Displays Single Post
 *
 * @since WebCoast 1.0
 * @author XLD Studios
 * @version 1.0
 * @package WebCoast
 **/

get_header(); ?>

<div class="main single-page">
	<div class="row">
		<div class="content small-24 medium-16 columns">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<?php get_template_part('content', 'single'); ?>

				<?php comments_template(); ?>

			<?php endwhile; ?>

			<?php else : ?>

				<?php get_template_part('content', '404'); ?>

			<?php endif; ?>

		</div>

		<?php get_sidebar(); ?>

	</div>
</div>

<?php get_footer(); ?>