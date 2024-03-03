<?php

class WLD_Account_Activity {
	public static function init(): void {
		add_action( 'wp_ajax_ajax_block_user', array( static::class, 'block_user' ) );
		add_action( 'wp_ajax_ajax_unblock_user', array( static::class, 'unblock_user' ) );
		add_action( 'wp_ajax_ajax_liked_user', array( static::class, 'liked_user' ) );
		add_action( 'wp_ajax_ajax_favorite_user', array( static::class, 'favorite_user' ) );
		add_action( 'wp_ajax_ajax_delete_match_result', array( static::class, 'delete_match_result' ) );
		add_action( 'wp_ajax_ajax_report_abuse', array( static::class, 'report_abuse' ) );
	}

	public static function report_abuse(): void {
		check_ajax_referer( 'ajax-nonce', 'nonce' );

		$user_id = (int) $_POST['userId'];
		$reason  = (string) $_POST['value'];

		$template = WLD_Other::get_template_mail(
			'report-abuse',
			array(
				'user_id'          => $user_id,
				'declared_user_id' => get_current_user_id(),
				'content'          => $reason,
			),
		);

		WLD_Mail::mail(
			get_option( 'admin_email' ),
			'Report abuse',
			$template,
		);
		wp_send_json_success();
	}

	public static function delete_match_result(): void {
		check_ajax_referer( 'ajax-nonce', 'nonce' );

		$profile_id = (int) $_POST['userId'];

		self::add_activity(
			'delete-match',
			$profile_id
		);
		wp_send_json_success();
	}

	protected static function add_activity( string $type = '', int $item_id = 0, string $content = '' ) {
		global $wpdb;
		if ( 0 === $item_id ) {
			return false;
		}

		return $wpdb->query(
			$wpdb->prepare(
				"INSERT INTO {$wpdb->prefix}bp_activity
    				(`user_id`, `component`, `type`, `action`, `content`, `primary_link`, `item_id`, `secondary_item_id`, `date_recorded`)
					VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s)",
				get_current_user_id(),
				'members',
				$type,
				'',
				$content,
				'',
				$item_id,
				'',
				date( 'Y-m-d H:i:s' ) // phpcs:ignore
			)
		);
	}

	protected static function remove_activity( string $type = '', int $item_id = 0 ) {
		global $wpdb;

		return $wpdb->query(
			$wpdb->prepare(
				"DELETE FROM {$wpdb->prefix}bp_activity WHERE user_id = %d AND item_id = %d AND type = %s",
				get_current_user_id(),
				$item_id,
				$type
			)
		);
	}

	public static function get_activity( $type = '', $item_id = 0, $limit = '' ): array {
		global $wpdb;
		if ( 'last_activity' === $type ) {
			return $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM {$wpdb->prefix}bp_activity WHERE user_id = %d AND type = %s",
					$item_id,
					$type,
				)
			);
		}
		if ( empty( $item_id ) ) {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM {$wpdb->prefix}bp_activity WHERE user_id = %d AND type = %s " . $limit,
					get_current_user_id(),
					$type,
				)
			);
			foreach ( $result as $key => $row ) {
				if ( empty( get_userdata( $row->item_id ) ) ) {
					unset( $result[ $key ] );
				}
			}

			return $result;
		}
		if ( get_current_user_id() === $item_id ) {
			return $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM {$wpdb->prefix}bp_activity WHERE item_id = %d AND type = %s " . $limit,
					$item_id,
					$type,
				)
			);
		}

		return $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM {$wpdb->prefix}bp_activity WHERE user_id = %d AND item_id = %d AND type = %s " . $limit,
				get_current_user_id(),
				$item_id,
				$type,
			)
		);
	}

	public static function account_viewed( int $profile_id ): bool {
		if ( ! empty( self::get_activity( 'viewing', $profile_id ) ) ) {
			return false;
		}
		self::add_activity(
			'viewing',
			$profile_id
		);

		return true;
	}

	public static function block_user(): void {
		check_ajax_referer( 'ajax-nonce', 'nonce' );

		$item_id = (int) $_POST['userId'];

		if ( ! empty( self::get_activity( 'blocked', $item_id ) ) ) {
			wp_send_json_error();
		}

		self::add_activity(
			'blocked',
			$item_id
		);
		wp_send_json_success();

	}

	public static function unblock_user(): void {
		check_ajax_referer( 'ajax-nonce', 'nonce' );

		$item_id = (int) $_POST['userId'];

		if ( empty( self::get_activity( 'blocked', $item_id ) ) ) {
			wp_send_json_error();
		}

		self::remove_activity(
			'blocked',
			$item_id
		);
		wp_send_json_success();
	}

	public static function liked_user(): void {
		check_ajax_referer( 'ajax-nonce', 'nonce' );

		$item_id = (int) $_POST['userId'];

		if ( ! empty( self::get_activity( 'liked', $item_id ) ) ) {
			self::remove_liked( $item_id );
			wp_send_json_error();
		}
		if ( 'true' === WLD_Account::get_userdata_custom( $item_id )->likes_and_views ) {
			$template = WLD_Other::get_template_mail(
				'liked-profile',
				array(
					'user_liked' => get_current_user_id(),
				),
			);

			WLD_Mail::mail(
				get_userdata( $item_id )->user_email,
				'Someone liked your profile',
				$template
			);
		}
		self::add_activity(
			'liked',
			$item_id
		);
		wp_send_json_success();
	}

	public static function remove_liked( $item_id = 0 ): bool {
		self::remove_activity(
			'liked',
			$item_id
		);

		return true;
	}

	public static function favorite_user(): void {
		check_ajax_referer( 'ajax-nonce', 'nonce' );

		$item_id = (int) $_POST['userId'];

		if ( ! empty( self::get_activity( 'favorite', $item_id ) ) ) {
			self::remove_favorite( $item_id );
			wp_send_json_error();
		}

		self::add_activity(
			'favorite',
			$item_id
		);
		wp_send_json_success();
	}

	public static function remove_favorite( $item_id = 0 ): bool {
		self::remove_activity(
			'favorite',
			$item_id
		);

		return true;
	}

}
