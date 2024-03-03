<?php $get_preference_data = WLD_Account_Matches::get_match_preference_data(); ?>

<div class="block-personal-information">
	<div class="personal-information">
		<h1 class="personal-information-header">Match Preferences</h1>
		<div class="form-row">
			<select id="body-type-select-1">
				<option value="" <?php echo empty( $get_preference_data['body_type'] ) ? 'selected="selected"' : ''; ?>
						disabled="">Body Type
				</option>
				<?php
				$selected = empty( $get_preference_data['body_type'] ) ? 'selected="selected"' : '';
				$fields   = array(
					'Slim/Slender',
					'Athletic',
					'Average',
					'Muscular',
					'Curvy',
					'Heavy set',
				);
				?>
				<?php foreach ( $fields as $row ) : ?>
					<option <?php echo $row === $get_preference_data['body_type'] ? 'selected="selected"' : ''; ?>
						value="<?php echo $row; ?>"><?php echo $row; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-row">
			<select id="ethnicity-select-1">
				<?php
				echo empty( $get_preference_data['ethnicity'] ) ? 'selected="selected"' : '';
				?>
				<option value="" <?php echo empty( $get_preference_data['ethnicity'] ) ? 'selected="selected"' : ''; ?>
						disabled="">Ethnicity
				</option>
				<?php
				$selected = empty( $get_preference_data['ethnicity'] ) ? 'selected="selected"' : '';
				$fields   = array(
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
					<option <?php echo $row === $get_preference_data['ethnicity'] ? 'selected="selected"' : ''; ?>
						value="<?php echo $row; ?>"><?php echo $row; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-row">
			<select id="marital-status-select-1">
				<option
					value="" <?php echo empty( $get_preference_data['mirital_status'] ) ? 'selected="selected"' : ''; ?>
					disabled="">Marital Status
				</option>
				<?php
				$selected = empty( $get_preference_data['mirital_status'] ) ? 'selected="selected"' : '';
				$fields   = array(
					'Single',
					'Divorced',
					'Widow',
				);
				?>
				<?php foreach ( $fields as $row ) : ?>
					<option <?php echo $row === $get_preference_data['mirital_status'] ? 'selected="selected"' : ''; ?>
						value="<?php echo $row; ?>"><?php echo $row; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-row">
			<div class="form-row">
				<input type="checkbox" name="photo-select"
					   id="photo-select" <?php checked( 'true' === $get_preference_data['has_photo'] ); ?>>
				<label for="photo-select">Has photo?</label>
			</div>
			<div class="form-row">
				<input type="checkbox" name="online-now-select"
					   id="online-now-select" <?php checked( 'true' === $get_preference_data['is_online'] ); ?>>
				<label for="online-now-select">Online Now</label>
			</div>
		</div>
		<div class="form-row input-range-age-wrap">
			<label for="range-ages-trigger">
				<span class="ages-title">Ages:</span>
				<span
					id="min-age"><?php echo ( ! isset( $get_preference_data['range_ages']['min'] ) ) ? ( '18' ) : ( $get_preference_data['range_ages']['min'] ); ?></span>
				<span id="view-ages-range">-</span>
				<span
					id="max-age"><?php echo ( ! isset( $get_preference_data['range_ages']['max'] ) ) ? ( '40' ) : ( $get_preference_data['range_ages']['max'] ); ?></span>
			</label>
			<input type="range"
				   value="<?php echo ( ! isset( $get_preference_data['range_ages']['value'] ) ) ? ( '0,25' ) : ( $get_preference_data['range_ages']['value'] ); ?>"
				   id="range-ages-trigger" multiple="">
		</div>
		<div class="form-row input-range-height-wrap">
			<label for="range-height-trigger">
				<span class="height-title">Height:</span>
				<p id="min-height" data-value="">
					<span
						id="min-height-feet"><?php echo ( ! isset( $get_preference_data['range_height']['min'][0] ) ) ? ( '5' ) : ( $get_preference_data['range_height']['min'][0] ); ?></span>'
					<span
						id="min-height-inch"><?php echo ( ! isset( $get_preference_data['range_height']['min'][1] ) ) ? ( '0' ) : ( $get_preference_data['range_height']['min'][1] ); ?></span>"
				</p>
				<span id="view-height-range">-</span>
				<p id="max-height" data-value="">
					<span
						id="max-height-feet"><?php echo ( ! isset( $get_preference_data['range_height']['max'][0] ) ) ? ( '6' ) : ( $get_preference_data['range_height']['max'][0] ); ?></span>'
					<span
						id="max-height-inch"><?php echo ( ! isset( $get_preference_data['range_height']['max'][1] ) ) ? ( '5' ) : ( $get_preference_data['range_height']['max'][1] ); ?></span>"
				</p>
			</label>
			<input type="range"
				   value="<?php echo ( ! isset( $get_preference_data['range_height']['value'] ) ) ? ( '50,71' ) : ( $get_preference_data['range_height']['value'] ); ?>"
				   id="range-height-trigger" multiple="" class="">
		</div>
		<div class="form-row no-permission">
			<input type="checkbox"
				   id="upgrade-now-account" <?php checked( 'true' === $get_preference_data['show_verified_users'] ); ?>>
			<label for="upgrade-now-account">Show only verified users</label>
			<?php if ( empty( WLD_Stripe_Api_Subscription::get_subscription( true ) ) ) : ?>
				<a href="/account/upgrade-account" class="upgrade-now-link">Upgrade Now</a>
			<?php endif; ?>
		</div>
		<div class="form-row checkbox-wrapper">
			<div id="block-select-born-1" role="group" aria-labelledby="block-select-born-label-1">
				<span id="block-select-born-label-1">Born Again</span>
				<div class="row">
					<label for="select-born-yes-1"><input type="radio" id="select-born-yes-1" name="select-born"
														  data-value="yes" <?php checked( 'Yes' === $get_preference_data['born_again'] ); ?>>Yes</label>
					<label for="select-born-no-1"><input type="radio" id="select-born-no-1" name="select-born"
														 data-value="no" <?php checked( 'No' === $get_preference_data['born_again'] ); ?>>
						No</label>
				</div>
			</div>
		</div>
	</div>
	<div class="living-in">
		<h2 class="living-in-header">Living In</h2>
		<div class="form-row">
			<label for="input-location">Location</label>
			<input type="text" class="input-location" id="input-location"
				   data-x="<?php echo $get_preference_data['location_data']['x']; ?>"
				   data-y="<?php echo $get_preference_data['location_data']['y']; ?>" placeholder="Enter location"
				   value="<?php echo $get_preference_data['location_data']['location']; ?>">
		</div>
		<div class="form-row">
			<label for="input-location-within-mi">Within Mi (metres)</label>
			<input type="text" id="input-location-within-mi"
				   value="<?php echo $get_preference_data['location_data']['within_mi']; ?>">
		</div>
		<div class="form-row">
			<input type="checkbox"
				   id="input-location-globally" <?php checked( 'true' === $get_preference_data['location_data']['globally'] ); ?>>
			<label for="input-location-globally">Search Globally</label>
		</div>
	</div>
	<div class="life-style">
		<h2 class="life-style-header">Lifestyle</h2>
		<div class="form-row">
			<select id="church-attendance-select-1">
				<option
					value="" <?php echo empty( $get_preference_data['church_attendance'] ) ? 'selected="selected"' : ''; ?>
					disabled>Church Attendance
				</option>
				<?php
				$selected = empty( $get_preference_data['church_attendance'] ) ? 'selected="selected"' : '';
				$fields   = array(
					'Attend church every week',
					'Attend church once or twice a month',
					'Attend church several times in a year',
					'Attend church on special occasions',
					'Attend church every week and I am actively engaged as a volunteer',
				);
				?>
				<?php foreach ( $fields as $row ) : ?>
					<option <?php echo $row === $get_preference_data['church_attendance'] ? 'selected="selected"' : ''; ?>
						value="<?php echo $row; ?>"><?php echo $row; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-row">
			<select id="level-of-education-1">
				<option
					value="" <?php echo empty( $get_preference_data['level_of_education'] ) ? 'selected="selected"' : ''; ?>
					disabled="">Level of Education
				</option>
				<?php
				$selected = empty( $get_preference_data['level_of_education'] ) ? 'selected="selected"' : '';
				$fields   = array(
					'High School',
					'Some College',
					'Associate Degree',
					'Bachelor\'s degree',
					'Graduate Degree',
					'PhD/Post-Doctoral',
				);
				?>
				<?php foreach ( $fields as $row ) : ?>
					<option <?php echo $row === $get_preference_data['level_of_education'] ? 'selected="selected"' : ''; ?>
						value="<?php echo $row; ?>"><?php echo $row; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-row">
			<div id="block-select-kids-1" role="group" aria-labelledby="select-kids-label-1">
				<span id="select-kids-label-1">Have Kids?</span>
				<div class="row">
					<label><input type="radio" id="select-kids-yes-1" name="select-kids"
								  data-value="yes" <?php checked( 'Yes' === $get_preference_data['have_kids'] ); ?>>Yes</label>
					<label><input type="radio" id="select-kids-no-1" name="select-kids"
								  data-value="no" <?php checked( 'No' === $get_preference_data['have_kids'] ); ?>>
						No</label>
				</div>
			</div>
		</div>
		<div class="form-row">
			<label for="occupation">Occupation</label>
			<input type="text" placeholder="Occupation" id="occupation"
				   value="<?php echo $get_preference_data['occupation']; ?>">
		</div>
		<div class="form-row">
			<select id="pets-1">
				<option value="" <?php echo empty( $get_preference_data['pets'] ) ? 'selected="selected"' : ''; ?>
						disabled="">Does have/love pets?
				</option>
				<?php
				$selected = empty( $get_preference_data['pets'] ) ? 'selected="selected"' : '';
				$fields   = array(
					'Yes',
					'No',
				);
				?>
				<?php foreach ( $fields as $row ) : ?>
					<option <?php echo $row === $get_preference_data['pets'] ? 'selected="selected"' : ''; ?>
						value="<?php echo $row; ?>"><?php echo $row; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-row">
			<select id="want-kids-1">
				<option value="" <?php echo empty( $get_preference_data['want_kids'] ) ? 'selected="selected"' : ''; ?>
						disabled="">Want Kids<sup>*</sup></option>
				<?php
				$selected = empty( $get_preference_data['want_kids'] ) ? 'selected="selected"' : '';
				$fields   = array(
					'Definitely',
					'Someday',
					'No way'
				);
				?>
				<?php foreach ( $fields as $row ) : ?>
					<option <?php echo $row === $get_preference_data['want_kids'] ? 'selected="selected"' : ''; ?>
						value="<?php echo $row; ?>"><?php echo $row; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-row buttons-wrap">
			<button class="clear-all">Clear All</button>
			<button class="search-matches">Search</button>
		</div>
	</div>
</div>
