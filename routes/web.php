<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;




Route::get('/', function () {
    return view('home', [
        'products' => Product::with('vendor')->latest()->cursorPaginate(4)
    ]);
});

Route::get('/products', function () {
    return view('products.index', [
        'products' => Product::with('vendor')->latest()->paginate(4)
    ]);
});


Route::get('/products/create', function () {
    return view('products.create');
});


Route::post('/products', function () {
    request()->validate([
        'name' => 'required|min:3|max:255',
        'price' => 'required|numeric',
    ]);

    $images = [
        "https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-01.jpg",
        "https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-02.jpg",
        "https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-03.jpg",
        "https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-04.jpg",
    ];
    $image = fake()->randomElement($images);

    Product::create([
        'name' => request('name'),
        'price' => request('price'),
        'image' => $image,
        'vendor_id' => 1
    ]);

    return redirect('/products');
});
Route::get('/products/{product}', function (Product $product) {
    return view('products.show', [
        'product' => $product
    ]);
});

Route::get('/products/{product}/edit', function (Product $product) {
    return view('products.edit', [
        'product' => $product
    ]);
});

Route::patch('/products/{product}', function (Product $product) {
    request()->validate([
        'name' => 'required|min:3|max:255',
        'price' => 'required|numeric',
    ]);

    $product->update([
        'name' => request('name'),
        'price' => request('price'),
    ]);

    return redirect('/products/' . $product->id);
});

Route::delete('/products/{id}', function () {

    $product = Product::find(request('id'));
    $product->delete();
    return redirect('/products');
});



Route::get('/contact', function () {
    return view('contact');
});
