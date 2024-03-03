<?php

class WLD_Account {
	public static function init() {
		$wp_ajax        = 'wp_ajax_';
		$wp_ajax_nopriv = 'wp_ajax_nopriv_';

		add_action( 'wp_ajax_ajax_account_like', array( static::class, 'account_like' ) );
		add_action( 'wp_ajax_ajax_account_favorites', array( static::class, 'account_favorites' ) );
		add_action( 'wp_ajax_nopriv_ajax_check_exist_email', array( static::class, 'check_exist_email' ) );
	}

	public static function check_exist_email() {
		check_ajax_referer( 'ajax-nonce', 'nonce' );

		$email_address    = (string) $_POST['emailAddress'];
		$password         = (string) $_POST['password'];
		$confirm_password = (string) $_POST['passwordConfirm'];

		if ( $password !== $confirm_password ) {
			wp_send_json_error(
				'Passwords do not match.'
			);
		}
		if ( ! filter_var( $email_address, FILTER_VALIDATE_EMAIL ) ) {
			wp_send_json_error(
				'Please enter a valid email address. Example: nwda@example.com.'
			);
		}

		if ( ! empty( email_exists( $email_address ) ) ) {
			wp_send_json_error(
				'This email is already registered, please try another one.',
			);
		}

		wp_send_json_success();
	}

	public static function get_avatar( $user_id = 0, $get_default = false, $blur = false ) {
		$default = get_stylesheet_directory_uri() . '/images/mystery-man.png';

		if ( true === $get_default ) {
			return $default;
		}

		$avatar = get_user_meta( $user_id, '_avatar_user', true );

		if ( empty( $avatar ) ) {
			return $default;
		}

		if ( $blur ) {
			$blur_picture = get_user_meta( $user_id, '_blur_avatar_user', true );
			if ( empty( $blur_picture ) ) {
				return $default;
			}

			return $blur_picture;
		}

		return $avatar;
	}

	public static function get_cover_photo( $user_id = 0 ) {
		return get_user_meta( $user_id, '_cover_photo', true );
	}

	public static function get_userdata_custom( int $user_id ): object {
		$distance = get_user_meta( $user_id, '_distance', true );
		if ( '1' === $distance ) {
			$distance = 'Search Globally';
		}
		$status_line = get_user_meta( $user_id, '_status_line', true );
		if ( empty( $status_line ) ) {
			$status_line = '-';
		}
		$description = get_user_meta( $user_id, 'description', true );
		if ( empty( $description ) ) {
			$description = '-';
		}
		try {
			$today   = new DateTime();
			$get_age = new DateTime( get_user_meta( $user_id, '_birth_date', true ) );
			$get_age = $today->diff( $get_age );

			if ( empty( $get_age->format( '%y' ) ) ) {
				$get_age = 'Date of birth not set';
			} else {
				$get_age = $get_age->format( '%y' );
			}
		} catch ( Exception $e ) {
			$get_age = 'Date of birth not set';
		}
		$birth_date                  = get_user_meta( $user_id, '_birth_date', true );
		$mirital_status              = get_user_meta( $user_id, '_mirital_status', true );
		$church_attendance           = get_user_meta( $user_id, '_church_attendance', true );
		$have_kids                   = get_user_meta( $user_id, '_have_kids', true );
		$want_kids                   = get_user_meta( $user_id, '_want_kids', true );
		$occupation                  = get_user_meta( $user_id, '_occupation', true );
		$education                   = get_user_meta( $user_id, '_level_education', true );
		$height                      = get_user_meta( $user_id, '_height', true );
		$pets                        = get_user_meta( $user_id, '_pets', true );
		$religion                    = get_user_meta( $user_id, '_religion', true );
		$body_type                   = get_user_meta( $user_id, '_body_type', true );
		$ethnicity                   = get_user_meta( $user_id, '_ethnicity', true );
		$avatar                      = self::get_avatar( $user_id );
		$blur_avatar                 = self::get_avatar( $user_id, false, true );
		$cover_photo                 = self::get_cover_photo( $user_id );
		$born_again                  = get_user_meta( $user_id, '_born_again', true );
		$ages_range                  = get_user_meta( $user_id, '_ages_range', true );
		$photos_album                = get_user_meta( $user_id, '_album_photo' );
		$videos_album                = get_user_meta( $user_id, '_album_video' );
		$music                       = get_user_meta( $user_id, 'musicVariable', true );
		$arts_and_entertainment      = get_user_meta( $user_id, 'artsAndEntertainment', true );
		$leisure_activities          = get_user_meta( $user_id, 'leisureActivitiesVariable', true );
		$activities                  = get_user_meta( $user_id, 'activatiesVariable', true );
		$interests                   = get_user_meta( $user_id, 'interestsVariable', true );
		$gender                      = get_user_meta( $user_id, '_gender', true );
		$hide_online_status          = get_user_meta( $user_id, '_hide_online_status', true );
		$hide_profile_browse_matches = get_user_meta( $user_id, '_hide_profile_browse_matches', true );
		$browse_anonymously          = get_user_meta( $user_id, '_browse_anonymously', true );
		$new_messages                = get_user_meta( $user_id, '_new_messages', true );
		$likes_and_views             = get_user_meta( $user_id, '_likes_and_views', true );
		$new_matches                 = get_user_meta( $user_id, '_new_matches', true );
		$promotions                  = get_user_meta( $user_id, '_promotions', true );

		if ( 'Does have/love pets?' === $pets ) {
			$pets = '';
		}

		if ( ! empty( $interests ) ) {
			array_walk(
				$interests,
				static function ( &$value ) {
					$value   = strtolower( $value );
					$explode = explode( '_', $value );
					if ( isset( $explode[1] ) ) {
						$value = $explode[0] . ' ' . $explode[1];
					}
				}
			);
		}
		if ( ! empty( $activities ) ) {
			array_walk(
				$activities,
				static function ( &$value ) {
					$value   = strtolower( $value );
					$explode = explode( '_', $value );
					if ( isset( $explode[1] ) ) {
						$value = $explode[0] . ' ' . $explode[1];
					}
				}
			);
		}
		if ( ! empty( $music ) ) {
			array_walk(
				$music,
				static function ( &$value ) {
					$value   = strtolower( $value );
					$explode = explode( '_', $value );
					if ( isset( $explode[1] ) ) {
						$value = $explode[0] . ' ' . $explode[1];
					}
				}
			);
		}
		if ( ! empty( $arts_and_entertainment ) ) {
			array_walk(
				$arts_and_entertainment,
				static function ( &$value ) {
					$value   = strtolower( $value );
					$explode = explode( '_', $value );
					if ( isset( $explode[1] ) ) {
						$value = $explode[0] . ' ' . $explode[1];
					}
				}
			);
		}
		if ( ! empty( $leisure_activities ) ) {
			array_walk(
				$leisure_activities,
				static function ( &$value ) {
					$value   = strtolower( $value );
					$explode = explode( '_', $value );
					if ( isset( $explode[1] ) ) {
						$value = $explode[0] . ' ' . $explode[1];
					}
				}
			);
		}

		return (object) array(
			'gender'                      => $gender,
			'videos'                      => $videos_album,
			'photos'                      => $photos_album,
			'avatar'                      => $avatar,
			'blur_avatar'                 => $blur_avatar,
			'cover_photo'                 => $cover_photo,
			'distance'                    => $distance,
			'status_line'                 => $status_line,
			'description'                 => $description,
			'age'                         => $get_age,
			'birth_date'                  => $birth_date,
			'music'                       => $music,
			'arts_and_other'              => $arts_and_entertainment,
			'leisure_activities'          => $leisure_activities,
			'activities'                  => $activities,
			'interests'                   => $interests,
			'mirital_status'              => $mirital_status,
			'church_attendance'           => $church_attendance,
			'have_kids'                   => $have_kids,
			'want_kids'                   => $want_kids,
			'occupation'                  => $occupation,
			'education'                   => $education,
			'height'                      => $height,
			'pets'                        => $pets,
			'religion'                    => $religion,
			'ethnicity'                   => $ethnicity,
			'body_type'                   => (string) $body_type,
			'ages_range'                  => $ages_range,
			'born_again'                  => $born_again,
			'hide_online_status'          => $hide_online_status,
			'hide_profile_browse_matches' => $hide_profile_browse_matches,
			'browse_anonymously'          => $browse_anonymously,
			'new_messages'                => $new_messages,
			'likes_and_views'             => $likes_and_views,
			'new_matches'                 => $new_matches,
			'promotions'                  => $promotions,
		);
	}

