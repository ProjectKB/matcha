<?php

return [
    'app' => env('APP_NAME', 'Matcha'),
    'providers' => [
        \App\Providers\DatabaseServiceProvider::class,
        \App\Providers\BladeServiceProvider::class,
    ],
    'aliases' => [
        'Auth' => \App\Support\Auth::class,
    ]
];