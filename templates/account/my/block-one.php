<div class="row">
	<div class="account-cover-image">
		<?php if ( ! empty( WLD_Account::get_userdata_custom( get_current_user_id() )->cover_photo ) ) : ?>
			<img src="<?php echo WLD_Account::get_userdata_custom( get_current_user_id() )->cover_photo; ?>"
				 style="width: 60%;height:250px;">
		<?php endif; ?>
	</div>
	<div class="account-avatar">
		<img class="upload-avatar-img" id="upload-avatar-img"
			 src="<?php echo WLD_Account::get_userdata_custom( get_current_user_id() )->avatar; ?>"
			 style="width:100px;height:100px;">
		<label for="upload-avatar"></label>
		<input type="file" id="upload-avatar" accept="image/*">
		<img src="" alt="" id="upload-avatar-blur" style="display: none;">
	</div>
	<?php if ( 'verified' !== get_user_meta( get_current_user_id(), '_verified_user', true ) ) : ?>
		<div class="buttons-wrap">
			<a href="/account/edit-profile/?sms-verification" class="verified-btn">Get Verified</a>
		</div>
	<?php else : ?>
		<div class="buttons-wrap">
			<a class="verified-btn">Verified</a>
		</div>
	<?php endif; ?>
	<div class="change-bg">
		<label for="upload-profile-bg">Change Background Photo <span>Upload image <i>here</i></span></label>
		<input type="file" id="upload-profile-bg" accept="image/*">
	</div>
</div>
