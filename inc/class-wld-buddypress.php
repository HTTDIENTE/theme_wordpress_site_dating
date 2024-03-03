<?php
// phpcs: Processing form data without nonce verification.:ignoreFile
class WLD_Buddypress {
	public static function init(): void {
		add_action( 'rest_api_init', array( static::class, 'rest_api' ),-1);
		add_action( 'wp_ajax_ajax_get_thread_dropdown', array( static::class, 'bp_dropdown_list' ) );

		add_action(
			'admin_init',
			static function () {
				remove_submenu_page( 'edit.php?post_type=bp-email', 'bp-emails-customizer-redirect' );
				remove_submenu_page( 'themes.php', 'bp-emails-customizer-redirect' );
			},
			-1
		);

		add_action( 'wp_ajax_ajax_send_message_for_user', array( static::class, 'send_message_for_user' ));

		add_action(
			'bp_messages_after_reply_form',
			static function( $thread_id ) {
				$user_id   = self::bp_check_start_dialogue( get_current_user_id(), 0, $thread_id );
				$add_class = ( empty( WLD_Stripe_Api_Subscription::get_subscription( true ) ) ) ? ( 'video-chat-start-popup' ) : ( 'video-chat-start' );
				echo '<div class="video-chat ' . $add_class . '" data-user-id="' . $user_id[0]->user_id . '" data-user-name="' . get_userdata( $user_id[0]->user_id )->user_nicename . '">
						' . wp_nonce_field( 'newThread' ) . '
						<a href="#">Video-chat</a>
						</div>';

			}
		);

		add_action(
			'init',
			array( self::class, 'deregister_styles' ),
			-1
		);

		add_filter(
			'bp_members_is_community_profile_enabled',
			static function() {
				return false;
			},
			10,
			1,
		);

		add_filter(
			'bp_register_email_post_type',
			static function ( $args ) {
				$args['show_ui'] = 1;
				return $args;
			}
		);

		add_filter(
			'bp_core_fetch_avatar_url',
			static function ( $avatar_img_tag, $params ) {
				$user_id              = absint( $params['item_id'] );

				return WLD_Account::get_userdata_custom( $user_id )->avatar;
			},
			10,
			2
		);

		add_filter(
			'bp_core_get_user_domain',
			static function( $domain, $user_id, $user_nicename = false, $user_login = false ) {
				if ( empty( $user_id ) ) {
					return null;
				}

				return WLD_Account::get_link_author( $user_id );
			},
			10,
			4
		);

		add_filter(
			'bp_core_mysteryman_src',
			static function () {
				return WLD_Account::get_avatar( 0, true );
			}
		);

		add_filter(
			'user_row_actions',
			static function( $actions = '' ) {
				unset( $actions['edit-profile'] );
				return $actions;
			},
			20,
			2,
		);
	}

	public static function send_message_for_user() : void {
		check_admin_referer( 'ajax-nonce', 'nonce' );

		$user_id = (int) $_POST['userId'];
		$result  = WLD_Buddypress::bp_check_start_dialogue( get_current_user_id(), $user_id );
		if ( ! empty( $result ) ) {
			wp_send_json_success( $result[0]->thread_id );
		}
		$result = ( new Better_Messages_Functions() )->create_new_conversation(
			array(
				get_current_user_id(),
				$user_id,
			)
		);
		wp_send_json_success( $result );
	}
	public static function bp_message_get_thread( int $thread_id ): object {
		global $wpdb;
		$current_user = get_current_user_id();
		$result       = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM {$wpdb->prefix}bp_messages_messages WHERE thread_id = {$thread_id} AND sender_id != {$current_user} AND message != '<!-- BBPM START THREAD -->'",
			),
		);
		return $result[0] ?? (object) array();
	}

	public static function bp_check_start_dialogue( int $user_id, int $item_id ) {
		global $wpdb;

		return $wpdb->get_results(
			$wpdb->prepare(
				"
						select t1.user_id, t2.user_id, t1.thread_id from wld_bm_message_recipients t1
						join wld_bm_message_recipients t2
						on t1.thread_id = t2.thread_id
						where t1.user_id != t2.user_id
						and t1.user_id = {$user_id} and t2.user_id = {$item_id}
						order by t1.user_id, t2.user_id ASC
				",
			),
		);
	}

	public static function rest_api() {
		register_rest_route('better-messages/v1', '/thread/(?P<id>\d+)/send', array(
			'methods' => 'POST',
			'callback' => array( static::class, 'send_message' ),
			'permission_callback' => array( static::class, 'can_reply' ),
			'args' => array(
				'id' => array(
					'validate_callback' => function ($param, $request, $key) {
						return is_numeric($param);
					}
				),
			),
		));
	}

	public static function send_message( WP_REST_Request $request ) {
		$result = ( new Better_Messages_Rest_Api() )->send_message( $request );
		if ( isset( $result['result'] ) && true === $result['result'] ) {
			$get_user = ( new Better_Messages_Functions() )->get_recipients_ids( $request->get_param( 'id' ) );
			$get_user = ( get_current_user_id() === (int) $get_user[0] ) ? ( $get_user[1] ) : ( $get_user[0] );
			if ( 'true' === WLD_Account::get_userdata_custom( $get_user )->new_messages ) {
				$template = WLD_Other::get_template_mail(
					'new-message',
					array(
						'user_message' => get_current_user_id(),
						'thread_id'    => $request->get_param('id'),
					),
				);

				WLD_Mail::mail(
					get_userdata( $get_user )->user_email,
					'You have a new message',
					$template
				);
			}
		}
		return $result;
	}

	public static function can_reply( WP_REST_Request $request ) {
		if ( empty( WLD_Stripe_Api_Subscription::get_subscription( true ) ) ) {
			return new WP_Error(
				'rest_forbidden',
				_x( 'Sorry, you are not allowed to reply into this conversation', 'Rest API Error', 'bp-better-messages' ),
			);
		}

		return ( new Better_Messages_Rest_Api )->can_reply( $request );
	}

	public static function bp_dropdown_list() {
		$get_user = ( new Better_Messages_Functions() )->get_recipients_ids( $_POST['thread_id'] );
		$get_user = ( get_current_user_id() === (int) $get_user[0] ) ? ( $get_user[1] ) : ( $get_user[0] );
		$messanger_dropdown = '<div class="chat-dropdown">';
		ob_start();
		get_template_part(
			'templates/popups/cycle/dropdown-list',
			null,
			array(
				'ID' => $get_user,
			),
		);
		$messanger_dropdown .= ob_get_clean();
		$messanger_dropdown .= '</div>';

		wp_send_json_success( $messanger_dropdown );
	}

	public static function deregister_styles() {
		if ( ! is_admin() ) {
			wp_deregister_style('hmk-style');
		}
	}
}
