<?php
/* Template Name: Checkout */

if ( ! is_user_logged_in() ) {
	exit( wp_safe_redirect( '/dashboard/' ) );
}

if ( ! isset( $_GET['planAmount'] ) || ! isset( $_GET['interval'] ) || ! isset( $_GET['type'] ) ) {
	exit( wp_safe_redirect( '/account/upgrade-account' ) );
}

get_header();
?>
<section id="page-checkout">
	<div class="inner">
		<h1 class="title">Payment</h1>
        <p>Enter your debit/credit card details to upgrade your account.</p>
		<div class="blocks-checkout">
			<?php get_template_part( 'templates/checkout/block-one' ); ?>
		</div>
	</div>
</section>
<?php
get_footer();
?>
