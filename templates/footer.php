<?php echo '</main>'; ?>

<footer class="footer">
	<div class="inner">
		<div class="footer-top">
			<div class="logo">
				<?php wld_the( 'wld_footer_logo', '0x55' ); ?>
			</div>
			<?php wld_the_nav( 'Footer Main' ); ?>
			<?php if ( ! ( is_user_logged_in() ) ) : ?>
				<div class="buttons-wrap">
					<?php wld_the( 'wld_footer_button', 'btn' ); ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="footer-bottom">
			<div class="copyright">
				<?php wld_the( 'wld_footer_copyright' ); ?>
				<?php wld_the_nav( 'Footer links' ); ?>
			</div>
			<?php if ( is_front_page() ) : ?>
				<div class="by">
					<p>
						<a href="https://www.webloftdesigns.com/" target="_blank" rel="noopener">
							Dallas Web Design Agency:
							<span>Web Loft Designs</span>
						</a>
					</p>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<?php get_template_part( 'templates/popups/popups' ); ?>
</footer>

<?php echo '</div></div>'; ?>
