<?php
/**
 * WebCoast Shortcodes Class
 *
 * Creates any shortcodes that can be used in pages.
 */
class WebCoast_Shortcodes {

	public function __construct() {

		add_shortcode( 'webcoast_participants_list', array( $this, 'participants_list' ) );

	}

	public function participants_list() {

		global $webcoast_participants;

		ob_start();

		$attendees = $webcoast_participants->get_attendees();

		if ( $attendees ) : ?>

		<ul class="attendee-list">

			<?php foreach ( $attendees as $attendee ) :

				/**
				 * Set up the attendee info in easy to use variables
				 */
				$first_name = $attendee->attendee->first_name;
				$last_name = $attendee->attendee->last_name;
				$twitter = str_replace( '@', '', $attendee->attendee->answers[0]->answer->answer_text );
				$company = $attendee->attendee->company;
				$website = str_replace( 'http://', '', $attendee->attendee->website );
			?>

				<li class="row attendee-list-item">
					<ul>
						<li class="small-6 medium-4 large-2 columns aligncenter">
							<img src="<?php echo $webcoast_participants->get_twitter_avatar_url( $twitter ); ?>" class="attendee-list-avatar" alt="@<?php echo $twitter; ?>">
						</li>
						<li class="small-18 medium-7 large-9 columns">
							<div class="attendee-list-data">
								<?php echo $first_name . ' ' . $last_name; ?>
								<span class="show-for-small"><?php echo $company; ?></span>
							</div>
						</li>
						<li class="hide-for-small medium-8 large-9 columns">
							<span class="attendee-list-data"><?php echo $company; ?></span>
						</li>
						<li class="small-24 medium-5 large-4 columns attendee-list-item-social aligncenter">
							<?php if ( $twitter ) : ?>
								<a class="twitter-icon-link" href="https://twitter.com/<?php echo $twitter; ?>"><i class="icon-twitter-sign icon-2x"></i></a>
							<?php endif ;?>

							<?php /* <a class="linkedin-icon-link" href="http://www.linkedin.com/pub/dir/?first='<?php echo $first_name; ?>'&last='<?php echo $last_name; ?>'&search='GO'"><i class="icon-linkedin-sign icon-2x"></i></a> */ ?>

							<?php if ( $website ) : ?>
								<a href="http://<?php echo $website; ?>"><i class="icon-link icon-2x"></i></a>
							<?php endif; ?>
						</li>
					</ul>
				</li>

			<?php endforeach; ?>

		</ul>

		<?php endif;

		$output = ob_get_clean();

		return $output;

	}

}
new WebCoast_Shortcodes();