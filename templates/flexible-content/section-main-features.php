<section class="section-main-features">
	<div class="inner">
		<?php while ( wld_loop( 'items', '<div class="wrapper">' ) ) : ?>
			<div class="item">
				<?php wld_the( 'icon', '80x80' ); ?>
				<?php wld_the( 'title', 'title' ); ?>
				<?php wld_the( 'text' ); ?>
			</div>
		<?php endwhile; ?>
	</div>
</section>
