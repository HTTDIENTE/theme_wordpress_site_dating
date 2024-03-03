<?php
/**
 * @var array $args array with data about one event
 */
?>
<?php if ( ! empty( WLD_Account_Activity::get_activity( 'favorite' ) ) ) : ?>
	<section class="section-activity-favorites" data-value="activity-favorites-block" style="display: none">
		<?php foreach ( WLD_Account_Activity::get_activity( 'favorite' ) as $row ) : ?>
			<?php
			if ( empty( get_userdata( $row->user_id ) ) ) {
				continue;
			}
			?>
			<div class="result">
				<a href="<?php echo WLD_Account::get_link_author( $row->item_id ); ?>">
					<div class="form-row">
						<div class="avatar-user">
							<?php if ( empty( WLD_Stripe_Api_Subscription::get_subscription( true ) ) ) : ?>
								<img
									src="<?php echo WLD_Account::get_userdata_custom( $row->item_id )->blur_avatar; ?>">
							<?php else : ?>
								<img src="<?php echo WLD_Account::get_userdata_custom( $row->item_id )->avatar; ?>">
							<?php endif; ?>
						</div>
						<div class="matches">
							<span
								class="match-percent"><?php echo WLD_Account_Matches::get_percent_matches( get_current_user_id(),
									$row->item_id ); ?></span>%
						</div>
					</div>
					<div class="form-row">
						<div class="name-user"
							 data-online="<?php echo WLD_Account::get_online_status( $row->item_id ); ?>">
							<?php echo get_userdata( $row->item_id )->first_name; ?> <?php echo get_userdata( $row->item_id )->last_name; ?>
							, <?php echo WLD_Account::get_userdata_custom( $row->item_id )->age; ?>
						</div>
					</div>
					<?php $location = WLD_Account::get_userdata_custom( $row->item_id )->distance; ?>
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
							<?php echo WLD_Account::get_userdata_custom( $row->item_id )->status_line; ?>
						</div>
					</div>
				</a>
				<div class="form-row">
					<button class="messanger btn-start-correspondence" data-user-id="<?php echo $row->item_id; ?>">
						Messages
					</button>
					<button class="like <?php echo ( ! empty( WLD_Account_Activity::get_activity( 'liked',
						$row->item_id ) ) ) ? ( 'active' ) : ( '' ); ?>"
							data-user-id="<?php echo $row->item_id; ?>">
						Like
					</button>
					<button class="favorite active"
							data-user-id="<?php echo $row->item_id; ?>">
						Add to Favorite
					</button>
				</div>
				<?php echo get_template_part( 'templates/popups/cycle/dropdown-list', null,
					array( 'ID' => $row->item_id ) ); ?>
			</div>
		<?php endforeach; ?>
	</section>
<?php else : ?>
	<section class="section-activity-viewed-me-no-premium no-visitors" data-value="activity-favorites-block" style="">
		<div class="wrapper">
			<div class="img">
				<img src="<?php echo get_stylesheet_directory_uri() . '/images/icon-wounded-heart.svg'; ?>" alt=" ">
			</div>
			<h2 class="title">You have no favorites</h2>
			<p>Make a first step to get more attention to your account</p>
			<a href="/matches/" class="btn">Go to Matches</a>
		</div>
	</section>
<?php endif; ?>
