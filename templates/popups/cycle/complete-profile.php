<div id="complete-profile-popup" class="edit-account-popup mfp-hide">
	<h2 class="title">Tell Us More About Yourself</h2>
	<div class="form-row height-wrapper">
		<div class="form-row">
			<label for="person-height-feet">Height, feet</label>
			<input type="number" id="person-height-feet">
		</div>
		<div class="form-row">
			<label for="person-height-inch">Height, inches</label>
			<input type="number" id="person-height-inch">
		</div>
	</div>
	<div class="form-row wrap-input-birthday">
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
	</div>
	<div class="form-row">
		<select id="body-type-select">
			<option disabled="">Body Type</option>
			<option value="">Slim/Slender</option>
			<option value="" selected="">Athletic</option>
			<option value="">Average</option>
			<option value="">Muscular</option>
			<option value="">Curvy</option>
			<option value="">Heavy set</option>
		</select>
	</div>
	<div class="form-row">
		<select id="ethnicity-select">
			<option disabled="">Ethnicity</option>
			<option value="">Caucasian</option>
			<option value="">Black</option>
			<option value="">Asian</option>
			<option value="">Hispanic</option>
			<option value="" selected="">Native American</option>
			<option value="">Middle Eastern</option>
			<option value="">Other</option>
		</select>
	</div>
	<div class="form-row">
		<select id="religion-select">
			<option value="Anglican">Anglican</option>
			<option value="Apostolic">Apostolic</option>
			<option value="Assembly of God">Assembly of God</option>
			<option value="Baptist">Baptist</option>
			<option value="Catholic">Catholic</option>
			<option value="Charismatic">Charismatic</option>
			<option value="Christian Reformed">Christian Reformed</option>
			<option value="Church of Christ">Church of Christ</option>
			<option value="Episcopilian">Episcopilian</option>
			<option value="Evangelical">Evangelical</option>
			<option value="Interdenominational">Interdenominational</option>
			<option value="Lutheran">Lutheran</option>
			<option value="Messianic">Messianic</option>
			<option value="Methodist">Methodist</option>
			<option value="Nazarene">Nazarene</option>
			<option value="Non-denominational">Non-denominational</option>
			<option value="None">None</option>
			<option value="Orthodox">Orthodox</option>
			<option value="Pentecostal">Pentecostal</option>
			<option value="Presbyterian">Presbyterian</option>
			<option value="Redeemed Christian Church of God">Redeemed Christian Church of God</option>
			<option value="Seventh-Day Adventist">Seventh-Day Adventist</option>
			<option value="Southern Baptist">Southern Baptist</option>
			<option value="Winners Chapel">Winners Chapel</option>
			<option value="Other Religion">Other Religion</option>
		</select>
	</div>
	<div class="form-row">
		<select id="marital-status-select">
			<option disabled="" selected="">Marital Status</option>
			<option value="Single">Single</option>
			<option value="Divorced">Divorced</option>
			<option value="Widow">Widow</option>
		</select>
	</div>
	<div class="form-row">
		<select id="church-attendance">
			<option value="church_attendance" disabled="">Church Attendance</option>
			<option value="Attend church every week">Attend church every week</option>
			<option value="Attend church once or twice a month">Attend church once or twice a month</option>
			<option value="Attend church several times in a year">Attend church several times in a year</option>
			<option value="Attend church on special occasions">Attend church on special occasions</option>
		</select>
	</div>
	<div class="form-row">
		<div id="block-select-kids" role="group" aria-labelledby="select-kids-label">
			<span id="select-kids-label">Have Kids?</span>
			<label for="select-kids-yes"><input type="radio" id="select-kids-yes" name="select-kids" data-value="yes">Yes</label>
			<label for="select-kids-no"><input type="radio" id="select-kids-no" name="select-kids"
											   data-value="no">No</label>
		</div>
	</div>
	<div class="form-row">
		<div id="block-select-born" role="group" aria-labelledby="block-select-born-label" class="">
			<span id="block-select-born-label">Born Again?</span>
			<label for="select-born-yes"><input type="radio" id="select-born-yes" name="select-born" data-value="yes">Yes</label>
			<label for="select-born-no"><input type="radio" id="select-born-no" name="select-born"
											   data-value="no">No</label>
		</div>
	</div>
	<div class="form-row">
		<select id="want-kids">
			<option value="want_kids" selected="" disabled="">Want Kids</option>
			<option value="Definitely">Definitely</option>
			<option value="Someday">Someday</option>
			<option value="No way">No way</option>
		</select>
	</div>
	<div class="form-row">
		<select id="level-of-education">
			<option value="level_of_education" selected="" disabled="">Level of Education</option>
			<option value="High School">High School</option>
			<option value="Some College">Some College</option>
			<option value="Associate Degree">Associate Degree</option>
			<option value="Bachelor's degree">Bachelor's degree</option>
			<option value="Graduate Degree">Graduate Degree</option>
			<option value="PhD/Post-Doctoral">PhD/Post-Doctoral</option>
		</select>
	</div>
	<div class="form-row">
		<label for="occupation">Occupation</label>
		<input type="text" id="occupation">
	</div>
	<div class="form-row">
		<select id="pets">
			<option value="" selected="" disabled="">Does have/love pets?</option>
			<option value="Yes">Yes</option>
			<option value="No">No</option>
		</select>
	</div>
	<div class="buttons-wrap">
		<button class="btn" type="button">Save</button>
	</div>
</div>
