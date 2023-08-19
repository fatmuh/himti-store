<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        $data = Product::latest()->get();
        return view('admin.product.index', compact('categories', 'data'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|file|max:2048',
            'price' => 'required',
            'stock' => 'required',
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('image/product');
        }

        $slug = Str::slug($validatedData['name']);
        $validatedData['slug'] = $slug;

        Product::create($validatedData);
        return redirect()->route('admin.product.index')->with('success', 'Produk Berhasil Ditambah!');
    }

    public function update(Request $request, $id)
    {
        $item = Product::where('id', $id)->first();
        $data = $request->except(['_token']);

        if($request->file('image')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $data['image'] = $request->file('image')->store('image/product');
        }

        $slug = Str::slug($data['name']);
        $data['slug'] = $slug;

        $item->update($data);
        return redirect()->route('admin.product.index')->with('toast_success', 'Produk Berhasil Diubah!');
    }

    public function delete($id)
    {
        $item = Product::findOrFail($id);
        if($item->image){
            Storage::delete($item->image);
        }
        $item->delete();
        return redirect()->route('admin.product.index')->with('toast_success', 'Produk Berhasil Dihapus!');
    }
}
