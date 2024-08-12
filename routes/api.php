<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->prefix('v1')->group(function() {
    Route::resource('inventory-products', 'Api\V1\InventoryProductsController');
    Route::resource('users-address', 'Api\V1\UsersAddressController');
});