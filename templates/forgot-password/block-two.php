<?php
/**
 * @var array $args array with data about one event
 */
?>
<h1>Please Enter a New Password Below</h1>
<div class="block-write-information">
	<div class="form-row">
		<label for="forgot-password-new-password">New Password</label>
		<input id="forgot-password-new-password" type="password">
		<span id="password-show">Show</span>
	</div>
	<div class="form-row">
		<label for="forgot-password-confirm-password">Confirm a New Password</label>
		<input id="forgot-password-confirm-password" type="password">
		<span id="confirm-password-show">Show</span>
	</div>
	<div class="form-row buttons_wrap">
		<button id="confirm_password">Save</button>
		<p>
			<a id="generate-password" href="#">Generate password</a>
		</p>
		<input type="hidden" id="login_account" value="<?php echo $args['acc']; ?>">
		<strong class="wrap_error_ajax"></strong>
	</div>
</div>
