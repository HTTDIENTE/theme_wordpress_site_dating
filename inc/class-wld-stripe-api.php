<?php

class WLD_Stripe_Api {
	private static string $service_sid = 'VA8c3803858e817ffd02ba81d6cc53ab68';

	public static function init() {
		global $wpdb;

		$table_sql = 'CREATE TABLE IF NOT EXISTS `' .$wpdb->prefix . 'stripe_payment` (
			  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
			  `user_id` int NOT NULL,
			  `customer_id` text NOT NULL,
			  `payment_id` text NOT NULL,
			  `amount` float NOT NULL,
			  `payment_method` text NOT NULL,
			  `date_payment` text NOT NULL,
			  `type` text NOT NULL,
			  `subscription_info` text NOT NULL
		)';
		$wpdb->query($table_sql);
/*
		add_action(
			'admin_menu',
			static function() {
				add_menu_page(
					'Payments Logs',
					'Payments Logs',
					'manage_options',
					'payments_logs',
					array( static::class, 'payments_logs' ),
					'dashicons-money-alt',
					6,
				);
			}
		);*/
		add_action(
			'wp_enqueue_scripts',
			static function () {
				global $post;
				if ( 'upgrade-account' === $post->post_name || 'checkout' === $post->post_name || 'edit-profile' === $post->post_name ) {
					wp_enqueue_script('stripe-js-sdk', 'https://js.stripe.com/v3/');
				}
			}, -1
		);

		require_once 'stripe-sdk/vendor/autoload.php';
		\Stripe\Stripe::setApiKey( get_field( 'wld_stripe_api_secret_key', 'option' ) );

	}

	public static function get_transactions() {
		global $wpdb;
		$result          = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}stripe_payment" );
		$formatted_array = array();

		foreach ( $result as $row ) {
			if ( WLD_Stripe_Api_Customer::get_customer() !== $row->customer_id && get_current_user_id() !== $row->user_id ) {
				continue;
			}
			if ( 'payment' !== $row->type ) {
				continue;
			}

			$formatted_array[] = array(
				'id_order'     => $row->id,
				'amount'       => $row->amount,
				'date'         => $row->date_payment,
				'status'       => 'Payment',
			);
		}
		return $formatted_array;
	}

	public static function payments_logs() {
		return get_template_part( 'templates/flexible-content/dashboard-payments-logs' );
	}

	/**
	 * @throws \Stripe\Exception\ApiErrorException
	 */
	public static function domain_apple_pay(): bool {
		$stripe = \Stripe\ApplePayDomain::create(
			array(
				'domain_name' => get_home_url(),
			)
		);

		return true;
	}

	public static function get_prices() {
		$prices = get_field( 'wld_prices_subscriptions', 'option' );

		if ( empty( $prices ) ) {
			return self::default_prices();
		}

		return $prices;
	}

	public static function default_prices() : array {
		return array(
			array(
				'price'    => 19.99,
				'interval' => 12,
			),
			array(
				'price'    => 24.99,
				'interval' => 6,
			),
			array(
				'price'    => 29.99,
				'interval' => 3,
			),
			array(
				'price'    => 49.99,
				'interval' => 1,
			),
		);
	}
}
