<?php

namespace App\Http;

use App\Http\Middleware\RouteContextMiddleware;
use App\Http\Requests\CompleteUserRequest;
use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\StoreRegisterRequest;
use App\Http\Requests\StoreResetPasswordRequest;
use App\Http\Requests\UpdateResetPasswordRequest;
use App\Http\Requests\UpdateUserRequest;
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
        StoreResetPasswordRequest::class,
        UpdateResetPasswordRequest::class,
        CompleteUserRequest::class,
        UpdateUserRequest::class,
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