<?php

namespace App\Http\Controllers;

use App\Http\Model\User;

class ApiController
{
    public function index($response, User $user)
    {
        $user->find(1);
        $response->getBody()->write(json_encode($user, JSON_PRETTY_PRINT));

        return $response;
    }
}