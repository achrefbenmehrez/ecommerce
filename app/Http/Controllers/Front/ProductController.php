<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        $categories = Category::get();
        $manufacturers = Manufacturer::get();

        return view('front.products.index', [
            'products' => $products,
            'categories' => $categories,
            'manufacturers' => $manufacturers
        ]);
    }

    public function show(Product $product)
    {
        return view('front.products.show', [
            'product' => $product
        ]);
    }
}
