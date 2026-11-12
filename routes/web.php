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
Route::post('/auth/login', [LoginController::class, 'store']) -> name('login.store');

Route::get('/auth/register', [RegisterController::class, 'index']) -> name('register');
Route::post('/auth/register', [RegisterController::class, 'store']) -> name('register.store');

Route::get('/email/verify/{id}/{hash}', function(EmailVerificationRequest $request){
    // fulfilled se encarga de verificar que la URL sea válida y no haya sido manipulada
    $request->fulfill();
    return redirect() -> route('dashboard') -> with('success', 'Tu E-mail ha sido verificado correctamente');
    // signed se encarga de verificar que la URL sea válida y no haya sido manipulada
    // auth se encarga de verificar que el usuario esté autenticad o
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/email/verify', function(){
    return view('auth.verify-email');
    /* middleware('auth') se encarga de verificar que el usuario esté autenticado
    se ejecuta antes de la función que se encarga de retornar la vista */
})-> middleware('auth')->name('verification.notice');

Route::get('/dashboard', function(){
    return view('dashboard');
})-> middleware(['auth', 'verified'])-> name('dashboard');