<?php

namespace App\Http\Controllers\Back;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('children')->get();

        return view('back.categories.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        $categories = Category::with('children')->get();

        return view('back.categories.create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $validatedCategory = $request->validate([
            'name' => 'required|max:255',
            'parent_id' => 'sometimes|nullable|exists:categories,id'
        ]);

        $validatedCategory['slug'] = Str::slug($validatedCategory['name']);

        Category::create($validatedCategory);

        return redirect()->route('admin.categories.index')->with('status', 'Categorie cree avec succes');
    }

    public function show(Category $category)
    {
        return $category;
    }

    public function edit(Category $category)
    {
        return view('back.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $validatedCategory = $request->validate([
            'name' => 'required|max:255',
            'parent_id' => 'exists:categories,id'
        ]);

        $category->name = $validatedCategory['name'];

        $category->save();

        return redirect()->route('admin.categories.index')->with('status', 'Categorie modifiee avec succes');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return 'Categorie' . $category->name . ' supprimée';
    }
}
