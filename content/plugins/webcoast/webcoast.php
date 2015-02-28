<?php
/*
	Plugin Name: WebCoast Features
	Plugin URI: http://www.webcoast.se
	Description: Implements WebCoast specific functions not suitable for a theme.
	Author: Erik Bernskiold, XLD Studios
	Version: 0.9.1
	Author URI: http://www.xldstudios.com/
	Text Domain: webcoast
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
	exit;

/**
 * WebCoast Master Class
 */
class WebCoast {

	public $participants;

	function __construct() {

		// Set plugin directory
		define( 'WC_PLUGIN_DIR', plugin_dir_path(__FILE__) );

		// Set plugin directory URL
		define( 'WC_PLUGIN_URL', plugins_url( '', __FILE__ ) );

		// Plugin Images Directory URL
		define( 'WC_IMAGES', WC_PLUGIN_URL . '/assets/images' );

		// Plugin Post Types Path
		define( 'WC_POST_TYPES', WC_PLUGIN_DIR . '/inc/post-types' );

		// Plugin Taxonomies Path
		define( 'WC_TAXONOMIES', WC_PLUGIN_DIR . '/inc/taxonomies' );

		// Load Custom Post Types
		$this->post_types();

		// Load Functions
		$this->functions();

		// Load Custom Taxonomies
		$this->taxonomies();

		// Load Shortcodes
		require_once( WC_PLUGIN_DIR . '/inc/class-webcoast-shortcodes.php' );

		// Add Image Sizes
		add_image_size( 'frontpage-sponsor', 400, 150, true );

		// Deactivate other plugin scripts
		wp_dequeue_script('afg_colorbox_script');
		wp_dequeue_script('afg_colorbox_js');
		wp_dequeue_style('afg_colorbox_css');

		// Include the WebCoast Participants Class
		include( WC_PLUGIN_DIR . '/inc/class-webcoast-participants.php' );

		// Add custom query vars
		add_filter( 'query_vars', array( $this, 'register_query_vars' ) );

		// Add endpoints
		add_action( 'init', array( $this, 'add_endpoints' ) );

		// Add the json event template
		add_action( 'template_redirect', array( $this, 'json_template' ) );

	}

	/**
	 * Custom functions
	 */
	function functions() {

		// Load ACF Fields
		// require_once( WC_PLUGIN_DIR . '/inc/advanced-custom-fields.php' );

	}

	function shortcodes() {}

	/**
	 * Custom Post Types
	 */
	function post_types() {

		// Load "Sponsors" post type
		require_once( WC_POST_TYPES . '/sponsors.php' );

		// Load "Program" post type
		require_once( WC_POST_TYPES . '/program.php' );

		// Load "Videos" post type
		require_once( WC_POST_TYPES . '/videos.php' );

		// Load "Återblickar" post type
		require_once( WC_POST_TYPES . '/aterblickar.php' );

		// Load "Inspiration" post type
		require_once( WC_POST_TYPES . '/inspiration.php' );

	}

	/**
	 * Custom Taxonomies
	 */
	function taxonomies() {

		// Load "År" taxonomy
		require_once( WC_TAXONOMIES . '/ar.php' );

		// Load "Sponsortyp" taxonomy
		require_once( WC_TAXONOMIES . '/sponsortyp.php' );

		// Load "Programtyp" taxonomy
		require_once( WC_TAXONOMIES . '/programtyp.php' );

		// Load "Ämne" taxonomy
		require_once( WC_TAXONOMIES . '/videoamne.php' );

		// Load "Day" taxonomy
		require_once( WC_TAXONOMIES . '/day.php' );

		// Load "Room" taxonomy
		require_once( WC_TAXONOMIES . '/room.php' );

	}

		/**
		 * Register Custom Query Vars
		 */
		public function register_query_vars( $vars ) {
			$vars[] = 'json';

			return $vars;
		}

		/**
		 * Adds /json endpoint everywhere
		 *
		 * Used to display a custom template (see below)
		 * for the program JSON
		 */
		public function add_endpoints() {

			add_rewrite_endpoint( 'json', EP_ALL );

		}

		/**
		 * Load JSON Template on Endpoint Call
		 *
		 * When the add endpoint is called, we want to display a
		 * custom template, which is the program JSON feed.
		 */
		public function json_template() {

			global $wp_query;

			// If this request doesn't contain the json endpoint, quit here.
			if ( ! isset( $wp_query->query_vars['json'] ) )
				return;

			if ( ! is_page( 'program' ) )
				return;

			include WC_PLUGIN_DIR . '/templates/json-template.php';
			exit;

		}

}

// Initialize everything
$GLOBALS['webcoast'] = new WebCoast();