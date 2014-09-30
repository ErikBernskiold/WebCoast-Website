<?php
/**
 * Search Form
 *
 * Styles the default WordPress search form according
 * to the markup in this file.
 *
 * @since  1.0
 * @version  1.0
 * @package WebCoast
 */
?>
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<div class="row collapse">
	  <div class="small-20 columns">
	    <input type="text" value="<?php echo strip_tags( $_GET['s'] ); ?>" name="s" id="s" placeholder="<?php _e('What are you looking for?', 'webcoast'); ?>" />
	  </div>
	  <div class="small-4 columns">
	    <input type="submit" id="searchsubmit" value="<?php _e('Search', 'webcoast'); ?>" class="button prefix" />
	  </div>
	</div>
</form>