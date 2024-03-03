<div class="row" id="block-three">
	<a class="i_will_completed_this_later" href="#" data-this="block-three" data-href="block-four">I will complete this
		later</a>
	<h1 class="box-header-text">Tell Us About Yourself</h1>
	<?php get_template_part( 'templates/register/progress-bar' ); ?>
	<div class="block-write-information">
		<div class="form-row">
			<select id="marital-status">
				<option value="marital_status" selected="" disabled="">Marital Status<sup>*</sup></option>
				<option value="single">Single</option>
				<option value="divorced">Divorced</option>
				<option value="widow">Widow</option>
			</select>
		</div>
		<div class="form-row">
			<div id="block-select-born" role="group" aria-labelledby="block-select-born-label">
				<span id="block-select-born-label">Born Again?<sup>*</sup></span>
				<input type="radio" id="select-born-yes" name="select-born" data-value="Yes">
				<label for="select-born-yes">Yes</label>
				<input type="radio" id="select-born-no" name="select-born" data-value="No">
				<label for="select-born-no">No</label>
			</div>
		</div>
		<div class="form-row">
			<select id="church-attendance">
				<option value="" selected="" disabled="">Church Attendance<sup>*</sup></option>
				<option value="Attend church every week">Attend church every week</option>
				<option value="Attend church once or twice a month">Attend church once or twice a month</option>
				<option value="Attend church several times in a year">Attend church several times in a year</option>
				<option value="Attend church on special occasions">Attend church on special occasions</option>
				<option value="Attend church every week and I am actively engaged as a volunteer">Attend church every
					week and I am actively engaged as a volunteer
				</option>
			</select>
		</div>
		<div class="form-row">
			<div id="block-select-kids" role="group" aria-labelledby="block-select-kids-label">
				<span id="block-select-kids-label">Have Kids?<sup>*</sup></span>
				<input type="radio" id="select-kids-yes" name="select-kids" data-value="Yes">
				<label for="select-kids-yes">Yes</label>
				<input type="radio" id="select-kids-no" name="select-kids" data-value="No">
				<label for="select-kids-no">No</label>
			</div>
		</div>
		<div class="form-row">
			<select id="want-kids">
				<option value="want_kids" selected="" disabled="">Want Kids<sup>*</sup></option>
				<option value="definitely">Definitely</option>
				<option value="someday">Someday</option>
				<option value="no_way">No way</option>
			</select>
		</div>
		<div class="form-row">
			<label for="occupation">Occupation<span>*</span></label>
			<input type="text" id="occupation">
		</div>
		<div class="form-row">
			<select id="level-of-education">
				<option value="level_of_education" selected="" disabled="">Level of Education<sup>*</sup></option>
				<option value="high_school">High School</option>
				<option value="some_college">Some College</option>
				<option value="associate_degree">Associate Degree</option>
				<option value="bachelors_degree">Bachelor's degree</option>
				<option value="graduate_degree">Graduate Degree</option>
				<option value="phd_post_doctoral">PhD/Post-Doctoral</option>
			</select>
		</div>
		<div class="form-row buttons-wrap">
			<button id="button-next-page-3">Next</button>
			<?php if ( isset( $_GET['authorizedSocial'] ) ) : ?>
				<input type="hidden" name="authorizedSocial"
					   value="<?php echo ( isset( $_GET['authorizedSocial'] ) ) ? ( $_GET['authorizedSocial'] ) : ( '' ); ?>">
			<?php endif; ?>
			<strong class="wrap_error_ajax"></strong>
		</div>
	</div>
</div>
