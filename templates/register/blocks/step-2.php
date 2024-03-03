<div class="row" id="block-two" style="display:none;">
	<h1 class="box-header-text">Tell Us About Yourself</h1>
	<?php get_template_part( 'templates/register/progress-bar' ); ?>
	<div class="block-write-information">
		<div class="form-row">
			<label for="first-name">First Name<sup>*</sup></label>
			<input type="text" id="first-name">
		</div>
		<div class="form-row">
			<label for="last-name">Last Name<sup>*</sup></label>
			<input type="text" id="last-name">
		</div>
		<div class="form-row">
			<label for="last-name">Username<sup>*</sup></label>
			<input type="text" id="username">
		</div>
		<div class="form-row wrap-input-birthday">
			<h3>Birthday</h3>
			<button type="button">Info</button>
			<div class="form-row">
				<label for="birthday-month">MM<sup>*</sup></label>
				<input type="number" id="birthday-month">
			</div>
			<div class="form-row">
				<label for="birthday-day">DD<sup>*</sup></label>
				<input type="number" id="birthday-day">
			</div>
			<div class="form-row">
				<label for="birthday-year">YYYY<sup>*</sup></label>
				<input type="number" id="birthday-year">
			</div>
			<div class="message">
				You need to enter your true age as it will be reflected in your profile and used for matches
			</div>
		</div>
		<div class="form-row buttons-wrap">
			<button id="button-next-page-2">Next</button>
			<strong class="wrap_error_ajax"></strong>
		</div>
	</div>
</div>
