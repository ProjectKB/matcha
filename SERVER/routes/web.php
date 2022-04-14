<?php

use App\Support\Route;

Route::get('/login', 'LoginController@show');
Route::post('/store', 'LoginController@store');
Route::get('/logout', 'LoginController@logout');

Route::get('/home', 'DashboardController@home');

Route::get('/register', 'RegisterController@show');
Route::post('/register', 'RegisterController@store');
