<?php
/**
 * @var array $args array with data about one event
 */
?>
<section id="section-tab-manage-account" data-value="manage-account-block">
	<div class="form-manage-account">
		<div class="form-row">
			<label for="field-name-and-last-name">Name and Last Name</label>
			<small>(Enter with a space, example: Alex Dallas)</small>
			<input type="text" placeholder="Example: Alex Dallas" id="field-name-and-last-name"
				   value="<?php echo $args['user']->first_name; ?> <?php echo $args['user']->last_name; ?>">
		</div>
		<div class="form-row">
			<label for="field-email-address">E-mail Address</label>
			<input type="text" placeholder="Example: neverwalkalone@example.com" id="field-email-address"
				   value="<?php echo $args['user']->user_email; ?>">
			<?php
			//if ( 'yes' !== get_user_meta( get_current_user_id(), '_verify_email', true ) ) {
			//echo '<p>Email is not verified, <a href="#" class="btn">confirm</a></p>';
			//}
			?>
		</div>
		<div class="form-row">
			<label for="field-username">Username</label>
			<input type="text" placeholder="Example: alexdallas" id="field-username"
				   value="<?php echo $args['user']->user_nicename; ?>">
		</div>
		<div class="form-row fields-password">
			<label for="field-current-password">Change Password</label>
			<div class="row">
				<input type="password" placeholder="Enter your current password" id="field-current-password">
				<span id="password-show"></span>
			</div>
			<div class="row">
				<input type="password" placeholder="Enter new password" id="field-new-password">
				<span id="confirm-password-show"></span>
			</div>
			<div class="row">
				<input type="password" placeholder="Confirm new password" id="field-confirm-new-password">
				<span id="new-password-show"></span>
			</div>
		</div>
		<div class="form-row">
			<p>Delete My Account</p>
			<span>It is possible to <a href="#edit-profile-delete-account" class="btn-delete-account" target="_blank"
									   rel="noopener">delete your account</a>, but it’s irreversible.
				Please be sure that you would like to do that.</span>
		</div>
		<strong class="wrap_error_ajax"></strong>
		<div class="form-row buttons-wrap">
			<button class="edit-profile-button-save">Save</button>
		</div>
	</div>
	<!-- Popup delete account -->
	<?php get_template_part( 'templates/popups/cycle/delete-account' ); ?>
</section>
