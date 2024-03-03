<div class="row">
	<div class="account-cover-image">
		<?php if ( ! empty( WLD_Account::get_userdata_custom( get_current_user_id() )->cover_photo ) ) : ?>
			<img src="<?php echo WLD_Account::get_userdata_custom( get_current_user_id() )->cover_photo; ?>"
				 style="width: 60%;height:250px;">
		<?php endif; ?>
	</div>
	<div class="account-avatar">
		<img src="<?php echo WLD_Account::get_userdata_custom( get_current_user_id() )->avatar; ?>"
			 style="width:100px;height:100px;">
	</div>
	<div class="buttons-wrap">
		<a href="/account/edit-profile">Edit My Profile</a>
	</div>
</div>
