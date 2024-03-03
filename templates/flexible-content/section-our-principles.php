<section class="section-our-principles">
	<div class="inner">
		<div class="wrapper">
			<div class="left">
				<?php wld_the( 'image', '550x0' ); ?>
			</div>
			<div class="right">
				<?php wld_the( 'title', 'title' ); ?>
				<?php while ( wld_loop( 'principles' ) ) : ?>
					<div class="item">
						<div class="image" data-visual="false">
						</div>
						<div class="content">
							<?php wld_the( 'principle' ); ?>
							<p><?php wld_the( 'description' ); ?></p>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</section>
