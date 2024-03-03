<section class="blog-banner">
	<div class="blog-banner__wrapper">
		<div class="blog-banner__content">
			<?php wld_the( 'title', 'blog-banner__title' ); ?>
			<?php wld_the( 'text', 'blog-banner__text' ); ?>
			<?php wld_the( 'form' ); ?>
		</div>
		<div class="blog-banner__image-wrap">
			<?php wld_the( 'image', '975x0', array( 'class' => 'blog-banner__image' ) ); ?>
		</div>
	</div>
</section>
