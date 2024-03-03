<?php
/**
 * @var array $args array with data about one event
 */

$new_messages    = ( 'true' === get_user_meta( get_current_user_id(), '_new_messages',
		true ) ) ? ( 'checked="true"' ) : ( '' );
$likes_and_views = ( 'true' === get_user_meta( get_current_user_id(), '_likes_and_views',
		true ) ) ? ( 'checked="true"' ) : ( '' );
$new_matches     = ( 'true' === get_user_meta( get_current_user_id(), '_new_matches',
		true ) ) ? ( 'checked="true"' ) : ( '' );
$promotions      = ( 'true' === get_user_meta( get_current_user_id(), '_promotions',
		true ) ) ? ( 'checked="true"' ) : ( '' );
?>
<section id="section-tab-email-notifications" data-value="email-notifications-block" style="display: none;">
	<div class="form-email-notifications">
		<div class="form-row">
			<label for="field-new-messages">New Messages</label>
			<input type="checkbox" id="field-new-messages" data-value="new-messages" <?php echo $new_messages; ?>>
			<p>Get emailed when you receive a new message</p>
		</div>
		<div class="form-row">
			<label for="field-likes-and-views">Likes and Views</label>
			<input type="checkbox" id="field-likes-and-views"
				   data-value="likes-and-views" <?php echo $likes_and_views; ?>>
			<p>Get emailed when someone likes you or visits your profile</p>
		</div>
		<div class="form-row">
			<label for="field-new-matches">New Matches</label>
			<input type="checkbox" id="field-new-matches" data-value="new-matches" <?php echo $new_matches; ?>>
			<p>Our best picks for you sent via email</p>
		</div>
		<div class="form-row">
			<label for="field-promotions">Promotions</label>
			<input type="checkbox" id="field-promotions" data-value="promotions" <?php echo $promotions; ?>>
			<p>Get emailed when we have a sale on subscriptions, and receive special offers from our partners and
				selected third parties</p>
		</div>
	</div>
	<div class="form-row buttons-wrap">
		<button class="edit-profile-button-email-notifications">Save</button>
	</div>
</section>
