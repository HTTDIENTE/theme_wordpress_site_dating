<?php

class WLD_Other {
	public static function init(): void {
		add_action( 'wp_ajax_ajax_search_interests', array( static::class, 'search_interests' ) );
		add_action( 'edit_user_profile', array( static::class, 'additional_user_information' ) );
		add_action( 'edit_user_profile_update', array( static::class, 'additional_user_information_save' ) );
		add_action( 'wp_ajax_ajax_search_interests', array( static::class, 'search_interests' ) );
		//add_action( 'init', array( static::class, 'check_admin' ) );
	}

	public static function check_admin(): void {
		if ( is_admin() && ! current_user_can( 'administrator' ) ) {
			exit( wp_safe_redirect( get_home_url() . '/account/' ) );
		}
	}

	public static function get_template_mail( $template, $arg = array(), $name = null ) {
		ob_start();
		get_template_part( 'templates/mail-template/header', $name, $arg );
		get_template_part( 'templates/mail-template/' . $template, $name, $arg );
		get_template_part( 'templates/mail-template/footer', $name, $arg );

		return ob_get_clean();
	}

	public static function get_time_ago( $date ): string {
		return human_time_diff( strtotime( $date ), current_time( 'timestamp' ) ) . ' ago';
	}

	public static function get_interests( $type ) {
		$result = null;
		while ( wld_loop( 'wld_interests_array' ) ) {
			$result = explode( ', ', wld_get( $type ) );
		}
		array_walk(
			$result,
			static function ( &$value ) {
				$value = strtolower( $value );
			}
		);

		return $result;
	}

	public static function search_interests(): void {
		check_ajax_referer( 'ajax-nonce', 'nonce' );

		$get_field       = include 'interests-array.php';
		$array_interests = array();
		$search          = strtolower( $_POST['value'] ?? '' );

		array_walk(
			$get_field,
			static function ( $item ) use ( $search, &$array_interests ) {
				if ( stripos( $item, $search ) !== false ) {
					$array_interests[] = $item;
				}
			}
		);

		if ( [] === $array_interests ) {
			wp_send_json_error( 'Nothing found. Please recheck the spelling.' );
		}
		wp_send_json_success( $array_interests );
	}

	public static function additional_user_information( $user ): void {
		$subscription = ( empty( get_the_author_meta( 'premium_subscription', $user->ID ) ) ) ? ( 'No' ) : ( 'Yes' );
		echo '
		<h3>Additional Information</h3>
		<table class="form-table">
			<tr>
				<label for="subscription">Premium Subscription</label>
				<ul>
					<li><label><input value="dummy_subscription" name="subscription"' . checked( $subscription, 'Yes',
				false ) . ' type="radio" /> Yes</label></li>
					<li><label><input value="" name="subscription"' . checked( $subscription, 'No', false ) . ' type="radio" /> No</label></li>
				</ul>
			</tr>
		</table>';
	}

	public static function additional_user_information_save( $user_id ): bool {
		$subscription = $_POST['subscription'];
		$current_subs = WLD_Stripe_Api_Subscription::get_subscription( true );
		if ( 'dummy_subscription' !== $current_subs && ! empty( $current_subs ) ) {
			WLD_Stripe_Api_Subscription::cancel_subscription( $current_subs );
		} elseif ( 'dummy_subscription' === $current_subs ) {
			WLD_Account::user_status( $user_id, 'free' );
			update_user_meta( $user_id, 'premium_subscription', '' );

			return false;
		}
		WLD_Account::user_status( $user_id, 'free' );
		update_user_meta( $user_id, 'premium_subscription', $subscription );

		return true;
	}
}
