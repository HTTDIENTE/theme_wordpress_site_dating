<section id="tabs-account-information">
	<div class="block-tabs">
		<button type="button" class="tab active" data-value="my-profile-about">About</button>
		<button type="button" class="tab" data-value="my-profile-photos">Photos
			<span>
				<?php echo count( WLD_Account::get_userdata_custom( get_current_user_id() )->photos ); ?>
			</span>
		</button>
		<button type="button" class="tab" data-value="my-profile-videos">Video
			<span>
				<?php echo count( WLD_Account::get_userdata_custom( get_current_user_id() )->videos ); ?>
			</span>
		</button>
	</div>
	<strong class="wrap_error_ajax"></strong>
</section>
