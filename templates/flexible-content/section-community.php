<section class="section-community">
	<div class="inner">
		<?php wld_the( 'title', 'title' ); ?>
		<div class="wrapper">
			<?php while ( wld_loop( 'items' ) ) : ?>
				<div class="item">
					<?php wld_the( 'icon', '80x80' ); ?>
					<?php wld_the( 'title' ); ?>
					<?php wld_the( 'text' ); ?>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
</section>
