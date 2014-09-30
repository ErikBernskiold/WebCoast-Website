<?php /**
Template Name: Program iCal-fil
**/

ob_start();

header("Content-Type: text/Calendar");
header("Content-Disposition: inline; filename=webcoast-program.ics");

echo "BEGIN:VCALENDAR\r\n";
echo "VERSION:2.0\r\n";
echo "PRODID:-//hacksw/handcal//NONSGML v1.0//EN\r\n";
echo "X-WR-CALNAME:WebCoast 2013\r\n";

$calendar_ics_args = array(
	"post_type" => "program",
	"posts_per_page" => -1
);
		
$calendar_ics = new WP_Query($calendar_ics_args);			
			
if($calendar_ics->have_posts()) :
			
	while($calendar_ics->have_posts()) : $calendar_ics->the_post();

		$fixstime = str_replace( ':', '', get_field("program_starttime") ) - 100;
		$fixetime = str_replace( ':', '', get_field("program_endtime") ) - 100;
		
		$sd = '' . str_replace( '-', '', get_field("program_date") ) . 'T' . $fixstime . '00Z';
		$ed = '' . str_replace( '-', '', get_field("program_date") ) . 'T' . $fixetime . '00Z';

		echo "BEGIN:VEVENT\r\n";

			echo "UID:" . md5( uniqid( mt_rand(), true ) ) . "\r\n";
			echo "DTSTART:" . $sd . "\r\n";
			echo "DTEND:" . $ed . "\r\n";
			echo "SUMMARY: " . get_the_title() . "\r\n";
			echo "DESCRIPTION: " . get_the_excerpt() . "\r\n";
			echo "LOCATION: " . get_field("program_location") . "\r\n";

		echo "END:VEVENT\r\n";
				
	endwhile;
				
endif;

echo "END:VCALENDAR\r\n";