<?php
/**
 * @var array $args array with data about one event
 */
?>
<div class="section-about" data-value="user-about-block">
	<div class="left">
		<div class="block introduction">
			<h1 class="title">Introduction</h1>
			<p class="introduction-label"><?php echo WLD_Account::get_userdata_custom( $args['user']->ID )->description; ?></p>
		</div>
		<div class="block about-me">
			<h2 class="title">About Me</h2>
			<div class="about-me-cycle">
				<?php
				$height = WLD_Account::get_userdata_custom( $args['user']->ID )->height;
				if ( ! empty( $height ) ) {
					$feet = floor( $height / 12 );
					$inch = $height % 12;
				}
				?>
				<div class="block height">
					<small>Height</small>
					<p><span class="height">
						<?php if ( $height ) : ?>
							<?php printf( '%d\' %d"', $feet, $inch ); ?>
						<?php endif; ?>
				    </span></p>
				</div>
				<?php if ( ! empty( WLD_Account::get_userdata_custom( $args['user']->ID )->body_type ) ) : ?>
					<div class="block body-type">
						<small>Body Type</small>
						<p class="body_type"><?php echo WLD_Account::get_userdata_custom( $args['user']->ID )->body_type; ?></p>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( WLD_Account::get_userdata_custom( $args['user']->ID )->ethnicity ) ) : ?>
					<div class="block ethnicity">
						<small>Ethnicity</small>
						<p class="native_american"><?php echo WLD_Account::get_userdata_custom( $args['user']->ID )->ethnicity; ?></p>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( WLD_Account::get_userdata_custom( $args['user']->ID )->religion ) ) : ?>
					<div class="block religion">
						<small>Religion</small>
						<p><?php echo WLD_Account::get_userdata_custom( $args['user']->ID )->religion; ?></p>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( WLD_Account::get_userdata_custom( $args['user']->ID )->distance ) ) : ?>
					<div class="block location">
						<small>Location</small>
						<p class="location">
							<?php
							$location = WLD_Account::get_userdata_custom( $args['user']->ID )->distance;
							if ( ! is_array( $location ) ) {
								echo $location;
							} else {
								echo $location['location'];
							}
							?>
						</p>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( WLD_Account::get_userdata_custom( $args['user']->ID )->mirital_status ) ) : ?>
					<div class="block mirital-status">
						<small>Mirital Status</small>
						<p class="mirital_status"><?php echo WLD_Account::get_userdata_custom( $args['user']->ID )->mirital_status; ?></p>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( WLD_Account::get_userdata_custom( $args['user']->ID )->church_attendance ) ) : ?>
					<div class="block church-attendance">
						<small>Church Attendance</small>
						<p class="church_attendance"><?php echo WLD_Account::get_userdata_custom( $args['user']->ID )->church_attendance; ?></p>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( WLD_Account::get_userdata_custom( $args['user']->ID )->have_kids ) ) : ?>
					<div class="block have-kids">
						<small>Have Kids</small>
						<p class="have_kids"><?php echo WLD_Account::get_userdata_custom( $args['user']->ID )->have_kids; ?></p>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( WLD_Account::get_userdata_custom( $args['user']->ID )->want_kids ) ) : ?>
					<div class="block want-kids">
						<small>Want Kids</small>
						<p class="want_kids"><?php echo WLD_Account::get_userdata_custom( $args['user']->ID )->want_kids; ?></p>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( WLD_Account::get_userdata_custom( $args['user']->ID )->education ) ) : ?>
					<div class="block education">
						<small>Education</small>
						<p class="education"><?php echo WLD_Account::get_userdata_custom( $args['user']->ID )->education; ?></p>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( WLD_Account::get_userdata_custom( $args['user']->ID )->occupation ) ) : ?>
					<div class="block occupation">
						<small>Occupation</small>
						<p class="content_manager"><?php echo WLD_Account::get_userdata_custom( $args['user']->ID )->occupation; ?></p>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( WLD_Account::get_userdata_custom( $args['user']->ID )->pets ) ) : ?>
					<div class="block pets">
						<small>Pets</small>
						<p class="pets"><?php echo WLD_Account::get_userdata_custom( $args['user']->ID )->pets; ?></p>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="right">
		<div class="block interests">
			<h2 class="title">Interests</h2>
			<div>
				<?php if ( ! empty( WLD_Account::get_userdata_custom( $args['user']->ID )->activities ) ) : ?>
					<?php foreach ( WLD_Account::get_userdata_custom( $args['user']->ID )->activities as $row ) : ?>
						<div class="interest"><?php echo ucfirst( $row ); ?></div>
					<?php endforeach; ?>
				<?php endif; ?>
				<?php if ( ! empty( WLD_Account::get_userdata_custom( $args['user']->ID )->interests ) ) : ?>
					<?php foreach ( WLD_Account::get_userdata_custom( $args['user']->ID )->interests as $row ) : ?>
						<div class="interest"><?php echo ucfirst( $row ); ?></div>
					<?php endforeach; ?>
				<?php endif; ?>
				<?php if ( ! empty( WLD_Account::get_userdata_custom( $args['user']->ID )->music ) ) : ?>
					<?php foreach ( WLD_Account::get_userdata_custom( $args['user']->ID )->music as $row ) : ?>
						<div class="interest"><?php echo ucfirst( $row ); ?></div>
					<?php endforeach; ?>
				<?php endif; ?>
				<?php if ( ! empty( WLD_Account::get_userdata_custom( $args['user']->ID )->arts_and_other ) ) : ?>
					<?php foreach ( WLD_Account::get_userdata_custom( $args['user']->ID )->arts_and_other as $row ) : ?>
						<div class="interest"><?php echo ucfirst( $row ); ?></div>
					<?php endforeach; ?>
				<?php endif; ?>
				<?php if ( ! empty( WLD_Account::get_userdata_custom( $args['user']->ID )->leisure_activities ) ) : ?>
					<?php foreach ( WLD_Account::get_userdata_custom( $args['user']->ID )->leisure_activities as $row ) : ?>
						<div class="interest"><?php echo ucfirst( $row ); ?></div>
					<?php endforeach; ?>
				<?php endif; ?>
				<?php
				if (
					empty( WLD_Account::get_userdata_custom( $args['user']->ID )->activities ) &&
					empty( WLD_Account::get_userdata_custom( $args['user']->ID )->interests ) &&
					empty( WLD_Account::get_userdata_custom( $args['user']->ID )->music ) &&
					empty( WLD_Account::get_userdata_custom( $args['user']->ID )->leisure_activities ) &&
					empty( WLD_Account::get_userdata_custom( $args['user']->ID )->arts_and_other )
				) :
					?>
					<small>The user did not indicate their interests</small>
				<?php endif; ?>
			</div>
		</div>
		<div class="block compatible">
			<h3>You are compatible on</h3>
			<div class="avatar-wrapper">
				<div class="account-avatar">
					<?php if ( empty( WLD_Stripe_Api_Subscription::get_subscription( true ) ) ) : ?>
						<img src="<?php echo WLD_Account::get_userdata_custom( $args['user']->ID )->blur_avatar; ?>"
							 style="width:100px;height:100px;">
					<?php else : ?>
						<img src="<?php echo WLD_Account::get_userdata_custom( $args['user']->ID )->avatar; ?>"
							 style="width:100px;height:100px;">
					<?php endif; ?>
				</div>
				<div class="account-avatar guest">
					<img src="<?php echo WLD_Account::get_userdata_custom( get_current_user_id() )->avatar; ?>"
						 style="width:100px;height:100px;">
				</div>
			</div>
			<div class="matches">
				<span class="match"><?php echo WLD_Account_Matches::get_percent_matches( get_current_user_id(),
						$args['user']->ID ); ?></span>%
			</div>
		</div>
	</div>
</div>
