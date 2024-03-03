<?php

class WLD_Account_Login {
	public static function init() {
		$wp_ajax        = 'wp_ajax_';
		$wp_ajax_nopriv = 'wp_ajax_nopriv_';

		add_action( $wp_ajax . 'ajax_account_login', array( static::class, 'login' ) );
		add_action( $wp_ajax_nopriv . 'ajax_account_login', array( static::class, 'login' ) );
		add_action( $wp_ajax . 'ajax_account_forgot_password', array( static::class, 'forgot_password' ) );
		add_action( $wp_ajax_nopriv . 'ajax_account_forgot_password', array( static::class, 'forgot_password' ) );
		add_action( $wp_ajax . 'ajax_account_new_password', array( static::class, 'change_password' ) );
		add_action( $wp_ajax_nopriv . 'ajax_account_new_password', array( static::class, 'change_password' ) );
		add_action( $wp_ajax . 'ajax_account_register', array( static::class, 'register' ) );
		add_action( $wp_ajax_nopriv . 'ajax_account_register', array( static::class, 'register' ) );
		add_action( $wp_ajax . 'ajax_register_completed', array( static::class, 'register_completed' ) );
		add_action( $wp_ajax_nopriv . 'ajax_register_completed', array( static::class, 'register_completed' ) );
		add_action( $wp_ajax . 'ajax_register_send_verify_email', array( static::class, 'send_verify_email' ) );

		if ( isset( $_GET['verifyEmail'] ) ) {
			add_action( 'init', array( static::class, 'check_verify_email' ) );
		} elseif ( isset( $_GET['logout'] ) && 'true' === $_GET['logout'] ) {
			add_action( 'init', array( static::class, 'logout' ) );
		} elseif ( isset( $_GET['send_verify_email'] ) ) {
			static::send_verify_email();
		}
	}

	public static function logout() {
		wp_logout();
		exit( wp_safe_redirect( get_home_url() ) );
	}

	public static function check_verify_email(): bool {
		if ( 'yes' === get_user_meta( get_current_user_id(), '_verify_email', true ) ) {
			return true;
		}

		if ( ! is_user_logged_in() ) {
			return false;
		}

		$login        = $_GET['acc'];
		$key          = $_GET['verifyEmail'];
		$user_id      = get_user_by( 'login', $login );
		$get_userdata = get_userdata( $user_id->ID );
		$key          = check_password_reset_key( $key, $get_userdata->user_login );

		if ( is_wp_error( $key ) ) {
			wp_die( $key->get_error_message() );
		}

		add_user_meta( get_current_user_id(), '_verify_email', 'yes' );
		get_password_reset_key( $get_userdata );

		return true;
	}

	public static function send_verify_email(): bool {
		if ( wp_doing_ajax() ) {
			check_ajax_referer( 'ajax-nonce', 'nonce' );
		}

		if ( ! is_user_logged_in() ) {
			wp_send_json_error( 'You are not allowed to use this form, please <a href="/account/login">login to your account</a>.' );
		}

		$user = get_userdata( get_current_user_id() );
		$key  = get_password_reset_key( $user );

		$template = WLD_Other::get_template_mail(
			'verify-email',
			array(
				'key'  => $key,
				'user' => $user->user_login
			),
		);

		return WLD_Mail::mail(
			$user->user_email,
			'Verify Email',
			$template
		);
	}

