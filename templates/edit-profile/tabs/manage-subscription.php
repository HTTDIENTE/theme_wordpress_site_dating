<?php
/**
 * @var array $args array with data about one event
 */

$user_status = WLD_Account::user_status( get_current_user_id() );

?>
<section id="section-tab-manage-subscription" data-value="manage-subscription-block" style="display: none;">
	<?php if ( empty( WLD_Stripe_Api_Subscription::get_subscription( true ) ) ) : ?>
		<div class="form-no-premium">
			<h1 class="manage-subscription-no-premium-title">You have no active subscription at the moment.<br> Please
				upgrade to get all benefits of Premium subscription.</h1>
			<div class="buttons-wrap">
				<a class="manage-subscription-no-premium-btn"
				   href="<?php echo get_home_url(); ?>/account/upgrade-account" rel="noopener">Become Premium Member</a>
			</div>
			<div class="error-box">
				<strong class="wrap_error_ajax"></strong>
			</div>
			<div class="form-payment-method">
				<h2>Payment Method</h2>
				<?php
				if ( ! empty( WLD_Stripe_Api_Customer::list_cards() ) ) {
					foreach ( WLD_Stripe_Api_Customer::list_cards() as $card ) : ?>
						<div
							class="form-row<?php echo ( WLD_Stripe_Api_Customer::get_primary() === $card['payment_method'] ) ? ' active' : ''; ?>">
							<button data-method="<?php echo $card['payment_method']; ?>"
									class="btn-set-primary-card" <?php echo ( WLD_Stripe_Api_Customer::get_primary() === $card['payment_method'] ) ? 'disabled' : ''; ?>>
								Set Primary
							</button>
							<p>Credit Card</p>
							<span class="card">•••• •••• •••• <?php echo $card['last_number']; ?></span>
							<button class="delete-card-btn" data-method="<?php echo $card['payment_method']; ?>">Delete
								card
							</button>
						</div>
					<?php
					endforeach;
				}
				?>
				<div class="form-row">
					<button class="btn-add-new-payment-method">+</button>
				</div>
			</div>
			<?php get_template_part( 'templates/popups/cycle/delete-card' ); ?>
			<div class="form-add-card" style="display: none;">
				<div class="form-row add-card-wrap">
				</div>
				<div class="form-row add-card-buttons in-focus-or-has-value">
					<input type="checkbox" name="checkbox_card_primary" id="checkbox_card_primary"
						   class="checkbox_card_primary">
					<label for="checkbox_card_primary">Set a primary</label>
					<button class="btn-add-card">Add Card</button>
					<strong class="wrap_error_ajax"></strong>
				</div>
			</div>
		</div>
		<?php get_template_part( 'templates/popups/cycle/card-make-primary' ); ?>
	<?php else : ?>
		<div class="form-create-subscription">
			<h2>Current Subscription</h2>
			<div class="row">
				<div>
					<?php
					$current_subscription = WLD_Stripe_Api_Subscription::get_subscription();
					if ( 'dummy_subscription' === $current_subscription || empty( $current_subscription ) ) :
						?>
						<span class="">Subscription activated by administrator</span>
					<?php else : ?>
						<span class="current-plan-label">$<?php echo $current_subscription['price']; ?>/mo</span>
						<span
							class="current-plan-deadline-label"><?php echo $current_subscription['interval']; ?> month</span>
					<?php endif; ?>
				</div>
				<?php if ( 'dummy_subscription' !== $current_subscription && ! empty( $current_subscription ) ) : ?>
					<div class="buttons-wrap">
						<button class="btn-change-plan">Change Plan</button>
						<a class="cancel-subscription" href="#edit-profile-cancel-subscription" target="_blank"
						   rel="noopener"
						   data-subscription="<?php echo WLD_Stripe_Api_Subscription::get_subscription( true ); ?>">Cancel
							Subscription</a>
					</div>
					<?php get_template_part( 'templates/popups/cycle/cancel-subscription' ); ?>
				<?php endif; ?>
			</div>
		</div>
		<?php if ( 'dummy_subscription' !== $current_subscription && ! empty( $current_subscription ) ) : ?>
			<div class="form-auto-renew">
				<h2>Auto Renew</h2>
				<p>
					All subscriptions automatically renew until cancelled. Local sales tax will be added to your subscription
				</p>
			</div>
		<?php endif; ?>
		<div class="error-box">
			<strong class="wrap_error_ajax"></strong>
		</div>
		<div class="form-payment-method">
			<h2>Payment Method</h2>
			<?php
			if ( ! empty( WLD_Stripe_Api_Customer::list_cards() ) ) {
				foreach ( WLD_Stripe_Api_Customer::list_cards() as $card ) : ?>
					<div
						class="form-row<?php echo ( WLD_Stripe_Api_Customer::get_primary() === $card['payment_method'] ) ? ' active' : ''; ?>">
						<button data-method="<?php echo $card['payment_method']; ?>"
								class="btn-set-primary-card" <?php echo ( WLD_Stripe_Api_Customer::get_primary() === $card['payment_method'] ) ? 'disabled' : ''; ?>>
							Set Primary
						</button>
						<p>Credit Card</p>
						<span class="card">•••• •••• •••• <?php echo $card['last_number']; ?></span>
						<button class="delete-card-btn" data-method="<?php echo $card['payment_method']; ?>">Delete
							card
						</button>
					</div>
				<?php
				endforeach;
			}
			?>
			<div class="form-row">
				<button class="btn-add-new-payment-method">+</button>
			</div>
		</div>
		<?php get_template_part( 'templates/popups/cycle/delete-card' ); ?>
		<div class="form-add-card" style="display: none;">
			<div class="form-row add-card-wrap">
			</div>
			<div class="form-row add-card-buttons in-focus-or-has-value">
				<input type="checkbox" name="checkbox_card_primary" id="checkbox_card_primary"
					   class="checkbox_card_primary">
				<label for="checkbox_card_primary">Set a primary</label>
				<button class="btn-add-card">Add Card</button>
				<strong class="wrap_error_ajax"></strong>
			</div>
		</div>
		<?php get_template_part( 'templates/flexible-content/transaction-history' ); ?>
	<?php endif; ?>
</section>
