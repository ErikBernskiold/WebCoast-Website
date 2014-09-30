<?php

/**
 * Default WordPress functions.php file
 * Loads and configures the theme.
 *
 * @since WebCoast 1.0
 * @author XLD Studios
 * @version 1.0
 * @package WebCoast
 **/


/**
 * Include and Set Up WebCoast Class
 ***********************************************/

require_once( get_template_directory() . '/core/theme.php'); // Includes WebCoast

$webcoast = new WebCoast_Framework();

$webcoast->init(array(
	'theme_name' => 'WebCoast', // Change this to the name of the theme.
	'theme_slug' => 'webcoast', // Create a custom slug for the theme.
	'theme_version' => '1.3'
));

/**
 * Add Theme-Specific Stuff Below Here
 *****************************************/

define('ICL_DONT_LOAD_NAVIGATION_CSS', true);
define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
define('ICL_DONT_LOAD_LANGUAGES_JS', true);

/**
 * Defines content width
 **/

if (!isset($content_width)) {
	$content_width = 600; // Let this to the proper content width
}