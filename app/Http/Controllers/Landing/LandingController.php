<?php

namespace App\Http\Controllers\Landing;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;
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

        $user_id = auth()->user()->id;
        $product_id = $validatedData['product_id'];
        $quantity = $validatedData['quantity'];

        $existingCart = Cart::where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->first();

        if ($existingCart) {
            $existingCart->quantity += $quantity;
            $existingCart->price_total += $quantity * $existingCart->product->price;
            $existingCart->save();
        } else {
            $product = Product::findOrFail($product_id);

            Cart::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'quantity' => $quantity,
                'price_total' => $quantity * $product->price,
            ]);
        }

        return redirect()->route('landing.cart')->with('toast_success', 'Produk Berhasil Dimasukkan ke Keranjang!');
    }

    public function clearCart($id)
    {
        Cart::where('user_id', $id)->delete();
        return redirect()->route('landing.cart')->with('toast_success', 'Keranjang Berhasil Dihapus!');
    }

    public function checkout()
    {
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        $price_total = $carts->sum('price_total');
        return view('landing.checkout', compact('carts', 'price_total'));
    }

    public function checkoutStore(Request $request)
    {
        $params = $request->all();

        $transaction = \DB::transaction(function() use ($params) {

            $carts = Cart::all();

            if($carts->isEmpty()) {
                return redirect()->route('landing.cart')->with('toast_error', 'Transaction is Empty!');
            }

            $totalHarga = $carts->sum('price_total');
            $return = $params['accept'] - $totalHarga;


            $transactionParams = [
                'product_id' => $params['product_id'],
                'user_id' => auth()->user()->id,
                'price_total' => $params['price_total'],
                'type_of_payment' => $params['type_of_payment'],
                'proof_of_payment' => $params['proof_of_payment'],
                'status' => 'Pending',
			];

			$transaction = Transaction::create($transactionParams);

            $carts = Cart::all();

			if ($transaction && $carts) {
				foreach ($carts as $cart) {

                    $itemBaseTotal = $cart->quantity * $cart->product->price;

					$orderItemParams = [
						'product_id' => $cart->produk_id,
						'transaction_id' => $transaction->id,
						'qty' => $cart->quantity,
						'base_price' => $cart->produk->harga_jual,
						'base_total' => $itemBaseTotal,
					];

					$orderItem = DetailTransaksi::create($orderItemParams);

                    $cart->delete();
				}
            }

            return $transaction;
        });

		if ($transaction) {
			return redirect()->route('transaksi.detail', $transaction->id)->with('toast_success', 'Transaction Successfully!');
		}
    }
}
