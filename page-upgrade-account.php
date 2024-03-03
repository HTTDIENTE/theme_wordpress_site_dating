<?php
/* Template Name: Upgrade Account */
get_header();

if ( ! is_user_logged_in() ) {
	exit( wp_safe_redirect( '/account/login' ) );
}
?>
<section id="upgrade-account">
	<div class="inner">
		<div class="blocks-upgrade-account">
			<?php get_template_part( 'templates/upgrade-account/block-one' ); ?>
			<?php get_template_part( 'templates/upgrade-account/block-two' ); ?>
			<?php get_template_part( 'templates/popups/cycle/upgrade-account-popup' ); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
