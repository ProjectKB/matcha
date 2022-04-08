<?php

namespace Boot\Foundation;

use Boot\Foundation\Bootstrappers\Bootstrapper;
use Slim\App;

abstract class Kernel
{
    public App $app;

    /**
     * Register application Bootstrap Loaders
     *
     * @var array
     */
    public array $bootstrap = [];

    public function __construct(App &$app)
    {
        $this->app = $app;

        $this->app->getContainer()->set(self::class, $this);

        Bootstrapper::setup($this->app, $this->bootstrap);
    }

    public static function bootstrap(App &$app)
    {
        return new static($app);
    }

    public function getApplication(): App
    {
        return $this->app;
    }
}