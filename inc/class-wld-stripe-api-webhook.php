<?php

use Stripe\Exception\ApiErrorException;

class WLD_Stripe_Api_Webhook {
	public static function init() {
		add_action(
			'rest_api_init',
			function () {
				register_rest_route(
					'theme/v1',
					'/subscriptionCancel',
					[
						'methods'  => 'POST',
						'callback' => array(
							'WLD_Stripe_Api_Webhook',
							'cancel_subscription',
						),
					]
				);
			}
		);
	}

	public static function cancel_subscription( WP_REST_Request $request ): bool {
		WLD_Stripe_Api_Subscription::cancel_subscription( $request['subscription'], true );

		return true;
	}
}
