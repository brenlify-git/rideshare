<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit7b0c348147b55bd65c73adf2c98f062a
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit7b0c348147b55bd65c73adf2c98f062a', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit7b0c348147b55bd65c73adf2c98f062a', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        \Composer\Autoload\ComposerStaticInit7b0c348147b55bd65c73adf2c98f062a::getInitializer($loader)();

        $loader->register(true);

        return $loader;
    }
}
