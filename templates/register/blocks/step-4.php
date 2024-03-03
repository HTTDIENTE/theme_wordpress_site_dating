<div class="row" id="block-four" style="display:none;">
	<a class="i_will_completed_this_later" href="#" data-this="block-four" data-href="block-five">I will complete this
		later</a>
	<h1 class="box-header-text">Tell Us About Yourself</h1>
	<?php get_template_part( 'templates/register/progress-bar' ); ?>
	<h2>Choose a few interests</h2>
	<div class="block-write-information">
		<div class="form-row search-block">
			<label for="search_interests_reg_block">Search Interests</label>
			<input type="text" id="search_interests_reg_block">
			<button class="close">X</button>
			<div class="wrap-interests-variable wrap-search-interests">
			</div>
		</div>
		<div class="accordion" id="accordion-15">
			<h3 class="accordion__header">
				<button class="accordion__trigger" id="accordion-btn-15" type="button" aria-expanded="false"
						aria-controls="accordion-panel-15">
					<span class="accordion__title">
						Sports and Fitness
					</span>
				</button>
			</h3>
			<div class="accordion__panel" id="accordion-panel-15" role="region" aria-labelledby="accordion-btn-15"
				 hidden="">
				<div class="wrap-interests-variable">
					<?php foreach ( WLD_Other::get_interests( 'sports_and_fitness' ) as $row ) : ?>
						<button data-value="<?php echo str_replace( ' ', '_',
							strtolower( $row ) ); ?>"><?php echo ucfirst( $row ); ?></button>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<div class="accordion" id="accordion-16">
			<h3 class="accordion__header">
				<button class="accordion__trigger" id="accordion-btn-16" type="button" aria-expanded="false"
						aria-controls="accordion-panel-16">
					<span class="accordion__title">
						Activities
					</span>
				</button>
			</h3>
			<div class="accordion__panel" id="accordion-panel-16" role="region" aria-labelledby="accordion-btn-16"
				 hidden="">
				<div class="wrap-activities-variable">
					<?php foreach ( WLD_Other::get_interests( 'activities' ) as $row ) : ?>
						<button data-value="<?php echo str_replace( ' ', '_',
							strtolower( $row ) ); ?>"><?php echo ucfirst( $row ); ?></button>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<div class="accordion" id="accordion-17">
			<h3 class="accordion__header">
				<button class="accordion__trigger" id="accordion-btn-17" type="button" aria-expanded="false"
						aria-controls="accordion-panel-17">
					<span class="accordion__title">
						Music
					</span>
				</button>
			</h3>
			<div class="accordion__panel" id="accordion-panel-17" role="region" aria-labelledby="accordion-btn-17"
				 hidden="">
				<div class="wrap-music-variable">
					<?php foreach ( WLD_Other::get_interests( 'music' ) as $row ) : ?>
						<button data-value="<?php echo str_replace( ' ', '_',
							strtolower( $row ) ); ?>"><?php echo ucfirst( $row ); ?></button>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<div class="accordion" id="accordion-18">
			<h3 class="accordion__header">
				<button class="accordion__trigger" id="accordion-btn-18" type="button" aria-expanded="false"
						aria-controls="accordion-panel-18">
					<span class="accordion__title">
						Arts And Entertainment
					</span>
				</button>
			</h3>
			<div class="accordion__panel" id="accordion-panel-18" role="region" aria-labelledby="accordion-btn-18"
				 hidden="">
				<div class="wrap-arts-and-entertainment-variable">
					<?php foreach ( WLD_Other::get_interests( 'arts_and_entertainment' ) as $row ) : ?>
						<button data-value="<?php echo str_replace( ' ', '_',
							strtolower( $row ) ); ?>"><?php echo ucfirst( $row ); ?></button>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<div class="accordion" id="accordion-19">
			<h3 class="accordion__header">
				<button class="accordion__trigger" id="accordion-btn-19" type="button" aria-expanded="false"
						aria-controls="accordion-panel-19">
					<span class="accordion__title">
						Leisure Activities
					</span>
				</button>
			</h3>
			<div class="accordion__panel" id="accordion-panel-19" role="region" aria-labelledby="accordion-btn-19"
				 hidden="">
				<div class="wrap-leisure-activities-variable">
					<?php foreach ( WLD_Other::get_interests( 'leisure_activities' ) as $row ) : ?>
						<button data-value="<?php echo str_replace( ' ', '_',
							strtolower( $row ) ); ?>"><?php echo ucfirst( $row ); ?></button>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<div class="form-row buttons-wrap">
			<button id="button-next-page-4">Next</button>
			<strong class="wrap_error_ajax" style=""></strong>
		</div>
	</div>
</div>
