<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index', [
            'products' => Product::with('vendor')->latest()->paginate(4)
        ]);
    }
    public function create()
    {
        return view('products.create');
    }

    public function store()
    {
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
            'vendor_id' => Auth::user()->vendor->id,
        ]);

        return redirect('/products');
    }

    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product
        ]);
    }
    public function edit(Product $product)
    {
        return view('products.edit', [
            'product' => $product
        ]);
    }
    public function update(Product $product)
    {
        request()->validate([
            'name' => 'required|min:3|max:255',
            'price' => 'required|numeric',
        ]);

        $product->update([
            'name' => request('name'),
            'price' => request('price'),
        ]);

        return redirect('/products/' . $product->id);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products');
    }
}
