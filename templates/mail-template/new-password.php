<?php
/**
 * @var array $args array with data about one event
 */

$url = home_url();
?>
<h1>Password reset completed</h1>
<p>
	You have successfully reset your password for your account on
	<a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $url ); ?></a>
</p>
<p>
	If you did not make this change, email
	<a href="mailto:support@neverwalkalone.com">support@neverwalkalone.com</a>,
	so we can secure your account.
</p>
