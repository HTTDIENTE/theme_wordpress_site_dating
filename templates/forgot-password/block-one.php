<div class="block-write-information">
	<h1>Forgot Password?</h1>
	<h2>Enter your registered email below to receive password reset instructions</h2>
	<div class="form-row">
		<label for="forgot-password-input">E-mail Address</label>
		<input id="forgot-password-input" type="text">
	</div>
	<div class="form-row buttons_wrap">
		<button id="button-forgot-password">Send Reset Password</button>
		<p>
			Remember password? <a href="/account/login">Sign in</a>
		</p>
		<strong class="wrap_error_ajax"></strong>
	</div>
</div>
<div class="block-success" style="display: none;">
	<h1>Email Has Been Sent!</h1>
	<p>Please check your inbox and click in the received link to reset a password</p>
	<div class="form-row buttons_wrap">
		<p>
			Don`t receive the link? <a href="#" id="forgot-password-email-resend">Resend</a>
		</p>
	</div>
</div>
