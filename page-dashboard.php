<?php
/* Template Name: Dashboard */
if ( ! is_user_logged_in() ) {
	exit( wp_safe_redirect( '/account/login' ) );
}

$get_userdata = get_userdata( get_current_user_id() );

get_header();
?>
<section id="page-dashboard">
	<div class="inner">
		<div class="blocks-dashboard">
			<?php get_template_part( 'templates/dashboard/block-one' ); ?>
			<?php get_template_part( 'templates/dashboard/block-two', '', array( 'user' => $get_userdata ) ); ?>
			<?php get_template_part( 'templates/dashboard/block-three' ); ?>
			<?php get_template_part( 'templates/popups/cycle/unblock-user' ); ?>
			<?php get_template_part( 'templates/popups/cycle/report-abuse' ); ?>
		</div>
	</div>
</section>
<?php
get_footer();
?>
