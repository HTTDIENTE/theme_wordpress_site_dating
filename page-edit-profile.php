<?php
/* Template Name: Edit Profile */
if ( ! is_user_logged_in() ) {
	exit( wp_safe_redirect( '/account/login' ) );
}

$get_userdata = get_userdata( get_current_user_id() );
$tab_name     = $_GET['tab_name'] ?? 'manage-account-block';

get_header();
?>
<section id="page-edit-profile">
	<div class="inner">
		<div class="blocks-edit">
			<?php get_template_part( 'templates/edit-profile/tabs', '', array( 'tab_name' => $tab_name ) ); ?>
			<?php get_template_part( 'templates/edit-profile/tabs/manage-account', '', array( 'user' => $get_userdata, 'tab_name' => $tab_name ) ); ?>
			<?php get_template_part( 'templates/edit-profile/tabs/manage-subscription', '', array( 'user' => $get_userdata, 'tab_name' => $tab_name ) ); ?>
			<?php get_template_part( 'templates/edit-profile/tabs/display-settings', '', array( 'user' => $get_userdata, 'tab_name' => $tab_name ) ); ?>
			<?php get_template_part( 'templates/edit-profile/tabs/email-notifications', '', array( 'user' => $get_userdata, 'tab_name' => $tab_name ) ); ?>
			<?php get_template_part( 'templates/edit-profile/tabs/sms-verification', '', array( 'user' => $get_userdata, 'tab_name' => $tab_name ) ); ?>
			<?php get_template_part( 'templates/edit-profile/tabs/blocked-users', '', array( 'user' => $get_userdata, 'tab_name' => $tab_name ) ); ?>
			<?php get_template_part( 'templates/popups/cycle/unblock-user' ); ?>
		</div>
	</div>
</section>
<?php
get_footer();
