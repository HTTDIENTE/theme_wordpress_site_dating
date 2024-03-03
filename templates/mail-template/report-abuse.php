<?php
/**
 * @var array $args array with data about one event
 */
?>
<h1>Reported Abuse</h1>
<p>Abused account ID: <?php echo $args['user_id']; ?></p>
<p>
	Declared: <?php echo $args['declared_user_id']; ?>
	<a href="<?php echo WLD_Account::get_link_author( $args['declared_user_id'] ); ?>">View profile</a>
</p>
<p>Content: <?php echo $args['content']; ?></p>
<p>
	<a href="<?php echo WLD_Account::get_link_author( $args['user_id'] ); ?>" target="_blank">View abused profile</a>
</p>
