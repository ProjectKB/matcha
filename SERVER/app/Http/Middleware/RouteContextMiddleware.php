<?php

namespace App\Http\Middleware;

use App\Http\HttpKernel;
use App\Http\Requests\FormRequest;
use App\Support\Redirect;
use App\Support\RequestInput;
use Psr\Http\Server\RequestHandlerInterface as Handle;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Psr7\Factory\ResponseFactory;
use Slim\Routing\RouteContext;

class RouteContextMiddleware
{
    public function __invoke(Request $request, Handle $handler)
    {
        $route = RouteContext::fromRequest($request)->getRoute();

        throw_when(empty($route), "Route not found in request");

        app()->bind(Redirect::class, fn (ResponseFactory $factory) => new Redirect($factory));

        $input = new RequestInput($request, $route);
        app()->bind(RequestInput::class, $input);

        $kernel = app()->resolve(HttpKernel::class);

        collect($kernel->requests)->each(
            fn ($form) => app()->bind($form, function () use ($form, $request, $route): FormRequest {
                $input = new $form($request, $route);
                $input->validate();

                return $input;
            })
        );

        return $handler->handle($request);
    }
}