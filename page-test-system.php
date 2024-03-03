<?php

/* Template Name: Test System */
get_header();
?>
<section id="section-new-matches">
	<div class="block-results">
		<div class="row">
			<?php foreach ( get_users( array( 'number' => 3 ) ) as $row ) : ?>
				<?php
				if ( get_current_user_id() === $row->ID ) {
					continue;
				}
				if ( ! empty( WLD_Account_Activity::get_activity( 'blocked', $row->ID ) ) ) {
					continue;
				}
				?>
				<div class="result result-<?php echo $row->ID; ?>">
				<div class="form-row">
					<div class="avatar-user">
						<img src="<?php echo WLD_Account::get_userdata_custom( $row->ID )->avatar; ?>" style="width:100px;height:100px;">
					</div>
					<div class="matches">
						<span class="match-percent">89</span>%
					</div>
				</div>
				<div class="form-row">
					<div class="name-user">
						<?php echo $row->first_name . ' ' . $row->last_name; ?>, <?php echo WLD_Account::get_userdata_custom( $row->ID )->age; ?>
					</div>
				</div>
				<div class="form-row">
					<div class="location-user">
						<?php
						$location = WLD_Account::get_userdata_custom( $row->ID )->distance;
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
						<?php echo WLD_Account::get_userdata_custom( $row->ID )->status_line; ?>
					</div>
				</div>
				<div class="form-row">
					<a class="messanger" target="_blank" rel="noopener">Messanger</a>
					<a class="like" target="_blank" rel="noopener">Like</a>
					<a class="favorite" target="_blank" rel="noopener">Add to Favorite</a>
				</div>
				<button class="dots-dropdown" type="button">
					<span></span>
					<span></span>
					<span></span>
				</button>
				<ul class="dropdown-list" style="display: none;">
					<li class="delete"><a href="#">Delete Match</a></li>
					<li class="report-abuse"><a href="#">Report Abuse</a></li>
					<?php if ( empty( WLD_Account_Activity::get_activity( 'blocked', $row->ID ) ) ) : ?>
						<li class="user-block" data-user-id="<?php echo $row->ID; ?>"><a href="#" data-user-id="<?php echo $row->ID; ?>">Block Profile</a></li>
					<?php endif; ?>
				</ul>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
get_footer();
?>
