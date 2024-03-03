<?php
/* Template Name: Login */

if ( is_user_logged_in() ) {
	exit( wp_safe_redirect( '/dashboard/' ) );
}

get_header();
?>
<section id="page-login">
	<div class="inner">
		<h1 class="screen-reader-text">Login page</h1>
		<div class="form-row tabs">
			<div class="tab">
				<a href="/account/register">Register</a>
			</div>
			<div class="tab">
				<a href="/account/login" class="active">Log In</a>
			</div>
		</div>
		<div class="form-row blocks-socials">
			<?php echo do_shortcode( '[miniorange_social_login]' ); ?>
		</div>
		<p class="block-or"><span class="text-or">or</span></p>
		<div class="block-write-information">
			<div class="form-row">
				<label for="email_address">E-mail address<sup>*</sup></label>
				<input type="text" id="email_address">
			</div>
			<div class="form-row">
				<label for="password">Password<sup>*</sup></label>
				<input type="password" id="password">
			</div>
			<div class="form-row buttons-wrap">
				<div class="wrap-account-manipulation">
					<div class="form-row">
						<a href="/account/forgot-password">Forgot Password?</a>
					</div>
					<div class="form-row">
						<input type="checkbox" id="keep-me-logged-in">
						<label for="keep-me-logged-in">Remember me</label>
					</div>
				</div>
				<button class="sign-in-button">Sign In</button>
				<strong class="wrap_error_ajax"></strong>
				<p>Don’t have an account? <a href="/account/register">Sign up for free</a></p>
			</div>
		</div>
	</div>
</section>
<?php
get_template_part( 'templates/popups/cycle/account-deleted' );
get_footer();
?>
