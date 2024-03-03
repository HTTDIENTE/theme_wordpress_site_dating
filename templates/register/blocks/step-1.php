<div class="row" id="block-one">
	<h1 class="box-header-text">Sign in to Never Walk Alone</h1>
	<div class="block-write-information">
		<div class="form-row tabs">
			<div class="tab">
				<a href="/account/register" class="active">Register</a>
			</div>
			<div class="tab">
				<a href="/account/login">Log In</a>
			</div>
		</div>
		<div class="form-row blocks-socials">
			<?php echo do_shortcode( '[miniorange_social_login]' ); ?>
		</div>
		<p class="block-or"><span class="text-or">or</span></p>
		<div class="form-row">
			<div
				id="block-select-gender" <?php echo ( isset( $_GET['gender'] ) && ! empty( $_GET['gender'] ) ) ? ( 'style="display:none;"' ) : ( '' ); ?>>
				<button data-value="man"
						class=""<?php echo ( isset( $_GET['gender'] ) && 'man' === $_GET['gender'] ) ? ( 'class="active"' ) : ( '' ); ?>>
					I am a man looking for a woman
				</button>
				<button
					data-value="woman" <?php echo ( isset( $_GET['gender'] ) && 'woman' === $_GET['gender'] ) ? ( 'class="active"' ) : ( '' ); ?>>
					I am a woman looking for a man
				</button>
			</div>
		</div>
		<div class="form-row">
			<label for="email-address">E-mail address<sup>*</sup></label>
			<input type="email" id="email-address">
		</div>
		<div class="form-row">
			<label for="password">Password<sup>*</sup></label>
			<input type="password" id="password">
			<span id="password-show">Show</span>
		</div>
		<div class="form-row">
			<label for="confirm-password">Confirm Password<sup>*</sup></label>
			<input type="password" id="confirm-password">
			<span id="confirm-password-show">Show</span>
		</div>
		<div class="form-row">
			<input type="checkbox" id="agree_terms_conditions_agree">
			<label for="agree_terms_conditions_agree">
				<?php
				$get_link = wld_get( 'links_agree_terms_conditions' );
				echo wp_kses(
					$get_link,
					array(
						'a' => array(
							'href' => true
						),
					),
				);
				?><sup>*</sup>
			</label>
		</div>
		<div class="form-row buttons-wrap">
			<button id="button-next-page-1">Get Started</button>
			<strong class="wrap_error_ajax"></strong>
			<p>
				Already have an account? <a href="/account/login">Log in</a>
			</p>
		</div>
	</div>
</div>
