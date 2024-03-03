<?php
/**
 * @var array $args array with data about one event
 */
?>
<h1>New viewing your profile</h1>
<h3><?php echo get_userdata( $args['user_viewing'] )->user_nicename; ?> visited your profile</h3>
<p>
	<a href="<?php echo WLD_Account::get_link_author( $args['user_viewing'] ); ?>">
		Redirect to profile <?php echo get_userdata( $args['user_viewing'] )->user_nicename; ?>
	</a>
</p>
