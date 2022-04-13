<?php


require_once __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

return [
    'paths' => [
        'migrations' => database_path('migrations'),
        'seeds' => database_path('seeders'),
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_database' => 'slim',
        'slim' => [
            'adapter' => 'mysql',
            'host' => env('DB_HOST'),
            'name' => env('DB_NAME'),
            'user' => env('DB_USERNAME'),
            'pass' => env('DB_PASSWORD'),
            'charset' => 'utf8mb4',
        ]
    ]
];
