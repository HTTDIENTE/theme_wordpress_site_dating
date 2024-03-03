<?php

class WLD_Account_Matches {
	public static function init(): void {
		add_action( 'wp_ajax_ajax_clear_all_filter_matches', array( static::class, 'clear_all_filter_matches' ) );
		add_action( 'wp_ajax_ajax_search_matches', array( static::class, 'search_matches' ) );
		add_action( 'wp_ajax_ajax_get_best_match', array( static::class, 'get_best_match' ) );
	}

	protected static function get_account_matches_fields( $field = '', $user_id = 0, $list = false ) {
		if ( true === $list ) {
			return include 'matches-meta-fields.php';
		}

		global $wpdb;
		$result = $wpdb->get_row(
			$wpdb->prepare(
				"SELECT * FROM $wpdb->usermeta WHERE meta_key = %s AND user_id = %d",
				$field,
				$user_id,
			),
		);
		if ( empty( $result ) ) {
			return false;
		}

		return $result;
	}

	public static function get_percent_matches( $user_id = 0, $item_id = 0 ): float {
		if ( WLD_Account::get_userdata_custom( $user_id )->gender === WLD_Account::get_userdata_custom( $item_id )->gender ) {
			return 0.0;
		}
		$get_meta_fields = self::get_account_matches_fields( '', 0, true );
		$item_matches    = array();
		$user_matches    = array();

		foreach ( $get_meta_fields as $field ) {
			$meta_field_user = self::get_account_matches_fields( $field, $user_id );
			$meta_field_item = self::get_account_matches_fields( $field, $item_id );
			if ( ! isset( $meta_field_user->meta_value, $meta_field_item->meta_value ) ) {
				continue;
			}
			$item_matches[ $field ] = $meta_field_item->meta_value;
			$user_matches[ $field ] = $meta_field_user->meta_value;
		}

		if ( empty( $item_matches ) || empty( $user_matches ) ) {
			return 0;
		}
		$matches       = array_intersect( $item_matches, $user_matches );
		$count_matches = count( $matches );
		$count_fields  = count( $get_meta_fields );

		return round( ( $count_matches / $count_fields ) * 100 );
	}

