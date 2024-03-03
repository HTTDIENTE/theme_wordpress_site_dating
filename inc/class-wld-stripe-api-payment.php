<?php

use Stripe\Exception\ApiErrorException;

class WLD_Stripe_Api_Payment {
	public static function init() {
		add_action(
			'wp_ajax_ajax_payment',
			array( static::class, 'payment' )
		);
	}

	public static function payment() {
		check_ajax_referer( 'ajax-nonce', 'nonce' );

		if ( ! is_user_logged_in() ) {
			wp_send_json_error( 'You are not allowed to use this form, please <a href="/account/login">login to your account</a>.' );
		}

		$method      = $_POST['method'];
		$plan_amount = (float) $_POST['amount'];
		$payment     = '';
		$plan        = WLD_Stripe_Api::get_prices()[ $_POST['planType'] ];

		if ( empty( $method ) ) {
			wp_send_json_error( 'An error has occurred, please check your credit card details.' );
		}

		if ( empty( $plan_amount ) || $plan_amount < 0 ) {
			wp_send_json_error( 'The subscription price is invalid, contact technical support. ' );
		}

		try {
			$payment = \Stripe\PaymentIntent::create( [
				'amount'               => $plan['price'] * 100,
				// Stripe API accepts payments in cents, so the amount is multiplied by 100 to get the amount in cents.
				'currency'             => 'usd',
				'payment_method_types' => [ 'card' ],
				'payment_method'       => $method,
				'customer'             => WLD_Stripe_Api_Customer::get_customer(),
				'confirm'              => true,
				'description'          => 'Payment for the purchase of a Never Walk Alone subscription in the amount of: ' . $plan_amount . '$. Account ID: ' . get_current_user_id(),
			] );
		} catch ( Exception $e ) {
			wp_send_json_error( $e->getMessage() );
		}

		$payment = json_decode( $payment->getLastResponse()->body );
		if ( ! empty( $payment->last_payment_error ) ) {
			wp_send_json_error( $payment->last_payment_error->message );
		}

		self::update_table( $payment->id, $method, $payment->amount );

		$result = WLD_Stripe_Api_Subscription::create_subscription( $plan, $method );
		if ( is_array( $result ) ) {
			wp_send_json_error( $result['message'] );
		}

		WLD_Account::user_status( get_current_user_id(), 'premium' );
		wp_send_json_success( get_home_url() . '/confirm-payment' );
	}

	public static function list_prices() {
		$prices = null;

		try {
			$prices = \Stripe\Price::search(
				array(
					'query' => "active:'true'",
				),
			);
		} catch ( Exception $e ) {
			wp_send_json_error( $e->getMessage() );
		}

		return json_decode( $prices->getLastResponse()->body )->data;
	}

	public static function update_table( string $payment, string $method, float $price = null, string $subscription = null, string $subscription_info = null ) {
		global $wpdb;
		$wpdb->query(
			$wpdb->prepare(
				"
				INSERT INTO {$wpdb->prefix}stripe_payment (
				user_id,
				customer_id,
				payment_id,
				amount,
				payment_method,
				date_payment,
				type,
			 	subscription_info
				) VALUES (%d, %s, %s, %s, %s, %s, %s, %s)",
				get_current_user_id(),
				WLD_Stripe_Api_Customer::get_customer(),
				$payment,
				( $price / 100 ),
				$method,
				date( 'Y-m-d H:i:s' ),
				$subscription ?? 'payment',
				$subscription_info ?? 'not subscription'
			),
		);
	}

	public static function get_default_prices( $plan_type ) {
		return match ( $plan_type ) {
			'one' => '19.99',
			'two' => '24.99',
			'three' => '29.99',
			'four' => '49.99',
			default => 0,
		};
	}
}
