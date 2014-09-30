<?php
/**
 * Displays the site footer
 *
 * @since WebCoast 1.0
 * @author XLD Studios
 * @version 1.0
 * @package WebCoast
 **/
?>

	<div class="site-footer">
		<div class="row">
			<div class="small-24 medium-12 large-9 columns">
				<p><a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/webcoast-logo-white.png" width="300" height="115" alt="WebCoast"></a></p>
				<p><?php printf( __( 'Copyright &copy; %s WebCoast', 'webcoast' ), date( 'Y' ) ); ?></p>
			</div>
			<div class="small-24 medium-12 large-5 columns">
				<?php dynamic_sidebar('footer-nav-two'); ?>
			</div>
			<div class="small-24 medium-12 large-5 columns">
				<?php dynamic_sidebar('footer-nav-one'); ?>
			</div>
			<div class="small-24 medium-12 large-5 columns">
				<h5 class="footer-title"><?php _e( 'Social Media', 'webcoast' ); ?></h5>
				<ul class="social-media-list">
					<li><a href="https://www.facebook.com/webcoast"><i class="icon-facebook icon-2x"></i></a></li>
					<li><a href="https://twitter.com/webcoast"><i class="icon-twitter icon-2x"></i></a></li>
					<li><a href="http://www.flickr.com/groups/webcoast/"><i class="icon-flickr icon-2x"></i></a></li>
					<li><a href="https://plus.google.com/+WebcoastSe/"><i class="icon-google-plus icon-2x"></i></a></li>
				</ul>
			</div>
		</div>
	</div>

	<?php wp_footer(); ?>

	</body>
</html>