	public static function get_best_match(): void {
		check_ajax_referer( 'ajax-nonce', 'nonce' );

		$sql = array(
			'meta_query' => array(
				'relation' => 'AND',
				array(
					array(
						'key'     => '_avatar_user',
						'value'   => '',
						'compare' => '!=',
					),
					array(
						'key'     => '_gender',
						'value'   => WLD_Account::get_userdata_custom( get_current_user_id() )->gender,
						'compare' => '!=',
					),
					array(
						'key'     => '_gender',
						'value'   => '',
						'compare' => '!=',
					),
				),
			),
		);
		add_filter( 'get_meta_sql', 'wld_replace_meta_where' );

		$query = get_users(
			$sql
		);

		remove_filter( 'get_meta_sql', 'wld_replace_meta_where' );

		$location = WLD_Account::get_userdata_custom( get_current_user_id() )->distance;
		$result   = array(
			'currentUser' => array(
				'location'  => ( isset( $location['location'] ) ) ? ( $location['location'] ) : ( '1' ),
				'locationX' => ( isset( $location['x'] ) ) ? ( $location['x'] ) : ( '' ),
				'locationY' => ( isset( $location['y'] ) ) ? ( $location['y'] ) : ( '' ),
				'radius'    => ( isset( $location['distance_mi'] ) ) ? ( $location['distance_mi'] ) : ( '' ),
			),
		);

		if ( empty( $query ) ) {
			wp_send_json_error();
		}
		$users = array();
		foreach ( $query as $user ) {
			if ( ! empty( WLD_Account_Activity::get_activity( 'delete-match', $user->ID ) ) ) {
				continue;
			}
			if ( 'true' === WLD_Account::get_userdata_custom( $user->ID )->hide_profile_browse_matches ) {
				continue;
			}
			$users[ $user->ID ] = self::get_percent_matches( get_current_user_id(), $user->ID );
		}

		$user = array_keys( $users, max( $users ) );
		$user = $user[0];

		if ( empty( $user ) ) {
			wp_send_json_error();
		}
		if ( ! empty( WLD_Account_Activity::get_activity( 'blocked', $user ) ) ) {
			wp_send_json_error();
		}
		if ( ! empty( WLD_Account_Activity::get_activity( 'delete-match', $user ) ) ) {
			wp_send_json_error();
		}
		if ( 'true' === WLD_Account::get_userdata_custom( $user )->hide_profile_browse_matches ) {
			wp_send_json_error();
		}

		$location  = WLD_Account::get_userdata_custom( $user )->distance;
		$interests = array();

		if ( ! empty( WLD_Account::get_userdata_custom( $user )->music ) ) {
			foreach ( WLD_Account::get_userdata_custom( $user )->music as $row ) {
				$interests[] = $row;
			}
		}
		if ( ! empty( WLD_Account::get_userdata_custom( $user )->arts_and_other ) ) {
			foreach ( WLD_Account::get_userdata_custom( $user )->arts_and_other as $row ) {
				$interests[] = $row;
			}
		}
		if ( ! empty( WLD_Account::get_userdata_custom( $user )->leisure_activities ) ) {
			foreach ( WLD_Account::get_userdata_custom( $user )->leisure_activities as $row ) {
				$interests[] = $row;
			}
		}
		if ( ! empty( WLD_Account::get_userdata_custom( $user )->activities ) ) {
			foreach ( WLD_Account::get_userdata_custom( $user )->activities as $row ) {
				$interests[] = $row;
			}
		}
		if ( ! empty( WLD_Account::get_userdata_custom( $user )->interests ) ) {
			foreach ( WLD_Account::get_userdata_custom( $user )->interests as $row ) {
				$interests[] = $row;
			}
		}
		if ( 'true' === WLD_Account::get_userdata_custom( get_current_user_id() )->new_matches ) {
			$best_matching = get_user_meta( get_current_user_id(), '_best_matching' );

			if ( in_array( (int) $user, $best_matching, true ) ) {
				add_user_meta( get_current_user_id(), '_best_matching', $user );

				$template = WLD_Other::get_template_mail(
					'new-matches'
				);

				WLD_Mail::mail(
					get_userdata( get_current_user_id() )->user_email,
					'New Matches',
					$template,
				);
			}
		}

		$result['bestMatch'] = array(
			'avatar'         => ( empty( WLD_Stripe_Api_Subscription::get_subscription( true ) ) ) ? ( WLD_Account::get_userdata_custom( $user )->blur_avatar ) : ( WLD_Account::get_userdata_custom( $user )->avatar ),
			'name'           => get_userdata( $user )->first_name . ' ' . get_userdata( $user )->last_name,
			'age'            => WLD_Account::get_userdata_custom( $user )->age,
			'statusLine'     => WLD_Account::get_userdata_custom( $user )->status_line,
			'userId'         => $user,
			'matches'        => self::get_percent_matches( get_current_user_id(), $user ),
			'blocked'        => ( empty( WLD_Account_Activity::get_activity( 'blocked',
				$user ) ) ) ? ( 'false' ) : ( 'true' ),
			'liked'          => ( empty( WLD_Account_Activity::get_activity( 'liked',
				$user ) ) ) ? ( 'false' ) : ( 'true' ),
			'favorite'       => ( empty( WLD_Account_Activity::get_activity( 'favorite',
				$user ) ) ) ? ( 'false' ) : ( 'true' ),
			'linkAuthor'     => WLD_Account::get_link_author( $user ),
			'locationX'      => ( isset( $location['x'] ) ) ? ( $location['x'] ) : ( '' ),
			'locationY'      => ( isset( $location['y'] ) ) ? ( $location['y'] ) : ( '' ),
			'location'       => ( isset( $location['location'] ) ) ? ( $location['location'] ) : ( 'Location is unset' ),
			'online'         => WLD_Account::get_online_status( $user ),
			'dateLastOnline' => WLD_Account::get_online_status( $user, true ),
			'interests'      => $interests,
		);
		if ( ! isset( $result['bestMatch'] ) || empty( $result['bestMatch'] ) ) {
			wp_send_json_error();
		}
		wp_send_json_success( $result );
	}

