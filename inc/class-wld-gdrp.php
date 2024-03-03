<?php

// TODO: I think it's worth merging all style files into one, since they are not large,
// and we still need them on all pages, and it's better to make one request.

class WLD_GDRP {
	public static function init() : void {
		if ( ! wld_is_plugin_active( 'cookie-law-info/cookie-law-info.php' ) || ( is_admin() && ! wp_doing_ajax() ) ) {
			return;
		}

		add_action(
			'wp_head',
			array( static::class, 'the_style' ),
			3
		);
		add_action(
			'wp_enqueue_scripts',
			array( static::class, 'dequeue_styles' )
		);
		add_action(
			'wp_enqueue_scripts',
			array( static::class, 'dequeue_scripts' )
		);
		add_action(
			'wp_print_footer_scripts',
			array( static::class, 'dequeue_styles' ),
			9
		);
		add_action(
			'wp_ajax_load_cookie',
			array( static::class, 'loading_cookie' )
		);
		add_action(
			'wp_ajax_nopriv_load_cookie',
			array( static::class, 'loading_cookie' )
		);
		add_filter(
			'script_loader_tag',
			array( static::class, 'set_defer' ),
			10,
			2
		);
		add_filter(
			'cli_show_cookie_bar_only_on_selected_pages',
			array( static::class, 'fixed_html_validation' )
		);
		add_filter(
			'wt_cli_change_privacy_overview_title_tag',
			array( static::class, 'fixed_title_level' )
		);

		add_filter(
			'cli_show_cookie_bar_only_on_selected_pages',
			array( static::class, 'change_banner' )
		);

	}

