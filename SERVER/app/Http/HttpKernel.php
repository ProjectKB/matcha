<?php

namespace App\Http;

use App\Http\Middleware\ExampleAfterMiddleware;
use App\Http\Middleware\ExampleBeforeMiddleware;
use Boot\Foundation\HttpKernel as Kernel;

class HttpKernel extends Kernel
{
    /**
     * Global Middleware
     *
     * @var array
     */
    public array $middleware = [];

    /**
     * Route Group Middleware
     */
    public array $middlewareGroups = [
        'api' => [
//            ExampleAfterMiddleware::class,
        ],
        'web' => [
//            ExampleBeforeMiddleware::class,
        ],
    ];
}