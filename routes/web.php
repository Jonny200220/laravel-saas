<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

// Sintaxis de closure
Route::get('/', function () {
    return view('welcome');
});

// Sintaxis de controlador
// Route::get('/nosotros', [NosotrosController::class, 'index']);

// Utilizando el name en las rutas se pueden usar las rutas en el template base.blade.php

Route::get('/auth/login', [LoginController::class, 'index']) -> name('login');

Route::get('/auth/register', [RegisterController::class, 'index']) -> name('register');
Route::post('/auth/register', [RegisterController::class, 'store']) -> name('register.store');
