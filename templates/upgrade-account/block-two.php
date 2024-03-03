<div class="row">
	<h2 class="upgrade-your-account-label">Upgrade Your Account</h2>
	<p class="upgrade-your-account-description"><?php wld_the( 'free_trial_label' ); ?></p>
	<div class="side-wrap">
		<div class="left">
			<h2 class="label-side-wrap-left">Your benefits as a Premium Member</h2>
			<div class="block-list-premium-privileges">
				<?php
				$privileges = array(
					array(
						'text' => 'View unlimited photos',
						'src'  => 'https://avatanplus.com/files/resources/original/56f12bc7444151539e130270.png'
					),
					array(
						'text' => 'See who`s viewed you',
						'src'  => 'https://avatanplus.com/files/resources/original/56f12bc7444151539e130270.png'
					),
					array(
						'text' => 'Detailed personality profile',
						'src'  => 'https://avatanplus.com/files/resources/original/56f12bc7444151539e130270.png'
					),
					array(
						'text' => 'Unlimited messaging',
						'src'  => 'https://avatanplus.com/files/resources/original/56f12bc7444151539e130270.png'
					),
					array(
						'text' => 'Distance search',
						'src'  => 'https://avatanplus.com/files/resources/original/56f12bc7444151539e130270.png'
					),
					array(
						'text' => 'Video chats',
						'src'  => 'https://avatanplus.com/files/resources/original/56f12bc7444151539e130270.png'
					),
				);
				?>
				<?php foreach ( $privileges as $value ) : ?>
					<div class="list">
						<img
							src="<?php echo $value['src']; ?>"
							width="35"
							height="35"
						>
						<span><?php echo $value['text']; ?></span>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php
		$check_card = ( WLD_Stripe_Api_Customer::get_primary() || WLD_Stripe_Api_Customer::list_cards() ) ? ( '' ) : ( 'data-popup="nowatch"' );
		?>
		<div class="right" id="section-select-plan">
			<h3 class="label-side-wrap-right">Pick your plan</h3>
			<div class="block-list-premium-plan">
				<?php $first_iteration = false; ?>
				<?php foreach ( WLD_Stripe_Api::get_prices() as $key => $row ) : ?>
				<div class="list">
					<div>
						<p class="plan-price">$<?php echo $row['price']; ?>/mo</p>
						<span class="plan-expired"><?php echo $row['interval']; ?> month</span>
					</div>
					<div>
						<button class="upgrade-account-select-plan" data-amount="<?php echo $row['price']; ?>" data-type="<?php echo $key; ?>"
								data-interval="<?php echo $row['interval']; ?>" <?php echo $check_card; ?>>Select
						</button>
						<?php
							if ( ! $first_iteration ) {
								echo '<small class="most-popular-plan">Most popular plan!</small>';
								$first_iteration = true;
							}
						?>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<a href="/account">Go Back to My Profile</a>
</div>
