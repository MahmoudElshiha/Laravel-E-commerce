<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use \App\Http\Controllers\ProductController;




Route::get('/', function () {
    return view('home', [
        'products' => Product::with('vendor')->latest()->cursorPaginate(4)
    ]);
});

Route::resource('products', ProductController::class);

Route::view('/contact', 'contact');
