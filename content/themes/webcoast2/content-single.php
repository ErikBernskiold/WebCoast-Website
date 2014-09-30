<?php
/**
 * Content Template for Single Posts
 *
 * @since WebCoast 1.1
 * @author XLD Studios
 * @version 1.0
 * @package WebCoast
 **/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
	<div class="post-thumbnail">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
	</div>
	<?php endif; ?>

	<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

	<div class="post-body">
		<?php the_content( __('Continue Reading &raquo;', 'webcoast') ); ?>
	</div>

	<ul class="post-meta">
		<li><i class="icon-time"></i> <?php the_time('j F Y'); ?></li>
		<li><i class="icon-user"></i> <?php the_author(); ?></li>
		<li><i class="icon-tag"></i> <?php the_category(' / '); ?></li>
		<li><i class="icon-comment"></i> <?php
			comments_popup_link( __('No Comments', 'webcoast'), __('1 Comment', 'webcoast'), __('% Comments', 'webcoast'), 'comments-link', __('Comments Closed', 'webcoast') );
		?>
		</li>
	</ul>

</article>