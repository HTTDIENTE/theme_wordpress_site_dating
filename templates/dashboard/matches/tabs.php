<?php $get_preference_data = WLD_Account_Matches::get_match_preference_data(); ?>
<section id="tabs-for-search-matches">
	<div class="block-tabs">
		<button class="tab new-matches active">
			New Matches
		</button>
		<button class="tab recent-visitors">
			Recent Visitors
		</button>
		<div class="tab sort-by">
			<label for="sort-by-select">Sort By:</label>
			<select id="sort-by-select">
				<?php
				$selected = empty( $get_preference_data['sort_by'] ) ? 'selected="selected"' : '';
				$fields   = array(
					'photo_first' => 'Photo First',
					'match_score' => 'Match Score',
					'last_online' => 'Last Online',
				);
				?>
				<?php foreach ( $fields as $key => $row ) : ?>
					<option <?php echo $key === $get_preference_data['sort_by'] ? 'selected="selected"' : ''; ?>
						value="<?php echo $key; ?>"><?php echo $row; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<button class="tab match-preferences">
			Match Preferences
		</button>
	</div>
</section>
