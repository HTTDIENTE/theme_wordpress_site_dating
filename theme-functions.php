<?php

WLD_Fonts::init( 'js' );
WLD_Account::init();
WLD_Account_Login::init();
WLD_Account_Edit::init();
WLD_Account_Activity::init();
WLD_Account_Matches::init();
WLD_Other::init();
WLD_Sms_Verification::init();
WLD_Buddypress::init();
WLD_BAM_Menu_Base::init();
WLD_GDRP::init();

WLD_Stripe_Api::init();
WLD_Stripe_Api_Payment::init();
WLD_Stripe_Api_Customer::init();
WLD_Stripe_Api_Subscription::init();
WLD_Stripe_Api_Webhook::init();

// Specify styles for .btn as in file styles.css
WLD_TinyMCE::add_editor_styles( '.btn', 'background-color:;color:#fff;' );

// Specify styles for login page
WLD_Login_Style::set( 'btn_bg', '#DF7466' );
WLD_Login_Style::set( 'btn_color', '#FFFFFF' );

// Add custom post types
WLD_CPT::add( 'testimonial' );
WLD_CPT::add( 'faq' );

// Add taxonomies
WLD_Tax::add(
	'faq_category',
	array(
		'object_type' => 'faq',
	)
);

// Add menus
WLD_Nav::add( 'Header Main' );
WLD_Nav::add( 'Header Second' );
WLD_Nav::add( 'Footer Main' );
WLD_Nav::add( 'Footer Links' );

// Add image sizes
WLD_Images::add_size( '0x55' );
WLD_Images::add_size( '70x70' );
WLD_Images::add_size( '80x80' );
WLD_Images::add_size( '100x100' );
WLD_Images::add_size( '200x200' );
WLD_Images::add_size( '300x300' );
WLD_Images::add_size( '378x128' );
WLD_Images::add_size( '408x0' );
WLD_Images::add_size( '513x0' );
WLD_Images::add_size( '550x0' );
WLD_Images::add_size( '590x0' );
WLD_Images::add_size( '650x0' );
WLD_Images::add_size( '700x0' );
WLD_Images::add_size( '1200x0' );
WLD_Images::add_size( '1903x0' );

add_action(
	'wp_enqueue_scripts',
	static function () {
		if ( ! is_user_logged_in() ) {
			wp_dequeue_style( 'dashicons' );
			wp_dequeue_style( 'bp-nouveau' );
			wp_dequeue_script( 'bp-widget-members' );
		}
	},
	20
);
