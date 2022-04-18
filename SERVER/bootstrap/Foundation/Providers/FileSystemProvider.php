<?php

namespace Boot\Foundation\Providers;

use Illuminate\Filesystem\Filesystem;

class FileSystemProvider extends SlimServiceProvider
{
    public function register()
    {
        $this->app->bind(Filesystem::class, new Filesystem);
    }

    public function boot()
    {

    }
}