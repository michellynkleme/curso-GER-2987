<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf43ec96ed4b1e1c3046314eb521791f4
{
    public static $files = array (
        '97be8d00d4e1b8596dda683609f3dce2' => __DIR__ . '/..' . '/tcdent/php-restclient/restclient.php',
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitf43ec96ed4b1e1c3046314eb521791f4::$classMap;

        }, null, ClassLoader::class);
    }
}