<?php
$user = get_userdata( get_current_user_id() );
$key  = check_password_reset_key( $_GET['token'] ?? '', $user->user_login );
/*
if ( is_wp_error( $key ) ) {
	exit( wp_safe_redirect( '/dashboard/' ) );
}*/

get_password_reset_key( $user );
?>
<div class="row" id="block-six" style="display:none;">
	<h1 class="box-header-text">Say this prayer:</h1>
	<?php get_template_part( 'templates/register/progress-bar' ); ?>
	<h2>Choose a few interests</h2>
	<div class="block-write-information">
		<div class="form-row">
			<span class="header-content">
				Dear God, the Bible says that if I confess with my mouth that Jesus is Lord and believe in my heart that You have raised Him from the dead,
				I shall be saved.  Therefore, I confess that Jesus is my Lord.  I make Him Lord of my life right now.  I believe in my heart that You raised Jesus from the dead.
				I renounce my past life with Satan and close the door to any of his devices.  I thank you for forgiving me of all my sins. In Jesus name.  Amen.
			</span>
		</div>
		<div class="form-row">
			<span class="content">
				Now, you’re sure you are a born-again Christian.  Find a Bible believing church and get plugged in.
			</span>
		</div>
		<div class="form-row buttons-wrap">
			<button id="button-next-page-6">Next</button>
			<strong class="wrap_error_ajax"></strong>
		</div>
	</div>
</div>
