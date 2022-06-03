<?php

namespace App\Http\Middleware;

use App\Support\Auth;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as Handle;

class RedirectIfCompleted
{
    public function __invoke(Request $request, Handle $handler)
    {
        if (!Auth::isCompleted() ) {
            return redirect('/home');
        }

        return $handler->handle($request);
    }
}