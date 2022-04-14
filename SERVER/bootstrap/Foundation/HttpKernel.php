<?php

namespace Boot\Foundation;

use Boot\Foundation\Bootstrappers\LoadAliases;
use Boot\Foundation\Bootstrappers\LoadDebuggingPage;
use Boot\Foundation\Bootstrappers\LoadEnvironmentDetector;
use Boot\Foundation\Bootstrappers\LoadEnvironmentVariables;
use Boot\Foundation\Bootstrappers\LoadHttpMiddleware;
use Boot\Foundation\Bootstrappers\LoadServiceProviders;

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
        'web' => []
    ];

    public array $bootstrappers = [
        LoadEnvironmentDetector::class,
        LoadEnvironmentVariables::class,
        LoadDebuggingPage::class,
        LoadAliases::class,
        LoadHttpMiddleware::class,
        LoadServiceProviders::class,
    ];
}
