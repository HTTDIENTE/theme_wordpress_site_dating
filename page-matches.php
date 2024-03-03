<?php
/* Template Name: Matches Page */

if ( ! is_user_logged_in() ) {
	exit( wp_safe_redirect( '/account/login' ) );
}

get_header();
?>
<section class="section-matches">
	<div class="inner">
		<?php get_template_part( 'templates/matches/tabs' ); ?>
		<?php get_template_part( 'templates/matches/filter-matches' ); ?>
		<?php get_template_part( 'templates/matches/results' ); ?>
		<?php get_template_part( 'templates/popups/cycle/unblock-user' ); ?>
		<?php get_template_part( 'templates/popups/cycle/report-abuse' ); ?>
	</div>
</section>
<?php
get_footer();
?>
