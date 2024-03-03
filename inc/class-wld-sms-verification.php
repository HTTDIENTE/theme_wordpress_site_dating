<?php

use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;

require_once __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';

class WLD_Sms_Verification {
	private static string $service_sid = 'VA8c3803858e817ffd02ba81d6cc53ab68';

	public static function init(): void {
		add_action(
			'wp_ajax_send_sms',
			array( static::class, 'send_sms_code' )
		);
		add_action(
			'wp_ajax_verification_sms',
			array( static::class, 'verify_sms_code' )
		);
	}

	public static function send_sms_code(): void {
		check_ajax_referer( 'ajax-nonce', 'nonce' );
		$client_phone = $_POST['phone'] ?? '';

		if ( '' === $client_phone ) {
			wp_send_json_error( esc_html__( 'Please enter the correct phone number', 'parent-theme' ) );
		}

		if ( '+' === $client_phone ) {
			wp_send_json_error( esc_html__( 'Please enter the correct phone number', 'parent-theme' ) );
		}

		try {
			$verify = static::client()
				->verify
				->v2
				->services( get_field( 'wld_api_twilio_service_sid', 'options' ) )
				->verifications
				->create( $client_phone, 'sms' );

			wp_send_json_success( $verify );
		} catch ( TwilioException $e ) {
			if ( 60203 === $e->getCode() || 60202 === $e->getCode() ) {
				wp_send_json_error( esc_html__( 'You have used the maximum number of attempts, wait 10 minutes and try again',
					'parent-theme' ) );
			} else {
				wp_send_json_error( esc_html__( 'Please enter the correct phone number', 'parent-theme' ) );
			}
		}
	}

	public static function verify_sms_code(): void {
		check_ajax_referer( 'ajax-nonce', 'nonce' );

		$client_phone = $_POST['phone'] ?? '';
		$code         = $_POST['check-code'] ?? '';
		if ( 7 !== strlen( $code ) ) {
			wp_send_json_error( esc_html__( 'Incorrect code length.', 'parent-theme' ) );
		}

		try {
			$verification_check = static::client()
				->verify
				->v2
				->services( get_field( 'wld_api_twilio_service_sid', 'options' ) )
				->verificationChecks
				->create(
					array(
						'to'   => $client_phone,
						'code' => $code,
					)
				);

			if ( 'approved' === $verification_check->status ) {
				update_user_meta( get_current_user_id(), '_verified_user', 'verified' );
				wp_send_json_success( $verification_check->status );
			} else {
				wp_send_json_error( esc_html__( 'The code is wrong. Try again.', 'parent-theme' ) );
			}
		} catch ( TwilioException $e ) {
			if ( 60203 === $e->getCode() || 60202 === $e->getCode() ) {
				wp_send_json_error( esc_html__( 'You have used the maximum number of attempts, wait 10 minutes and try again',
					'parent-theme' ) );
			}
			if ( 20404 === $e->getCode() ) {
				wp_send_json_error( esc_html__( 'The code has expired. Press "Re-send code" to send a new code.',
					'parent-theme' ) );
			}
		}
	}

	protected static function client(): Client {
		$client = null;
		try {
			$client = new Client( get_field( 'wld_api_twilio_account_sid', 'options' ),
				get_field( 'wld_api_twilio_auth_token', 'options' ) );
		} catch ( ConfigurationException $e ) {
			wp_send_json_error( $e->getMessage() );
		}

		return $client;
	}
}
