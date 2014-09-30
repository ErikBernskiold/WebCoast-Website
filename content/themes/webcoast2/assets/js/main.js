jQuery(document).ready(function($){

	// Open External Links in New Window
	jQuery('a').each(function() {
	   var a = new RegExp('/' + window.location.host + '/');
	   if(!a.test(this.href)) {
	       jQuery(this).click(function(event) {
	           event.preventDefault();
	           event.stopPropagation();
	           window.open(this.href, '_blank');
	       });
	   }
	});

	// Toggle Responsive Navigation
	jQuery('.responsive-navigation-toggle a').click(function(){
		event.preventDefault();
		jQuery('.responsive-navigation').slideToggle();
	});

	// Add Inspiration Masonry Layout
	jQuery('.inspiration-container').masonry({
		itemSelector: '.inspiration-item'
	});

	/**
	 * User Reviews Filter
	 *
	 * @author  Erik Bernskiold
	 */
	jQuery('.program-filter-trigger').change(function() {

		jQuery("#loading-animation").show();
		jQuery("#program-display").hide();

		var $this     = $(this);
		var rooms     = new Array();
		var dates     = new Array();

		$('#room_filter option:selected').each(function() {
			rooms.push( $(this).data('room') );
		});

		$(".trigger-checkbox:checked").each(function() {
		  dates.push( $(this).data('date') );
		});

		var data = {
			action: 'webcoast_program_filter',
			rooms: rooms,
			dates: dates,
			nonce: webcoast_scripts.nonce
		}

		$.post(webcoast_scripts.ajax_url, data, function(response) {
			if( response != 'Error' ) {
				jQuery("#program-display").html(response);
				jQuery("#program-display").show();
				jQuery("#loading-animation").hide();
				return false;
			}
		});

		return false;

	});

});