<?php
/**
 * @var array $args array with data about one event
 */
?>
<section id="section-tab-sms-verification" data-value="sms-verification-block" style="display: none;">
	<div class="block get-verified">
		<div class="row">
			<h2 class="title"><?php esc_html_e( 'Get Verified', 'parent-theme' ); ?></h2>
			<p>
				<?php
				esc_html_e(
					'Carry out the free Never Walk Alone SMS verification now to receive the SMS Verified symbol for your
				profile!',
					'parent-theme'
				);
				?>
			</p>
			<ul>
				<li><?php esc_html_e( 'Enter your mobile number and we will send you a text message containing a verification code.',
						'parent-theme' ); ?></li>
				<li><?php esc_html_e( 'Please enter the verification code and the SMS Verified symbol will appear on your profile.',
						'parent-theme' ); ?></li>
			</ul>
			<div class="form-row buttons-wrap">
				<button id="start-verification"
						type="button"><?php esc_html_e( 'Start SMS Verification', 'parent-theme' ); ?></button>
			</div>
		</div>
		<div class="row">
			<img src="<?php echo get_stylesheet_directory_uri() . '/images/sms-verification-bg.png'; ?>" alt="">
		</div>
	</div>
	<div class="block step-1">
		<div class="row">
			<div class="heading-wrap">
				<h2 class="title"><?php esc_html_e( 'Please enter your mobile phone number', 'parent-theme' ); ?></h2>
				<p><?php esc_html_e( 'We will send you a text message with a verification code to the phone number you have entered.',
						'parent-theme' ); ?></p>
			</div>
			<p class="notice">
				<?php
				esc_html_e(
					'The phone number will only be used internally and will not be passed on to third
				parties. You will not receive any telephone calls from Never Walk Alone and the number will also not be
				shown in your profile.',
					'parent-theme'
				);
				?>
			</p>
			<div class="form-row">
				<label
					for="user-verification-phone">
					<?php
					esc_html_e(
						'Please enter your phone',
						'parent-theme'
					);
					?>
				</label>
				<input type="tel" id="user-verification-phone">
			</div>
			<div class="form-row">
				<input type="checkbox" id="sms-verification-agree">
				<label for="sms-verification-agree">
					<?php
					esc_html_e(
						'I agree to receive the text message and also my mobile phone number
					being stored for the
					Never Walk Alone SMS verification.',
						'parent-theme'
					);
					?>
				</label>
			</div>
			<div class="form-row buttons-wrap">
				<button type="button"
						class="send-sms-code"
						disabled><?php esc_html_e( 'Send Text Message', 'parent-theme' ); ?></button>
				<button class="verified-cancel"><?php esc_html_e( 'Cancel', 'parent-theme' ); ?></a></button>
			</div>
			<div class="error-notice-block">
				<strong class="wrap_error_ajax"></strong>
			</div>
		</div>
		<div class="row">
			<img src="<?php echo get_stylesheet_directory_uri() . '/images/sms-verification-bg.png'; ?>" alt="">
		</div>
	</div>
	<div class="block step-2">
		<div class="row">
			<div class="heading-wrap">
				<h2 class="title"><?php esc_html_e( 'Please enter the verification code', 'parent-theme' ); ?></h2>
				<p>
					<?php
					esc_html_e(
						'You will usually receive a text message from Never Walk Alone within a few seconds. If it takes
							longer you can enter the verification code later. Only then will you receive the SMS verification
							symbol.',
						'parent-theme'
					);
					?>
				</p>
			</div>
			<p class="notice send-notice">A text message with verification code was just sent to
				<span class="notice-phone"></span>. This code will expire in 10 min</p>
			<div class="form-row">
				<label
					for="user-verification-code"><?php esc_html_e( 'Please enter verification code',
						'parent-theme' ); ?> </label>
				<input type="number" id="user-verification-code">
				<button type="button"
						class="send-sms-code re-send"><?php esc_html_e( 'Re-send code', 'parent-theme' ); ?></button>
			</div>
			<div class="form-row buttons-wrap">
				<button type="button"
						id="check-sms-code"><?php esc_html_e( 'Check the Verification Code',
						'parent-theme' ); ?></button>
			</div>
			<div class="error-notice-block">
				<strong class="wrap_error_ajax"></strong>
			</div>
		</div>
		<div class="row">
			<img src="<?php echo get_stylesheet_directory_uri() . '/images/sms-verification-bg.png'; ?>" alt="">
		</div>
	</div>
	<div class="block step-3">
		<div class="wrapper">
			<h2 class="title"><?php esc_html_e( 'Congratulations!', 'parent-theme' ); ?></h2>
			<p><?php esc_html_e( 'Your phone number is successfully verified.', 'parent-theme' ); ?> </p>
			<button class="btn"
					onclick="location.href='<?php echo home_url(); ?>/account'"><?php esc_html_e( 'Go to My Profile',
					'parent-theme' ); ?></button>
		</div>
	</div>
</section>
