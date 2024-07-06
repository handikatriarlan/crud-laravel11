<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// route resource untuk products
Route::resource('/products', \App\Http\Controllers\ProductController::class);
