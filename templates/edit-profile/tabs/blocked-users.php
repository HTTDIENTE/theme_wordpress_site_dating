<?php
/**
 * @var array $args array with data about one event
 */
?>
<section id="section-tab-blocked-users" data-value="blocked-users-block" style="display: none;">
	<div class="wrapper">
		<?php if ( ! empty( WLD_Account_Activity::get_activity( 'blocked' ) ) ) : ?>
			<?php foreach ( WLD_Account_Activity::get_activity( 'blocked' ) as $row ) : ?>
				<div class="result result-<?php echo $row->item_id; ?>" data-user-id="<?php echo $row->item_id; ?>">
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
						<div class="form-row">
							<div class="location-user">
								<?php
								$location = WLD_Account::get_userdata_custom( $row->item_id )->distance;
								if ( ! is_array( $location ) ) {
									echo $location;
								} else {
									echo $location['location'];
								}
								?>
							</div>
						</div>
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
						<button class="favorite <?php echo ( ! empty( WLD_Account_Activity::get_activity( 'favorite',
							$row->item_id ) ) ) ? ( 'active' ) : ( '' ); ?>"
								data-user-id="<?php echo $row->item_id; ?>">
							Add to Favorite
						</button>
					</div>
					<?php
					echo get_template_part(
						'templates/popups/cycle/dropdown-list',
						null,
						array(
							'ID'                => $row->item_id,
							'hide_delete_match' => true,
						)
					);
					?>
				</div>
			<?php endforeach; ?>
		<?php else : ?>
			<p>You don't have blocked users.</p>
		<?php endif; ?>
	</div>
</section>
