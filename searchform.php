<form role="search" method="get" class="search-form__form" action="<?php echo home_url( '/' ); ?>">
	<label class="search-form__label">
		<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'parent-theme' ); ?></span>
		<input type="search" class="search-form__input"
			   placeholder="<?php esc_html_e( 'Type your question', 'parent-theme' ); ?>"
			   value="<?php echo get_search_query(); ?>" name="s"
			   title="<?php esc_html_e( 'Search for:', 'parent-theme' ); ?>"/>
	</label>
	<?php if ( is_search() ) : ?>
		<input type="submit" class="search-form__submit" value="<?php esc_html_e( 'Search', 'parent-theme' ); ?>"/>
	<?php else : ?>
		<input type="submit" class="search-form__submit" value="<?php esc_html_e( 'Go!', 'parent-theme' ); ?>"/>
	<?php endif; ?>
</form>
