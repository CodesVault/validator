<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6cd21a77a78ec02bedc1406c26db6e76
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Codesvault\\Validator\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Codesvault\\Validator\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6cd21a77a78ec02bedc1406c26db6e76::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6cd21a77a78ec02bedc1406c26db6e76::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6cd21a77a78ec02bedc1406c26db6e76::$classMap;

        }, null, ClassLoader::class);
    }
}
