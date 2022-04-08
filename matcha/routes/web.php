<?php

use App\Support\Route;

Route::get('/home', 'WelcomeController@home')->setName('home');
Route::get('/', 'WelcomeController@index');
Route::get('/{name}', 'WelcomeController@show');