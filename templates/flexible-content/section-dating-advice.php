<?php $i = 0 ?>
<section class="section-dating-advice">
	<div class="inner">
		<?php echo wld_get( 'dating_advice_title', 'title' ); ?>
		<?php while ( wld_loop( 'items', '<div class="wrapper">' ) ) : ?>
			<div class="item">
				<a href="<?php the_permalink(); ?>">
					<?php
					if ( 1 === ++ $i ) {
						the_post_thumbnail( '1200x0' );
					} else {
						the_post_thumbnail( '590x0' );
					} ?>
					<div class="content">
						<h3><?php $cat = get_the_category();
							echo $cat[0]->cat_name; ?></h3>
						<p><?php the_title(); ?></p>
					</div>
				</a>
			</div>
		<?php endwhile; ?>
		<a href="/dating-advice/" class="btn">Go to the Blog Page</a>
	</div>
</section>
