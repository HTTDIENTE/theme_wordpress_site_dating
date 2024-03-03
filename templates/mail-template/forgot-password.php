<?php
/**
 * @var array $args array with data about one event
 */

$url = add_query_arg(
	array(
		'acc'   => $args['user']->user_login,
		'token' => $args['key'],
	),
	home_url( '/account/forgot-password' )
)
?>
<h1>Password reset</h1>
<p>You have submitted a password reset request for your account. Follow the link below to continue.</p>
<p>
	<a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $url ); ?></a>
</p>

<?php
// todo: It is not clear why this link is not visible in the emil.
/*
<span style="color:#ffffff">
	<a style="color:#ffffff;text-align:center;text-decoration:none;font-weight:500" href="<?php echo esc_url( $url ); ?>">
		or click here
	</a>
</span>
*/
?>
