<?php

class WLD_Account_Edit {
	public static function init() {
		$wp_ajax        = 'wp_ajax_';
		$wp_ajax_nopriv = 'wp_ajax_nopriv_';

		add_action( $wp_ajax . 'ajax_manage_account_save', array( static::class, 'manage_account_save' ) );
		add_action( $wp_ajax . 'ajax_account_display_settings', array( static::class, 'display_settings' ) );
		add_action( $wp_ajax . 'ajax_account_email_notifications', array( static::class, 'email_notifications' ) );
		add_action( $wp_ajax . 'ajax_account_update_gender', array( static::class, 'update_gender' ) );
		add_action( $wp_ajax . 'ajax_account_update_gender', array( static::class, 'update_gender' ) );
		add_action( $wp_ajax . 'ajax_account_delete', array( static::class, 'account_delete' ) );
		add_action( $wp_ajax . 'ajax_update_account_additional_information',
			array( static::class, 'update_account_additional_information' ) );
		add_action( $wp_ajax . 'ajax_upload_media_content', array( static::class, 'upload_media_content' ) );
		add_action( $wp_ajax . 'ajax_video_delete', array( static::class, 'video_delete' ) );
		add_action( $wp_ajax . 'ajax_photo_delete', array( static::class, 'photo_delete' ) );
	}

	public static function photo_delete(): void {
		check_ajax_referer( 'ajax-nonce', 'nonce' );

		$url = (string) $_POST['url'];

		delete_user_meta( get_current_user_id(), '_album_photo', $url );
		wp_send_json_success();
	}

	public static function video_delete(): void {
		check_ajax_referer( 'ajax-nonce', 'nonce' );

		$url = (string) $_POST['url'];

		delete_user_meta( get_current_user_id(), '_album_video', $url );
		wp_send_json_success();
	}

	public static function upload_media_content(): void {
		check_ajax_referer( 'ajax-nonce', 'nonce' );

		$type = (string) $_POST['type'];
		$url  = (string) esc_url( $_POST['url'] );

		if ( empty( $url ) ) {
			wp_send_json_error( 'URL cannot be empty.' );
		}

		switch ( $type ) {
			case 'cover_photo':
				update_user_meta( get_current_user_id(), '_cover_photo', $url );
				break;
			case 'avatar':
				update_user_meta( get_current_user_id(), '_avatar_user', $url );
				break;
			case 'photos':
				add_user_meta( get_current_user_id(), '_album_photo', $url );
				break;
			case 'videos':
				add_user_meta( get_current_user_id(), '_album_video', $url );
				break;
			case 'blur_avatar':
				update_user_meta( get_current_user_id(), '_blur_avatar_user', $url );
				break;
		}

		wp_send_json_success();
	}

	public static function update_account_additional_information(): void {
		check_ajax_referer( 'ajax-nonce', 'nonce' );

		if ( ! is_user_logged_in() ) {
			wp_send_json_error();
		}

		$distance        = (array) $_POST['distance'];
		$interests_array = (array) $_POST['interestArray'];
		$distance_before = WLD_Account::get_userdata_custom( get_current_user_id() )->distance;

		if ( ! is_array( $distance_before ) ) {
			$distance['distance_mi'] = 100;
		} else {
			$distance['distance_mi'] = $distance_before['distance_mi'];
		}

		foreach ( $interests_array as $row ) {
			if ( in_array( strtolower( $row ), WLD_Other::get_interests( 'music' ), true ) ) {
				$interests['music'][] = $row;
			}
			if ( in_array( strtolower( $row ), WLD_Other::get_interests( 'arts_and_entertainment' ), true ) ) {
				$interests['arts_and_entertainment'][] = $row;
			}
			if ( in_array( strtolower( $row ), WLD_Other::get_interests( 'leisure_activities' ), true ) ) {
				$interests['leisure_activities'][] = $row;
			}
			if ( in_array( strtolower( $row ), WLD_Other::get_interests( 'activities' ), true ) ) {
				$interests['activities'][] = $row;
			}
			if ( in_array( strtolower( $row ), WLD_Other::get_interests( 'sports_and_fitness' ), true ) ) {
				$interests['sports_and_fitness'][] = $row;
			}
		}

		$meta_keys = array(
			'_status_line'              => (string) $_POST['statusLine'],
			'description'               => (string) $_POST['description'],
			'_height'                   => (int) round( (float) $_POST['height'] ),
			'_body_type'                => (string) $_POST['bodyType'],
			'_ethnicity'                => (string) $_POST['ethnicity'],
			'_religion'                 => (string) $_POST['religion'],
			'_mirital_status'           => (string) $_POST['miritalStatus'],
			'_church_attendance'        => (string) $_POST['churchAttendance'],
			'_distance'                 => $distance,
			'artsAndEntertainment'      => $interests['arts_and_entertainment'] ?? array(),
			'musicVariable'             => $interests['music'] ?? array(),
			'leisureActivitiesVariable' => $interests['leisure_activities'] ?? array(),
			'activatiesVariable'        => $interests['activities'] ?? array(),
			'interestsVariable'         => $interests['sports_and_fitness'] ?? array(),
			'_have_kids'                => ucfirst( $_POST['haveKids'] ),
			'_occupation'               => (string) $_POST['occupation'],
			'_level_education'          => (string) $_POST['education'],
			'_born_again'               => (string) $_POST['bornAgain'],
			'_want_kids'                => (string) $_POST['wantKids'],
			'_pets'                     => 'Yes' !== ucfirst( $_POST['pets'] ) && 'No' !== ucfirst( $_POST['pets'] ) ? '' : ucfirst( $_POST['pets'] ),
		);
		if ( ! empty( $_POST['birthDay'] ) ) {
			$meta_keys['_birth_date'] = (string) $_POST['birthDay'];
		}
		foreach ( $meta_keys as $key => $row ) {
			update_user_meta(
				get_current_user_id(),
				$key,
				$row,
			);
		}

		wp_send_json_success();
	}

