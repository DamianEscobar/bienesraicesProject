<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit46ec6c88805eae8c4e0ad8e1d67bab98
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Intervention\\Image\\' => 19,
            'Intervention\\Gif\\' => 17,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Intervention\\Image\\' => 
        array (
            0 => __DIR__ . '/..' . '/intervention/image/src',
        ),
        'Intervention\\Gif\\' => 
        array (
            0 => __DIR__ . '/..' . '/intervention/gif/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit46ec6c88805eae8c4e0ad8e1d67bab98::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit46ec6c88805eae8c4e0ad8e1d67bab98::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit46ec6c88805eae8c4e0ad8e1d67bab98::$classMap;

        }, null, ClassLoader::class);
    }
}