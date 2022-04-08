<?php

namespace App\Http\Controllers;

use App\Support\View;

class WelcomeController
{
    public function index($response)
    {
        $response->getBody()->write('Welcome Controller!');

        return $response;
    }

    public function show($response, $name)
    {
        $response->getBody()->write("Welcome {$name}!");

        return $response;
    }

    public function home(View $view)
    {
        return $view('auth.home', ['name' => 'zak']);
    }
}