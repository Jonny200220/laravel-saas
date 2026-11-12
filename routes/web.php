<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

Route::get('/email/verify/{id}/{hash}', function(EmailVerificationRequest $request){
    $request->fulfill();
    // signed se encarga de verificar que la URL sea válida y no haya sido manipulada
    // auth se encarga de verificar que el usuario esté autenticado
})->middleware('auth', 'signed') -> name('verification.verify');