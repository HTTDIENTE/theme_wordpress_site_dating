<?php
/**
 * @noinspection HtmlUnknownTarget
 * phpcs:disable WordPress.WP.EnqueuedResources.NonEnqueuedScript
 */

class WLD_Fonts {
	protected const META_KEY = '_theme_preload_fonts';
	protected const REST_NAMESPACE = '/theme/v1/';
	protected const REST_ROUTE = 'fonts-preloader/';

	protected static array $preload_fonts = array();
	protected static array $preload_js = array(
		'fonts-classes.js',
		'fonts.js',
		'fonts-get-key-from-font-face.js',
	);

	public static function init( $type ): void {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$type = $_GET['fonts-test'] ?? $type;
		if ( 'css' === $type ) {
			add_action(
				'wp_head',
				array( static::class, 'add_fonts_css' ),
				2
			);
		} else {
			array_unshift( static::$preload_js, 'fonts-load.js' );
			add_action(
				'wp_head',
				array( static::class, 'add_fonts_js' ),
				2
			);
		}

		add_action(
			'wp',
			array( static::class, 'set_preload_fonts' ),
		);
		add_action(
			'wp',
			array( static::class, 'the_preload_headers' ),
			11
		);
		add_action(
			'wp_head',
			array( static::class, 'the_preload_links' ),
			1
		);
		add_action(
			'rest_api_init',
			array( static::class, 'registration_rest_routes' )
		);
	}

	public static function add_fonts_js(): void {
		$font_dir   = get_stylesheet_directory() . '/fonts/';
		$js_content = WLD_Filesystem::get_file_contents( $font_dir . 'fonts.js' );
		if ( $js_content ) {
			static::the_classes_script();
			printf(
				'<script src="%s" id="theme-fonts-load-js" type="module" async></script>',
				esc_url( static::get_url( 'fonts-load.js' ) )
			);
			static::the_save_preload_script();
		}
	}

	public static function add_fonts_css(): void {
		$font_dir    = get_stylesheet_directory() . '/fonts/';
		$css_content = WLD_Filesystem::get_file_contents( $font_dir . 'fonts.css' );
		if ( $css_content ) {
			$font_url = static::get_url();
			static::the_classes_script();
			printf(
				'<style id="theme-fonts-css">%s</style>',
				str_replace(
					'url(',
					'url(' . esc_url( $font_url ),
					$css_content
				)
			);
			static::the_save_preload_script();
		}
	}

	public static function set_preload_fonts(): void {
		$preload_fonts = get_post_meta( get_the_ID(), static::META_KEY, true );
		if ( is_array( $preload_fonts ) ) {
			static::$preload_fonts = $preload_fonts;
		}
	}

	public static function the_preload_links(): void {
		if ( static::$preload_js ) {
			foreach ( static::$preload_js as $js ) {
				echo sprintf(
					'<link rel="preload" href="%s" as="script" crossorigin>',
					esc_url( static::get_url( $js ) ),
				);
			}
		}
		if ( static::$preload_fonts ) {
			foreach ( static::$preload_fonts as $font ) {
				echo sprintf(
					'<link rel="preload" href="%s" as="font" type="%s" crossorigin>',
					esc_url( static::get_url( $font['src'] ) ),
					esc_attr( 'font/' . $font['type'] )
				);
			}
		}
	}

	public static function the_preload_headers(): void {
		if ( wp_doing_ajax() ) {
			return;
		}

		if ( static::$preload_js ) {
			foreach ( static::$preload_js as $js ) {
				header(
					sprintf(
						'Link: <%s>; rel=preload; as=script; crossorigin"',
						esc_url_raw( static::get_url( $js ) ),
					),
					false
				);
			}
		}
		if ( static::$preload_fonts ) {
			foreach ( static::$preload_fonts as $font ) {
				header(
					sprintf(
						'Link: <%s>; rel=preload; as=font; type="%s"; crossorigin"',
						esc_url_raw( static::get_url( $font['src'] ) ),
						'font/' . $font['type']
					),
					false
				);
			}
		}
	}

	public static function save_preload_fonts( WP_REST_Request $request ): WP_REST_Response {
		update_post_meta( $request['post_id'], static::META_KEY, $request['fonts'] );

		return new WP_REST_Response( 'Saved' );
	}

	public static function registration_rest_routes(): void {
		register_rest_route(
			static::REST_NAMESPACE,
			static::REST_ROUTE . '(?P<post_id>\d+)',
			array(
				'methods'             => 'POST',
				'callback'            => array( static::class, 'save_preload_fonts' ),
				'permission_callback' => static function () {
					return current_user_can( 'manage_options' );
				},
				'args'                => array(
					'fonts' => array(
						'type'        => 'array',
						'uniqueItems' => true,
						'items'       => array(
							'type'       => 'object',
							'properties' => array(
								'src'  => array(
									'type'    => 'string',
									'pattern' => '^[[:alnum:]-]+.(eot|svg|ttf|woff2?)$',
								),
								'type' => array(
									'type' => 'string',
									'enum' => array(
										'eot',
										'svg',
										'opentype',
										'truetype',
										'woff',
										'woff2',
									),
								),
							),
						),
						'required'    => true,
					),
				),
			)
		);
	}

	protected static function get_url( $file_name = '' ): string {
		static $font_url;
		if ( null === $font_url ) {
			$font_url = get_stylesheet_directory_uri() . '/fonts/';
		}

		return $font_url . $file_name;
	}

	protected static function the_classes_script(): void {
		printf(
			'<script src="%s" id="theme-fonts-classes-js" type="module" async></script>',
			esc_url( static::get_url( 'fonts-classes.js' ) )
		);
	}

	protected static function the_save_preload_script(): void {
		if ( current_user_can( 'manage_options' ) ) {
			printf(
				'<script src="%s" data-fonts-preloader-fetch-url="%s" id="theme-fonts-preloader-main-js" type="module" async></script>',
				esc_url( static::get_url( 'fonts-preloader-main.js' ) ),
				esc_url(
					wp_nonce_url(
						get_rest_url(
							null,
							static::REST_NAMESPACE . static::REST_ROUTE . get_the_ID()
						),
						'wp_rest'
					)
				)
			);
		}
	}
}
