<?php /** @var array $args array with data about one event */ ?>
<section id="activity-tabs">
	<div class="block-tabs">
		<button type="button" class="tab active" data-value="activity-likes">
			Likes
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
		</button>
		<button type="button" class="tab" data-value="activity-favorites">
			Favorites
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
		</button>
		<button type="button" class="tab" data-value="activity-viewed-me">
			Viewed Me
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
		</button>
		<button type="button" class="tab" data-value="activity-viewed-by-me">
			Viewed by Me
			<span>
				<?php
				$activity = WLD_Account_Activity::get_activity( 'viewing' );
				foreach ( $activity as $key => $row ) {
					if ( empty( get_userdata( $row->item_id ) ) ) {
						unset( $activity[ $key ] );
					}
				}

				echo count( $activity );
				?>
			</span>
		</button>
	</div>
</section>
