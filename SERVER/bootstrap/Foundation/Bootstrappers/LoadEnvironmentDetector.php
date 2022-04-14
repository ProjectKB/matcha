<?php

namespace Boot\Foundation\Bootstrappers;

use App\Http\HttpKernel;
use Boot\Foundation\Kernel;
use App\Console\ConsoleKernel;

class LoadEnvironmentDetector extends Bootstrapper
{
    const HTTP_ENV = HttpKernel::class;

    public function boot()
    {
        $http = class_basename(self::HTTP_ENV) === class_basename($this->kernel);

        $this->app->bind('bootedViaHttp', fn () => $http);

        $this->app->bind(Kernel::class, fn () => $this->kernel);
    }
}
