<?php
/*
YARPP Template: Videos
Author: Erik Bernskiold
*/

if ( have_posts() ) :?>

	<h3 class="related-videos-title"><?php _e( 'Other interesting sessions', 'webcoast' ); ?></h3>

	<div class="related-videos-container row">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'sessionvideo' ); ?>

		<?php endwhile; ?>
	</div>

<?php endif; ?>