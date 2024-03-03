<div class="row" id="block-five" style="display:none;">
	<a class="i_will_completed_this_later" href="#" data-this="block-five" data-href="block-six"">I will complete this
	later</a>
	<h1 class="box-header-text">Who are You Looking For?</h1>
	<?php get_template_part( 'templates/register/progress-bar' ); ?>
	<h2>Choose a few interests</h2>
	<div class="block-write-information">
		<div class="form-row input-range-age-wrap">
			<h3>
				<span class="ages-title">Ages:</span>
				<span id="min-age">18</span>
				<span id="view-ages-range">-</span>
				<span id="max-age">40</span>
			</h3>
			<input type="range" value="0,28" id="range-ages-trigger" multiple="">
		</div>
		<div class="form-row">
			<div class="born-again-looking" role="group" aria-labelledby="born-again-looking-label">
				<span id="born-again-looking-label">Are You Born Again?<sup>*</sup></span>
				<input type="radio" id="born-again-looking-yes" name="born-again-looking" data-value="Yes">
				<label for="born-again-looking-yes">Yes</label>
				<input type="radio" id="born-again-looking-no" name="born-again-looking" data-value="No">
				<label for="born-again-looking-no">No</label>
				<input type="radio" id="born-again-looking-no" name="born-again-looking" data-value="I`m not sure">
				<label for="born-again-looking-no">I`m not sure</label>
			</div>
		</div>
		<div class="form-row">
			<div class="want-born-again-looking" role="group" aria-labelledby="want-born-again-label">
				<span id="want-born-again-label">Do you want a born again Christian?<sup>*</sup></span>
				<input type="radio" id="want-born-again-yes" name="want-born-again" data-value="Yes">
				<label for="want-born-again-yes">Yes</label>
				<input type="radio" id="want-born-again-no" name="want-born-again" data-value="No">
				<label for="want-born-again-no">No</label>
			</div>
		</div>
		<div class="form-row distance">
			<label for="distance">Distance<sup>*</sup></label>
			<select name="" id="value-distance">
				<?php
				$array_distance = array(
					100,
					250,
					500,
					1000,
					1500,
					5000,
					10000
				);
				foreach ( $array_distance as $row ) {
					echo '<option value="' . $row . '">' . $row . ' mi</option>';
				}
				?>
			</select>
			<span>of</span>
			<div class="form-row">
				<label for="input-location">City</label>
				<input type="text" class="input-location" id="input-location" data-x="" data-y="">
			</div>
		</div>
		<div class="form-row">
			<label for="search_globally">Search Globally</label>
			<input type="checkbox" id="search_globally">
		</div>
		<div class="form-row buttons-wrap">
			<button id="button-next-page-5">Next</button>
			<strong class="wrap_error_ajax"></strong>
		</div>
	</div>
</div>
