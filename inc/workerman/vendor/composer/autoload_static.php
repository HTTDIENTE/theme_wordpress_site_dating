<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit587969045387c6c19f3082c54dfc7a28 {
	public static $prefixLengthsPsr4 = array(
		'W' =>
			array(
				'Workerman\\' => 10,
			),
	);

	public static $prefixDirsPsr4 = array(
		'Workerman\\' =>
			array(
				0 => __DIR__ . '/..' . '/workerman/workerman',
			),
	);

	public static $classMap = array(
		'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
	);

	public static function getInitializer( ClassLoader $loader ) {
		return \Closure::bind( function () use ( $loader ) {
			$loader->prefixLengthsPsr4 = ComposerStaticInit587969045387c6c19f3082c54dfc7a28::$prefixLengthsPsr4;
			$loader->prefixDirsPsr4    = ComposerStaticInit587969045387c6c19f3082c54dfc7a28::$prefixDirsPsr4;
			$loader->classMap          = ComposerStaticInit587969045387c6c19f3082c54dfc7a28::$classMap;

		}, null, ClassLoader::class );
	}
}
