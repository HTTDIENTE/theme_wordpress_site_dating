<?php
/**
 * @var array $args array with data about one event
 */
?>
<div class="row">
	<div class="account-cover-image">
		<img src="<?php echo WLD_Account::get_userdata_custom( $args['user']->ID )->cover_photo; ?>">
	</div>
	<div class="account-avatar">
		<?php if ( empty( WLD_Stripe_Api_Subscription::get_subscription( true ) ) ) : ?>
			<img src="<?php echo WLD_Account::get_userdata_custom( $args['user']->ID )->blur_avatar; ?>"
				 style="width:100px;height:100px;">
		<?php else : ?>
			<img src="<?php echo WLD_Account::get_userdata_custom( $args['user']->ID )->avatar; ?>"
				 style="width:100px;height:100px;">
		<?php endif; ?>
	</div>
	<?php if ( empty( get_user_meta( get_current_user_id(), 'premium_subscription', true ) ) ) : ?>
		<div class="buttons-wrap">
			<a href="#upgrade-to-see-photos" class="view-photos">View Photos?</a>
		</div>
	<?php endif; ?>
	<div class="dropdown-wrapper">
		<div class="matches">
			<span class="match"><?php echo WLD_Account_Matches::get_percent_matches( get_current_user_id(),
					$args['user']->ID ); ?></span>% Match
		</div>
		<?php echo get_template_part( 'templates/popups/cycle/dropdown-list', null,
			array( 'ID' => $args['user']->ID ) ); ?>
	</div>
</div>
