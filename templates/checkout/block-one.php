<div class="row">
	<div class="card-wrap">
	</div>
	<div class="separator-line"><span>or</span></div>
	<div class="google-apple-pay-wrap">
	</div>
	<div class="buttons-wrap">
		<input type="hidden" name="plan-amount" value="<?php echo $_GET['planAmount']; ?>">
		<button class="btn-checkout-payment btn" data-type="<?php echo $_GET['type']; ?>"
				data-interval="<?php echo $_GET['interval']; ?>">Submit
		</button>
		<strong class="wrap_error_ajax"></strong>
	</div>
</div>
