<?php
/**
 * @var array $args array with data about one event
 */
?>
<?php if ( ! empty( WLD_Stripe_Api_Subscription::get_subscription( true ) ) ) : ?>
	<?php if ( ! empty( WLD_Account_Activity::get_activity( 'viewing', get_current_user_id() ) ) ) : ?>
		<section class="section-activity-viewed-me" data-value="activity-viewed-me-block" style="display: none">
			<?php foreach ( WLD_Account_Activity::get_activity( 'viewing', get_current_user_id() ) as $row ) : ?>
				<?php
				if ( empty( get_userdata( $row->user_id ) ) ) {
					continue;
				}
				?>
				<div class="result">
					<a href="<?php echo WLD_Account::get_link_author( $row->user_id ); ?>">
						<div class="form-row">
							<div class="avatar-user">
								<?php if ( empty( WLD_Stripe_Api_Subscription::get_subscription( true ) ) ) : ?>
									<img
										src="<?php echo WLD_Account::get_userdata_custom( $row->user_id )->blur_avatar; ?>">
								<?php else : ?>
									<img src="<?php echo WLD_Account::get_userdata_custom( $row->user_id )->avatar; ?>">
								<?php endif; ?>
							</div>
							<div class="matches">
								<span
									class="match-percent"><?php echo WLD_Account_Matches::get_percent_matches( get_current_user_id(),
										$row->user_id ); ?></span>%
							</div>
						</div>
						<div class="form-row">
							<div class="name-user"
								 data-online="<?php echo WLD_Account::get_online_status( $row->user_id ); ?>">
								<?php echo get_userdata( $row->user_id )->first_name; ?> <?php echo get_userdata( $row->user_id )->last_name; ?>
								, <?php echo WLD_Account::get_userdata_custom( $row->user_id )->age; ?>
							</div>
						</div>
						<?php $location = WLD_Account::get_userdata_custom( $row->user_id )->distance; ?>
						<?php if ( ! empty( $location['location'] ) && '-' !== $location['location'] ) : ?>
							<div class="form-row">
								<div class="location-user">
									<?php
									if ( ! is_array( $location ) ) {
										echo $location;
									} else {
										echo $location['location'];
									}
									?>
								</div>
							</div>
						<?php endif; ?>
						<div class="form-row">
							<div class="status-user">
								<?php echo WLD_Account::get_userdata_custom( $row->user_id )->status_line; ?>
							</div>
						</div>
					</a>
					<div class="form-row">
						<button class="messanger btn-start-correspondence" data-user-id="<?php echo $row->user_id; ?>">
							Messages
						</button>
						<a class="like <?php echo ( ! empty( WLD_Account_Activity::get_activity( 'liked',
							$row->user_id ) ) ) ? ( 'active' ) : ( '' ); ?>"
						   data-user-id="<?php echo $row->user_id; ?>">
							Like
						</a>
						<a class="favorite <?php echo ( ! empty( WLD_Account_Activity::get_activity( 'favorite',
							$row->user_id ) ) ) ? ( 'active' ) : ( '' ); ?>"
						   data-user-id="<?php echo $row->user_id; ?>">
							Add to Favorite
						</a>
					</div>
					<?php echo get_template_part( 'templates/popups/cycle/dropdown-list', null,
						array( 'ID' => $row->user_id ) ); ?>
				</div>
			<?php endforeach; ?>
		</section>
	<?php else : ?>
		<section class="section-activity-viewed-me-no-premium no-visitors" data-value="activity-viewed-me-block"
				 style="display: none">
			<div class="wrapper">
				<div class="img">
					<img src="<?php echo get_stylesheet_directory_uri() . '/images/icon-wounded-heart.svg'; ?>" alt=" ">
				</div>
				<h2 class="title">You have no new visitors</h2>
				<p>Make a first step to get more attention to your account</p>
				<a href="/matches/" class="btn">Go to Matches</a>
			</div>
		</section>
	<?php endif; ?>
<?php else : ?>
	<?php if ( ! empty( WLD_Account_Activity::get_activity( 'viewing', get_current_user_id() ) ) ) : ?>
		<section class="section-activity-viewed-me-no-premium" data-value="activity-viewed-me-block"
				 style="display: none">
			<div class="wrapper">
				<div class="left">
					<?php foreach (
						WLD_Account_Activity::get_activity( 'viewing', get_current_user_id(), 'LIMIT 5' ) as $row
					) : ?>
						<?php
						if ( empty( get_userdata( $row->user_id ) ) ) {
							continue;
						}
						?>
						<div class="result">
							<div class="form-row">
								<div class="avatar-user">
									<?php if ( empty( WLD_Stripe_Api_Subscription::get_subscription( true ) ) ) : ?>
										<img
											src="<?php echo WLD_Account::get_userdata_custom( $row->user_id )->blur_avatar; ?>">
									<?php else : ?>
										<img
											src="<?php echo WLD_Account::get_userdata_custom( $row->user_id )->avatar; ?>">
									<?php endif; ?>
								</div>
								<div class="matches">
									<span class="match-percent">-</span>%
								</div>
							</div>
							<div class="form-row">
								<div class="name-user">
									Unknown User, -
								</div>
							</div>
							<div class="form-row">
								<div class="location-user">
									-
								</div>
							</div>
							<div class="form-row">
								<div class="status-user">
									This is my status line
								</div>
							</div>
							<div class="form-row">
								<a class="messanger" href="#">Messanger</a>
								<a class="like" href="#">Like</a>
								<a class="favorite" href="#">Add to Favorite</a>
							</div>
							<button class="dots-dropdown" type="button">
								<span></span>
								<span></span>
								<span></span>
							</button>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="right">
					<div class="img">
						<img src="<?php echo get_stylesheet_directory_uri() . '/images/icon-visitors.svg'; ?>" alt="">
						<span><?php echo count( WLD_Account_Activity::get_activity( 'viewing', get_current_user_id(),
								'LIMIT 5' ) ); ?></span>
					</div>
					<h2 class="title">You have <?php echo count( WLD_Account_Activity::get_activity( 'viewing',
							get_current_user_id(), 'LIMIT 5' ) ); ?> new profile visitors</h2>
					<p>To see who is interested in you, you have to upgrade your account.</p>
					<a href="/account/upgrade-account" class="btn">Upgrade Account</a>
				</div>
			</div>
		</section>
	<?php else : ?>
		<section class="section-activity-viewed-me-no-premium no-visitors" data-value="activity-viewed-me-block"
				 style="">
			<div class="wrapper">
				<div class="img">
					<img src="<?php echo get_stylesheet_directory_uri() . '/images/icon-wounded-heart.svg'; ?>" alt=" ">
				</div>
				<h2 class="title">You have no new visitors</h2>
				<p>Make a first step to get more attention to your account</p>
				<a href="/matches/" class="btn">Go to Matches</a>
			</div>
		</section>
	<?php endif; ?>
<?php endif; ?>
