<?php
/**
 * @var array $args array with data about one event
 */

$hide_online_status          = ( 'true' === get_user_meta( get_current_user_id(), '_hide_online_status',
		true ) ) ? ( 'checked="true"' ) : ( '' );
$hide_profile_browse_matches = ( 'true' === get_user_meta( get_current_user_id(), '_hide_profile_browse_matches',
		true ) ) ? ( 'checked="true"' ) : ( '' );
$browse_anonymously          = ( 'true' === get_user_meta( get_current_user_id(), '_browse_anonymously',
		true ) ) ? ( 'checked="true"' ) : ( '' );
?>
<section id="section-tab-display-settings" data-value="display-settings-block" style="display: none;">
	<div class="form-display-settings">
		<div class="form-row">
			<label for="field-hide-online-status">Hide Online Status</label>
			<input type="checkbox" id="field-hide-online-status"
				   data-value="hide_online_status" <?php echo $hide_online_status; ?>>
			<p>Allows user to hide presence indicator (aka "green dot") while they are actively using the site</p>
		</div>
		<div class="form-row">
			<label for="field-hide-profile-browse-matches">Hide Profile from Browse and Matches</label>
			<input type="checkbox" id="field-hide-profile-browse-matches"
				   data-value="hide_profile_browse_matches" <?php echo $hide_profile_browse_matches; ?>>
			<p>Makes your profile undiscoverable in Browse & Matches (but still accessible from the Inbox or activity
				lists)</p>
		</div>
		<div class="form-row">
			<label for="field-browse-anonymously">Browse Anonymously</label>
			<input type="checkbox" id="field-browse-anonymously"
				   data-value="browse_anonymously" <?php echo $browse_anonymously; ?>>
			<p>Allows you to browse profiles without triggering a view profile notification/list</p>
		</div>
	</div>
	<div class="form-row buttons-wrap">
		<button class="edit-profile-button-display-settings">Save</button>
		<strong class="wrap_error_ajax"></strong>
	</div>
	<?php get_template_part( 'templates/popups/cycle/subscribe-select-upgrade-account' ); ?>
</section>