	public static function register_completed() {
		check_ajax_referer( 'ajax-nonce', 'nonce' );

		if ( ! is_user_logged_in() ) {
			wp_send_json_error( 'You are not allowed to use this form, please <a href="/account/login">login to your account</a>.' );
		}
		$want_born_again_looking = (string) $_POST['wantBornAgainLooking'];
		$born_again_looking      = (string) $_POST['bornAgainLooking'];
		$born_again              = (string) $_POST['bornAgain'];
		$have_kids               = ucfirst( $_POST['haveKids'] );
		$church_attendance       = (string) $_POST['churchAttendance'];
		$want_kids               = (string) $_POST['wantKids'];
		$occupation              = (string) $_POST['occupation'];
		$mirital_status          = (string) $_POST['miritalStatus'];
		$level_education         = (string) $_POST['levelOfEducation'];
		$array_select_options    = (array) $_POST['arraySelectOptions'];
		$ages_range              = array(
			'min' => (int) $_POST['agesRangeMin'],
			'max' => (int) $_POST['agesRangeMax'],
		);
		$distance                = ( isset( $_POST['distance']['distance_mi'] ) ) ? ( array(
			'distance_mi' => $_POST['distance']['distance_mi'],
			'location'    => $_POST['distance']['location'],
			'x'           => $_POST['distance']['x'],
			'y'           => $_POST['distance']['y'],
		)
		) : ( (bool) $_POST['distance'] );

		if (
			empty( $church_attendance ) || empty( $want_kids )
			|| empty( $occupation ) || empty( $mirital_status )
			|| empty( $level_education ) ) {
			wp_send_json_error(
				array(
					'message' => 'Please fill in all fields.',
					'step'    => 'back',
				)
			);
		}

		$meta_keys = array(
			'_church_attendance'       => $church_attendance,
			'_want_kids'               => $want_kids,
			'_occupation'              => $occupation,
			'_mirital_status'          => $mirital_status,
			'_level_education'         => $level_education,
			'_ages_range'              => $ages_range,
			'_distance'                => $distance,
			'_want_born_again_looking' => str_replace( ' ', '', $want_born_again_looking ),
			'_born_again_looking'      => str_replace( ' ', '', $born_again_looking ),
			'_born_again'              => str_replace( ' ', '', $born_again ),
			'_have_kids'               => str_replace( ' ', '', $have_kids ),
		);

		foreach ( $meta_keys as $key => $value ) {
			add_user_meta(
				get_current_user_id(),
				$key,
				$value,
			);
		}

		$meta_keys_multiple = array(
			'artsAndEntertainment',
			'musicVariable',
			'leisureActivitiesVariable',
			'activatiesVariable',
			'interestsVariable',
		);
		foreach ( $meta_keys_multiple as $value ) {
			if ( ! isset( $array_select_options[ $value ] ) ) {
				continue;
			}
			update_user_meta(
				get_current_user_id(),
				$value,
				$array_select_options[ $value ],
			);
		}

		self::send_verify_email();

		wp_send_json_success();
	}

	public static function register() {
		check_ajax_referer( 'ajax-nonce', 'nonce' );

		$email_address    = (string) $_POST['emailAddress'];
		$password         = (string) $_POST['password'];
		$confirm_password = (string) $_POST['passwordConfirm'];
		$first_name       = (string) $_POST['firstName'];
		$last_name        = (string) $_POST['lastName'];
		$username         = (string) $_POST['username'];
		$birth_date       = (string) $_POST['birthDate'];
		$gender           = (string) $_POST['gender'];

		if ( username_exists( $username ) ) {
			wp_send_json_error(
				array(
					'message' => 'This username is already registered, please try another one.',
				)
			);
		}

		if ( ! empty( email_exists( $email_address ) ) ) {
			wp_send_json_error(
				array(
					'message' => 'This email is already registered, please try another one.',
					'step'    => 'back',
				)
			);
		}

		if ( ! filter_var( $email_address, FILTER_VALIDATE_EMAIL ) ) {
			wp_send_json_error(
				array(
					'message' => 'Please enter a valid email address. Example: nwda@example.com.',
					'step'    => 'back',
				)
			);
		}

		if ( ! validate_username( $username ) ) {
			wp_send_json_error(
				array(
					'message' => 'Please enter a valid username. Allowed characters: a-z _ - space . @',
				)
			);
		}

		if ( $password !== $confirm_password ) {
			wp_send_json_error(
				array(
					'message' => 'Passwords do not match.',
					'step'    => 'back',
				)
			);
		}

		$user_id = wp_create_user( $username, $password, $email_address );

		if ( is_wp_error( $user_id ) ) {
			wp_send_json_error( $user_id->get_error_message() );
		}
		wp_update_user(
			array(
				'ID'         => $user_id,
				'first_name' => $first_name,
				'last_name'  => $last_name,
			),
		);
		/*
		 * Add meta fields for new user
		 */
		$array_meta_fields = array(
			'_birth_date'  => $birth_date,
			'_gender'      => $gender,
			'_user_status' => array(
				'status' => 'free',
				'name'   => 'Free member',
			),
		);
		foreach ( $array_meta_fields as $key => $value ) {
			update_user_meta( $user_id, $key, $value );
		}
		/* end adding meta fields */

		self::login( $username, $password );

		$user = get_userdata( $user_id );

		wp_send_json_success( get_password_reset_key( $user ) );
	}

