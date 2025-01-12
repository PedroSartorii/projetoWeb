<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0591b750cdb01cb9cec07fc29beb04e7
{
    public static $classMap = array (
        'Address' => __DIR__ . '/../..' . '/controllers/endereco-list.controller.php',
        'AddressController' => __DIR__ . '/../..' . '/endereco.php',
        'ComposerAutoloaderInit0591b750cdb01cb9cec07fc29beb04e7' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInit0591b750cdb01cb9cec07fc29beb04e7' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'DatabaseConnection' => __DIR__ . '/../..' . '/controllers/endereco-list.controller.php',
        'Order' => __DIR__ . '/../..' . '/controllers/pedidos-list.controller.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit0591b750cdb01cb9cec07fc29beb04e7::$classMap;

        }, null, ClassLoader::class);
    }
}
