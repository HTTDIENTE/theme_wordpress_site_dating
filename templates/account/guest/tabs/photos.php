<?php
/**
 * @var array $args array with data about one event
 */
?>
<div class="section-photos" data-value="users-photos-block" style="display: none">
	<?php if ( ! empty( WLD_Account::get_userdata_custom( $args['user']->ID )->photos ) ) : ?>
		<?php foreach ( WLD_Account::get_userdata_custom( $args['user']->ID )->photos as $photo ) : ?>
			<a data-fancybox="gallery" href="<?php echo $photo; ?>">
				<img src="<?php echo $photo; ?>"/>
			</a>
		<?php endforeach; ?>
	<?php else : ?>
		<p class="message-empty-block">The user has not uploaded any photos yet.</p>
	<?php endif; ?>
</div>
<script type="module">
	import {Fancybox} from "https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.esm.js";

	Fancybox.bind('[data-fancybox="gallery"]', {
		animated: false,
		showClass: false,
		hideClass: false,
		Toolbar: false,

		click: false,

		dragToClose: false,

		Image: {
			zoom: false,
		},
	});
</script>
