<?php
/**
 * @var array $args array with data about one event
 */
?>

<div class="row">
	<div class="profile-information">
		<div class="left">
			<div class="user-name">
				<div class="first">
					<span><?php echo $args['user']->first_name; ?></span>
				</div>
				<div class="last">
					<span><?php echo $args['user']->last_name; ?></span>
				</div>
			</div>
			<div class="user-status">
				<?php
				$user_status = WLD_Account::user_status( get_current_user_id() );
				?>
				<span data-value="<?php echo $user_status['status']; ?>"><?php echo $user_status['name']; ?></span>
			</div>
			<div class="user-status-description">
				<?php $status_line = WLD_Account::get_userdata_custom( get_current_user_id() )->status_line; ?>
				<?php if ( empty( $status_line ) || '-' === $status_line ) : ?>
					<p class="status-description editable empty" contenteditable="false"
					   title="Maximum length - 50 characters">Set Status</p>
				<?php else : ?>
					<p class="status-description editable" contenteditable="false"
					   title="Maximum length - 50 characters"><?php echo $status_line; ?></p>
				<?php endif; ?>
				<button class="edit-btn">Edit</button>
				<div class="buttons-wrap">
					<button class="save">Save changes</button>
					<button class="cancel-btn">Cancel</button>
				</div>
			</div>
			<div class="user-age">Age:
				<span><?php echo WLD_Account::get_userdata_custom( get_current_user_id() )->age; ?></span>
			</div>
			<div class="user-location">
				Location: <span>
					<?php
					$location = WLD_Account::get_userdata_custom( get_current_user_id() )->distance;
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
				<a href="/account/messages" class="messanger">
					Messages
					<span>0</span>
				</a>
				<a href="/activity?activity-likes" class="like">
					Liked
					<span>
						<?php
						$activity = WLD_Account_Activity::get_activity( 'liked', get_current_user_id() );
						foreach ( $activity as $key => $row ) {
							if ( empty( get_userdata( $row->user_id ) ) ) {
								unset( $activity[ $key ] );
							}
						}
						?>
						<?php echo count( $activity ); ?>
					</span>
				</a>
				<a href="/activity?activity-viewed-by-me" class="friends">
					<span>
						<?php
						$activity = WLD_Account_Activity::get_activity( 'viewing', get_current_user_id() );
						foreach ( $activity as $key => $row ) {
							if ( empty( get_userdata( $row->user_id ) ) ) {
								unset( $activity[ $key ] );
							}
						}

						echo count( $activity );
						?>
					</span>
				</a>
				<a href="/activity?activity-favorites" class="favorite">Favorites
					<span>
						<?php
						$activity = WLD_Account_Activity::get_activity( 'favorite' );
						foreach ( $activity as $key => $row ) {
							if ( empty( get_userdata( $row->user_id ) ) ) {
								unset( $activity[ $key ] );
							}
						}

						echo count( $activity );
						?>
					</span>
				</a>
				<?php if ( WLD_Account::get_fields( 'uncompleted' ) ) : ?>
					<a href="#complete-account-popup" class="dynamics">
						<span><?php echo WLD_Account::completeness_profile(); ?>%</span>
					</a>
				<?php else : ?>
					<a href="javascript:void(0);" class="dynamics disabled">
						<span><?php echo WLD_Account::completeness_profile(); ?>%</span>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
