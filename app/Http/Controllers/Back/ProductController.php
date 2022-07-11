<?php

namespace App\Http\Controllers\Back;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();

        return view('back.products.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        $categories = Category::get();

        return view('back.products.create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $validatedProduct = $request->validate([
            'name' => 'required|max:255',
            'price' => 'numeric',
            'description' => 'required|max:255',
            'photosUrl' => 'array',
            'category_id' => 'required|exists:categories,id'
        ]);

        if ($validatedProduct['photosUrl']) {
            $temp = array();

            foreach ($request->photosUrl as $photoUrl) {
                $imageName = time() . '_' . $photoUrl->getClientOriginalName();
                $imagePath = $photoUrl->storeAs('imagesProduits', $imageName, 'public');
                array_push($temp, 'storage/' . $imagePath);
            }

            $validatedProduct['photosUrl'] = $temp;
        }

        $validatedProduct['slug'] = Str::slug($validatedProduct['name']);
        $validatedProduct['stock'] = isset($request->stock) ? 1 : 0;

        Product::create($validatedProduct);

        return redirect()->route('admin.products.index')->with('status', 'Produit cree avec succes');
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function edit(Product $product)
    {
        return view('back.products.edit', [
            'product' => $product
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $validatedProduct = $request->validate([
            'name' => 'required|max:255',
            'price' => 'numeric',
            'description' => 'required|max:255',
            'price' => 'boolean'
        ]);

        $product->name = $validatedProduct['name'];
        $product->description = $validatedProduct['description'];
        $product->price = $validatedProduct['price'];
        $product->sale = $validatedProduct['sale'];
        $product->slug = Str::slug($validatedProduct['name']);

        $product->save();

        return $product;
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return 'Product' . $product->name . ' deleted';
    }

    public function setInStock(Product $product)
    {
        $product->stock = !$product->stock;
        $product->save();

        if ($product->stock) {
            return response()->json(['success' => 'Le produit est maintenant en stock.']);
        } else {
            return response()->json(['success' => "Le produit n'est plus en stock."]);
        }
    }
}
