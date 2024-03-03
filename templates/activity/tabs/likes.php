<?php
/**
 * @var array $args array with data about one event
 */
?>
<?php if ( ! empty( WLD_Stripe_Api_Subscription::get_subscription( true ) ) ) : ?>
	<?php if ( ! empty( WLD_Account_Activity::get_activity( 'liked', get_current_user_id() ) ) ) : ?>
		<section class="section-activity-likes" data-value="activity-likes-block">
			<?php foreach ( WLD_Account_Activity::get_activity( 'liked', get_current_user_id() ) as $row ) : ?>
				<?php
				if ( empty( get_userdata( $row->user_id ) ) ) {
					continue;
				}
				?>
				<div class="item">
					<a href="<?php echo WLD_Account::get_link_author( $row->user_id ); ?>">
						<div class="avatar-user">
							<?php if ( empty( WLD_Stripe_Api_Subscription::get_subscription( true ) ) ) : ?>
								<img
									src="<?php echo WLD_Account::get_userdata_custom( $row->user_id )->blur_avatar; ?>">
							<?php else : ?>
								<img src="<?php echo WLD_Account::get_userdata_custom( $row->user_id )->avatar; ?>">
							<?php endif; ?>
						</div>
						<div class="content">
							<div class="name-user"
								 data-online="<?php echo WLD_Account::get_online_status( $row->user_id ); ?>">
								<?php echo get_userdata( $row->user_id )->first_name; ?> <?php echo get_userdata( $row->user_id )->last_name; ?>
								<span class="action">liked your profile</span>
							</div>
							<p><?php echo WLD_Other::get_time_ago( $row->date_recorded ); ?></p>
						</div>
					</a>
					<div class="buttons-wrap">
						<button class="messanger btn-start-correspondence" data-user-id="<?php echo $row->user_id; ?>">
							Messages
						</button>
						<a class="like <?php echo ( ! empty( WLD_Account_Activity::get_activity( 'liked',
							$row->user_id ) ) ) ? ( 'active' ) : ( '' ); ?>" href="#"
						   data-user-id="<?php echo $row->user_id; ?>">Like</a>
						<a class="btn" href="<?php echo WLD_Account::get_link_author( $row->user_id ); ?>">View
							Profile</a>
					</div>
				</div>
			<?php endforeach; ?>
		</section>
	<?php else : ?>
		<section class="section-activity-likes-no-premium no-likes" data-value="activity-likes-block">
			<div class="wrapper">
				<div class="img">
					<img src="<?php echo get_stylesheet_directory_uri() . '/images/icon-wounded-heart.svg'; ?>" alt=" ">
				</div>
				<h2 class="title">You have no likes yet</h2>
				<p>Make a first step to get more attention to your account</p>
				<a href="/matches/" class="btn">Go to Matches</a>
			</div>
		</section>
	<?php endif; ?>
<?php else : ?>
	<?php if ( ! empty( WLD_Account_Activity::get_activity( 'liked', get_current_user_id() ) ) ) : ?>
		<section class="section-activity-likes-no-premium" data-value="activity-likes-block">
			<div class="wrapper">
				<div class="row">
					<div class="avatar-wrapper">
						<?php foreach (
							WLD_Account_Activity::get_activity( 'liked', get_current_user_id(), 'LIMIT 5' ) as $row
						) : ?>
							<?php
							if ( empty( get_userdata( $row->user_id ) ) ) {
								continue;
							}
							?>
							<?php if ( empty( WLD_Stripe_Api_Subscription::get_subscription( true ) ) ) : ?>
								<img
									src="<?php echo WLD_Account::get_userdata_custom( $row->user_id )->blur_avatar; ?>">
							<?php else : ?>
								<img src="<?php echo WLD_Account::get_userdata_custom( $row->user_id )->avatar; ?>">
							<?php endif; ?>
						<?php endforeach; ?>
						<span><?php echo count( WLD_Account_Activity::get_activity( 'liked', get_current_user_id(),
								'LIMIT 5' ) ); ?></span>
					</div>
					<p>You’ve got <?php echo count( WLD_Account_Activity::get_activity( 'liked', get_current_user_id(),
							'LIMIT 5' ) ); ?> likes</p>
				</div>
				<p>To see who is interested in you, you have to upgrade your account.</p>
				<a href="/account/upgrade-account" class="btn">Upgrade Account</a>
			</div>
		</section>
	<?php else : ?>
		<section class="section-activity-likes-no-premium no-likes" data-value="activity-likes-block">
			<div class="wrapper">
				<div class="img">
					<img src="<?php echo get_stylesheet_directory_uri() . '/images/icon-wounded-heart.svg'; ?>" alt=" ">
				</div>
				<h2 class="title">You have no likes yet</h2>
				<p>Make a first step to get more attention to your account</p>
				<a href="/matches/" class="btn">Go to Matches</a>
			</div>
		</section>
	<?php endif; ?>
<?php endif; ?>
