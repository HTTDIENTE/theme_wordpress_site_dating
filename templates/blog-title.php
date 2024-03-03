<section class="blog-post">
	<div class="inner">
		<div class="blog-post__item">
			<div class="blog-post__content">
				<h1 class="blog-post__title"><?php the_title(); ?></h1>
				<p class="blog-post__except"><?php echo wp_trim_words( get_the_excerpt(), 10, '...' ); ?></p>
				<div class="blog-post__posted">
					<?php
					printf( // translators: %s - posted date
						esc_html__( 'Posted - %s', 'parent-theme' ),
						get_the_date( 'F j, Y' )
					);
					?>
				</div>
				<div class="blog-categories blog-post__categories">
					<h3 class="screen-reader-text"><?php esc_html_e( 'Categories:', 'parent-theme' ); ?></h3>
					<?php foreach ( get_the_category() as $category ) : ?>
						<a class="blog-categories_link" href="<?php echo get_category_link( $category ); ?>"
						   rel="category tag"><?php echo $category->name; ?></a>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="blog-post__thumbnail">
				<?php the_post_thumbnail( '700x0', array( 'class' => 'blog-post__image' ) ); ?>
			</div>
		</div>
	</div>
</section>
