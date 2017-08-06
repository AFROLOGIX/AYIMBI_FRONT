<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit12ed4e594ca8f4796df1982a929b17ca
{
    public static $files = array (
        '3b5531f8bb4716e1b6014ad7e734f545' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/helpers.php',
    );

    public static $prefixesPsr0 = array (
        'T' => 
        array (
            'Twig_Extensions_' => 
            array (
                0 => __DIR__ . '/..' . '/twig/extensions/lib',
            ),
            'Twig_' => 
            array (
                0 => __DIR__ . '/..' . '/twig/twig/lib',
            ),
        ),
        'S' => 
        array (
            'Slim\\Views' => 
            array (
                0 => __DIR__ . '/..' . '/slim/views',
            ),
            'Slim' => 
            array (
                0 => __DIR__ . '/..' . '/slim/slim',
            ),
        ),
        'P' => 
        array (
            'Parsedown' => 
            array (
                0 => __DIR__ . '/..' . '/erusev/parsedown',
            ),
        ),
        'I' => 
        array (
            'Illuminate\\Support' => 
            array (
                0 => __DIR__ . '/..' . '/illuminate/support',
            ),
            'Illuminate\\Events' => 
            array (
                0 => __DIR__ . '/..' . '/illuminate/events',
            ),
            'Illuminate\\Database' => 
            array (
                0 => __DIR__ . '/..' . '/illuminate/database',
            ),
            'Illuminate\\Container' => 
            array (
                0 => __DIR__ . '/..' . '/illuminate/container',
            ),
        ),
        'C' => 
        array (
            'Carbon' => 
            array (
                0 => __DIR__ . '/..' . '/nesbot/carbon/src',
            ),
        ),
    );

    public static $classMap = array (
        'Comments' => __DIR__ . '/../..' . '/src/models/Comments.models.php',
        'Posts' => __DIR__ . '/../..' . '/src/models/Posts.models.php',
        'Settings' => __DIR__ . '/../..' . '/src/models/Settings.models.php',
        'Users' => __DIR__ . '/../..' . '/src/models/Users.models.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit12ed4e594ca8f4796df1982a929b17ca::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit12ed4e594ca8f4796df1982a929b17ca::$classMap;

        }, null, ClassLoader::class);
    }
}