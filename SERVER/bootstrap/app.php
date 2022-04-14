<?php

use App\Http\HttpKernel;
use DI\Container;
use Boot\Foundation\AppFactoryBridge as App;

$app = App::create(new Container);

$http_kernel = new HttpKernel($app);

$app->bind(HttpKernel::class, $http_kernel);

$_SERVER['app'] = &$app;

if (!function_exists('app'))
{
    function app()
    {
        return $_SERVER['app'];
    }
}

$app->addRoutingMiddleware();

/**
 * Resolve Http Kernel
 */
$kernel = $app->resolve(HttpKernel::class);

/**
 * Bootstrap Our Http Application
 */
$kernel->bootstrapApplication();

return $app;
