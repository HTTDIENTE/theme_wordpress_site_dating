<?php
$redirect = '';
if ( isset( $_GET['redirect'] ) ) {
	$redirect = '?redirect=' . $_GET['redirect'];
}

$user = get_userdata( get_current_user_id() );
$url_avatar = WLD_Account::get_avatar(
	get_current_user_id(),
);

?>
<?php echo '<div class="container">'; ?>
<div class="transparent_aria_close_header_inner"></div>
<aside class="menu-wrap" aria-hidden="true">
	<?php if ( is_user_logged_in() ): ?>
		<?php wld_the_nav( 'Header Main', true ); ?>
	<?php else: ?>
		<?php wld_the_nav( 'Header Second', true ); ?>
		<div class="header-login">
			<a class="btn sign_in_header_button" href="/account/login<?php echo $redirect; ?>">Sign in</a>
			<a class="btn sign_up_header_button" href="/account/register<?php echo $redirect; ?>">Sign up</a>
		</div>
	<?php endif; ?>
	<button class="close-button" id="close-button">
		<span class="screen-reader-text"><?php esc_html_e( 'Close Menu', 'parent-theme' ); ?></span>
	</button>
</aside>
<?php echo '<div class="content-wrap">'; ?>
<?php if ( 'not-logged-in' === wld_get( 'type' ) || is_page( array(
	'login',
	'register',
	'forgot-password'
) ) || ! is_user_logged_in() ) : ?>
<header class="header">
	<?php else : ?>
	<header class="header-inner">
		<?php endif; ?>
		<div id="sticky-header" class="unfixed">
			<div class="inner">
				<?php wld_the_logo(); ?>
				<div class="nav-menu">
					<?php if ( is_user_logged_in() && 'not-logged-in' !== wld_get( 'type' ) && ! is_page( array(
							'login',
							'register',
							'forgot-password'
						) ) ) : ?>
						<input type="hidden" name="notifications-count-for-nav"
							   value="12<?php //echo WLD_Notifications::count(); ?>">
						<?php wld_the_nav( 'Header Main' ); ?>
					<?php endif; ?>
					<?php if ( ! is_user_logged_in() ) : ?>
						<?php wld_the_nav( 'Header Second' ); ?>
					<?php endif; ?>
					<?php if ( is_user_logged_in() && 'not-logged-in' === wld_get( 'type' ) || is_user_logged_in() && is_page( array(
							'login',
							'register',
							'forgot-password'
						) ) ) : ?>
						<?php wld_the_nav( 'Header Second' ); ?>
					<?php endif; ?>
				</div>
				<?php if ( is_user_logged_in() ): ?>
					<?php if ( empty( WLD_Stripe_Api_Subscription::get_subscription( true ) ) ) : ?>
						<div class="search-btn mobile-sm"><a href="/account/upgrade-account">Upgrade Account</a></div>
					<?php endif; ?>
					<div class="profile-menu">
						<a href="/account/">
							<img src="<?php echo $url_avatar; ?>" class="avatar" loading="lazy">
						</a>
						<div class="profile-sub-menu">
							<div class="sub-menu-header-inner">
								<ul>
									<li>
										<a href="/account/">My profile</a>
									</li>
									<?php if ( empty( WLD_Stripe_Api_Subscription::get_subscription( true ) ) ) : ?>
										<li class="item-upgrade-account">
											<a href="/account/upgrade-account">Upgrade Account</a>
										</li>
									<?php endif; ?>
									<li>
										<a href="/account/edit-profile">Account Settings</a>
									</li>
									<li>
										<a href="<?php get_home_url(); ?>/#section-5">Dating Advice</a>
									</li>
									<li>
										<a href="/contact-us/">Contact Us</a>
									</li>
									<li class="item-sign-out">
										<a href="/?logout=true">Sign out</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="arrow-button">
							<button class="profile_button"></button>
						</div>
					</div>
				<?php endif; ?>
			</div>
			<div class="menu-button" id="open-button">
				<span class="screen-reader-text" data-uw-styling-context="true">Menu</span>
				<span class="line line1"></span>
				<span class="line line2"></span>
				<span class="line line3"></span>
			</div>
		</div>
	</header>
	<?php echo '<main class="main">'; ?>

	<?php if ( function_exists( 'yoast_breadcrumb' ) && ! is_front_page() && ! is_404() ) : ?>
		<?php yoast_breadcrumb( '<div class="breadcrumbs">', '</div>' ); ?>
	<?php endif; ?>
