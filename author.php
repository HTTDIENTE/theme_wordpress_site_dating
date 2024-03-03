<?php
if ( ! is_user_logged_in() ) {
	exit( wp_safe_redirect( '/account/login' ) );
}
$author       = get_user_by( 'slug', get_query_var( 'author_name' ) );
$get_userdata = get_userdata( $author->ID );

if ( get_current_user_id() === $author->ID ) {
	exit( wp_safe_redirect( '/account/' ) );
}

/* Add viewing */
if ( 'true' !== WLD_Account::get_userdata_custom( get_current_user_id() )->browse_anonymously ) {
	if ( 'true' === WLD_Account::get_userdata_custom( $author->ID )->likes_and_views ) {
		$template = WLD_Other::get_template_mail(
			'viewing-profile',
			array(
				'user_viewing' => get_current_user_id(),
			),
		);

		WLD_Mail::mail(
			$get_userdata->user_email,
			'New viewing your profile',
			$template
		);
	}
	WLD_Account_Activity::account_viewed($author->ID);
}

get_header();
?>
<section id="user-account">
	<div class="inner">
		<div class="blocks-account">
			<?php get_template_part( 'templates/account/guest/block-one', '', array( 'user' => $get_userdata ) ); ?>
			<?php get_template_part( 'templates/account/guest/block-two', '', array( 'user' => $get_userdata ) ); ?>
			<?php get_template_part( 'templates/account/guest/block-three', '', array( 'user' => $get_userdata ) ); ?>
			<?php get_template_part( 'templates/popups/cycle/upgrade-to-see-photos' ); ?>
			<?php get_template_part( 'templates/popups/cycle/report-abuse' ); ?>
			<?php get_template_part( 'templates/popups/cycle/unblock-user' ); ?>
		</div>
	</div>
</section>
<?php
get_footer();
?>
