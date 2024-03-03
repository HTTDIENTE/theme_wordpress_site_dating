<?php
/* Template Name: Account - Activity */
if ( ! is_user_logged_in() ) {
	exit( wp_safe_redirect( '/account/login' ) );
}

$get_userdata = get_userdata( get_current_user_id() );
get_header();
?>
<section id="activity-page">
	<div class="inner">
		<h1 class="screen-reader-text">Activity</h1>
		<?php get_template_part( 'templates/activity/tabs' ); ?>
		<?php get_template_part( 'templates/activity/tabs/likes' ); ?>
		<?php get_template_part( 'templates/activity/tabs/favorites' ); ?>
		<?php get_template_part( 'templates/activity/tabs/viewed-me' ); ?>
		<?php get_template_part( 'templates/activity/tabs/viewed-by-me' ); ?>
		<?php get_template_part( 'templates/popups/cycle/unblock-user' ); ?>
		<?php get_template_part( 'templates/popups/cycle/report-abuse' ); ?>
	</div>
</section>
<?php
get_footer();
?>
