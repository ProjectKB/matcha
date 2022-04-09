<?php

return [
    'app' => env('APP_NAME', 'Matcha'),
    'providers' => [
        \App\Providers\DatabaseServiceProvider::class,
        \App\Providers\RouteServiceProvider::class,
        \App\Providers\ViewServiceProvider::class,
    ],
    'aliases' => []
];