	public static function get_matches(): array {
		$get_users = array();

		global $wpdb;
		$result  = $wpdb->get_col( "SELECT ID FROM $wpdb->users" );
		$user_id = get_current_user_id();
		foreach ( $result as $key => $user ) {
			if ( get_current_user_id() === (int) $user ) {
				unset( $result[ $key ] );
				continue;
			}
			$get_users[] = array(
				'ID'      => $user,
				'percent' => self::get_percent_matches( $user_id, $user ),
			);
		}
		usort(
			$get_users,
			static function ( $a, $b ) {
				return ( $a['percent'] <=> $b['percent'] );
			}
		);

		return $get_users;
	}

	public static function clear_all_filter_matches(): void {
		check_ajax_referer( 'ajax-nonce', 'nonce' );

		self::clear_preference_data(
			array(
				'_preference_data_range_ages',
				'_preference_data_range_height',
				'_preference_data_body_type',
				'_preference_data_ethnicity',
				'_preference_data_mirital_status',
				'_preference_data_has_photo',
				'_preference_data_is_online',
				'_preference_data_show_verified_users',
				'_preference_data_church_attendance',
				'_preference_data_level_of_education',
				'_preference_data_pets',
				'_preference_data_sort_by',
				'_preference_data_occupation',
				'_preference_data_want_kids',
				'_preference_data_born_again',
				'_preference_data_have_kids',
				'_preference_data_location_data',
			),
		);

		wp_send_json_success();
	}

