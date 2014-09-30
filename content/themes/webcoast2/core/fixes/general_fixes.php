<?php

/**
 * File Includes Various Fixes
 *
 * @since WebCoast 1.0
 * @author XLD Studios
 * @version 1.0
 * @package WebCoast
 **/

/**
 * Disables wpautop and wptexturize filters for shortcodes
 *
 * @since WebCoast 1.0
 *
 **/
function webtreats_formatter($content) {
	$new_content = '';

	/* Matches the contents and the open and closing tags */
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';

	/* Matches just the contents */
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';

	/* Divide content into pieces */
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

	/* Loop over pieces */
	foreach ($pieces as $piece) {
		/* Look for presence of the shortcode */
		if (preg_match($pattern_contents, $piece, $matches)) {

			/* Append to content (no formatting) */
			$new_content .= $matches[1];
		} else {

			/* Format and append to content */
			$new_content .= wptexturize(wpautop($piece));
		}
	}

	return $new_content;
}

// Remove the 2 main auto-formatters
//remove_filter('the_content', 'wpautop');
//remove_filter('the_content', 'wptexturize');

// Before displaying for viewing, apply this function
//add_filter('the_content', 'webtreats_formatter', 99);
//add_filter('widget_text', 'webtreats_formatter', 99);

/**
 * Removes WordPress Generatator Code
 *
 * @since WebCoast 1.0
 **/
function webcoast_remove_version() {
	return ''; // Returns nothing for the generator meta.
}

add_filter('the_generator', 'webcoast_remove_version'); // Performs the removal.