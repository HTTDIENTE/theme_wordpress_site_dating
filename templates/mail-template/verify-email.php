<?php
/**
 * @var array $args array with data about one event
 */
?>
<h1>Email confirmation</h1>
<h3>To confirm your email address, click on the button</h3>
<p>
	<a href="/account/upgrade-account?acc=<?php echo $args['user']; ?>&verifyEmail=<?php echo $args['key']; ?>">
		Verify Email
	</a>
</p>
