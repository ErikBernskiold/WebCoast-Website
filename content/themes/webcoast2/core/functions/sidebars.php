<?php
/**
 * Registers Sidebars
 */
if( function_exists( 'register_sidebar' ) ) {

	// Sets up a default sidebar.
	register_sidebar(array(
		'id' => 'sidebar',
		'name' => __('Sidebar: Blog (Default)', 'webcoast'),
		'before_widget' => '<div class="sidebar-block">',
	 	'after_widget' => '</div>',
	 	'before_title' => '<h5 class="sidebar-block-title">',
	 	'after_title' => '</h5>',
	));

	// Sets up page sidebar
	register_sidebar(array(
		'id' => 'sidebar-page',
		'name' => __('Sidebar: Page', 'webcoast'),
		'before_widget' => '<div class="sidebar-block">',
	 	'after_widget' => '</div>',
	 	'before_title' => '<h5 class="sidebar-block-title">',
	 	'after_title' => '</h5>',
	));

	// Sets up Footer First Nav
	register_sidebar(array(
		'id' => 'footer-nav-one',
		'name' => __('Footer: First Navigation', 'webcoast'),
		'before_widget' => '<div class="footer-block">',
	 	'after_widget' => '</div>',
	 	'before_title' => '<h5 class="footer-title">',
	 	'after_title' => '</h5>',
	));

	// Sets up Footer Second Nav
	register_sidebar(array(
		'id' => 'footer-nav-two',
		'name' => __('Footer: Second Navigation', 'webcoast'),
		'before_widget' => '<div class="footer-block">',
	 	'after_widget' => '</div>',
	 	'before_title' => '<h5 class="footer-title">',
	 	'after_title' => '</h5>',
	));

}