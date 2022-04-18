<?php

use Boot\Foundation\Providers\FileSystemProvider;

return [
    'app' => env('APP_NAME', 'Matcha'),
    'providers' => [
        /* Booted Foundation Service Providers... */
        \Boot\Foundation\Providers\FileSystemProvider::class,

        /* App Service Providers... */
        \App\Providers\DatabaseServiceProvider::class,
        \App\Providers\BladeServiceProvider::class,
    ],
    'aliases' => [
        'Auth' => \App\Support\Auth::class,
    ]
];