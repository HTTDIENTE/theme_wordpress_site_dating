<?php
/* Template Name: Thank You Page Forms*/

get_header();
?>
<section class="thank-you">
	<div class="inner">
		<div class="thank-you__wrapper">
			<?php wld_the( 'wld_thank_you_title', 'thank-you__title' ); ?>
			<?php wld_the( 'wld_thank_you_subtitle', '<p class="thank-you__subtitle">' ); ?>
			<?php wld_the( 'wld_thank_you_text', '<p class="thank-you__text">' ); ?>
		</div>
		<!--<div class="social-links">
			<h2 class="social-links__title-wrapper"><span class="social-links__title">Follow us on Social!</span></h2>
			<a href="#" class="social-links__link">
				<img class="social-links__image" src="images/social-icons/instagram.svg" alt="">
				<span class="social-links__text">Instagram</span>
			</a>
			<a href="#" class="social-links__link">
				<img class="social-links__image" src="images/social-icons/facebook.svg" alt="">
				<span class="social-links__text">Facebook</span>
			</a>
			<a href="#" class="social-links__link">
				<img class="social-links__image" src="images/social-icons/linkedin.svg" alt="">
				<span class="social-links__text">LinkedIn</span>
			</a>
		</div>-->
		<?php wld_the( 'wld_thank_you_button', 'thank-you__button btn', '<p>' ); ?>
	</div>
</section>

<?php get_footer(); ?>
