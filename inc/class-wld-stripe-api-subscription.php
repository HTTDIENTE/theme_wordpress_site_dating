<?php

use Stripe\Exception\ApiErrorException;

class WLD_Stripe_Api_Subscription {
	public static function init() {
		add_action(
			'wp_ajax_ajax_account_cancel_subscription',
			array( static::class, 'cancel_subscription' )
		);
		add_action(
			'wp_ajax_ajax_update_primary_card',
			array( static::class, 'update_subscription' )
		);
	}

	public static function cancel_subscription( $subscription_id = 0, $webhook = false ) {
		if ( wp_doing_ajax() ) {
			check_ajax_referer( 'ajax-nonce', 'nonce' );
		}

		$subscription_id = ( isset( $_POST['subscription'] ) ) ? ( $_POST['subscription'] ) : ( $subscription_id );

		if ( false === $webhook && ! empty( $subscription_id ) && 'dummy_subscription' !== $subscription_id ) {
			try {
				$stripe = new \Stripe\StripeClient(
					get_field( 'wld_stripe_api_secret_key', 'option' )
				);
				$stripe->subscriptions->cancel(
					$subscription_id
				);
			} catch ( Exception $e ) {
				wp_send_json_error(
					array(
						'message' => $e->getMessage(),
						'success' => false,
					)
				);
			}
		}

		$settings = array(
			'_hide_online_status'          => false,
			'_hide_profile_browse_matches' => false,
			'_browse_anonymously'          => false,
		);
		foreach ( $settings as $field => $value ) {
			update_user_meta( get_current_user_id(), $field, $value );
		}
		WLD_Account::user_status( get_current_user_id(), 'free' );
		update_user_meta( get_current_user_id(), 'premium_subscription', '' );

		global $wpdb;

		$query = $wpdb->get_results( "SELECT * FROM `{$wpdb->prefix}stripe_payment` WHERE payment_id = '{$subscription_id}'" );
		$wpdb->query( "UPDATE `{$wpdb->prefix}stripe_payment` SET type = 'canceled_subscription' WHERE id = '{$query[0]->id}'" );
	}

	public static function get_product() {
		$product = get_option( '_stripe_product' );

		if ( empty( $product ) ) {
			try {
				$product = \Stripe\Product::create( [
					'name' => 'Premium Status',
				] );

				$product = json_decode( $product->getLastResponse()->body );
				$product = $product->id;

				add_option( '_stripe_product', $product );
			} catch ( Exception $e ) {
				return array(
					'message' => $e->getMessage(),
					'success' => false,
				);
			}
		}

		return $product;
	}

	public static function get_plan( $plan ) {
		$list_prices = WLD_Stripe_Api_Payment::list_prices();
		$plan_exist  = false;
		$product     = self::get_product();

		if ( is_array( $product ) ) {
			return $product;
		}

		if ( ! empty ( $list_prices ) ) {
			foreach ( $list_prices as $row ) {
				if ( (int) $plan['interval'] === $row->recurring->interval_count && (float) $plan['price'] === ( $row->unit_amount / 100 ) ) {
					$plan_exist = $row->id;
				}
			}
		}

		if ( ! $plan_exist ) {
			try {
				$plan = \Stripe\Price::create( [
					'unit_amount' => $plan['price'] * 100,
					// Stripe API accepts payments in cents, so the amount is multiplied by 100 to get the amount in cents.
					'currency'    => 'usd',
					'recurring'   => array(
						'interval'       => 'month',
						'interval_count' => $plan['interval']
					),
					'product'     => $product,
				] );
				$plan = json_decode( $plan->getLastResponse()->body );
				$plan_exist = $plan->id;
			} catch ( Exception $e ) {
				return array(
					'message' => $e->getMessage(),
					'success' => false,
				);
			}
		}

		return $plan_exist;
	}

	public static function create_subscription( $plan, $method = '' ) {
		$customer = WLD_Stripe_Api_Customer::get_customer();
		$get_plan = self::get_plan( $plan );

		if ( is_array( $get_plan ) ) {
			return $get_plan;
		}

		if ( is_array( $customer ) ) {
			return $customer;
		}

		try {
			$subscription = \Stripe\Subscription::create( [
				'customer'               => $customer,
				'items'                  => array(
					array(
						'price' => $get_plan,
					),
				),
				'default_payment_method' => $method,
				'trial_period_days'      => 30
			] );
		} catch ( Exception $e ) {
			return array(
				'message' => $e->getMessage(),
				'success' => false,
			);
		}

		if ( ! empty( get_user_meta( get_current_user_id(), 'premium_subscription', true ) ) ) {
			$current_subscription = self::get_subscription( true );
			self::cancel_subscription( $current_subscription );
		}

		$subscription = json_decode( $subscription->getLastResponse()->body );
		update_user_meta( get_current_user_id(), 'premium_subscription', $subscription->id );

		$subscription_info = array(
			'subscription_start' => date( 'Y-m-d H:i:s', $subscription->current_period_start ),
			'subscription_end'   => date( 'Y-m-d H:i:s', $subscription->current_period_end ),
			'interval'           => $plan['interval'],
			'plan'               => $subscription->plan->id,
			'product'            => $subscription->plan->id,
			'currency'           => $subscription->currency,
		);

		WLD_Stripe_Api_Payment::update_table( $subscription->id, $method, $plan['price'] * 100, 'subscription', serialize( $subscription_info ) );

		return $subscription;
	}

	public static function get_subscription( $return_id = false ) {
		$subscription = get_user_meta( get_current_user_id(), 'premium_subscription', true ) ?? '';

		if ( empty( $subscription ) ) {
			return false;
		}
		if ( true === $return_id ) {
			return $subscription;
		}
		if ( 'dummy_subscription' === $subscription ) {
			return 'dummy_subscription';
		}

		global $wpdb;
		$query                       = $wpdb->get_results( "SELECT * FROM `{$wpdb->prefix}stripe_payment` WHERE payment_id = '{$subscription}'" );
		$query[0]->subscription_info = unserialize( $query[0]->subscription_info );
		$query[0]->subscription_info = $query[0]->subscription_info['interval'];

		return array(
			'price'    => $query[0]->amount,
			'interval' => $query[0]->subscription_info,
		);
	}

	public static function update_subscription() {
		check_ajax_referer( 'ajax-nonce', 'nonce' );

		$method = $_POST['method'];
		if ( 'dummy_subscription' === self::get_subscription( true ) || empty( self::get_subscription( true ) ) ) {
			WLD_Stripe_Api_Customer::set_primary( $method );
			wp_send_json_success();
		}
		try {
			\Stripe\Subscription::update(
				self::get_subscription( true ),
				array(
					'default_payment_method' => $method,
				)
			);
			WLD_Stripe_Api_Customer::set_primary( $method );
		} catch ( Exception $e ) {
			wp_send_json_error(
				array(
					'message' => $e->getMessage(),
					'success' => false,
				)
			);
		}

		wp_send_json_success();
	}
}
