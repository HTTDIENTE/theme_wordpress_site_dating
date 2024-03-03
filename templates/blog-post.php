<section class="blog-content blog-content_single">
	<div class="inner">
		<div class="blog-content__wrapper">
			<div class="blog-content__content">
				<?php the_content(); ?>
				<hr>
				<div class="social-links social-links_share">
					<h3 class="social-links__title"><?php esc_html_e( 'Don’t forget to share this post!',
							'parent-theme' ); ?></h3>
					<?php get_template_part( 'templates/blog-share-links' ); ?>
				</div>
			</div>
			<div class="blog-content__sidebar">
				<?php dynamic_sidebar( 'blog_sidebar' ); ?>
				<?php wld_the( 'wld_social_links' ); ?>
			</div>
		</div>
	</div>
</section>
