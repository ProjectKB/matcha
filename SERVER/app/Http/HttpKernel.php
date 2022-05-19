<?php

namespace App\Http;

use App\Http\Middleware\RouteContextMiddleware;
use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\StoreRegisterRequest;
use Boot\Foundation\HttpKernel as Kernel;

class HttpKernel extends Kernel
{
    /**
     * Injectable Form Request Validators
     *
     * @var array
     */
    public array $requests = [
        StoreLoginRequest::class,
        StoreRegisterRequest::class,
    ];

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