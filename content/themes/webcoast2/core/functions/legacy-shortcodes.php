<?php
////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Shortcodes    ///////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////


//	blockquote
add_shortcode('quote', 'tws_quote');

function tws_quote($atts, $content = null) {
	return '<div class="quote">' .do_shortcode($content).'</div>';
}

//	intro
add_shortcode('intro', 'tws_intro');

function tws_intro($atts, $content = null) {
	return '<div class="intro">' .do_shortcode($content).'</div>';
}

//	hr
add_shortcode('hr', 'tws_hr');

function tws_hr($atts, $content = null) {
	return '<div class="hrr">' .do_shortcode($content).'</div>';
}

//	pullquoteleft
add_shortcode('pullquoteleft', 'tws_pullquoteleft');

function tws_pullquoteleft($atts, $content = null) {
	return '<div class="pullquoteleft">' .do_shortcode($content).'</div>';
}

//	pullquoteright
add_shortcode('pullquoteright', 'tws_pullquoteright');

function tws_pullquoteright($atts, $content = null) {
	return '<div class="pullquoteright">' .do_shortcode($content).'</div>';
}

//	alert_yellow
add_shortcode('alert_yellow', 'tws_alert_yellow');

function tws_alert_yellow($atts, $content = null) {
	return '<div class="alert-box">' .do_shortcode($content).'</div>';
}

//	alert_blue
add_shortcode('alert_blue', 'tws_alert_blue');

function tws_alert_blue($atts, $content = null) {
	return '<div class="alert-box">' .do_shortcode($content).'</div>';
}

//	alert_green
add_shortcode('alert_green', 'tws_alert_green');

function tws_alert_green($atts, $content = null) {
	return '<div class="alert-box success">' .do_shortcode($content).'</div>';
}

//	alert_red
add_shortcode('alert_red', 'tws_alert_red');

function tws_alert_red($atts, $content = null) {
	return '<div class="alert-box alert">' .do_shortcode($content).'</div>';
}

//	one_half
add_shortcode('one_half', 'tws_one_half');

function tws_one_half($atts, $content = null) {
	return '<div class="one_half">' .do_shortcode($content).'</div>';
}

//	one_third
add_shortcode('one_third', 'tws_one_third');

function tws_one_third($atts, $content = null) {
	return '<div class="one_third">' .do_shortcode($content).'</div>';
}

//	two_third
add_shortcode('two_third', 'tws_two_third');

function tws_two_third($atts, $content = null) {
	return '<div class="two_third">' .do_shortcode($content).'</div>';
}

//	one_fourth
add_shortcode('one_fourth', 'tws_one_fourth');

function tws_one_fourth($atts, $content = null) {
	return '<div class="one_fourth">' .do_shortcode($content).'</div>';
}

//	three_fourth
add_shortcode('three_fourth', 'tws_three_fourth');

function tws_three_fourth($atts, $content = null) {
	return '<div class="three_fourth">' .do_shortcode($content).'</div>';
}

//	one_fifth
add_shortcode('one_fifth', 'tws_one_fifth');

function tws_one_fifth($atts, $content = null) {
	return '<div class="one_fifth">' .do_shortcode($content).'</div>';
}

//	two_fifth
add_shortcode('two_fifth', 'tws_two_fifth');

function tws_two_fifth($atts, $content = null) {
	return '<div class="two_fifth">' .do_shortcode($content).'</div>';
}

//	three_fifth
add_shortcode('three_fifth', 'tws_three_fifth');

function tws_three_fifth($atts, $content = null) {
	return '<div class="three_fifth">' .do_shortcode($content).'</div>';
}

//	four_fifth
add_shortcode('four_fifth', 'tws_four_fifth');

function tws_four_fifth($atts, $content = null) {
	return '<div class="four_fifth">' .do_shortcode($content).'</div>';
}

//	one_sixth
add_shortcode('one_sixth', 'tws_one_sixth');

function tws_one_sixth($atts, $content = null) {
	return '<div class="one_sixth">' .do_shortcode($content).'</div>';
}

//	five_sixth
add_shortcode('five_sixth', 'tws_five_sixth');

function tws_five_sixth($atts, $content = null) {
	return '<div class="five_sixth">' .do_shortcode($content).'</div>';
}

//	one_half_first
add_shortcode('one_half_first', 'tws_one_half_first');

function tws_one_half_first($atts, $content = null) {
	return '<div class="one_half_first">' .do_shortcode($content).'</div>';
}

//	one_third_first
add_shortcode('one_third_first', 'tws_one_third_first');

function tws_one_third_first($atts, $content = null) {
	return '<div class="one_third_first">' .do_shortcode($content).'</div>';
}

//	one_fourth_first
add_shortcode('one_fourth_first', 'tws_one_fourth_first');

function tws_one_fourth_first($atts, $content = null) {
	return '<div class="one_fourth_first">' .do_shortcode($content).'</div>';
}

//	one_fifth_first
add_shortcode('one_fifth_first', 'tws_one_fifth_first');

function tws_one_fifth_first($atts, $content = null) {
	return '<div class="one_fifth_first">' .do_shortcode($content).'</div>';
}

//	one_sixth_first
add_shortcode('one_sixth_first', 'tws_one_sixth_first');

function tws_one_sixth_first($atts, $content = null) {
	return '<div class="one_sixth_first">' .do_shortcode($content).'</div>';
}

//	two_third_first
add_shortcode('two_third_first', 'tws_two_third_first');

function tws_two_third_first($atts, $content = null) {
	return '<div class="two_third_first">' .do_shortcode($content).'</div>';
}

//	three_fourth_first
add_shortcode('three_fourth_first', 'tws_three_fourth_first');

function tws_three_fourth_first($atts, $content = null) {
	return '<div class="three_fourth_first">' .do_shortcode($content).'</div>';
}

//	two_fifth_first
add_shortcode('two_fifth_first', 'tws_two_fifth_first');

function tws_two_fifth_first($atts, $content = null) {
	return '<div class="two_fifth_first">' .do_shortcode($content).'</div>';
}

//	three_fifth_first
add_shortcode('three_fifth_first', 'tws_three_fifth_first');

function tws_three_fifth_first($atts, $content = null) {
	return '<div class="three_fifth_first">' .do_shortcode($content).'</div>';
}

//	four_fifth_first
add_shortcode('four_fifth_first', 'tws_four_fifth_first');

function tws_four_fifth_first($atts, $content = null) {
	return '<div class="four_fifth_first">' .do_shortcode($content).'</div>';
}

//	button_active
add_shortcode('button', 'tws_button');

function tws_button($atts, $content = null) {
	return '<div class="button">' .do_shortcode($content).'</div>';
}

//	button_reverse_reverse
add_shortcode('button_reverse', 'tws_button_reverse');

function tws_button_reverse($atts, $content = null) {
	return '<div class="button_reverse">' .do_shortcode($content).'</div>';
}