<div class="section-videos" data-value="my-profile-videos-block" style="display: none">
	<?php foreach ( WLD_Account::get_userdata_custom( get_current_user_id() )->videos as $video ) : ?>
		<div class="block">
			<video controls src="<?php echo $video; ?>"></video>
			<a href="#delete-video-popup" role="button" class="delete-btn">+</a>
		</div>
	<?php endforeach; ?>
	<div class="block drop-content">
		<label for="upload-video">Upload new video here<span>Upload video</span></label>
		<input type="file" id="upload-video" accept="video/*">
	</div>
</div>
