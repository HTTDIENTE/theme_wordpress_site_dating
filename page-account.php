<?php
/* Template Name: Account User */
if ( ! is_user_logged_in() ) {
	exit( wp_safe_redirect( '/account/login' ) );
}

$get_userdata = get_userdata( get_current_user_id() );

add_action(
	'wp_enqueue_scripts',
	static function () {
		wp_enqueue_script( 'amazon-js-sdk', 'https://sdk.amazonaws.com/js/aws-sdk-2.726.0.min.js' ); //phpcs:Ignore
	},
	-1
);

get_header();
?>
<section id="page-account">
	<div class="inner">
		<div class="blocks-account">
			<?php get_template_part( 'templates/account/my/block-one', '', array( 'user' => $get_userdata ) ); ?>
			<?php get_template_part( 'templates/account/my/block-two', '', array( 'user' => $get_userdata ) ); ?>
			<?php get_template_part( 'templates/account/my/block-three', '', array( 'user' => $get_userdata ) ); ?>
			<?php get_template_part( 'templates/popups/cycle/add-interests' ); ?>
			<?php get_template_part( 'templates/popups/cycle/unblock-user' ); ?>
			<?php get_template_part( 'templates/popups/cycle/report-abuse' ); ?>
			<?php get_template_part( 'templates/popups/cycle/complete-profile' ); ?>
			<?php get_template_part( 'templates/popups/cycle/delete-photo' ); ?>
			<?php get_template_part( 'templates/popups/cycle/delete-video' ); ?>
			<?php get_template_part( 'templates/popups/cycle/photo-requirements' ); ?>
		</div>
	</div>
</section>
<?php
get_footer();
?>
