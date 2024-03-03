<section class="site-map">
	<div class="inner">
		<?php wld_the( 'title', 'site-map__title' ); ?>
		<?php
		wld_the(
			'menu',
			array( 'bam_block_name' => 'menu-site-map' )
		);
		?>
	</div>
</section>