	public static function change_password() {
		check_ajax_referer( 'ajax-nonce', 'nonce' );

		$password         = (string) $_POST['password'];
		$confirm_password = (string) $_POST['confirmPassword'];

		if ( $password !== $confirm_password ) {
			wp_send_json_error( 'The entered passwords do not match. Try again' );
		}

		$account      = (string) $_POST['account'];
		$user_id      = get_user_by( 'login', $account );
		$get_userdata = get_userdata( $user_id->ID );
		$template     = WLD_Other::get_template_mail( 'new-password' );

		wp_set_password( $password, $user_id->ID );

		WLD_Mail::mail(
			$get_userdata->user_email,
			'Password Reset Completed',
			$template
		);

		wp_send_json_success();
	}

	public static function check_forgot_password( $login, $key ) {
		$user_id      = get_user_by( 'login', $login );
		$get_userdata = get_userdata( $user_id->ID );
		$key          = check_password_reset_key( $key, $get_userdata->user_login );

		if ( is_wp_error( $key ) ) {
			return $key->get_error_message();
		}

		get_password_reset_key( $get_userdata );

		return true;
	}

	public static function forgot_password() {
		check_ajax_referer( 'ajax-nonce', 'nonce' );

		$email = (string) $_POST['email'];
		$user  = get_user_by( 'login', $email );

		if ( false === $user && ! email_exists( $email ) ) {
			wp_send_json_error( 'This user does not exist.' );
		}

		if ( email_exists( $email ) ) {
			$user = get_user_by( 'email', $email );
		}

		$user     = get_userdata( $user->ID );
		$key      = get_password_reset_key( $user );
		$template = WLD_Other::get_template_mail(
			'forgot-password',
			array(
				'key'  => $key,
				'user' => $user,
			),
		);

		WLD_Mail::mail(
			$user->user_email,
			'Reset password',
			$template
		);

		wp_send_json_success();
	}

	public static function login( $username = '', $pass = '' ) {
		//check_ajax_referer( 'ajax-nonce', 'nonce' );

		$email    = $_POST['email'] ?? $username;
		$password = $_POST['password'] ?? $pass;
		$remember = (bool) $_POST['remember'];

		if ( empty( $email ) ) {
			wp_send_json_error( 'Cannot login with an empty username.' );
		}

		if ( empty( $password ) ) {
			wp_send_json_error( 'Cannot login a user with an empty password.' );
		}

		$auth = wp_authenticate( esc_attr( $email ), esc_attr( $password ) );

		if ( is_wp_error( $auth ) ) {
			if ( isset( $auth->errors['invalid_username'] ) ) {
				wp_send_json_error( 'Error: The username <strong>' . $email . '</strong> is not registered on this site. <a href="/account/register">Register</a>' );
			} elseif ( isset( $auth->errors['invalid_email'] ) ) {
				wp_send_json_error( 'Error: The email <strong>' . $email . '</strong> is not registered on this site. <a href="/account/register">Register</a>' );
			} elseif ( isset( $auth->errors['incorrect_password'] ) ) {
				wp_send_json_error( 'Error: You entered the wrong password for your account. <a href="/account/forgot-password">Forgot Password?</a>' );
			} else {
				wp_send_json_error( $auth->errors['incorrect_password'] );
			}
		}
		
		wp_signon(
			array(
				'user_login'    => $email,
				'user_password' => $password,
				'remember'      => $remember,
			),
		);

		if ( empty( $username ) ) {
			wp_send_json_success( get_home_url() . '/dashboard' );
		}
	}
}
