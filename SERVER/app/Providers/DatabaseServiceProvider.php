<?php

namespace App\Providers;

use App\Support\DB;

class DatabaseServiceProvider extends ServiceProvider
{

    public function register()
    {
        DB::connect();
        $this->bind(DB::class, fn () => new DB);
    }

    public function boot()
    {

    }
}