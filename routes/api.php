<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function() {
    Route::resource('inventory-products', 'Api\V1\InventoryProductsController');
    Route::get('users-address/{token}', 'Api\V1\UsersAddressController@show');

    // Nueva ruta para obtener los datos más importantes de los productos
    Route::get('products-get-data', 'Api\V1\InventoryProductsController@getData');
});
