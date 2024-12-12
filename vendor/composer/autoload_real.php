<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit278025bcbe2f5cf01de7144d85a5cf5c
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('ht-mega-for-elementor\htmega-blocks\vendor\composer\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return blocks\vendor\composer\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit278025bcbe2f5cf01de7144d85a5cf5c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new blocks\vendor\composer\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit278025bcbe2f5cf01de7144d85a5cf5c', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit278025bcbe2f5cf01de7144d85a5cf5c::getInitializer($loader));

        $loader->register(true);

        $filesToLoad = \Composer\Autoload\ComposerStaticInit278025bcbe2f5cf01de7144d85a5cf5c::$files;
        $requireFile = \Closure::bind(static function ($fileIdentifier, $file) {
            if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
                $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

                require $file;
            }
        }, null, null);
        foreach ($filesToLoad as $fileIdentifier => $file) {
            $requireFile($fileIdentifier, $file);
        }

        return $loader;
    }
}
