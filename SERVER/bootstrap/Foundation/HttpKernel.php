<?php

namespace Boot\Foundation;

use Boot\Foundation\Bootstrappers\LoadAliases;
use Boot\Foundation\Bootstrappers\LoadBladeTemplates;
use Boot\Foundation\Bootstrappers\LoadCsrf;
use Boot\Foundation\Bootstrappers\LoadDebuggingPage;
use Boot\Foundation\Bootstrappers\LoadEnvironmentDetector;
use Boot\Foundation\Bootstrappers\LoadEnvironmentVariables;
use Boot\Foundation\Bootstrappers\LoadHttpMiddleware;
use Boot\Foundation\Bootstrappers\LoadMailable;
use Boot\Foundation\Bootstrappers\LoadServiceProviders;
use Boot\Foundation\Bootstrappers\LoadSession;

class HttpKernel extends Kernel
{
    /**
     * Injectable Form Request Validators
     *
     * @var array
     */
    public array $requests = [];

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
        LoadSession::class,
        LoadEnvironmentDetector::class,
        LoadEnvironmentVariables::class,
        LoadDebuggingPage::class,
        LoadAliases::class,
        LoadCsrf::class,
        LoadHttpMiddleware::class,
        LoadBladeTemplates::class,
        LoadMailable::class,
        LoadServiceProviders::class,
    ];
}