	public static function account_delete(): void {
		check_ajax_referer( 'ajax-nonce', 'nonce' );

		if ( ! is_user_logged_in() ) {
			wp_send_json_error();
		}

		$template = WLD_Other::get_template_mail(
			'delete-account',
			array(
				'username' => get_userdata( get_current_user_id() )->user_login,
			),
		);

		WLD_Mail::mail(
			get_userdata( get_current_user_id() )->user_email,
			'Account Deleted',
			$template,
		);
		wp_delete_user( get_current_user_id() );
		wp_send_json_success();
	}

	public static function update_gender(): void {
		check_ajax_referer( 'ajax-nonce', 'nonce' );

		$gender = $_POST['gender'];

		if ( empty( $gender ) ) {
			wp_send_json_error();
		}
		update_user_meta( get_current_user_id(), '_gender', $gender );
		wp_send_json_success();
	}

	public static function email_notifications(): void {
		check_ajax_referer( 'ajax-nonce', 'nonce' );

		$settings = $_POST['settings'];

		foreach ( $settings as $field => $value ) {
			update_user_meta( get_current_user_id(), $field, $value );
		}

		wp_send_json_success();
	}

	public static function display_settings( $settings = array() ): void {
		check_ajax_referer( 'ajax-nonce', 'nonce' );

		if ( false === WLD_Stripe_Api_Subscription::get_subscription() ) {
			wp_send_json_error();
		}

		$settings = ( isset( $_POST['settings'] ) ) ? ( (array) $_POST['settings'] ) : ( $settings );

		foreach ( $settings as $field => $value ) {
			update_user_meta( get_current_user_id(), $field, $value );
		}

		wp_send_json_success();

	}

	public static function manage_account_save() {
		if ( ! is_user_logged_in() ) {
			echo json_encode(
				array(
					'success' => false,
					'content' => 'You are not allowed to use this form, please <a href="/account/login">login to your account</a>.'
				)
			);
			wp_die();
		}

		check_ajax_referer( 'ajax-nonce', 'nonce' );

		$_POST['firstAndLastName'] = explode( ' ', $_POST['firstAndLastName'] );

		$first_name           = $_POST['firstAndLastName'][0];
		$last_name            = $_POST['firstAndLastName'][1];
		$email_address        = $_POST['emailAddress'];
		$username             = $_POST['username'];
		$current_password     = $_POST['currentPassword'];
		$new_password         = $_POST['newPassword'];
		$confirm_new_password = $_POST['confirmNewPassword'];
		$user                 = get_user_by( 'id', get_current_user_id() );
		$user_exists          = get_user_by( 'login', $username );
		$old_username         = get_userdata( get_current_user_id() )->user_nicename;
		if (
			empty( $first_name ) || empty( $last_name ) ||
			empty( $email_address ) || empty( $username )
		) {
			echo json_encode(
				array(
					'success' => false,
					'content' => 'Fill in all fields, fields cannot be empty.'
				)
			);
			wp_die();
		}
		if ( ! filter_var( $email_address, FILTER_VALIDATE_EMAIL ) ) {
			echo json_encode(
				array(
					'success' => false,
					'content' => 'Please enter a valid email address. Example: nwda@example.com.'
				)
			);
			wp_die();
		}
		if ( ! empty( email_exists( $email_address ) ) && $email_address !== $user->user_email ) {
			echo json_encode(
				array(
					'success' => false,
					'content' => 'This email is already registered, please try another one.',
				)
			);
			wp_die();
		}
		if ( ! empty( $user_exists ) && $username !== $user->user_nicename ) {
			echo json_encode(
				array(
					'success' => false,
					'content' => 'This username is already registered, please try another one.',
				)
			);
			wp_die();
		}

		if ( ! empty( $current_password ) ) {
			if ( ! wp_check_password( $current_password, $user->user_pass ) ) {
				echo json_encode(
					array(
						'success' => false,
						'content' => 'The current password is entered incorrectly.',
					)
				);
				wp_die();
			}

			if ( $new_password !== $confirm_new_password ) {
				echo json_encode(
					array(
						'success' => false,
						'content' => 'Passwords do not match, please try again.',
					)
				);
				wp_die();
			}

			wp_set_password( $new_password, get_current_user_id() );
			wp_set_auth_cookie( get_current_user_id() );
		}

		$user_id = get_current_user_id();
		wp_update_user( //phpcs:ignore Squiz.WhiteSpace.SuperfluousWhitespace.EndLine: Whitespace found at end of line
			array(
				'ID'            => $user_id,
				'user_nicename' => $username,
				'user_email'    => $email_address,
				'nickname'      => $username,
				'first_name'    => $first_name,
				'last_name'     => $last_name,
				'display_name'  => $first_name . ' ' . $last_name,
			),
		);

		if ( $old_username !== $username ) {
			global $wpdb;
			$wpdb->update(
				$wpdb->users,
				array(
					'user_login' => $username
				),
				array(
					'ID' => $user_id
				),
			);
			clean_user_cache( $user_id );
			nocache_headers();
			wp_clear_auth_cookie();
			wp_set_auth_cookie( $user_id );
		}

		echo json_encode(
			array(
				'success' => true,
				'content' => wp_create_nonce( 'ajax-nonce' ),
			)
		);
		wp_die();
	}
}
