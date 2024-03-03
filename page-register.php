<?php
/* Template Name: Register */

if ( is_user_logged_in() && ! isset( $_GET['register'] ) ) {
	exit( wp_safe_redirect( '/dashboard' ) );
}
if ( 'yes' === get_user_meta( get_current_user_id(), '_verify_email', true ) ) {
	if ( isset( $_GET['authorizedSocial'] ) ) {
		exit( wp_safe_redirect( '/dashboard' ) );
	}
	exit( wp_safe_redirect( '/account/upgrade-account' ) );
}

get_header();

$user = get_userdata( get_current_user_id() );
?>
<section id="page-register">
	<div class="inner">
		<div class="blocks-register">
			<?php if ( is_user_logged_in() && isset( $_GET['register'] ) && 'true' === $_GET['register'] && empty( get_user_meta( get_current_user_id() ?? 0, '_ages_range', true ) ) ) : ?>
				<?php
				get_template_part( 'templates/register/blocks/step-3' );
				get_template_part( 'templates/register/blocks/step-4' );
				get_template_part( 'templates/register/blocks/step-5' );
				get_template_part( 'templates/register/blocks/step-6' );
				get_template_part(
					'templates/register/verify-email',
					'',
					array(
						'register' => true,
						'user'     => $user,
					)
				);
				?>
			<?php elseif ( is_user_logged_in() && ! empty( get_user_meta( get_current_user_id(), '_ages_range', true ) ) ) : ?>
				<?php get_template_part( 'templates/register/verify-email', '', array( 'user' => $user ) ); ?>
			<?php else : ?>
				<?php get_template_part( 'templates/register/blocks/step-1' ); ?>
				<?php get_template_part( 'templates/register/blocks/step-2' ); ?>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php
get_footer();
?>
