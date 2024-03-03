<div id="upgrade-account-popup" class="edit-profile-popup" style="display: none;">
	<div class="content-wrapper">
		<h2 class="title">Buying a Premium Subscription</h2>
		<?php if ( WLD_Stripe_Api_Customer::get_primary() ) : ?>
			<?php
			$get_card = WLD_Stripe_Api_Customer::get_card( WLD_Stripe_Api_Customer::get_primary() );
			?>
			<div class="form-row card-primary">
				<input type="radio" name="checkbox_subscription_payment" id="checkbox_subscription_payment_card"
					   class="checkbox_subscription_payment_card"
					   data-method="<?php echo WLD_Stripe_Api_Customer::get_primary(); ?>">
				<label for="checkbox_subscription_payment_card">Pay by primary card <span
						class="card_">**** **** **** <?php echo $get_card->card->last4; ?></span></label>
			</div>
		<?php endif; ?>
		<?php if ( WLD_Stripe_Api_Customer::list_cards() ) : ?>
			<div class="form-row card-select">
				<input type="radio" name="checkbox_subscription_payment" id="checkbox_subscription_payment_card_select"
					   class="checkbox_subscription_payment_card_select">
				<label for="checkbox_subscription_payment_card_select">Pay by card from the list <span class="card_">**** **** **** ****</span></label>
				<select id="select_subscription_payment_card">
					<option value="" disabled selected>Select card</option>
					<?php foreach ( WLD_Stripe_Api_Customer::list_cards() as $card ) : ?>
						<option value="<?php echo $card['payment_method']; ?>">**** ****
							**** <?php echo $card['last_number']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		<?php endif; ?>
		<div class="form-row card-new">
			<input type="radio" name="checkbox_subscription_payment" id="checkbox_subscription_payment_card_new"
				   class="checkbox_subscription_payment_card_new">
			<label for="checkbox_subscription_payment_card_new">Pay by new bank card / Google Pay / Apple Pay</label>
		</div>
		<div class="buttons-wrap">
			<button id="payment_accept" data-method="" class="btn">Pay</button>
			<button id="payment_cancel" class="cancel">Cancel</button>
		</div>
		<div class="subscription-info-block">
			<p>Price plan: <span class="price_plan"></span></p>
			<p>Period: <span class="period"></span></p>
		</div>
		<button class="btn-close">+</button>
		<strong class="wrap_error_ajax"></strong>
	</div>
</div>
