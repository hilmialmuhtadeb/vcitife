<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store()
    {
        $attr['name'] = request('name');
        $attr['slug'] = \Str::slug(request('name'));

        Category::create($attr);

        session()->flash('success', 'Asik, kategori berhasil ditambahkan..');
        return back();
    }

    public function show(Category $category)
    {
        $products = Product::where('category_id', $category->id)->paginate(12);
        return view('products.index', compact('products', 'category'));
    }

    public function guide()
    {
        return view('guide');
    }
}
