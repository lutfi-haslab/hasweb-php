<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfb0cc3acb981cc69e9131c2a17b915b8
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitfb0cc3acb981cc69e9131c2a17b915b8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfb0cc3acb981cc69e9131c2a17b915b8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfb0cc3acb981cc69e9131c2a17b915b8::$classMap;

        }, null, ClassLoader::class);
    }
}