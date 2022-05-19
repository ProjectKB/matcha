<?php

namespace App\Http;

use App\Http\Middleware\RouteContextMiddleware;
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
        'api' => [],
        'web' => [
            'csrf',
            RouteContextMiddleware::class,
        ],
    ];
}