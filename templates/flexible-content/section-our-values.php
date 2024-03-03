<section class="section-our-values">
	<div class="inner">
		<div class="wrapper">
			<div class="left">
				<?php wld_the( 'title', 'title' ); ?>
				<p><?php wld_the( 'text' ); ?></p>
			</div>
			<div class="right">
				<?php while ( wld_loop( 'values' ) ) : ?>
					<div class="item">
						<?php wld_the( 'value' ); ?>
						<p><?php wld_the( 'description' ); ?></p>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</section>