	public static function search_matches(): void {
		check_ajax_referer( 'ajax-nonce', 'nonce' );

		self::save_match_preference_data(
			array(
				'_preference_data_range_ages'          => array(
					'min'   => $_POST['rangeAgesArray']['min'],
					'max'   => $_POST['rangeAgesArray']['max'],
					'value' => $_POST['rangeAgesArray']['value'],
				),
				'_preference_data_range_height'        => array(
					'min'   => $_POST['rangeHeightArray']['min'],
					'max'   => $_POST['rangeHeightArray']['max'],
					'value' => $_POST['rangeAgesArray']['value'],
				),
				'_preference_data_body_type'           => $_POST['bodyType'],
				'_preference_data_ethnicity'           => $_POST['ethnicity'],
				'_preference_data_mirital_status'      => $_POST['miritalStatus'],
				'_preference_data_has_photo'           => $_POST['hasPhoto'],
				'_preference_data_is_online'           => $_POST['isOnline'],
				'_preference_data_show_verified_users' => $_POST['showVerifiedUsers'],
				'_preference_data_church_attendance'   => $_POST['churchAttendance'],
				'_preference_data_level_of_education'  => $_POST['levelOfEducation'],
				'_preference_data_pets'                => $_POST['pets'],
				'_preference_data_sort_by'             => $_POST['sortBy'],
				'_preference_data_occupation'          => $_POST['occupation'],
				'_preference_data_want_kids'           => $_POST['wantKids'],
				'_preference_data_born_again'          => $_POST['bornAgain'],
				'_preference_data_have_kids'           => $_POST['haveKids'],
				'_preference_data_location_data'       => $_POST['locationData'],
			),
		);

		$meta_query  = array();
		$meta_fields = array(
			'rangeAgesArray'    => '_birth_date',
			'rangeHeightArray'  => '_height',
			'bodyType'          => '_body_type',
			'ethnicity'         => '_ethnicity',
			'miritalStatus'     => '_mirital_status',
			'hasPhoto'          => '_avatar_user',
			'showVerifiedUsers' => '_verified_user',
			'bornAgain'         => '_born_again',
			'churchAttendance'  => '_church_attendance',
			'levelOfEducation'  => '_level_education',
			'haveKids'          => '_have_kids',
			'occupation'        => '_occupation',
			'wantKids'          => '_want_kids',
			'pets'              => '_pets',
		);
		$ignore_keys = array(
			'action',
			'nonce',
			'isOnline',
			'sortBy',
			'locationData',
		);

		foreach ( $_POST as $key => $value ) {
			if ( in_array( $key, $ignore_keys, true ) ) {
				continue;
			}
			if ( empty( $value ) || 'false' === $value ) {
				continue;
			}
			if ( 'rangeAgesArray' === $key ) {
				if ( 'NaN' === $value['search'][0] || 'NaN' === $value['search'][1] ) {
					$value['search'][0] = 18;
					$value['search'][1] = 40;
				}
			}
			if ( is_array( $value ) && ! empty( $value['search'][0] ) && ! empty( $value['search'][1] ) ) {
				$meta_query[] = array(
					'key'     => $meta_fields[ $key ],
					'value'   => array( round( (float) $value['search'][0] ), round( (float) $value['search'][1] ) ),
					'compare' => 'BETWEEN',
					'type'    => 'NUMERIC',
				);
			} else {
				$compare = '=';
				if ( '_verified_user' === $meta_fields[ $key ] ) {
					$value        = 'verified';
					$meta_query[] = array(
						'key'     => '_verify_email',
						'value'   => 'yes',
						'compare' => $compare,
					);
				}
				if ( '_avatar_user' === $meta_fields[ $key ] ) {
					$compare = '!=';
					$value   = '';
				}
				$meta_query[] = array(
					'key'     => $meta_fields[ $key ],
					'value'   => $value,
					'compare' => $compare,
				);
			}
		}
		$meta_query[] = array(
			'key'     => '_gender',
			'value'   => '',
			'compare' => '!=',
		);
		$meta_query[] = array(
			'key'     => '_gender',
			'value'   => WLD_Account::get_userdata_custom( get_current_user_id() )->gender,
			'compare' => '!=',
		);
		if ( ! empty( $meta_query ) ) {
			$meta_query = array(
				'relation' => 'AND',
				$meta_query,
			);

			$query_array = array(
				'meta_query' => $meta_query,
			);
		}

		add_filter( 'get_meta_sql', 'wld_replace_meta_where' );

		$query = get_users(
			$query_array ?? array()
		);

		remove_filter( 'get_meta_sql', 'wld_replace_meta_where' );

		$is_online = (string) $_POST['isOnline'];
		$sort_by   = (string) $_POST['sortBy'];

		if ( 'true' === $is_online ) {
			foreach ( $query as $key => $value ) {
				$value = $value->data;
				$value = WLD_Account::get_online_status( $value->ID );

				if ( false === $value ) {
					unset( $query[ $key ] );
				}
			}
		}

		$result = array();
		foreach ( $query as $user ) {
			if ( get_current_user_id() === $user->ID ) {
				continue;
			}
			if ( ! empty( WLD_Account_Activity::get_activity( 'blocked', $user->ID ) ) ) {
				continue;
			}
			if ( ! empty( WLD_Account_Activity::get_activity( 'delete-match', $user->ID ) ) ) {
				continue;
			}
			if ( 'true' === WLD_Account::get_userdata_custom( $user->ID )->hide_profile_browse_matches ) {
				continue;
			}

			$location = WLD_Account::get_userdata_custom( $user->ID )->distance;
			$result[] = array(
				'avatar'         => ( empty( WLD_Stripe_Api_Subscription::get_subscription( true ) ) ) ? ( WLD_Account::get_userdata_custom( $user->ID )->blur_avatar ) : ( WLD_Account::get_userdata_custom( $user->ID )->avatar ),
				'name'           => get_userdata( $user->ID )->first_name . ' ' . get_userdata( $user->ID )->last_name,
				'age'            => WLD_Account::get_userdata_custom( $user->ID )->age,
				'statusLine'     => WLD_Account::get_userdata_custom( $user->ID )->status_line,
				'userId'         => $user->ID,
				'matches'        => self::get_percent_matches( get_current_user_id(), $user->ID ),
				'blocked'        => ( empty( WLD_Account_Activity::get_activity( 'blocked',
					$user->ID ) ) ) ? ( 'false' ) : ( 'true' ),
				'liked'          => ( empty( WLD_Account_Activity::get_activity( 'liked',
					$user->ID ) ) ) ? ( 'false' ) : ( 'true' ),
				'favorite'       => ( empty( WLD_Account_Activity::get_activity( 'favorite',
					$user->ID ) ) ) ? ( 'false' ) : ( 'true' ),
				'linkAuthor'     => WLD_Account::get_link_author( $user->ID ),
				'locationX'      => ( isset( $location['x'] ) ) ? ( $location['x'] ) : ( '' ),
				'locationY'      => ( isset( $location['y'] ) ) ? ( $location['y'] ) : ( '' ),
				'location'       => ( isset( $location['location'] ) ) ? ( $location['location'] ) : ( 'Location is unset' ),
				'online'         => WLD_Account::get_online_status( $user->ID ),
				'dateLastOnline' => WLD_Account::get_online_status( $user->ID, true ),
			);
		}

		wp_send_json_success( $result );
	}

