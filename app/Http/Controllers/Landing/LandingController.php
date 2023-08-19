<?php

namespace App\Http\Controllers\Landing;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        $products = Product::latest()->get();
        return view('landing.index', compact('categories', 'products'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $products = Product::where('category_id', $category->id)->get();
        return view('landing.category', compact('category', 'products'));
    }

    public function product($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('landing.detail-product', compact('product'));
    }

    public function cart()
    {
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        $price_total = $carts->sum('price_total');
        return view('landing.cart', compact('carts', 'price_total'));
    }

    public function cartStore(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required',
            'quantity' => 'required|numeric',
        ]);

        $product = Product::where('id', $validatedData['product_id'])->first();

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['price_total'] = $product->price * $validatedData['quantity'];

        Cart::create($validatedData);
        return redirect()->route('landing.cart')->with('toast_success', 'Produk Berhasil Dimasukan ke Keranjang!');
    }

    public function clearCart($id)
    {
        Cart::where('user_id', $id)->delete();
        return redirect()->route('landing.cart')->with('toast_success', 'Keranjang Berhasil Dihapus!');
    }
}
