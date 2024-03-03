<?php
/**
 * @var array $args array with data about one event
 */
?>
<div class="section-about" data-value="my-profile-about-block">
	<div class="left">
		<div class="block introduction">
			<h1 class="title">Introduction</h1>
			<button type="button" class="edit-btn"></button>
			<p class="introduction-label editable"
			   contenteditable="false"><?php echo WLD_Account::get_userdata_custom( get_current_user_id() )->description; ?></p>
			<div class="buttons-wrap">
				<button class="save">Save changes</button>
				<button class="cancel-btn">Cancel</button>
			</div>
		</div>
		<div class="block about-me">
			<h2 class="title">About Me</h2>
			<button type="button" class="edit-btn"></button>
			<div class="about-me-cycle">
				<?php
				$height = WLD_Account::get_userdata_custom( get_current_user_id() )->height;
				if ( ! empty( $height ) ) {
					$feet = floor( $height / 12 );
					$inch = $height % 12;
				}
				?>
				<div class="block height editable">
					<small>Height</small>
					<p class="height-ajax-selector" data-value="<?php echo esc_attr( $height ); ?>">
						<?php if ( $height ) : ?>
							<?php printf( '%d\' %d"', $feet, $inch ); ?>
						<?php endif; ?>
					</p>
					<div class="form-row height-wrapper">
						<div class="form-row">
							<label for="person-height-feet-1">Feet</label>
							<input type="number" id="person-height-feet-1"
								   value="<?php echo esc_attr( $feet ?? 0 ); ?>">
						</div>
						<div class="form-row">
							<label for="person-height-inch-1">Inches</label>
							<input type="number" id="person-height-inch-1" value="<?php echo esc_attr( $inch ?? 0 ); ?>"
								   defvalue="0">
						</div>
					</div>
				</div>
				<div class="block age editable">
					<small>Age</small>
					<p></p>
					<div class="form-row wrap-input-birthday">
						<?php
						$birth_date = WLD_Account::get_userdata_custom( get_current_user_id() )->birth_date;
						$birth_date = explode( '-', $birth_date );
						?>
						<div class="form-row">
							<label for="birthday-month-1">MM<sup>*</sup></label>
							<input type="number" id="birthday-month-1" value="<?php echo $birth_date[1]; ?>">
						</div>
						<div class="form-row">
							<label for="birthday-day-1">DD<sup>*</sup></label>
							<input type="number" id="birthday-day-1" value="<?php echo $birth_date[0]; ?>">
						</div>
						<div class="form-row">
							<label for="birthday-year-1">YYYY<sup>*</sup></label>
							<input type="number" id="birthday-year-1" value="<?php echo $birth_date[2]; ?>">
						</div>
					</div>
				</div>
				<div class="block body-type editable">
					<small>Body Type</small>
					<p class="body_type"><?php echo WLD_Account::get_userdata_custom( get_current_user_id() )->body_type; ?></p>
					<div class="form-row">
						<select id="body-type-select-1">
							<?php
							$fields = array(
								'Body Type',
								'Slim/Slender',
								'Athletic',
								'Average',
								'Muscular',
								'Curvy',
								'Heavy set',
							);
							?>
							<?php foreach ( $fields as $row ) : ?>
								<option <?php echo ( WLD_Account::get_userdata_custom( get_current_user_id() )->body_type === $row ) ? ( 'selected=""' ) : ( '' ); ?><?php echo ( 'Body Type' === $row ) ? ( 'disabled=""' ) : ( '' ); ?>><?php echo $row; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="block ethnicity editable">
					<small>Ethnicity</small>
					<p class="native_american"><?php echo WLD_Account::get_userdata_custom( get_current_user_id() )->ethnicity; ?></p>
					<div class="form-row">
						<select id="ethnicity-select-1">
							<?php
							$fields = array(
								'Ethnicity',
								'Caucasian',
								'Black',
								'Asian',
								'Hispanic',
								'Native American',
								'Middle Eastern',
								'Other',
							);
							?>
							<?php foreach ( $fields as $row ) : ?>
								<option <?php echo ( WLD_Account::get_userdata_custom( get_current_user_id() )->ethnicity === $row ) ? ( 'selected=""' ) : ( '' ); ?><?php echo ( 'Ethnicity' === $row ) ? ( 'disabled=""' ) : ( '' ); ?>><?php echo $row; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="block religion editable">
					<small>Religion</small>
					<p class="religion_anchor"><?php echo WLD_Account::get_userdata_custom( get_current_user_id() )->religion; ?></p>
					<div class="form-row">
						<select id="religion-select-1">
							<?php
							$fields = array(
								'Religion',
								'Anglican',
								'Apostolic',
								'Assembly of God',
								'Baptist',
								'Catholic',
								'Charismatic',
								'Christian Reformed',
								'Church of Christ',
								'Episcopilian',
								'Interdenominational',
								'Lutheran',
								'Messianic',
								'Methodist',
								'Nazarene',
								'Non-denominational',
								'None',
								'Orthodox',
								'Pentecostal',
								'Presbyterian',
								'Redeemed Christian Church of God',
								'Seventh-Day Adventist',
								'Southern Baptist',
								'Winners Chapel',
								'Other Religion',
							);
							?>
							<?php foreach ( $fields as $row ) : ?>
								<option <?php echo ( WLD_Account::get_userdata_custom( get_current_user_id() )->religion === $row ) ? ( 'selected=""' ) : ( '' ); ?><?php echo ( 'Religion' === $row ) ? ( 'disabled=""' ) : ( '' ); ?>><?php echo $row; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="block location editable">
					<small>City</small>
					<p class="location">
						<?php
						$location = WLD_Account::get_userdata_custom( get_current_user_id() )->distance;
						if ( ! is_array( $location ) ) {
							echo $location;
						} else {
							echo $location['location'];
						}
						?>
					</p>
					<div class="form-row">
						<label for="input-location">City</label>
						<input type="text" id="input-location" data-x="<?php echo $location['x'] ?? ''; ?>"
							   data-y="<?php echo $location['y'] ?? ''; ?>" class="pac-target-input input-location"
							   placeholder="Enter City" autocomplete="off"
							   value="<?php echo $location['location'] ?? 'City is unset'; ?>">
					</div>
				</div>
				<div class="block mirital-status editable">
					<small>Mirital Status</small>
					<p class="mirital_status"><?php echo WLD_Account::get_userdata_custom( get_current_user_id() )->mirital_status; ?></p>
					<div class="form-row">
						<select id="marital-status-select-1">
							<?php
							$fields = array(
								'Mirital Status',
								'Single',
								'Divorced',
								'Widow',
							);
							?>
							<?php foreach ( $fields as $row ) : ?>
								<option <?php echo ( WLD_Account::get_userdata_custom( get_current_user_id() )->mirital_status === $row ) ? ( 'selected=""' ) : ( '' ); ?><?php echo ( 'Mirital Status' === $row ) ? ( 'disabled=""' ) : ( '' ); ?>><?php echo $row; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="block church-attendance editable">
					<small>Church Attendance</small>
					<p class="church_attendance"><?php echo WLD_Account::get_userdata_custom( get_current_user_id() )->church_attendance; ?></p>
					<div class="form-row">
						<select id="church-attendance-1">
							<?php
							$fields = array(
								'Church Attendance',
								'Attend church every week',
								'Attend church once or twice a month',
								'Attend church several times in a year',
								'Attend church on special occasions',
								'Attend church every week and I am actively engaged as a volunteer',
							);
							?>
							<?php foreach ( $fields as $row ) : ?>
								<option <?php echo ( WLD_Account::get_userdata_custom( get_current_user_id() )->church_attendance === $row ) ? ( 'selected=""' ) : ( '' ); ?><?php echo ( 'Church Attendance' === $row ) ? ( 'disabled=""' ) : ( '' ); ?>><?php echo $row; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="block have-kids editable">
					<small>Have Kids</small>
					<p class="have_kids"><?php echo WLD_Account::get_userdata_custom( get_current_user_id() )->have_kids; ?></p>
					<div class="form-row">
						<div id="block-select-kids-1" role="group" aria-labelledby="select-kids-label-1">
							<span id="select-kids-label-1">Have Kids?</span>
							<label for="select-kids-yes-1">
								<input type="radio" id="select-kids-yes-1" name="select-kids"
									   data-value="yes" <?php checked( 'Yes',
									WLD_Account::get_userdata_custom( get_current_user_id() )->have_kids ); ?>>
								Yes
							</label>
							<label for="select-kids-no-1">
								<input type="radio" id="select-kids-no-1" name="select-kids"
									   data-value="no" <?php checked( 'No',
									WLD_Account::get_userdata_custom( get_current_user_id() )->have_kids ); ?>>
								No
							</label>
						</div>
					</div>
				</div>
				<div class="block want-kids editable">
					<small>Want Kids</small>
					<p class="want_kids"><?php echo WLD_Account::get_userdata_custom( get_current_user_id() )->want_kids; ?></p>
					<div class="form-row">
						<select id="want-kids-1">
							<?php
							$fields = array(
								'Want Kids',
								'Definitely',
								'Someday',
								'No way',
							);
							?>
							<?php foreach ( $fields as $row ) : ?>
								<option <?php echo ( WLD_Account::get_userdata_custom( get_current_user_id() )->want_kids === $row ) ? ( 'selected=""' ) : ( '' ); ?><?php echo ( 'Want Kids' === $row ) ? ( 'disabled=""' ) : ( '' ); ?>><?php echo $row; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="block born-again editable">
					<small>Born Again</small>
					<p class="born_again"><?php echo WLD_Account::get_userdata_custom( get_current_user_id() )->born_again; ?></p>
					<div class="form-row">
						<div id="block-select-born-1" role="group" aria-labelledby="block-select-born-label-1" class="">
							<span id="block-select-born-label-1">Born Again?</span>
							<label for="select-born-yes-1">
								<input type="radio" id="select-born-yes-1" name="select-born"
									   data-value="yes" <?php checked( 'yes',
									strtolower( WLD_Account::get_userdata_custom( get_current_user_id() )->born_again ) ); ?>>
								Yes
							</label>
							<label for="select-born-no-1">
								<input type="radio" id="select-born-no-1" name="select-born"
									   data-value="no" <?php checked( 'no',
									strtolower( WLD_Account::get_userdata_custom( get_current_user_id() )->born_again ) ); ?>>
								No
							</label>
						</div>
					</div>
				</div>
				<div class="block education editable">
					<small>Education</small>
					<p class="education education-value"><?php echo WLD_Account::get_userdata_custom( get_current_user_id() )->education; ?></p>
					<div class="form-row">
						<select id="level-of-education-1">
							<?php
							$fields = array(
								'Level of Education',
								'High School',
								'Some College',
								'Associate Degree',
								'Bachelor’s degree',
								'Graduate Degree',
								'PhD/Post-Doctoral',
							);
							?>
							<?php foreach ( $fields as $row ) : ?>
								<option <?php echo ( WLD_Account::get_userdata_custom( get_current_user_id() )->education === $row ) ? ( 'selected=""' ) : ( '' ); ?><?php echo ( 'Level of Education' === $row ) ? ( 'disabled=""' ) : ( '' ); ?>><?php echo $row; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="block occupation editable">
					<small>Occupation</small>
					<p class="content_manager"><?php echo WLD_Account::get_userdata_custom( get_current_user_id() )->occupation; ?></p>
					<div class="form-row">
						<label for="occupation-1">Occupation</label>
						<input type="text" id="occupation-1"
							   value="<?php echo WLD_Account::get_userdata_custom( get_current_user_id() )->occupation; ?>">
					</div>
				</div>
				<div class="block pets editable">
					<small>Pets</small>
					<p class="pets"><?php echo WLD_Account::get_userdata_custom( $args['user']->ID )->pets; ?></p>
					<div class="form-row">
						<select id="pets-1">
							<?php
							$fields = array(
								'Does have/love pets?',
								'Yes',
								'No',
							);
							?>
							<?php foreach ( $fields as $row ) : ?>
								<option <?php echo ( WLD_Account::get_userdata_custom( get_current_user_id() )->pets === $row ) ? ( 'selected=""' ) : ( '' ); ?><?php echo ( 'Does have/love pets?' === $row ) ? ( 'disabled=""' ) : ( '' ); ?>><?php echo $row; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="buttons-wrap">
					<button class="save">Save changes</button>
					<button class="cancel-btn">Cancel</button>
				</div>
			</div>
			<div class="complete-profile">
				<h3>Tell us more about yourself</h3>
				<p>Your account is <?php echo WLD_Account::completeness_profile(); ?>% complete, give more information
					about yourself in this section to get more attention and matches</p>
				<a href="#complete-profile-popup" class="btn">Complete Your Profile</a>
			</div>
		</div>
	</div>
	<div class="right">
		<div class="block interests">
			<h2 class="title">Interests</h2>
			<p class="interests_small" style="display: none;">
				<small>In order to save the current interests, click the "Save Changes" button</small>
			</p>
			<button type="button" class="edit-btn"></button>
			<div class="interests-wrap">
				<?php if ( ! empty( WLD_Account::get_userdata_custom( $args['user']->ID )->activities ) ) : ?>
					<?php foreach ( WLD_Account::get_userdata_custom( $args['user']->ID )->activities as $row ) : ?>
						<div class="interest">
							<button class="delete-btn">+</button>
							<span><?php echo ucfirst( $row ); ?></span>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
				<?php if ( ! empty( WLD_Account::get_userdata_custom( $args['user']->ID )->interests ) ) : ?>
					<?php foreach ( WLD_Account::get_userdata_custom( $args['user']->ID )->interests as $row ) : ?>
						<div class="interest">
							<button class="delete-btn">+</button>
							<span><?php echo ucfirst( $row ); ?></span>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
				<?php if ( ! empty( WLD_Account::get_userdata_custom( $args['user']->ID )->music ) ) : ?>
					<?php foreach ( WLD_Account::get_userdata_custom( $args['user']->ID )->music as $row ) : ?>
						<div class="interest">
							<button class="delete-btn">+</button>
							<span><?php echo ucfirst( $row ); ?></span>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
				<?php if ( ! empty( WLD_Account::get_userdata_custom( $args['user']->ID )->leisure_activities ) ) : ?>
					<?php foreach ( WLD_Account::get_userdata_custom( $args['user']->ID )->leisure_activities as $row ) : ?>
						<div class="interest">
							<button class="delete-btn">+</button>
							<span><?php echo ucfirst( $row ); ?></span>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
				<?php if ( ! empty( WLD_Account::get_userdata_custom( $args['user']->ID )->arts_and_other ) ) : ?>
					<?php foreach ( WLD_Account::get_userdata_custom( $args['user']->ID )->arts_and_other as $row ) : ?>
						<div class="interest">
							<button class="delete-btn">+</button>
							<span><?php echo ucfirst( $row ); ?></span>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
				<a href="#add-interest-popup" class="interest add-interest-btn">Add Interest</a>
			</div>
			<div class="buttons-wrap">
				<button class="save">Save changes</button>
				<button class="cancel-btn">Cancel</button>
			</div>
		</div>
		<?php if ( empty( WLD_Stripe_Api_Subscription::get_subscription( true ) ) ) : ?>
			<div class="block upgrade-account">
				<h3>Get all benefits<br> of premium account!</h3>
				<p>Open photos, send unlimited messages, check who likes you and more</p>
				<a href="/account/upgrade-account" class="btn">Upgrade Account</a>
			</div>
		<?php endif; ?>
	</div>
</div>