	public static function save_match_preference_data( array $args ): void {
		foreach ( $args as $key => $value ) {
			if ( empty( $value ) ) {
				continue;
			}
			update_user_meta( get_current_user_id(), $key, $value );
		}
	}

	public static function get_match_preference_data(): array {
		return array(
			'range_ages'          => get_user_meta( get_current_user_id(), '_preference_data_range_ages', true ) ?? '',
			'range_height'        => get_user_meta( get_current_user_id(), '_preference_data_range_height',
					true ) ?? '',
			'body_type'           => get_user_meta( get_current_user_id(), '_preference_data_body_type', true ) ?? '',
			'ethnicity'           => get_user_meta( get_current_user_id(), '_preference_data_ethnicity', true ) ?? '',
			'mirital_status'      => get_user_meta( get_current_user_id(), '_preference_data_mirital_status',
					true ) ?? '',
			'has_photo'           => get_user_meta( get_current_user_id(), '_preference_data_has_photo', true ) ?? '',
			'is_online'           => get_user_meta( get_current_user_id(), '_preference_data_is_online', true ) ?? '',
			'show_verified_users' => get_user_meta( get_current_user_id(), '_preference_data_show_verified_users',
					true ) ?? '',
			'church_attendance'   => get_user_meta( get_current_user_id(), '_preference_data_church_attendance',
					true ) ?? '',
			'level_of_education'  => get_user_meta( get_current_user_id(), '_preference_data_level_of_education',
					true ) ?? '',
			'pets'                => get_user_meta( get_current_user_id(), '_preference_data_pets', true ) ?? '',
			'sort_by'             => get_user_meta( get_current_user_id(), '_preference_data_sort_by', true ) ?? '',
			'occupation'          => get_user_meta( get_current_user_id(), '_preference_data_occupation', true ) ?? '',
			'want_kids'           => ucfirst( get_user_meta( get_current_user_id(), '_preference_data_want_kids',
					true ) ) ?? '',
			'have_kids'           => ucfirst( get_user_meta( get_current_user_id(), '_preference_data_have_kids',
					true ) ) ?? '',
			'born_again'          => ucfirst( get_user_meta( get_current_user_id(), '_preference_data_born_again',
					true ) ) ?? '',
			'location_data'       => empty( get_user_meta( get_current_user_id(), '_preference_data_location_data',
				true ) )
				? array(
					'location'  => '',
					'x'         => '',
					'y'         => '',
					'within_mi' => '',
					'globally'  => '',
				) : get_user_meta( get_current_user_id(), '_preference_data_location_data', true ),
		);
	}

	public static function clear_preference_data( array $args ): void {
		foreach ( $args as $row ) {
			update_user_meta( get_current_user_id(), $row, '' );
		}
	}
}
