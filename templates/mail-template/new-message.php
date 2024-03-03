<?php
/**
 * @var array $args array with data about one event
 */
?>
<h1>A new message!</h1>
<h3><?php echo get_userdata( $args['user_message'] )->user_nicename; ?> sent you a new message</h3>
<p>
	<a href="<?php echo get_home_url() . '/account/messages/#/conversation/' . $args['thread_id']; ?>">
		Look
	</a>
</p>
