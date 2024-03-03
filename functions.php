<?php
function _hook_fonts_load_optimization() {
}

function mini_orange_disable_styles(): bool {
	if ( is_admin() ) {
		return true;
	}

	$array_identifiers = array(
		'mo-openid-sl-wp-font-awesome',
		'mo-wp-style-icon',
		'mo-wp-bootstrap-social',
		'mo-wp-bootstrap-main',
	);

	foreach ( $array_identifiers as $value ) {
		wp_dequeue_style( $value );
		wp_deregister_style( $value );
	}

	return true;
}

add_action( 'wp_footer', 'mini_orange_disable_styles' );

add_filter(
	'wld_enqueue_get_theme_object',
	static function ( array $theme ): array {
		$attachmentsFormats = '';
		foreach ( Better_Messages()->settings['attachmentsFormats'] as $row ) {
			$attachmentsFormats .= $row . ', ';
		}
		$theme['accountId']                        = get_current_user_id();
		$theme['stripePublishKey']                 = get_field( 'wld_stripe_api_publish_key', 'option' );
		$theme['firstName']                        = get_user_meta( get_current_user_id(), 'first_name', true ) ?? '';
		$theme['lastName']                         = get_user_meta( get_current_user_id(), 'last_name', true ) ?? '';
		$theme['amazonAccessKey']                  = get_field( 'wld_amazon_access_key', 'option' );
		$theme['amazonSecretKey']                  = get_field( 'wld_amazon_secret_key', 'option' );
		$theme['userName']                         = get_userdata( get_current_user_id() )->user_nicename ?? '';
		$theme['betterMessagesAttachmentsFormats'] = $attachmentsFormats;
		$theme['betterMessagesAttachmentsMaxSize'] = Better_Messages()->settings['attachmentsMaxSize'];
		$theme['betterMessagesUnreadMessages']     = Better_Messages()->functions->get_total_threads_for_user( get_current_user_id(), 'unread' );
		$theme['stripeSubscription']               = WLD_Stripe_Api_Subscription::get_subscription( true );

		return $theme;
	}
);

function wld_replace_meta_where( $sql ) {
	global $wpdb;

	$sql['where'] = str_replace(
		array(
			"'_birth_date' AND CAST(mt1.meta_value AS SIGNED)",
			"'_birth_date' AND CAST(mt2.meta_value AS SIGNED)",
			"'_birth_date' AND CAST($wpdb->usermeta.meta_value AS SIGNED)",
		),
		array(
			"'_birth_date' AND TIMESTAMPDIFF(YEAR, STR_TO_DATE(mt1.meta_value, '%d-%m-%Y'), CURDATE())",
			"'_birth_date' AND TIMESTAMPDIFF(YEAR, STR_TO_DATE(mt2.meta_value, '%d-%m-%Y'), CURDATE())",
			"'_birth_date' AND TIMESTAMPDIFF(YEAR, STR_TO_DATE($wpdb->usermeta.meta_value, '%d-%m-%Y'), CURDATE()) ",
		),
		$sql['where']
	);

	return $sql;
}

function _hook_widgets_init() {
	register_sidebar(
		array(
			'id'            => 'blog_sidebar',
			'name'          => __( 'Blog Sidebar', 'parent-theme' ),
			'description'   => __( 'This is a sidebar for blog widgets', 'parent-theme' ),
			'before_widget' => '<div class="widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget__title">',
			'after_title'   => '</h2>',
		)
	);
}

add_action( 'widgets_init', '_hook_widgets_init' );

add_filter(
	'body_class',
	static function ( array $classes ): array {
		$blocks = get_field( 'content' );

		$first_layouts = array(
			'section-contact-us' => 'transparent-header',
		);

		if ( $blocks && isset( $first_layouts[ $blocks[0]['acf_fc_layout'] ] ) ) {
			$classes[] = $first_layouts[ $blocks[0]['acf_fc_layout'] ];
		}

		return $classes;
	}
);

add_filter(
	'wp_get_nav_menu_items',
	static function ( $items ) {
		if ( ! empty( WLD_Stripe_Api_Subscription::get_subscription( true ) ) ) {
			foreach ( $items as $key => $item ) {
				if ( 'Upgrade Account' === $item->title ) {
					unset( $items[ $key ] );
				}
			}
		}

		return $items;
	},
	null,
	3
);
