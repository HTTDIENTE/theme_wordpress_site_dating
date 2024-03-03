<?php $i = 0 ?>
<section class="section-customer-reviews">
	<div class="inner">
		<?php wld_the( 'customer_reviews_title', 'title' ); ?>
		<?php wld_the( 'title', 'title' ); ?>
		<?php while ( wld_loop( 'items', '<div class="reviews-slider">' ) ) : ?>
			<div class="review">
				<h3><span>by </span><?php the_title(); ?></h3>
				<?php $count = wld_get( 'rating' ); ?>
				<div class="stars">
					<?php while ( $count -- > 0 ): ?>
						<img src="<?php echo get_stylesheet_directory_uri() . '/images/star.svg' ?>" alt=" ">
					<?php endwhile; ?>
				</div>
				<p><?php echo wp_trim_words( get_the_content(), 16, '...' ); ?></p>
				<a class="more"
				   href="#popup-review-<?php echo ++ $i; ?>"><?php esc_html_e( 'View Review', 'parent-theme' ); ?></a>
			</div>
		<?php endwhile; ?>
		<?php $i = 0 ?>
		<?php while ( wld_loop( 'items' ) ) : ?>
			<div id="popup-review-<?php echo ++ $i; ?>" class="mfp-hide">
				<div class="review">
					<h3><span>by </span><?php the_title(); ?></h3>
					<?php $count = wld_get( 'rating' ); ?>
					<div class="stars">
						<?php while ( $count -- > 0 ): ?>
							<img src="<?php echo get_stylesheet_directory_uri() . '/images/star.svg' ?>" alt=" ">
						<?php endwhile; ?>
					</div>
					<?php echo get_the_content(); ?>
				</div>
			</div>
		<?php endwhile; ?>
</section>
