<?php
/**
 * @var array $args array with data about one event
 */
?>
<div class="row" id="block-seven"
	 style="<?php echo ( isset( $args['register'] ) && true === $args['register'] ) ? ( 'display: none;' ) : ( '' ); ?>">
	<h1 class="box-header-text">Verify Your Email</h1>
	<div class="block-write-information">
		<p class="form-row">
			Almost there! An email containing verification
			instructions was sent to <a href="#"><?php echo $args['user']->user_email; ?></a>
		</p>
		<p class="form-row">
			Didn’t receive the email? <a href="#" class="resend_email">Resend email</a>
		</p>
	</div>
</div>
