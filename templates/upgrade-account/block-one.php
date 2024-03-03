<?php
$get_userdata = get_userdata( get_current_user_id() );
?>
<div class="row" <?php echo ( isset( $_GET['verifyEmail'] ) ) ? ( '' ) : ( 'style="display: none"' ); ?>>
	<?php if ( ! empty( $get_userdata->first_name ) ) : ?>
		<h1 class="upgrade-account-label-welcome">HERE WE ARE,<span><?php echo $get_userdata->first_name; ?>!</span>
		</h1>
	<?php endif; ?>
	<?php get_template_part( 'templates/register/progress-bar', '', array( 'type' => 'upgrade_account' ) ); ?>
	<h2 class="upgrade-account-label-recommend">We recommend now to upgrade your account to benefit from all
		features</h2>
	<div class="buttons-wrap">
		<a href="#section-select-plan" class="btn-upgrade-my-account">Upgrade My Account</a>
		<a href="/account" class="btn-go-to-profile-user">Go To My Profile</a>
	</div>
</div>
