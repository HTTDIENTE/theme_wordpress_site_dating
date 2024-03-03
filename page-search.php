<?php
/* Template Name: Search */

if ( ! is_user_logged_in() ) {
	exit( wp_safe_redirect( '/account' ) );
}

get_header();
?>
<section id="section-search-your-matches">
	<div class="inner">
		<h1 class="title">Find Your Perfect Match</h1>
		<section id="section-filter-matches">
			<?php get_template_part( 'templates/dashboard/matches/filter-matches' ); ?>
		</section>
		<section class="section-search-result" id="block-results-block-one">
		</section>
		<?php get_template_part( 'templates/popups/cycle/unblock-user' ); ?>
		<?php get_template_part( 'templates/popups/cycle/report-abuse' ); ?>
	</div>
</section>
<?php
get_footer();
?>
