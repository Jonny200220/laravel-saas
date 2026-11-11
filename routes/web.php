<?php

use Illuminate\Support\Facades\Route;

// Sintaxis de closure
Route::get('/', function () {
    return view('welcome');
});

// Sintaxis de controlador
// Route::get('/nosotros', [NosotrosController::class, 'index']);

Route::get('/auth/login', function () {
    return view('auth.login');
}) -> name('login');

Route::get('/auth/register', function () {
    return view('auth.register');
}) -> name('register');