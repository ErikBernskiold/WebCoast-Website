<?php
/*
YARPP Template: Videos
Author: Erik Bernskiold
*/
?>
<?php if (have_posts()):?>
<h3 class="related-videos-title"><?php _e('Other interesting sessions', 'webcoast'); ?></h3>
<div class="related-videos-container">
	<?php while (have_posts()) : the_post(); ?>

		<?php get_template_part('content', 'sessionvideo'); ?>

	<?php endwhile; ?>
</div>

<div class="clear"></div>
<?php endif; ?>