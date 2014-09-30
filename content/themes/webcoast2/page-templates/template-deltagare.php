<?php
/*
Template Name: Deltagare
*/
?>

<?php get_header(); ?>

<div class="main attendees-page">
	<div class="row">
		<div class="small-24 columns">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<h1 class="webcoast-page-title"><?php the_title(); ?></h1>
			<?php the_content(); ?>

			<?php

			function uberecho($s) {
			  if(is_string($s)) {
			    echo $s;
			  }
			  echo "";
			}

			function uberecho2($s) {
			  if(is_string($s)) {
			  	echo "@";
			    echo $s;
			  }
			  echo "";
			}

			$completeurl = "https://members.paloma.se/Magnet/Xml/AttendeeList?customerId=5274&eventId=140&apikey=F05E309FB1ED9BE3EB39D5DBC1185ED6";
			$xml = simplexml_load_file($completeurl);
			$woot = json_encode($xml);
			$json = json_decode($woot, true);
			$result = count($json['tickettypes']['tickettype_deltagaravgift-webcoast-2013']['attendees']['attendee']);
			$nummer=1;
			$i=0;
			?>

				<div class="webcoast-ticket-status">
					<div class="webcoast-tickets-sold">
						<?php _e('Tickets Sold', 'webcoast'); ?>
						<span><a href="https://magnetevent.se/Event/webcoast-2013-lindholmen-science-park-2013-03-15-130000/" target="_blank"><?php echo ($sold_tickets=$result+41+9); ?></a></span>
					</div>
					<div class="webcoast-tickets-remaining">
						<?php _e('Available Tickets', 'webcoast'); ?>
						<span><a href="https://magnetevent.se/Event/webcoast-2013-lindholmen-science-park-2013-03-15-130000/" target="_blank"><?php echo (250-$sold_tickets); ?></a></span>
					</div>
					<div class="webcoast-tickets-buy">
						<a href="https://magnetevent.se/Event/webcoast-2013-lindholmen-science-park-2013-03-15-130000/" class="button"><?php _e('Buy Ticket &raquo;', 'webcoast'); ?></a>
					</div>
				</div>

				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				<table id="deltagare" cellpadding="0" cellspacing="0">
					<thead>
						<tr>
							<th><?php _e('No.', 'webcoast'); ?></th>
							<th><?php _e('Image', 'webcoast'); ?></th>
							<th><?php _e('Name', 'webcoast'); ?></th>
							<th><?php _e('Company', 'webcoast'); ?></th>
							<th><?php _e('Twitter', 'webcoast'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php
							while ($i<$result) :

								$attendee = $json['tickettypes']['tickettype_deltagaravgift-webcoast-2013']['attendees']['attendee'][$i];
								$attendee_id = $attendee['attendee_id'];
								$attendee_fornamn = $attendee['attendee_fornamn'];
								$attendee_efternamn = $attendee['attendee_efternamn'];
								$attendee_epost = $attendee['attendee_e-post'];
								$attendee_foretag = $attendee['attendee_foretag'];
								$attendee_twitter = $attendee['attendee_vad-heter-du-pa-twitter'];
						?>

						<tr>
							<td class="deltagare-col-number">
								<?php echo $nummer; ?>
							</td>
							<td class="deltagare-col-avatar">
								<?php if (is_string($attendee_twitter)) { ?><a target='_blank' href="http://twitter.com/<?php echo uberecho($attendee_twitter); ?>"><img src='https://api.twitter.com/1/users/profile_image?screen_name=<?php uberecho($attendee_twitter) ?>&size=normal'></a><?php } else { echo (" ");} ?>
							</td>
							<td class="deltagare-col-name">
								<?php if ($nummer==109) { echo($attendee_fornamn); echo(" "); echo($attendee_efternamn); } else{ ?>
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='<?php uberecho($attendee_fornamn); ?>'&last='<?php uberecho($attendee_efternamn); ?>'&search='GO'"><?php uberecho($attendee_fornamn); ?> <?php uberecho($attendee_efternamn); ?></a>
								<?php } ?>
							</td>
							<td class="deltagare-col-company">
								<?php uberecho($attendee_foretag) ?>
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/<?php echo uberecho($attendee_twitter); ?>" class="twitter-follow-button" data-show-count="false" data-size="large"><?php echo uberecho($attendee_twitter); ?></a>
							</td>
						</tr>

						<?php
							$i++; $nummer++;
							endwhile;
						?>
						<tr>
							<td class="deltagare-col-number">
								<?php $maria_nummer=$result+1; echo(" "); echo($maria_nummer); ?>
							</td>
							<td class="deltagare-col-avatar">
								<a target='_blank' href="http://twitter.com/mikumaria"><img src='https://api.twitter.com/1/users/profile_image?screen_name=mikumaria&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Maria'&last='Gustafsson'&search='GO''">Maria Gustafsson</a>
							</td>
							<td class="deltagare-col-company">
								MIKU
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/mikumaria" class="twitter-follow-button" data-show-count="false" data-size="large">mikumaria</a>
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $anna_nummer=$maria_nummer+1; echo(" "); echo($anna_nummer); ?>
							</td>
							<td class="deltagare-col-avatar">
								<a target='_blank' href="http://twitter.com/vimleanna"><img src='https://api.twitter.com/1/users/profile_image?screen_name=vimleanna&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Anna'&last='Forsberg'&search='GO'">Anna Forsberg</a>
							</td>
							<td class="deltagare-col-company">
								VimleWebb
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/vimleanna" class="twitter-follow-button" data-show-count="false" data-size="large">vimleanna</a>
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $stefan_nummer=$anna_nummer+1; echo(" "); echo($stefan_nummer); ?>
							</td>
							<td class="deltagare-col-avatar">
								<a target='_blank' href="http://twitter.com/stefanwaborg"><img src='https://api.twitter.com/1/users/profile_image?screen_name=stefanwaborg&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Stefan'&last='Waborg'&search='GO'">Stefan Waborg</a>
							</td>
							<td class="deltagare-col-company">
								EVRY
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/stefanwaborg" class="twitter-follow-button" data-show-count="false" data-size="large">stefanwaborg</a>
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $szofia_nummer=$stefan_nummer+1; echo(" "); echo($szofia_nummer); ?>
							</td>
							<td class="deltagare-col-avatar">
								<a target='_blank' href="http://twitter.com/szofiaj"><img src='https://api.twitter.com/1/users/profile_image?screen_name=szofiaj&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Szofia'&last='Jakobsson'&search='GO'">Szofia Jakobsson</a>
							</td>
							<td class="deltagare-col-company">
								Sängjätten
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/szofiaj" class="twitter-follow-button" data-show-count="false" data-size="large">szofiaj</a>
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $sgskold_nummer=$szofia_nummer+1; echo(" "); echo($sgskold_nummer); ?>
							</td>
							<td class="deltagare-col-avatar">
								<a target='_blank' href="http://twitter.com/sgskold"><img src='https://api.twitter.com/1/users/profile_image?screen_name=sgskold&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Sandra'&last='Gonzalez Sköld'&search='GO'">Sandra Gonzalez Sköld</a>
							</td>
							<td class="deltagare-col-company">
								SKF
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/sgskold" class="twitter-follow-button" data-show-count="false" data-size="large">sgskoldn</a>
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $stellan_nummer=$sgskold_nummer+1; echo(" "); echo($stellan_nummer); ?>
							</td>
							<td class="deltagare-col-avatar">
								<a target='_blank' href="http://twitter.com/stellan"><img src='https://api.twitter.com/1/users/profile_image?screen_name=stellan&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Stellan'&last='Löfving'&search='GO'">Stellan Löfving</a>
							</td>
							<td class="deltagare-col-company">
								Truth
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/stellan" class="twitter-follow-button" data-show-count="false" data-size="large">stellan</a>
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare1=$stellan_nummer+1; echo(" "); echo($utstallare1); ?>
							</td>
							<td class="deltagare-col-avatar">
								<a target='_blank' href="http://twitter.com/LiseBergqvist"><img src='https://api.twitter.com/1/users/profile_image?screen_name=LiseBergqvist&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Lise'&last='Bergqvist'&search='GO'">Lise Bergqvist</a>
							</td>
							<td class="deltagare-col-company">
								Älvstranden
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/LiseBergqvist" class="twitter-follow-button" data-show-count="false" data-size="large">LiseBergqvist</a>
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare2=$stellan_nummer+2; echo(" "); echo($utstallare2); ?>
							</td>
							<td class="deltagare-col-avatar">
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Elin'&last='Asplind'&search='GO'">Elin Asplind</a>
							</td>
							<td class="deltagare-col-company">
								Älvstranden
							</td>
							<td class="deltagare-col-twitter">
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare3=$stellan_nummer+3; echo(" "); echo($utstallare3); ?>
							</td>
							<td class="deltagare-col-avatar"></td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Manilla'&last='Shillingford'&search='GO'">Manilla Shillingford</a>
							</td>
							<td class="deltagare-col-company">
								Älvstranden
							</td>
							<td class="deltagare-col-twitter">
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare4=$stellan_nummer+4; echo(" "); echo($utstallare4); ?>
							</td>
							<td class="deltagare-col-avatar">
							<a target='_blank' href="http://twitter.com/TereseCNilsson"><img src='https://api.twitter.com/1/users/profile_image?screen_name=TereseCNilsson&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Therese'&last='Nilsson'&search='GO'">Therese Nilsson</a>
							</td>
							<td class="deltagare-col-company">
								Älvstranden
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/tereseCNilsson" class="twitter-follow-button" data-show-count="false" data-size="large">tereseCNilsson</a>
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare5=$stellan_nummer+5; echo(" "); echo($utstallare5); ?>
							</td>
							<td class="deltagare-col-avatar">
								<a target='_blank' href="http://twitter.com/oderland_jack"><img src='https://api.twitter.com/1/users/profile_image?screen_name=oderland_jack&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Jack'&last='Oderland'&search='GO'">Jack Oderland</a>
							</td>
							<td class="deltagare-col-company">
								Oderland
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/oderland_jack" class="twitter-follow-button" data-show-count="false" data-size="large">oderland_jack</a>
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare6=$stellan_nummer+6; echo(" "); echo($utstallare6); ?>
							</td>
							<td class="deltagare-col-avatar">
								<a target='_blank' href="http://twitter.com/oderland_david"><img src='https://api.twitter.com/1/users/profile_image?screen_name=oderland_david&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='David'&last='Majchrzak'&search='GO'">David Majchrzak</a>
							</td>
							<td class="deltagare-col-company">
								Oderland
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/oderland_david" class="twitter-follow-button" data-show-count="false" data-size="large">oderland_david</a>
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare7=$stellan_nummer+7; echo(" "); echo($utstallare7); ?>
							</td>
							<td class="deltagare-col-avatar"></td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Emma'&last='Wåhlin'&search='GO'">Emma Wåhlin</a>
							</td>
							<td class="deltagare-col-company">
								Oderland
							</td>
							<td class="deltagare-col-twitter">
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare8=$stellan_nummer+8; echo(" "); echo($utstallare8); ?>
							</td>
							<td class="deltagare-col-avatar">
								<a target='_blank' href="http://twitter.com/squashee"><img src='https://api.twitter.com/1/users/profile_image?screen_name=squashee&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Januus'&last='Heeringson'&search='GO'">Jaanus Heeringson</a>
							</td>
							<td class="deltagare-col-company">
								Oderland
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/squashee" class="twitter-follow-button" data-show-count="false" data-size="large">squashee</a>
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare9=$stellan_nummer+9; echo(" "); echo($utstallare9); ?>
							</td>
							<td class="deltagare-col-avatar">
								<a target='_blank' href="http://twitter.com/jbrydolf"><img src='https://api.twitter.com/1/users/profile_image?screen_name=jbrydolf&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Jacob'&last='Brydolf'&search='GO'">Jacob Brydolf</a>
							</td>
							<td class="deltagare-col-company">
								Rabash
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/jbrydolf" class="twitter-follow-button" data-show-count="false" data-size="large">jbrydolf</a>
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare10=$stellan_nummer+10; echo(" "); echo($utstallare10); ?>
							</td>
							<td class="deltagare-col-avatar">
								<a target='_blank' href="http://twitter.com/p_jo"><img src='https://api.twitter.com/1/users/profile_image?screen_name=p_jo&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Petter'&last='Joelson'&search='GO'">Petter Joelson</a>
							</td>
							<td class="deltagare-col-company">
								Rabash
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/p_jo" class="twitter-follow-button" data-show-count="false" data-size="large">p_jo</a>
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare11=$stellan_nummer+11; echo(" "); echo($utstallare11); ?>
							</td>
							<td class="deltagare-col-avatar">
								<a target='_blank' href="http://twitter.com/buzzmore"><img src='https://api.twitter.com/1/users/profile_image?screen_name=buzzmore&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Jennie'&last='Zetterström'&search='GO'">Jennie Zetterström</a>
							</td>
							<td class="deltagare-col-company">
								Unionen
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/buzzmore" class="twitter-follow-button" data-show-count="false" data-size="large">buzzmore</a>
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare12=$stellan_nummer+12; echo(" "); echo($utstallare12); ?>
							</td>
							<td class="deltagare-col-avatar">
								<a target='_blank' href="http://twitter.com/christerben"><img src='https://api.twitter.com/1/users/profile_image?screen_name=christerben&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Christer'&last='Bengtsson'&search='GO'">Christer Bengtsson</a>
							</td>
							<td class="deltagare-col-company">
								Binero
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/christerben" class="twitter-follow-button" data-show-count="false" data-size="large">christerben</a>
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare13=$stellan_nummer+13; echo(" "); echo($utstallare13); ?>
							</td>
							<td class="deltagare-col-avatar">
								<a target='_blank' href="http://twitter.com/omniconnected"><img src='https://api.twitter.com/1/users/profile_image?screen_name=omniconnected&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Erik'&last='Arnberg'&search='GO'">Erik Arnberg</a>
							</td>
							<td class="deltagare-col-company">
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/omniconnected" class="twitter-follow-button" data-show-count="false" data-size="large">omniconnected</a>
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare14=$stellan_nummer+14; echo(" "); echo($utstallare14); ?>
							</td>
							<td class="deltagare-col-avatar">
								<a target='_blank' href="http://twitter.com/beyondsizes"><img src='https://api.twitter.com/1/users/profile_image?screen_name=beyondsizes&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Thina'&last='Grotmark'&search='GO'">Thina Grotmark</a>
							</td>
							<td class="deltagare-col-company">
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/beyondsizes" class="twitter-follow-button" data-show-count="false" data-size="large">beyondsizes</a>
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare15=$stellan_nummer+15; echo(" "); echo($utstallare15); ?>
							</td>
							<td class="deltagare-col-avatar">
								<a target='_blank' href="http://twitter.com/sciencekarin"><img src='https://api.twitter.com/1/users/profile_image?screen_name=sciencekarin&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Karin'&last='Lundberg'&search='GO'">Karin Lundberg</a>
							</td>
							<td class="deltagare-col-company">
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/sciencekarin" class="twitter-follow-button" data-show-count="false" data-size="large">sciencekarin</a>
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare16=$stellan_nummer+16; echo(" "); echo($utstallare16); ?>
							</td>
							<td class="deltagare-col-avatar">
								<a target='_blank' href="http://twitter.com/ChristianRiedl"><img src='https://api.twitter.com/1/users/profile_image?screen_name=ChristianRiedl&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Christian'&last='Riedl'&search='GO'">Christian Riedl</a>
							</td>
							<td class="deltagare-col-company">
								Lindholmen Science Park
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/sciencekarin" class="twitter-follow-button" data-show-count="false" data-size="large">sciencekarin</a>
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare17=$stellan_nummer+17; echo(" "); echo($utstallare17); ?>
							</td>
							<td class="deltagare-col-avatar">
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Thomas'&last='Hansson'&search='GO'">Thomas Hansson</a>
							</td>
							<td class="deltagare-col-company">
								Lindholmen Science Park
							</td>
							<td class="deltagare-col-twitter">
							</td>
						</tr>
									<tr>
							<td class="deltagare-col-number">
								<?php $utstallare18=$stellan_nummer+18; echo(" "); echo($utstallare18); ?>
							</td>
							<td class="deltagare-col-avatar">
								<a target='_blank' href="http://twitter.com/FredrikBerggren"><img src='https://api.twitter.com/1/users/profile_image?screen_name=FredrikBerggren&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Fredrik'&last='Berggren'&search='GO'">Fredrik Berggren</a>
							</td>
							<td class="deltagare-col-company">
								Paloma
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/FredrikBerggren" class="twitter-follow-button" data-show-count="false" data-size="large">FredrikBerggren</a>
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare19=$stellan_nummer+19; echo(" "); echo($utstallare19); ?>
							</td>
							<td class="deltagare-col-avatar">
								<a target='_blank' href="http://twitter.com/ordbajsarn"><img src='https://api.twitter.com/1/users/profile_image?screen_name=ordbajsarn&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Stefan'&last='Bergfeldt'&search='GO'">Stefan Bergfeldt</a>
							</td>
							<td class="deltagare-col-company">
								Paloma
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/ordbajsarn" class="twitter-follow-button" data-show-count="false" data-size="large">ordbajsarn</a>
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare20=$stellan_nummer+20; echo(" "); echo($utstallare20); ?>
							</td>
							<td class="deltagare-col-avatar">
								<a target='_blank' href="http://twitter.com/carl_bjorknas"><img src='https://api.twitter.com/1/users/profile_image?screen_name=carl_bjorknas&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Carl'&last='Björknäs'&search='GO'">Carl Björknäs</a>
							</td>
							<td class="deltagare-col-company">
								Paloma
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/carl_bjorknas" class="twitter-follow-button" data-show-count="false" data-size="large">carl_bjorknas</a>
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare21=$stellan_nummer+21; echo(" "); echo($utstallare21); ?>
							</td>
							<td class="deltagare-col-avatar">
								<a target='_blank' href="http://twitter.com/elkrullo"><img src='https://api.twitter.com/1/users/profile_image?screen_name=elkrullo&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Björn'&last='Pehrsson'&search='GO'">Björn Pehrsson</a>
							</td>
							<td class="deltagare-col-company">
								Paloma
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/elkrullo" class="twitter-follow-button" data-show-count="false" data-size="large">elkrullo</a>
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare22=$stellan_nummer+22; echo(" "); echo($utstallare22); ?>
							</td>
							<td class="deltagare-col-avatar">
								<a target='_blank' href="http://twitter.com/CarlSweden"><img src='https://api.twitter.com/1/users/profile_image?screen_name=CarlSweden&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Carl'&last='Christiansson'&search='GO'">Carl Christiansson</a>
							</td>
							<td class="deltagare-col-company">
								Wunderkraut
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/CarlSweden" class="twitter-follow-button" data-show-count="false" data-size="large">CarlSweden</a>
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare23=$stellan_nummer+23; echo(" "); echo($utstallare23); ?>
							</td>
							<td class="deltagare-col-avatar">
								<a target='_blank' href="http://twitter.com/jryden"><img src='https://api.twitter.com/1/users/profile_image?screen_name=jryden&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Jenny'&last='Rydén'&search='GO'">Jenny Rydén</a>
							</td>
							<td class="deltagare-col-company">
								Wunderkraut
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/jryden" class="twitter-follow-button" data-show-count="false" data-size="large">jryden</a>
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare24=$stellan_nummer+24; echo(" "); echo($utstallare24); ?>
							</td>
							<td class="deltagare-col-avatar">
								<a target='_blank' href="http://twitter.com/deepundercover"><img src='https://api.twitter.com/1/users/profile_image?screen_name=deepundercover&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Alexander'&last='Paunovic'&search='GO'">Alexander Paunovic</a>
							</td>
							<td class="deltagare-col-company">
								Wunderkraut
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/deepundercover" class="twitter-follow-button" data-show-count="false" data-size="large">deepundercover</a>
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare25=$stellan_nummer+25; echo(" "); echo($utstallare25); ?>
							</td>
							<td class="deltagare-col-avatar">
								<a target='_blank' href="http://twitter.com/mattiasjo"><img src='https://api.twitter.com/1/users/profile_image?screen_name=mattiasjo&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Mattias'&last='Johansson'&search='GO'">Mattias Johansson</a>
							</td>
							<td class="deltagare-col-company">
								Wunderkraut
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/mattiasjo" class="twitter-follow-button" data-show-count="false" data-size="large">mattiasjo</a>
							</td>
						</tr>
									<tr>
							<td class="deltagare-col-number">
								<?php $utstallare26=$stellan_nummer+26; echo(" "); echo($utstallare26); ?>
							</td>
							<td class="deltagare-col-avatar">
								<a target='_blank' href="http://twitter.com/acj_gbg"><img src='https://api.twitter.com/1/users/profile_image?screen_name=acj_gbg&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Ann-Christin'&last='Johansson'&search='GO'">Ann-Christin Johansson</a>
							</td>
							<td class="deltagare-col-company">
								Svenska Kyrkan
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/acj_gbg" class="twitter-follow-button" data-show-count="false" data-size="large">acj_gbg</a>
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare27=$stellan_nummer+27; echo(" "); echo($utstallare27); ?>
							</td>
							<td class="deltagare-col-avatar">
								<a target='_blank' href="http://twitter.com/jacobsunnliden"><img src='https://api.twitter.com/1/users/profile_image?screen_name=jacobsunnliden&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Jacbob'&last='Sunnliden'&search='GO'">Jacob Sunnliden</a>
							</td>
							<td class="deltagare-col-company">
								Svenska Kyrkan
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/jacobsunnliden" class="twitter-follow-button" data-show-count="false" data-size="large">jacobsunnliden</a>
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare28=$stellan_nummer+28; echo(" "); echo($utstallare28); ?>
							</td>
							<td class="deltagare-col-avatar">
								<a target='_blank' href="http://twitter.com/mattiash"><img src='https://api.twitter.com/1/users/profile_image?screen_name=mattiash&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Mattias'&last='Hallberg'&search='GO'">Mattias Hallberg</a>
							</td>
							<td class="deltagare-col-company">
								Svenska Kyrkan
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/mattiash" class="twitter-follow-button" data-show-count="false" data-size="large">mattiash</a>
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare29=$stellan_nummer+29; echo(" "); echo($utstallare29); ?>
							</td>
							<td class="deltagare-col-avatar">
								<a target='_blank' href="http://twitter.com/a_arcane"><img src='https://api.twitter.com/1/users/profile_image?screen_name=a_arcane&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Gustaf'&last='Armgarth'&search='GO'">Gustaf Armgarth</a>
							</td>
							<td class="deltagare-col-company">
								Svenska Kyrkan
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/a_arcane" class="twitter-follow-button" data-show-count="false" data-size="large">a_arcane</a>
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare30=$stellan_nummer+30; echo(" "); echo($utstallare30); ?>
							</td>
							<td class="deltagare-col-avatar">
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Sofia'&last='Lacik'&search='GO'">Sofia Lacik</a>
							</td>
							<td class="deltagare-col-company">
								Strängnäs Kommun
							</td>
							<td class="deltagare-col-twitter">
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare31=$stellan_nummer+31; echo(" "); echo($utstallare31); ?>
							</td>
							<td class="deltagare-col-avatar">
								<a target='_blank' href="http://twitter.com/reneegoth"><img src='https://api.twitter.com/1/users/profile_image?screen_name=reneegoth&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Renée'&last='Göthberg'&search='GO'">Renée Göthberg</a>
							</td>
							<td class="deltagare-col-company">
								Malmö Museer
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/reneegoth" class="twitter-follow-button" data-show-count="false" data-size="large">reneegoth</a>
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare32=$stellan_nummer+32; echo(" "); echo($utstallare32); ?>
							</td>
							<td class="deltagare-col-avatar">
								<a target='_blank' href="http://twitter.com/belola"><img src='https://api.twitter.com/1/users/profile_image?screen_name=belola&size=normal'></a>
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Sina'&last='Farhat'&search='GO'">Sina Farhat</a>
							</td>
							<td class="deltagare-col-company">
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/belola" class="twitter-follow-button" data-show-count="false" data-size="large">belola</a>
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare33=$stellan_nummer+33; echo(" "); echo($utstallare33); ?>
							</td>
							<td class="deltagare-col-avatar">
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Joakim'&last='Jarstorp'&search='GO'">Joakim Jarstorp</a>
							</td>
							<td class="deltagare-col-company">
								GleSys
							</td>
							<td class="deltagare-col-twitter">
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare34=$stellan_nummer+34; echo(" "); echo($utstallare34); ?>
							</td>
							<td class="deltagare-col-avatar">
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Emil'&last='Eriksson'&search='GO'">Emil Eriksson</a>
							</td>
							<td class="deltagare-col-company">
								GleSys
							</td>
							<td class="deltagare-col-twitter">
							</td>
						</tr>
						<tr>
							<td class="deltagare-col-number">
								<?php $utstallare35=$stellan_nummer+35; echo(" "); echo($utstallare35); ?>
							</td>
							<td class="deltagare-col-avatar">
							</td>
							<td class="deltagare-col-name">
								<a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Fredrik'&last='Bewick'&search='GO'">Fredrik Bewick</a>
							</td>
							<td class="deltagare-col-company">
								AppSpotr
							</td>
							<td class="deltagare-col-twitter">
							</td>
						</tr>
						<?php $t_number=$result+42; ?>
						<?php while ($t_number < 251) {
							print '<tr><td class="deltagare-col-number">' . $t_number . '</td>';
							print "<td class='deltagare-col-avatar'></td><td class='deltagare-col-name'>Oangivet</td><td class='deltagare-col-company'>Oangivet</td><td class='deltagare-col-twitter'></td></tr>";
							$t_number++;
						} ?>

					</tbody>
					<tfoot>
						<tr>
							<td colspan="2" class="deltagare-col-avatar" style="text-align: right;">
								<a target='_blank' href="http://twitter.com/joelborjesson"><img src='https://api.twitter.com/1/users/profile_image?screen_name=joelborjesson&size=normal' style="padding-right: 15px;"></a>
							</td>
							<td colspan="2">
								Deltagarlistan är programmerad av <a target="_blank" href="http://www.linkedin.com/pub/dir/?first='Joel'&last='Börjesson'&search='GO'"><strong>Joel Börjesson</strong></a>
							</td>
							<td class="deltagare-col-twitter">
								<a href="https://twitter.com/joelborjesson" class="twitter-follow-button" data-show-count="false" data-size="large">@joelborjesson</a>
							</td>
						</tr>
					</tfoot>
				</table>
			<?php endwhile; endif; ?>
		</div>
	</div>
</div>

<?php get_footer (); ?>