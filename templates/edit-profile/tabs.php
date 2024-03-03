<?php
/**
 * @var array $args array with data about one event
 */

?>
<section id="tabs-edit-profile">
	<div class="block-tabs">
		<?php
		$array_tabs = array(
			'manage-account'      => 'Manage Account',
			'manage-subscription' => 'Manage Subscription',
			'display-settings'    => 'Display Settings',
			'email-notifications' => 'Email Notifications',
			'sms-verification'    => 'SMS Verification',
			'blocked-users'       => 'Blocked Users',
		);
		?>
		<?php foreach ( $array_tabs as $key => $value ) : ?>
			<?php
			$active = ( $key . '-block' === $args['tab_name'] ) ? ( ' active' ) : ( '' );
			?>
			<button class="tab<?php echo $active; ?>" data-value="<?php echo $key; ?>">
				<?php echo $value; ?>
				<?php if ( 'blocked-users' === $key ) : ?>
					<span
						class="count-blocked-users"><?php echo count( WLD_Account_Activity::get_activity( 'blocked' ) ); ?></span>
				<?php endif; ?>
			</button>
		<?php endforeach; ?>
	</div>
</section>
