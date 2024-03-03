<section class="error-404">
	<?php while ( wld_loop( 'wld_404' ) ) : ?>
		<div class="inner">

			<div class="error-404__image">
				<?php wld_the( 'image', '300x300' ); ?>
			</div>
			<?php wld_the( 'title', 'error-404__title' ); ?>
			<?php wld_the( 'text' ); ?>
			<?php while ( wld_loop( 'links', '<div class="error-404__links">' ) ) : ?>
				<?php wld_the( 'link', 'error-404__link' ); ?>
				<?php if ( 0 === get_row_index() % 3 ) : ?>
					<?php echo '<br>'; ?>
				<?php endif; ?>
			<?php endwhile; ?>
			<?php wld_the( 'button', 'error-404__button btn', '<p>' ); ?>
		</div>
		<?php if ( wld_get( 'search_form_enabled' ) ) : ?>
			<?php get_template_part( 'templates/search-form' ); ?>
		<?php endif; ?>
	<?php endwhile; ?>
</section>
