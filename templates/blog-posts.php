<?php $i = 0; ?>
<section class="blog-content">
	<div class="inner">
		<div class="blog-content__wrapper">
			<div class="blog-content__content">
				<?php if ( have_posts() ) : ?>
					<ul class="blog-items">
						<?php while ( have_posts() ) : ?>
							<?php the_post(); ?>
							<?php get_template_part( 'templates/blog-item', null, array( 'count' => $i ) ); ?>
							<?php $i ++; ?>
						<?php endwhile; ?>
					</ul>
					<?php wld_the_pagination(); ?>
				<?php else : ?>
					<p><?php esc_html_e( 'Nothing found', 'parent-theme' ); ?></p>
				<?php endif; ?>
			</div>
			<div class="blog-content__sidebar">
				<?php dynamic_sidebar( 'blog_sidebar' ); ?>
				<?php wld_the( 'wld_social_links' ); ?>
			</div>
		</div>
	</div>
</section>
