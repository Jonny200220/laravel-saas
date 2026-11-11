<?php

use Illuminate\Support\Facades\Route;

// Sintaxis de closure
Route::get('/', function () {
    return view('welcome');
});

// Sintaxis de controlador
// Route::get('/nosotros', [NosotrosController::class, 'index']);

// Utilizando el name en las rutas se pueden usar las rutas en el template base.blade.php

Route::get('/auth/login', function () {
    return view('auth.login');
}) -> name('login');

Route::get('/auth/register', function () {
    return view('auth.register');
}) -> name('register');