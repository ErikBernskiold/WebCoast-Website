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

	// Inspiration Grid
	var $container = $('.inspiration-container').imagesLoaded( function() {
		$container.packery({
			itemSelector: '.inspiration-item'
		});
	});

	/**
	 * Program Filter
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

	/**
	 * Videos Filter
	 */
	jQuery('.video-filter-trigger').change(function() {

		jQuery("#loading-animation").show();
		jQuery("#videos-display").hide();

		var $this    = $(this);
		var years    = new Array();
		var subjects = new Array();

		$('#webcoast_year option:selected').each(function() {
			years.push( $(this).data('year') );
		});

		$(".trigger-checkbox:checked").each(function() {
		  subjects.push( $(this).data('subject') );
		});

		var data = {
			action: 'webcoast_video_filter',
			years: years,
			subjects: subjects,
			nonce: webcoast_scripts.nonce
		}

		$.post(webcoast_scripts.ajax_url, data, function(response) {
			if( response != 'Error' ) {
				jQuery("#videos-display").html(response);
				jQuery("#videos-display").show();
				jQuery("#loading-animation").hide();
				return false;
			}
		});

		return false;

	});

});