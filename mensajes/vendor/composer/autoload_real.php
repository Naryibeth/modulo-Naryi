<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit5d02edab5b030c8a1584f029019f3c14
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

        spl_autoload_register(array('ComposerAutoloaderInit5d02edab5b030c8a1584f029019f3c14', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit5d02edab5b030c8a1584f029019f3c14', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit5d02edab5b030c8a1584f029019f3c14::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
