<?php
/* Template Name: Forgot Password */

$token = ( isset( $_GET['token'] ) ) ? ( $_GET['token'] ) : ( '' ); //phpcs:Ignore
$acc   = ( isset( $_GET['acc'] ) ) ? ( $_GET['acc'] ) : ( '' ); //phpcs:Ignore

if ( isset( $token ) && ! empty( $token ) && true !== WLD_Account_Login::check_forgot_password( $acc, $token ) ) {
	wp_safe_redirect( '/account/forgot-password' );
	exit();
}

get_header();
?>
<section id="page-forgot-password">
	<div class="inner">
		<?php if ( empty( $token ) ) : ?>
			<?php get_template_part( 'templates/forgot-password/block-one' ); ?>
		<?php else : ?>
			<?php get_template_part( 'templates/forgot-password/block-two', '', array( 'acc' => $acc ) ); ?>
		<?php endif; ?>
	</div>
</section>
<?php
get_footer();
?>
