<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use \App\Http\Controllers\ProductController;




Route::get('/', function () {
    return view('home', [
        'products' => Product::with('vendor')->latest()->cursorPaginate(4)
    ]);
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/create', [ProductController::class, 'create']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/{product}', [ProductController::class, 'show']);
Route::get('/products/{product}/edit', [ProductController::class, 'edit']);
Route::patch('/products/{product}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);

Route::view('/contact', 'contact');
