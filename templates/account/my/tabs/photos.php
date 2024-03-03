<div class="section-photos" data-value="my-profile-photos-block" style="display: none">
	<?php foreach ( WLD_Account::get_userdata_custom( get_current_user_id() )->photos as $photo ) : ?>
		<div class="block">
			<img src="<?php echo $photo; ?>">
			<a href="#delete-photo-popup" role="button" class="delete-btn">+</a>
		</div>
	<?php endforeach; ?>
	<div class="block drop-content">
		<label for="upload-photo">Drop your photo here to upload</label>
		<input type="file" id="upload-photo" accept="image/*">
		<a href="#photo-requirements-popup">Photo Requirements</a>
	</div>
</div>
