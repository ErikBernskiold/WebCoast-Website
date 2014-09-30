<?php
/**
 * Outputs Site Header
 *
 * @since WebCoast 1.0
 * @author XLD Studios
 * @version 1.0
 * @package WebCoast
 **/
?>
<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
	<head>
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title><?php wp_title(''); ?></title>

		<?php wp_head(); ?>

	</head>
	<body <?php body_class(); ?>>

		<header class="site-header">
			<div class="row">
				<div class="logo large-12 medium-12 small-24 columns">
					<a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/webcoast-logo.png" width="375" height="115" alt="<?php _e( 'WebCoast', 'webcoast' ); ?>"></a>
				</div>

				<div class="search-box large-5 medium-8 small-24 columns">
					<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
						<input type="text" value="<?php echo strip_tags( $_GET['q'] ); ?>" name="s" id="s" placeholder="<?php _e('What are you looking for?', 'webcoast'); ?>" class="header-search-form" />
					</form>
				</div>

				<nav class="top-navigation">
					<ul>
						<?php webcoast_language_switcher(); ?>
						<li><a href="<?php echo home_url( _x( '/contact-us/', 'contact us link slug', 'webcoast' ) ); ?>"><?php _e( 'Contact Us', 'webcoast' ); ?></a></li>
					</ul>
				</nav>

			</div>
		</header>

		<?php echo webcoast_get_nav_menu(); ?>