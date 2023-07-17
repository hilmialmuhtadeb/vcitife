<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequet;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(12);
        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function new()
    {
        $this->authorize('crud');

        return view('products.new', [
            'product' => new Product(),
            'categories' => Category::get()
        ]);
    }

    public function store(ProductRequet $request)
    {
        $this->authorize('crud');

        $attr = $request->all();

        $attr['category_id'] = request('category');
        $attr['slug'] = \Str::slug(request('name'));
        $attr['thumbnail'] = request('thumbnail')->store('/images/products');

        Product::create($attr);

        session()->flash('success', 'Asik ada produk baru nih..');
        return redirect(route('admin.products'));
    }

    public function edit(Product $product)
    {
        $this->authorize('crud');

        return view('products.edit', [
            'product' => $product,
            'categories' => Category::get()
        ]);
    }

    public function update(ProductRequet $request, Product $product)
    {
        $this->authorize('crud');

        $attr = $request->all();
        $attr['category_id'] = request('category');

        if (request('thumbnail')) {
            \Storage::delete($product->thumbnail);
            $attr['thumbnail'] = request('thumbnail')->store('/images/products');
        } else {
            $attr['thumbnail'] = $product->thumbnail;
        }

        $product->update($attr);

        session()->flash('success', 'Siip, informasi produkmu berhasil diperbarui..');
        return redirect(route('admin.products'));
    }

    public function destroy(Product $product)
    {
        $this->authorize('crud');

        \Storage::delete($product->thumbnail);
        $product->delete();

        session()->flash('success', 'Yeay! produk berhasil dihapus nih..');
        return back();
    }
}
