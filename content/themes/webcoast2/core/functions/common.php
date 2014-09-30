<?php

/**
 * Contains various useful custom functions.
 *
 * @since WebCoast 1.0
 * @author XLD Studios
 * @version 1.0
 * @package WebCoast
 **/


/**
 * Prints Custom Field Data
 *
 * @since WebCoast 1.0
 **/
function print_custom_field($custom_field) {
	global $post;
	$custom_field = get_post_meta($post->ID, $custom_field, true);
	print $custom_field;
}

/**
 * Gets Custom Field data and places
 * in variable with the same name as the
 * post meta key.
 *
 * @since WebCoast 1.0
 **/
function get_custom_field($custom_field) {
	global $post;
	$custom_field = get_post_meta($post->ID, $custom_field, true);
}

/**
 * Checks if a certain number is even of odd.
 *
 * @since WebCoast 1.0
 **/

function is_half($num) {
  if ($num % 2 == 0) {
  return false;
 } else {
    return true;
  }
}