<?php

namespace App\Providers;

use App\Support\Translator;

class TranslatorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->bind(Translator::class, fn () => new Translator());
    }

    public function boot()
    {

    }
}