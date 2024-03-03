<?php

class WLD_Filesystem {
	/**
	 * @return WP_Filesystem_Direct In fact, it will not always be this particular class, but in most cases.
	 * @noinspection PhpMissingReturnTypeInspection, ReturnTypeCanBeDeclaredInspection
	 */
	public static function get_filesystem() {
		global $wp_filesystem;

		if ( null === $wp_filesystem ) {
			if ( ! function_exists( 'WP_Filesystem' ) ) {
				/** @noinspection PhpIncludeInspection, RedundantSuppression */
				require_once ABSPATH . 'wp-admin/includes/file.php';
			}

			WP_Filesystem();
		}

		return $wp_filesystem;
	}

	public static function get_file_json_array( string $file ): array {
		/** @noinspection JsonEncodingApiUsageInspection */
		$json = json_decode( static::get_file_contents( $file ), true );
		if ( is_array( $json ) ) {
			return $json;
		}

		return array();
	}

	public static function get_file_contents( string $file ): string {
		$filesystem = static::get_filesystem();
		if ( $filesystem->exists( $file ) ) {
			return $filesystem->get_contents( $file );
		}

		return '';
	}

	public static function put_file_contents( string $file, $contents ): bool {
		$filesystem = static::get_filesystem();
		$dir        = pathinfo( $file, PATHINFO_DIRNAME );
		if ( ! $filesystem->exists( $dir ) ) {
			wp_mkdir_p( $dir );
		}

		return $filesystem->put_contents( $file, $contents );
	}

	public static function delete_file_or_folder( string $file ): bool {
		return static::get_filesystem()->delete( $file, true );
	}
}
