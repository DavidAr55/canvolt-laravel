<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/inicio');
});

Route::get('/inicio', function () {
    return view('home');
});

Route::get('/iniciar-sesion', function () {
    return view('auth.login-register');
});

Route::post('/login', [AuthController::class, "login"])->name('auth.login');
Route::post('/signup', [AuthController::class, "signup"])->name('auth.signup');
Route::get('/cerrar-sesion', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/verify-email/{token}', [AuthController::class, 'verifyEmail'])->name('auth.verify_email');

