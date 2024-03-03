<section
	class="search-form <?php echo is_search() ? ' search-form_search-results-page' : 'search-form_error-404-page'; ?>">
	<div class="search-form__wrapper inner">
		<?php if ( is_search() ) : ?>
			<?php wld_the( 'wld_search_form_image' ); ?>
		<?php endif; ?>
		<?php if ( wld_has( 'title' ) ) : ?>
			<?php wld_the( 'search_form_title', 'search-form__title' ); ?>
		<?php elseif ( isset( $args['title'] ) ) : ?>
			<?php echo $args['title']; ?>
		<?php endif; ?>
		<?php get_search_form(); ?>
	</div>
</section>
