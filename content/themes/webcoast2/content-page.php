<?php
/**
 * Content Template for Pages
 *
 * @since WebCoast 1.1
 * @author XLD Studios
 * @version 1.0
 * @package WebCoast
 **/
?>

<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>

	<h1 class="page-title"><?php the_title(); ?></h1>

	<div class="page-body">
		<?php the_content(); ?>
	</div>

</article>