	public static function the_style() : void {
		$the_options = Cookie_Law_Info::get_settings();

		/** @ignore all */
		$css = sprintf(
			'
				.cookie-law-info-preload #cookie-law-info-bar {
					background-color: %s;
					color: %s;
					font-family: inherit;
					bottom: 0;
					position: fixed;
					display: block;
					padding: 14px 25px
				}
				.cookie-law-info-preload .cli_settings_button {
					margin: 0 5px 0 0;
					color: %s;
					background-color: %s
				}
				.cookie-law-info-preload .cli_action_button {
					color: %s;
					background-color: %s
				}
				@media (max-width: 985px) {
					.cookie-law-info-preload #cookie-law-info-bar {
						padding: 25px
					}
				}
				.cookie-law-info-hidden .cookie-law-info-bar,
				.cookie-law-info-hidden .cookie-law-info-again,
				.cookie-law-info-hidden .cli-modal,
				.cookie-law-info-hidden .li-modal-backdrop {
					display: none
				}
			',
			$the_options['background'] ?? '',
			$the_options['text'] ?? '',
			$the_options['button_4_link_colour'] ?? '',
			$the_options['button_4_button_colour'] ?? '',
			$the_options['button_7_button_colour'] ?? '',
			$the_options['button_7_link_colour'] ?? ''
		);
		?>
		<style id="theme-gdrp-css-inline"><?php echo static::minify( $css ); ?></style>
		<script>
			if (!document.cookie.match(/^(.*;)?\s*viewed_cookie_policy\s*=\s*[^;]+(.*)?$/)) {
				document.documentElement.classList.add('cookie-law-info-preload');
			} else {
				document.documentElement.classList.add('cookie-law-info-hidden');
			}
		</script>
		<script id="theme-gdrp-js-inline" type="module">
			const js = '/wp-content/themes/child-theme/js/modules/cookie-law-info.js';
			if (!document.cookie.match(/^(.*;)?\s*viewed_cookie_policy\s*=\s*[^;]+(.*)?$/)) {
				import(js);
			} else {
				setTimeout(() => import(js), 5000);
			}
		</script>
		<?php
	}

	public static function dequeue_styles() : void {
		wp_dequeue_style( 'cookie-law-info' );
		wp_dequeue_style( 'cookie-law-info-gdpr' );
		wp_dequeue_style( 'cookie-law-info-table' );
	}

	public static function dequeue_scripts() : void {
		wp_dequeue_script( 'cookie-law-info-ccpa' );
		wp_dequeue_script( 'cookie-law-info' );
	}

	public static function set_defer( $tag, $handle ) {
		$defer_handles = array(
			'cookie-law-info'      => true,
			'cookie-law-info-ccpa' => true,
		);

		if ( isset( $defer_handles[ $handle ] ) ) {
			return str_replace( ' src', ' defer="defer" src', $tag );
		}

		return $tag;
	}

	public static function fixed_html_validation( string $notify_html ) : string {
		return str_replace(
			array(
				'<span><div',
				'</div></span>',
			),
			array(
				'<div><div',
				'</div></div>',
			),
			$notify_html
		);
	}

	public static function fixed_title_level( string $title ) : string {
		return '<h2>' . $title . '</h2>';
	}

	public static function change_banner( $banner ) : string {
		echo '<div id="сookie-container">' . $banner . '</div>';

		return '';
	}

	public static function loading_cookie() : void {
		$the_options = Cookie_Law_Info::get_settings();

		if ( true === $the_options['is_on'] ) {
			// Output the HTML in the footer:
			$message = nl2br( $the_options['notify_message'] );
			$str     = do_shortcode( stripslashes( $message ) );
			$head    = trim( stripslashes( $the_options['bar_heading_text'] ) );
			$title   = '' !== $head ? '<h5 class="cli_messagebar_head">' . wp_kses_post( $head ) . '</h5>' : '';

			$notify_html = '
				<div
					id="' . self::cookielawinfo_remove_hash( $the_options['notify_div_id'] ) . '"
					data-nosnippet="true"
				>' . $title . '<span>' . $str . '</span></div>
			';

			$show_again = stripslashes( $the_options['showagain_text'] );

			$current_obj = get_queried_object();
			$post_slug   = '';
			if ( is_object( $current_obj ) ) {
				if ( is_category() || is_tag() ) {
					$post_slug = $current_obj->slug ?? '';
				} elseif ( is_archive() ) {
					$post_slug = $current_obj->rewrite['slug'] ?? '';
				} elseif ( isset( $current_obj->post_name ) ) {
					$post_slug = $current_obj->post_name ?? '';
				}
			}

			require_once WP_PLUGIN_DIR . '/cookie-law-info/legacy/public/views/cookie-law-info_bar.php';
		}

		$cli_ccpa_datas = array(
			'opt_out_prompt'  => __( 'Do you really wish to opt out?', 'parent-theme' ),
			'opt_out_confirm' => __( 'Confirm', 'parent-theme' ),
			'opt_out_cancel'  => __( 'Cancel', 'parent-theme' ),
		);

		$ccpa_enabled = ( wp_validate_boolean( isset( $the_options['ccpa_enabled'] ) ?? false ) );

		if ( true === $ccpa_enabled ) {
			wp_enqueue_script(
				'cookie-law-info-ccpa',
				plugins_url() . '/cookie-law-info/legacy/admin/modules/ccpa/assets/js/cookie-law-info-ccpa.js',
				array(
					'jquery',
					'cookie-law-info',
				),
				CLI_VERSION,
				false
			);
			wp_localize_script( 'cookie-law-info-ccpa', 'ccpa_data', $cli_ccpa_datas );
		}
		global $wp_scripts;
		wp_enqueue_scripts();

		$wp_scripts->do_item( 'cookie-law-info' );
		$wp_scripts->do_item( 'cookie-law-info-ccpa' );
		wp_die();
	}

	public static function cookielawinfo_remove_hash( $str ) {
		if ( '#' === $str[0] ) {
			$str = substr( $str, 1, strlen( $str ) );
		} else {
			return $str;
		}

		return self::cookielawinfo_remove_hash( $str );
	}

	protected static function minify( string $text ) : string {
		return trim(
			preg_replace(
				array(
					'/\r\n\t/',
					'/\s{2,}/',
				),
				array(
					'',
					' ',
				),
				$text
			)
		);
	}
}
