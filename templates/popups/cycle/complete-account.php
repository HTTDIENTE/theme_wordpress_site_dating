<div id="complete-account-popup" class="edit-account-popup mfp-hide">
	<h2 class="title">
		<?php
		printf(
			esc_html__( 'Your account is just %d%% completed', 'parent-theme' ),
			WLD_Account::completeness_profile()
		);
		?>
	</h2>
	<p>
		<?php
		esc_html_e(
			'Follow these steps to complete your account to 100% and grab the attention of your matches.',
			'parent-theme'
		);
		?>
	</p>
	<ul>
		<?php foreach ( WLD_Account::get_fields( 'uncompleted' ) as $key => $title ) : ?>
			<li><?php echo esc_html( $title ); ?></li>
		<?php endforeach; ?>
	</ul>
	<div class="buttons-wrap">
		<button class="btn cancel" type="button">Ok</button>
	</div>
</div>
