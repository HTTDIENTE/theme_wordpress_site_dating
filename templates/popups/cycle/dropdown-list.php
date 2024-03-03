<?php
/**
 * @var array $args array with data about one event
 */
?>
<button class="dots-dropdown" type="button">
	<span></span>
	<span></span>
	<span></span>
</button>
<ul class="dropdown-list" style="display: none;">
	<li class="delete">
		<?php if ( ! isset( $args['hide_delete_match'] ) && empty( WLD_Account_Activity::get_activity( 'delete-match',
				$args['ID'] ) ) ) : ?>
			<a href="#" class="delete-match-dropdown" data-user-id="<?php echo $args['ID']; ?>">Delete Match</a>
		<?php endif; ?>
	</li>
	<li class="report-abuse">
		<a href="#report-abuse-popup" data-user-id="<?php echo $args['ID']; ?>">Report Abuse</a>
	</li>
	<li class="user-block <?php echo ( ! empty( WLD_Account_Activity::get_activity( 'blocked',
		$args['ID'] ) ) ) ? ( 'hidden' ) : ( '' ); ?>" data-user-id="<?php echo $args['ID']; ?>">
		<a href="#" data-user-id="<?php echo $args['ID']; ?>">Block Profile</a>
	</li>
	<li class="user-unblock <?php echo ( empty( WLD_Account_Activity::get_activity( 'blocked',
		$args['ID'] ) ) ) ? ( 'hidden' ) : ( '' ); ?>" data-user-id="<?php echo $args['ID']; ?>">
		<a href="#edit-profile-user-unblock" data-user-id="<?php echo $args['ID']; ?>">Unblock User</a>
	</li>
</ul>