	public static function user_status( int $user_id, string $update = '' ) {
		if ( ! empty( $update ) ) {
			switch ( $update ) {
				case 'free':
					update_user_meta(
						get_current_user_id(),
						'_user_status',
						array(
							'status' => 'free',
							'name'   => 'Free member',
						)
					);
					break;
				case 'premium':
					update_user_meta(
						get_current_user_id(),
						'_user_status',
						array(
							'status' => 'premium',
							'name'   => 'Premium',
						)
					);
					break;
			}

			return true;
		}
		$status = get_user_meta(
			$user_id,
			'_user_status',
			true
		);

		if ( empty( $status ) ) {
			update_user_meta(
				get_current_user_id(),
				'_user_status',
				array(
					'status' => 'free',
					'name'   => 'Free member',
				)
			);
			$status = get_user_meta(
				$user_id,
				'_user_status',
				true
			);
		}

		return $status;
	}

	public static function get_fields( $type ) {
		$uncompleted = include 'user-meta-fields.php';
		$completed   = array();
		$user_id     = get_current_user_id();

		if ( 'all' === $type ) {
			return $uncompleted;
		}

		if ( $user_id ) {
			foreach ( $uncompleted as $key => $field ) {
				$value = get_user_meta( $user_id, $key, true );
				if ( $value && '-' !== $value ) {
					$completed[ $key ] = $field;
					unset( $uncompleted[ $key ] );
				}
			}
		}

		return 'uncompleted' === $type ? $uncompleted : $completed;
	}

	public static function completeness_profile() {
		if ( ! is_user_logged_in() ) {
			return 0;
		}

		$count_all       = count( static::get_fields( 'all' ) );
		$count_completed = count( static::get_fields( 'completed' ) );

		return round( ( $count_completed * 100 ) / $count_all );
	}

	public static function get_link_author( int $user_id ): string {
		return esc_url( get_home_url() . '/' . get_user_meta( $user_id, 'nickname', true ) );
	}

	public static function get_online_status( int $user_id, $get_date = false ): bool {
		$get_last_activity = WLD_Account_Activity::get_activity( 'last_activity', $user_id );
		$current_time      = time();
		if ( empty( $get_last_activity ) || 'true' === self::get_userdata_custom( $user_id )->hide_online_status ) {
			return '';
		}
		$last_activity = (int) strtotime( $get_last_activity[0]->date_recorded ) + 300;

		if ( true === $get_date ) {
			return $get_last_activity[0]->date_recorded;
		}

		return $current_time <= $last_activity;

	}
}
