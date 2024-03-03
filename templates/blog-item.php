<?php $j = $args['count']; ?>
<li class="blog-items__item">
	<article class="blog-item accessibility-card
	<?php
	if ( 0 === $j ) {
		echo 'blog-item_two-columns';
	}
	?>
">
		<div class="blog-item__text">
			<h2 class="blog-item__title title">
				<a class="blog-item__link" href="<?php the_permalink(); ?>" aria-describedby="read-more-1">
					<?php the_title(); ?>
				</a>
			</h2>
			<p class="blog-item__except"><?php echo wp_trim_words( get_the_excerpt(), 10, '...' ); ?></p>
			<div class="blog-item__posted">Posted - <?php echo get_the_date( 'F d, Y' ); ?></div>
			<div class="blog-item__more" aria-hidden="true"
				 id="read-more-1"><?php esc_html_e( 'Learn More', 'parent-theme' ); ?></div>
			<aside class="blog-categories blog-item__categories">
				<h3 class="screen-reader-text"><?php esc_html_e( 'Categories:', 'parent-theme' ); ?></h3>
				<?php foreach ( get_the_category() as $category ) : ?>
					<a class="blog-categories_link" href="<?php echo get_category_link( $category ); ?>"
					   rel="category tag"><?php echo $category->name; ?></a>
				<?php endforeach; ?>

			</aside>
		</div>
		<div class="blog-thumbnail blog-item__thumbnail">
			<?php the_post_thumbnail( '590x0', array( 'class' => 'blog-thumbnail__image' ) ); ?>
		</div>
	</article>
</li>
