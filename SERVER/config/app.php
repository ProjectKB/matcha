<?php

use Boot\Foundation\Providers\FileSystemProvider;

return [
    'app' => env('APP_NAME', 'Matcha'),
    'env' => env('APP_ENV', 'production'),
    'app_debug' => env('APP_DEBUG', false),
    'url' => env('APP_URL', 'http://localhost:8000'),
    'timezone' => 'UTC',
    'locale' => 'en',
    'faker_locale' => 'en_US',
    'providers' => [
        /* Booted Foundation Service Providers... */
        \Boot\Foundation\Providers\FileSystemProvider::class,

        /* App Service Providers... */
        \App\Providers\DatabaseServiceProvider::class,
        \App\Providers\BladeServiceProvider::class,
        \App\Providers\TranslatorServiceProvider::class,
    ],
    'aliases' => [
        'Auth' => \App\Support\Auth::class,
    ]
];