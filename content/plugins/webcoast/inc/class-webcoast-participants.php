<?php
/**
 * WebCoast Participants Class
 *
 * Handles the call to Eventbrite and gets relevant
 * participant information.
 */
class WebCoast_Participants {

	public $app_key;
	public $user_key;
	public $event_id;
	public $total_tickets;
	public $tickets_sold;

	public function __construct() {

		$this->app_key  = WC_EVENTBRITE_APP_KEY;
		$this->user_key = WC_EVENTBRITE_USER_KEY;

		// This should eventually be turned into an option
		// so that it is easily updated every year.
		$this->event_id = '14091934355';

		// Total Amount of Tickets
		// Should also be turned into an option
		$this->total_tickets = 250;

	}

	public function get_attendees() {

		$transient_name = 'wc_participants';
		$data_link = 'https://www.eventbrite.com/json/event_list_attendees?app_key=' . $this->app_key . '&user_key=' . $this->user_key . '&id=' . $this->event_id;

		// Get the transient
		// $data = get_transient( $transient_name );

		/*

		// If the transient doesn't exist, set it
		if ( false === $data ) {

			// Get the data from Eventbrite
			$json = wp_remote_get( $data_link );

			// Create the query
			$data = json_decode( $json['attendees'], true );

			// Save the query to a transient
			set_transient( $transient_name, $data, HOUR_IN_SECONDS );

		}*/

		// Get the data from Eventbrite
		$response = wp_remote_get( $data_link );

		try {
			$data = json_decode( $response['body'] );

			$attendees = $data->attendees;

		} catch (Exception $e) {
			$data = null;
		}

		// Count the attendees and set the tickets sold counter
		$this->tickets_sold = count( $attendees );

		return $attendees;

	}

	public function twitter_connection() {

		// Include Twitter OAuth Library
		require_once( WC_PLUGIN_DIR . '/inc/twitteroauth/twitteroauth/twitteroauth.php' );

		// Configuration for Twitter
		$consumerkey       = WC_TWITTER_CONSUMER_KEY;
		$consumersecret    = WC_TWITTER_CONSUMER_SECRET;
		$accesstoken       = WC_TWITTER_ACCESS_TOKEN;
		$accesstokensecret = WC_TWITTER_ACCESS_TOKEN_SECRET;

		// Create the Twitter Connection
	   $connection = new TwitterOAuth( $consumerkey, $consumersecret, $accesstoken, $accesstokensecret );

		return $connection;

	}

	public function get_twitter_data( $twitter_handle ) {

		// Cache expiration time in seconds (60*60=1 hour)
		$cache_expiration = 60 * 60;

		// Data storage file
		$twitter_storage_file_path = WC_PLUGIN_DIR . 'data/twitter/' . $twitter_handle . '.json';

		if ( file_exists( $twitter_storage_file_path ) ) {
			$twitter_data = unserialize( file_get_contents( $twitter_storage_file_path ) );
			if ( $twitter_data['timestamp'] > time() - $cache_expiration ) {
				$twitter_result = $twitter_data['twitter_result'];
			}
		}

		if ( ! file_exists( $twitter_storage_file_path ) || $twitter_data['timestamp'] < time() - $cache_expiration ) {

			// Connect to the API
			$twitter_result = $this->twitter_connection()->get( 'https://api.twitter.com/1.1/users/show.json?screen_name=' . $twitter_handle );

			// Load the twitter data and current time for caching
			$twitter_data = array(
				'twitter_result' => $twitter_result,
				'timestamp'      => time(),
			);

			file_put_contents( $twitter_storage_file_path, serialize( $twitter_data ) );

		}

		$json_data = json_encode( $twitter_result );

		// Decode the data from JSON
		$data = json_decode( $json_data, true );

		// Return the data
		return $data;

	}

	public function get_twitter_avatar_url( $twitter_handle ) {

		$data = $this->get_twitter_data( $twitter_handle );

		$avatar = $data['profile_image_url'];

		if ( $avatar ) {
			return $avatar;
		} else {
			$default_image = WC_PLUGIN_URL . '/assets/images/egg.png';

			return $default_image;
		}

	}

}
$GLOBALS['webcoast_participants'] = new WebCoast_Participants();