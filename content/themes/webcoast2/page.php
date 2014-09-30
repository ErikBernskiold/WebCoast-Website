<?php
/**
 * Displays Page
 *
 * @since WebCoast 1.0
 * @author XLD Studios
 * @version 1.0
 * @package WebCoast
 **/

get_header(); ?>

<div class="main page-template">
	<div class="row">
		<div class="content small-24 medium-18 columns">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<?php get_template_part('content', 'page'); ?>

			<?php endwhile; ?>

			<?php else : ?>

				<?php get_template_part('content', '404'); ?>

			<?php endif; ?>

		</div>

		<?php get_sidebar( 'page' ); ?>

	</div>
</div>

<?php get_footer(); ?>