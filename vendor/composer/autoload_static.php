<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7dc71224762f0c0910ea98c5c5764bdc
{
    public static $classMap = array (
        'Admin' => __DIR__ . '/../..' . '/app/models/Admin.php',
        'Database' => __DIR__ . '/../..' . '/app/models/Database.php',
        'Format' => __DIR__ . '/../..' . '/app/models/Format.php',
        'Gardian' => __DIR__ . '/../..' . '/app/models/Gardian.php',
        'Registration' => __DIR__ . '/../..' . '/app/models/Registration.php',
        'Session' => __DIR__ . '/../..' . '/app/models/Session.php',
        'Teacher' => __DIR__ . '/../..' . '/app/models/Teacher.php',
        'Tution' => __DIR__ . '/../..' . '/app/models/Tution.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit7dc71224762f0c0910ea98c5c5764bdc::$classMap;

        }, null, ClassLoader::class);
    }
}
