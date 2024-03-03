<?php
/**
 * @var array $args array with data about one event
 */
$active_class      = '';
$new_part_register = '';
if ( isset( $args['type'] ) && 'upgrade_account' === $args['type'] ) {
	$active_class = ' active';
}
if ( isset( $_GET['register'] ) && 'true' === $_GET['register'] && empty( $active_class ) ) {
	$new_part_register = ' active';
}
?>
<div class="progress-bar">
	<div class="row active" data-value="block-one" data-page="block-two">
		<a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-progress-bar-1.svg" alt=""></a>
		<div class="line"></div>
	</div>
	<div class="row<?php echo $active_class; ?><?php echo $new_part_register; ?>" data-value="block-two"
		 data-page="block-three">
		<a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-progress-bar-2.svg" alt=""></a>
		<div class="line"></div>
	</div>
	<div class="row<?php echo $active_class; ?>" data-value="block-three" data-page="block-four">
		<a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-progress-bar-3.svg" alt=""></a>
		<div class="line"></div>
	</div>
	<div class="row<?php echo $active_class; ?>" data-value="block-four" data-page="block-five">
		<a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-progress-bar-4.svg" alt=""></a>
		<div class="line"></div>
	</div>
	<div class="row<?php echo $active_class; ?>" data-value="block-five" data-page="block-six">
		<a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-progress-bar-5.svg" alt=""></a>
		<div class="line"></div>
	</div>
</div>
