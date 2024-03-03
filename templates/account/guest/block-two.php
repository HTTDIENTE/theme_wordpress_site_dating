<?php
/**
 * @var array $args array with data about one event
 */
?>
<div class="row">
	<div class="profile-information">
		<div class="left">
			<div class="user-name" data-online="<?php echo WLD_Account::get_online_status( $args['user']->ID ); ?>">
				<div class="first">
					<span><?php echo $args['user']->first_name; ?></span>
				</div>
				<div class="last">
					<span><?php echo $args['user']->last_name; ?></span>
				</div>
			</div>
			<?php if ( 'verified' === get_user_meta( $args['user']->ID, '_verified_user', true ) ) : ?>
				<div class="user-status">
					<span data-value="verified">Verified User</span>
				</div>
			<?php endif; ?>
			<div class="user-status-description">
				<p class="status-description"><?php echo WLD_Account::get_userdata_custom( $args['user']->ID )->status_line; ?></p>
			</div>
			<div class="user-age">Age:
				<span><?php echo WLD_Account::get_userdata_custom( $args['user']->ID )->age; ?></span>
			</div>
			<div class="user-location">
				<span>Location:
					<?php
					$location = WLD_Account::get_userdata_custom( $args['user']->ID )->distance;
					if ( ! is_array( $location ) ) {
						echo $location;
					} else {
						echo $location['location'];
					}
					?>
				</span>
			</div>
		</div>
		<div class="right">
			<div class="buttons-wrap">
				<button class="messanger btn-start-correspondence" data-user-id="<?php echo $args['user']->ID; ?>">
					Messages
				</button>
				<button class="like <?php echo ( ! empty( WLD_Account_Activity::get_activity( 'liked',
					$args['user']->ID ) ) ) ? ( 'active' ) : ( '' ); ?>"
						data-user-id="<?php echo $args['user']->ID; ?>">Liked
				</button>
				<button class="favorite <?php echo ( ! empty( WLD_Account_Activity::get_activity( 'favorite',
					$args['user']->ID ) ) ) ? ( 'active' ) : ( '' ); ?>"
						data-user-id="<?php echo $args['user']->ID; ?>">Favorites
				</button>
				<button class="video-chat btn-start-correspondence">Video chat</button>
			</div>
		</div>
	</div>
</div>
