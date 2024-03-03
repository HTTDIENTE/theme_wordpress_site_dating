<?php

use Stripe\Exception\ApiErrorException;

class WLD_Stripe_Api_Customer {
	public static function init() {
		add_action(
			'wp_ajax_ajax_add_bank_card',
			array( static::class, 'attach_card' )
		);
		add_action(
			'wp_ajax_ajax_delete_bank_card',
			array( static::class, 'dettach_card' )
		);
	}

	public static function get_customer() {
		$get_customer = get_user_meta( get_current_user_id(), '_stripe_customer', true );

		if ( empty( $get_customer ) ) {
			$get_customer = self::customer_create();

			return ( is_array( $get_customer ) ) ? ( false ) : ( $get_customer );
		} else {
			return $get_customer;
		}
	}

	public static function customer_create() {
		$user = get_userdata( get_current_user_id() );
		try {
			$stripe = \Stripe\Customer::create( [
				'name' => $user->user_login
			] );
		} catch ( Exception $e ) {
			return array(
				'message' => $e->getMessage(),
				'success' => false,
			);
		}

		$stripe = json_decode( $stripe->getLastResponse()->body );
		update_user_meta( get_current_user_id(), '_stripe_customer', $stripe->id );

		return $stripe->id;
	}

	public static function attach_card() {
		check_ajax_referer( 'ajax-nonce', 'nonce' );

		$method   = $_POST['method'];
		$primary  = $_POST['primary'] ?? '';
		$customer = self::get_customer();

		if ( is_array( $customer ) ) {
			wp_send_json_error( $customer['message'] );
		}
		if ( empty( $method ) ) {
			wp_send_json_error( 'An error has occurred, please check your credit card details.' );
		}

		if ( ! is_user_logged_in() ) {
			wp_send_json_error( 'You are not allowed to use this form, please <a href="/account/login">login to your account</a>.' );
		}
		try {
			$stripe = new \Stripe\StripeClient(
				get_field( 'wld_stripe_api_secret_key', 'option' )
			);
			$stripe->paymentMethods->attach(
				$method,
				array(
					'customer' => $customer
				),
			);
		} catch ( Exception $e ) {
			wp_send_json_error( $e->getMessage() );
		}

		if ( 'true' === $primary ) {
			self::set_primary( $method );
		}

		wp_send_json_success();
	}

	public static function dettach_card() {
		check_ajax_referer( 'ajax-nonce', 'nonce' );

		$method   = $_POST['method'];
		$customer = self::get_customer();

		if ( is_array( $customer ) ) {
			wp_send_json_error( $customer['message'] );
		}
		if ( empty( $method ) ) {
			wp_send_json_error( 'An error has occurred, please check your credit card details.' );
		}

		if ( ! is_user_logged_in() ) {
			wp_send_json_error( 'You are not allowed to use this form, please <a href="/account/login">login to your account</a>.' );
		}

		try {
			$stripe = new \Stripe\StripeClient(
				get_field( 'wld_stripe_api_secret_key', 'option' )
			);
			$stripe->paymentMethods->detach(
				$method,
			);
		} catch ( Exception $e ) {
			wp_send_json_error( $e->getMessage() );
		}

		if ( $method === self::get_primary() ) {
			self::set_primary( '' );
		}
		wp_send_json_success();
	}

	public static function list_cards() {
		$customer = self::get_customer();

		if ( is_array( $customer ) ) {
			wp_send_json_error( $customer['message'] );
		}

		try {
			$list = \Stripe\Customer::allPaymentMethods(
				$customer,
				array(
					'type' => 'card'
				),
			);
		} catch ( Exception $e ) {
			return $e->getMessage();
		}

		$list = json_decode( $list->getLastResponse()->body );

		if ( empty( $list->data ) ) {
			return false;
		}

		$array_cards = array();
		foreach ( $list->data as $row ) {
			$array_cards[] = array(
				'payment_method' => $row->id,
				'last_number'    => $row->card->last4,
				'expired'        => $row->card->exp_year . '/' . $row->card->exp_month,
				'brand'          => $row->card->brand
			);
		}

		return $array_cards;
	}

	public static function set_primary( string $payment_method ) {
		return update_user_meta( get_current_user_id(), '_stripe_primary_card', $payment_method );
	}

	public static function get_primary() {
		return get_user_meta( get_current_user_id(), '_stripe_primary_card', true );
	}

	public static function get_card( string $payment_method ) {
		try {
			$card = \Stripe\PaymentMethod::retrieve(
				$payment_method
			);
		} catch ( Exception $e ) {
			return $e->getMessage();
		}

		return $card;
	}
}
