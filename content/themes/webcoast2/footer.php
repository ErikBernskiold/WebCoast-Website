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

	<section class="app-cta">
		<div class="row page-section">
		  <div class="small-24 medium-14 large-13 columns text-center app-cta-body">
		    <h2 class="app-cta-title"><?php _e( 'Download The WebCoast App', 'webcoast' ); ?></h2>
		    <p><?php _e( 'Download the WebCoast app and get quick and easy access to the programme. It is available for both iOS and Android in the respective app stores.', 'webcoast' ); ?></p>
		    <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-2" id="app-download-buttons">
		      <li>
		        <a href="https://itunes.apple.com/se/app/webcoast-2015/id970365605?mt=8"><img src="<?php echo THEME_IMAGES_URI; ?>/appstore-ios.png" alt="<?php _e( 'Available on the App Store', 'webcoast' ); ?>"></a>
		      </li>
		      <li>
		        <a href="https://play.google.com/store/apps/details?id=se.kodifiera.webcoast2015"><img src="<?php echo THEME_IMAGES_URI; ?>/googleplay.png" alt="<?php _e( 'Get it on Google Play', 'webcoast' ); ?>"></a>
		      </li>
		    </ul>
		  </div>
		  <div class="small-24 medium-10 large-10 columns text-center">
		    <img src="<?php echo THEME_IMAGES_URI; ?>/webcoast-app-preview.png" alt="<?php _e( 'WebCoast App', 'webcoast' ); ?>" class="app-cta-image">
		  </div>
		</div>
	</section>

	<div class="site-footer">
		<div class="row">
			<div class="small-24 medium-12 large-9 columns">
				<p><a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/webcoast-logo-white.png" width="300" height="115" alt="WebCoast"></a></p>
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
					<li><a href="http://www.mynewsdesk.com/se/webcoast"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-mynewsdesk.png" alt="MyNewsdesk"></a></li>
				</ul>
			</div>
		</div>
	</div>

	<?php wp_footer(); ?>

	</body>
</html>