<?php
/**
 * @var array $args array with data about one event
 */
?>
<div class="section-videos" data-value="users-videos-block" style="display: none">
	<?php if ( ! empty( WLD_Account::get_userdata_custom( $args['user']->ID )->videos ) ) : ?>
		<?php foreach ( WLD_Account::get_userdata_custom( $args['user']->ID )->videos as $video ) : ?>
			<div class="block">
				<video src="<?php echo $video; ?>" controls></video>
			</div>
		<?php endforeach; ?>
	<?php else : ?>
		<p class="message-empty-block">The user has not uploaded any videos yet.</p>
	<?php endif; ?>
</div>
