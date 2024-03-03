<?php
/* Template Name: Messages */

if ( ! is_user_logged_in() ) {
	exit( wp_safe_redirect( '/account/login' ) );
}

get_header();
?>
<section class="section-messenger">
	<div class="inner">
		<div class="bp-messages-wrap bp-messages-wrap-main <?php BP_Better_Messages()->functions->messages_classes(); ?>"></div>
	</div>
</section>
<?php
	get_template_part( 'templates/popups/cycle/messanger-send-message' );
	get_template_part( 'templates/popups/cycle/messanger-video-chat' );
	get_template_part( 'templates/popups/cycle/video-chat' );
?>
<input type="hidden" name="newThread" value="<?php echo $_GET['user'] ?? ''; ?>">
<?php get_footer(); ?>
