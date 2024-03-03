<section id="recent-visitors" style="display: none;">
	<?php if ( ! empty( WLD_Stripe_Api_Subscription::get_subscription( true ) ) ) : ?>
		<?php if ( ! empty( WLD_Account_Activity::get_activity( 'viewing', get_current_user_id() ) ) ) : ?>
			<section id="section-recent-visitors">
				<div class="block-results">
					<div class="row">
						<?php foreach (
							WLD_Account_Activity::get_activity( 'viewing', get_current_user_id() ) as $row
						) : ?>
							<div class="result">
								<div class="form-row">
									<div class="avatar-user">
										<img
											src="<?php echo WLD_Account::get_userdata_custom( $row->user_id )->avatar; ?>">
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
								<div class="form-row">
									<button class="messanger btn-start-correspondence"
											data-user-id="<?php echo $row->user_id; ?>">Messages
									</button>
									<button
										class="like <?php echo ( ! empty( WLD_Account_Activity::get_activity( 'liked',
											$row->user_id ) ) ) ? ( 'active' ) : ( '' ); ?>"
										data-user-id="<?php echo $row->user_id; ?>">
										Like
									</button>
									<button
										class="favorite <?php echo ( ! empty( WLD_Account_Activity::get_activity( 'favorite',
											$row->user_id ) ) ) ? ( 'active' ) : ( '' ); ?>"
										data-user-id="<?php echo $row->user_id; ?>">
										Add to Favorite
									</button>
								</div>
								<?php echo get_template_part( 'templates/popups/cycle/dropdown-list', null,
									array( 'ID' => $row->user_id ) ); ?>
							</div>
						<?php endforeach; ?>
					</div>
					<div class="row best-match-block"></div>
				</div>
			</section>
		<?php else : ?>
			<section id="section-recent-visitors-no-premium-no-visitors">
				<div class="wrapper">
					<div class="img">
						<img src="<?php echo get_stylesheet_directory_uri() . '/images/icon-wounded-heart.svg'; ?>"
							 alt=" ">
					</div>
					<h2 class="title">You have no new visitors</h2>
					<p>Make a first step to get more attention to your account</p>
					<a href="/matches/" class="btn">Go to Matches</a>
				</div>
			</section>
		<?php endif; ?>
	<?php else : ?>
		<?php if ( ! empty( WLD_Account_Activity::get_activity( 'viewing', get_current_user_id() ) ) ) : ?>
			<section id="section-recent-visitors">
				<div class="block-results">
					<div class="section-activity-viewed-me-no-premium" data-value="activity-viewed-me-block">
						<div class="wrapper">
							<div class="left">
								<div class="result">
									<div class="form-row">
										<div class="avatar-user">
											<img
												src="<?php echo get_stylesheet_directory_uri(); ?>/images/block-user-2.jpg">
										</div>
										<div class="matches">
											<span class="match-percent">89</span>%
										</div>
									</div>
									<div class="form-row">
										<div class="name-user">
											Alex Dallas, 35
										</div>
									</div>
									<div class="form-row">
										<div class="location-user">
											California
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
								<div class="result">
									<div class="form-row">
										<div class="avatar-user">
											<img
												src="<?php echo get_stylesheet_directory_uri(); ?>/images/block-user-3.jpg">
										</div>
										<div class="matches">
											<span class="match-percent">89</span>%
										</div>
									</div>
									<div class="form-row">
										<div class="name-user">
											Alex Dallas, 35
										</div>
									</div>
									<div class="form-row">
										<div class="location-user">
											California
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
								<div class="result">
									<div class="form-row">
										<div class="avatar-user">
											<img
												src="<?php echo get_stylesheet_directory_uri(); ?>/images/block-user-1.jpg">
										</div>
										<div class="matches">
											<span class="match-percent">89</span>%
										</div>
									</div>
									<div class="form-row">
										<div class="name-user">
											Alex Dallas, 35
										</div>
									</div>
									<div class="form-row">
										<div class="location-user">
											California
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
							</div>
							<div class="right">
								<div class="img">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-visitors.svg"
										 alt=" ">
									<span><?php echo count( WLD_Account_Activity::get_activity( 'viewing',
											get_current_user_id(), 'LIMIT 5' ) ); ?></span>
								</div>
								<h2 class="title">You
									have <?php echo count( WLD_Account_Activity::get_activity( 'viewing',
										get_current_user_id(), 'LIMIT 5' ) ); ?> new profile visitors</h2>
								<p>To see who is interested in you, you have to upgrade your account.</p>
								<a href="/account/upgrade-account" class="btn">Upgrade Account</a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="result best-match-block"></div>
						<div class="result upgrade-account">
							<p>Get all benefits of premium contact!</p>
							<span>Open photos, send unlimited messages, check who likes you and more</span>
							<div class="buttons-wrap">
								<a href="/account/upgrade-account">Upgrade Account</a>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php else : ?>
			<section id="section-recent-visitors-no-premium-no-visitors">
				<div class="wrapper">
					<div class="img">
						<img src="<?php echo get_stylesheet_directory_uri() . '/images/icon-wounded-heart.svg'; ?>"
							 alt=" ">
					</div>
					<h2 class="title">You have no new visitors</h2>
					<p>Make a first step to get more attention to your account</p>
					<a href="/matches/" class="btn">Go to Matches</a>
				</div>
			</section>
		<?php endif; ?>
	<?php endif; ?>
</section>
