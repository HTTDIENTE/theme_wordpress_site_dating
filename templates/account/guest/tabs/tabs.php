<?php
/**
 * @var array $args array with data about one event
 */
?>
<section id="tabs-account-information">
	<div class="block-tabs">
		<button type="button" class="tab active" data-value="user-about">About</button>
		<button type="button" class="tab" data-value="users-photos">Photos
			<span>
				<?php echo count( WLD_Account::get_userdata_custom( $args['user']->ID )->photos ); ?>
			</span>
		</button>
		<button type="button" class="tab" data-value="users-videos">Video
			<span>
				<?php echo count( WLD_Account::get_userdata_custom( $args['user']->ID )->videos ); ?>
			</span>
		</button>
	</div>
</section>
