<section class="section-banner">
	<?php wld_the( 'background', 'cover', array( 'loading' => 'eager' ) ); ?>
	<div class="inner">
		<?php wld_the( 'title', 'title' ); ?>
		<div class="form-row">
			<span class="form-title">I am</span>
			<div id="block-select-gender">
				<button type="button" data-value="man"><strong>Man</strong> looking for a <strong>woman</strong>
				</button>
				<button type="button" data-value="woman"><strong>Woman</strong> looking for a <strong>man</strong>
				</button>
			</div>
			<div class="buttons-wrap">
				<button type="button" class="join-now-button">Join Now</button>
			</div>
		</div>
	</div>
</section>
