<?php
/**
 * @var array $args array with data about one event
 */
?>
<h1>You have a new fan</h1>
<h3><?php echo get_userdata( $args['user_liked'] )->user_nicename; ?> liked your profile</h3>
<p>
	<a href="<?php echo WLD_Account::get_link_author( $args['user_liked'] ); ?>">
		Redirect to profile <?php echo get_userdata( $args['user_liked'] )->user_nicename; ?>
	</a>
</p>
