<?php
/**
 * @var array $args array with data about one event
 */

?>
<div class="row">
	<div class="profile-information">
		<div class="left">
			<div class="user-name">
				<div class="first"><span><?php echo $args['user']->first_name; ?></span></div>
				<div class="last"><span><?php echo $args['user']->last_name; ?></span></div>
			</div>
			<?php
			$user_status = WLD_Account::user_status( get_current_user_id() );
			?>
			<?php if ( empty( WLD_Stripe_Api_Subscription::get_subscription( true ) ) ) : ?>
				<div class="user-status <?php echo ( 'free' !== $user_status['status'] ) ? ( 'premium' ) : ( '' ); ?>">
					<span data-value="<?php echo $user_status['status']; ?>"><?php echo $user_status['name']; ?></span>
				</div>
			<?php else : ?>
				<div class="user-status premium">
					<span data-value="premium">Premium</span>
				</div>
			<?php endif; ?>
			<div class="user-description">
				<?php echo WLD_Account::get_userdata_custom( $args['user']->ID )->status_line; ?>
			</div>
			<div class="user-age">
				Age: <span><?php echo WLD_Account::get_userdata_custom( $args['user']->ID )->age; ?></span>
			</div>
			<div class="user-location">
				<?php
				$location = WLD_Account::get_userdata_custom( $args['user']->ID )->distance;
				if ( ! is_array( $location ) ) {
					echo $location;
				} else {
					echo $location['location'];
				}
				?>
			</div>
		</div>
		<div class="right">
			<div class="buttons-wrap">
				<a href="/account/messages" class="messanger">
					Messages
					<span>0</span>
				</a>
				<a href="/activity?activity-likes" class="like">Liked
					<span>
						<?php if ( ! empty( WLD_Stripe_Api_Subscription::get_subscription( true ) ) ) : ?>
							<?php
							$activity = WLD_Account_Activity::get_activity( 'liked', get_current_user_id() );
							foreach ( $activity as $key => $row ) {
								if ( empty( get_userdata( $row->user_id ) ) ) {
									unset( $activity[ $key ] );
								}
							}
							?>
							<?php echo count( $activity ); ?>
						<?php else : ?>
							<?php
							$activity = WLD_Account_Activity::get_activity( 'liked', get_current_user_id(), 'LIMIT 5' );
							foreach ( $activity as $key => $row ) {
								if ( empty( get_userdata( $row->user_id ) ) ) {
									unset( $activity[ $key ] );
								}
							}
							?>
							<?php echo count( $activity ); ?>
						<?php endif; ?>
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
				<a href="#complete-account-popup" target="_blank" rel="noopener" class="dynamics">
					<span><?php echo WLD_Account::completeness_profile(); ?>%</span>
				</a>
			</div>
		</div>
	</div>
</div>
