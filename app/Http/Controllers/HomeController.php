<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $featured = Product::all()->load('category')->take(10);
        $bestSales = Product::all()->load('category')->take(6);
        $categories = Category::whereNull('parent_id')->with('products')->get();

        return view('welcome', [
            'featured' => $featured,
            'bestSales' => $bestSales,
            'categories' => $categories
        ]);
    }
}
