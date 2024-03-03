<?php
$section_id = get_row_index();
$categories = get_categories(
	array(
		'type'       => 'faq',
		'orderby'    => 'menu_order',
		'order'      => 'asc',
		'taxonomy'   => 'faq_category',
		'pad_counts' => false,
	)
);

$get_id = static function ( bool $reset = false ) use ( $section_id ) {
	static $i = 0;
	if ( $reset ) {
		$i = 0;
	}

	return 'tab-' . $section_id . '-' . ( ++ $i );
};

$get_tab_panel = static function ( bool $reset = false ) use ( $section_id ) {
	static $i = 0;
	if ( $reset ) {
		$i = 0;
	}

	return 'tabpanel-' . $section_id . '-' . ( ++ $i );
};

$get_items = static function ( string $category = '' ) {
	$args = array(
		'post_type'      => 'faq',
		'posts_per_page' => - 1,
		'post_status'    => 'publish',
		'orderby'        => 'menu_order',
		'order'          => 'asc',
	);

	if ( $category ) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'faq_category',
				'field'    => 'slug',
				'terms'    => $category
			)
		);
	}

	return get_posts( $args );
};

$get_accordion_id = static function ( $up = true ) use ( $section_id ) {
	static $i = 0;

	return 'accordion-' . $section_id . '-' . ( $up ? ++ $i : $i );
};

$get_accordion_btn = static function ( $up = true ) use ( $section_id ) {
	static $i = 0;

	return 'accordion-btn-' . $section_id . '-' . ( $up ? ++ $i : $i );
};

$get_accordion_panel = static function ( $up = true ) use ( $section_id ) {
	static $i = 0;

	return 'accordion-panel-' . $section_id . '-' . ( $up ? ++ $i : $i );
};
?>
<section class="faq">
	<div class="inner">
		<div class="faq__search-block">
			<?php wld_the( 'form_background', '1903x0', array( 'class' => 'object-fit object-fit-cover' ) ); ?>
			<?php wld_the( 'title', 'faq__title' ); ?>
			<form class="faq__search-form form" role="search" method="get" action="/">
				<div class="form__item">
					<label class="form__label" for="fag-search-field"><?php wld_the( 'form_label' ); ?></label>
					<input class="form__input" id="fag-search-field" type="search" value="" name="s">
				</div>
				<input class="form__submit btn" type="submit" value="<?php esc_html_e( 'Search', 'parent-theme' ); ?>">
			</form>
		</div>
		<div class="faq__tabs">
			<div class="tabs" id="tab-<?php echo esc_attr( $section_id ); ?>">
				<div class="tabs__tablist" role="tablist">
					<button class="tabs__button"
							id='<?php echo esc_attr( $get_id() ); ?>'
							type="button"
							role="tab"
							aria-controls="<?php echo esc_attr( $get_tab_panel() ); ?>">
						<span class="focus"><?php esc_html_e( 'All', 'parent-theme' ); ?></span>
					</button>
					<?php foreach ( $categories as $category ) : ?>
						<button class="tabs__button"
								id="<?php echo esc_attr( $get_id() ); ?>"
								type="button"
								role="tab"
								aria-controls="<?php echo esc_attr( $get_tab_panel() ); ?>">
							<span class="focus"><?php echo esc_html( $category->name ); ?></span>
						</button>
					<?php endforeach; ?>
				</div>
				<div class="tabs__tabpanel"
					 id='<?php echo esc_attr( $get_tab_panel( true ) ); ?>'
					 role="tabpanel"
					 tabindex="0"
					 aria-labelledby="<?php echo esc_attr( $get_id( true ) ); ?>"
				>
					<?php $items = $get_items(); ?>
					<?php while ( wld_loop( $items ) ) : ?>
						<div class="accordion" id="<?php echo esc_attr( $get_accordion_id() ); ?>">
							<h3 class="accordion__header">
								<button
									class="accordion__trigger"
									id="<?php echo esc_attr( $get_accordion_btn() ); ?>"
									type="button"
									aria-expanded="false"
									aria-controls="<?php echo esc_attr( $get_accordion_panel() ); ?>">
									<span class="accordion__title"><?php the_title(); ?></span>
								</button>
							</h3>
							<div class="accordion__panel"
								 id="<?php echo esc_attr( $get_accordion_panel( false ) ); ?>"
								 role="region"
								 aria-labelledby="<?php echo esc_attr( $get_accordion_btn( false ) ); ?>"
								 hidden="">
								<?php the_content(); ?>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
				<?php foreach ( $categories as $category ) : ?>
					<div class="tabs__tabpanel is-hidden"
						 id='<?php echo esc_attr( $get_tab_panel() ); ?>'
						 role="tabpanel"
						 tabindex="0"
						 aria-labelledby='<?php echo esc_attr( $get_id() ); ?>'
					>
						<?php $items = $get_items( $category->slug ); ?>
						<?php while ( wld_loop( $items ) ) : ?>
							<div class="accordion" id="<?php echo esc_attr( $get_accordion_id() ); ?>">
								<h3 class="accordion__header">
									<button
										class="accordion__trigger"
										id="<?php echo esc_attr( $get_accordion_btn() ); ?>"
										type="button"
										aria-expanded="false"
										aria-controls="<?php echo esc_attr( $get_accordion_panel() ); ?>">
										<span class="accordion__title"><?php the_title(); ?></span>
									</button>
								</h3>
								<div class="accordion__panel"
									 id="<?php echo esc_attr( $get_accordion_panel( false ) ); ?>"
									 role="region"
									 aria-labelledby="<?php echo esc_attr( $get_accordion_btn( false ) ); ?>"
									 hidden="">
									<?php the_content(); ?>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
