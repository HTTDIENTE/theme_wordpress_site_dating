<?php if ( is_user_logged_in() ) : ?>
	<div id="add-interest-popup" class="add-interest-popup edit-account-popup mfp-hide">
		<h2 class="title">Choose a few interests </h2>
		<div class="block-write-information">
			<div class="form-row search-block">
				<label for="search_interests_reg_block">Search Interests</label>
				<input type="text" id="search_interests_reg_block">
				<button class="close">X</button>
				<div class="wrap-interests-variable wrap-search-interests"><p class="error-search"></p></div>
			</div>
			<div class="form-row">
				<h3 class="sub-title">Sports and Fitness</h3>
				<div class="wrap-interests-variable">
					<?php foreach ( WLD_Other::get_interests( 'sports_and_fitness' ) as $row ) : ?>
						<?php
						$class_active = '';
						if ( ! empty( WLD_Account::get_userdata_custom( get_current_user_id() )->interests ) ) {
							if ( in_array( strtolower( $row ),
								WLD_Account::get_userdata_custom( get_current_user_id() )->interests, true ) ) {
								$class_active = 'class="active" ';
							}
						}
						?>
						<button <?php echo $class_active; ?>data-value="<?php echo str_replace( ' ', '_',
							strtolower( $row ) ); ?>"><?php echo ucfirst( $row ); ?></button>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="form-row">
				<h3 class="sub-title">Activities</h3>
				<div class="wrap-activities-variable">
					<?php foreach ( WLD_Other::get_interests( 'activities' ) as $row ) : ?>
						<?php
						$class_active = '';
						if ( ! empty( WLD_Account::get_userdata_custom( get_current_user_id() )->activities ) ) {
							if ( in_array( strtolower( $row ),
								WLD_Account::get_userdata_custom( get_current_user_id() )->activities, true ) ) {
								$class_active = 'class="active" ';
							}
						}
						?>
						<button <?php echo $class_active; ?>data-value="<?php echo str_replace( ' ', '_',
							strtolower( $row ) ); ?>"><?php echo ucfirst( $row ); ?></button>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="form-row">
				<h3 class="sub-title">Music</h3>
				<div class="wrap-music-variable">
					<?php foreach ( WLD_Other::get_interests( 'music' ) as $row ) : ?>
						<?php
						$class_active = '';
						if ( ! empty( WLD_Account::get_userdata_custom( get_current_user_id() )->music ) ) {
							if ( in_array( strtolower( $row ),
								WLD_Account::get_userdata_custom( get_current_user_id() )->music, true ) ) {
								$class_active = 'class="active" ';
							}
						}
						?>
						<button <?php echo $class_active; ?>data-value="<?php echo str_replace( ' ', '_',
							strtolower( $row ) ); ?>"><?php echo ucfirst( $row ); ?></button>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="form-row">
				<h3 class="sub-title">Leisure Activities</h3>
				<div class="wrap-music-variable">
					<?php foreach ( WLD_Other::get_interests( 'leisure_activities' ) as $row ) : ?>
						<?php
						$class_active = '';
						if ( ! empty( WLD_Account::get_userdata_custom( get_current_user_id() )->leisure_activities ) ) {
							if ( in_array( strtolower( $row ),
								WLD_Account::get_userdata_custom( get_current_user_id() )->leisure_activities,
								true ) ) {
								$class_active = 'class="active" ';
							}
						}
						?>
						<button <?php echo $class_active; ?>data-value="<?php echo str_replace( ' ', '_',
							strtolower( $row ) ); ?>"><?php echo ucfirst( $row ); ?></button>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="form-row">
				<h3 class="sub-title">Arts And Entertainment</h3>
				<div class="wrap-arts-and-entertainment-variable">
					<?php foreach ( WLD_Other::get_interests( 'arts_and_entertainment' ) as $row ) : ?>
						<?php
						$class_active = '';
						if ( ! empty( WLD_Account::get_userdata_custom( get_current_user_id() )->arts_and_other ) ) {
							if ( in_array( strtolower( $row ),
								WLD_Account::get_userdata_custom( get_current_user_id() )->arts_and_other, true ) ) {
								$class_active = 'class="active" ';
							}
						}
						?>
						<button <?php echo $class_active; ?>data-value="<?php echo str_replace( ' ', '_',
							strtolower( $row ) ); ?>"><?php echo ucfirst( $row ); ?></button>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="form-row buttons-wrap">
				<button id="button-save-interests">Save</button>
			</div>
		</div>
	</div>
<?php endif; ?>
