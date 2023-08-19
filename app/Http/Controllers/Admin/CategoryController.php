<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::latest()->get();
        return view('admin.category.index', compact('data'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('image/category');
        }

        $slug = Str::slug($validatedData['name']);
        $validatedData['slug'] = $slug;

        Category::create($validatedData);
        return redirect()->route('admin.category.index')->with('toast_success', 'Kategori Berhasil Ditambah!');
    }

    public function update(Request $request, $id)
    {
        $item = Category::where('id', $id)->first();
        $data = $request->except(['_token']);

        if($request->file('image')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $data['image'] = $request->file('image')->store('image/category');
        }

        $slug = Str::slug($data['name']);
        $data['slug'] = $slug;

        $item->update($data);
        return redirect()->route('admin.category.index')->with('toast_success', 'Kategori Berhasil Diubah!');
    }

    public function delete($id)
    {
        $item = Category::findOrFail($id);
        if($item->image){
            Storage::delete($item->image);
        }
        $item->delete();
        return redirect()->route('admin.category.index')->with('toast_success', 'Kategori Berhasil Dihapus!');
    }
}
