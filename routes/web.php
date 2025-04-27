<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\RegisterController;
use \App\Http\Controllers\SessionController;



// home route
Route::get('/', function () {
    return view('home', [
        'products' => Product::with('vendor')->latest()->cursorPaginate(4)
    ]);
});

// contact route
Route::view('/contact', 'contact');

// product routes
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/create', [ProductController::class, 'create'])->middleware('auth');

Route::get('/products/{product}', [ProductController::class, 'show']);

Route::post('/products', [ProductController::class, 'store'])->middleware('auth');

Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->middleware('auth')->can('edit-product', 'product');
Route::patch('/products/{product}', [ProductController::class, 'update'])->middleware('auth')->can('edit-product', 'product');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->middleware('auth')->can('edit-product', 'product');

// register routes
Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

// login routes
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
