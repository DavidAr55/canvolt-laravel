<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/inicio');
});

Route::get('/inicio', [HomeController::class, 'index'])->name('inicio');

Route::get('/iniciar-sesion', function () {
    return view('auth.login-register');
});

Route::post('/login', [AuthController::class, "login"])->name('auth.login');
Route::post('/signup', [AuthController::class, "signup"])->name('auth.signup');
Route::get('/cerrar-sesion', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/verify-email/{token}', [AuthController::class, 'verifyEmail'])->name('auth.verify_email');
Route::get('/redirigir/iniciar-sesion', [AuthController::class, 'loginRedirect'])->name('login.redirect');

Route::get('/productos/{category}', [ShopController::class, 'index'])->name('shop');
Route::get('/productos/{category}/{product}', [ShopController::class, 'show'])->name('shop-prduct');

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'updateQuantity'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/carrito', [CartController::class, 'viewCart'])->name('cart');
Route::post('/carito/verificar/compra', [CartController::class, 'checkoutForm'])->name('cart.checkout.form');
Route::post('/carrito/pago', [CartController::class, 'validateClientData'])->name('cart.save.client');

