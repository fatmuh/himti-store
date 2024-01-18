<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class TransactionController extends Controller
{
    public function index()
    {
        $data = Transaction::latest()->get();
        return view('admin.transaction.index', compact('data'));
    }

    public function update($id,Request $request){

        $update = Transaction::findOrFail($id);

        if($update->status == "Success"){
            return redirect()->route('admin.transaction.index')->with('error', 'Gagal Update, Karena status saat ini adalah "Success"!');
        }

        $update->status = $request->status;

        if($request->status == "Success"){
            foreach($update->detail as $detail){
                $stockUpdate = Product::findOrFail($detail->product->id);
                $stockUpdate->stock -= $detail->qty;
                if($stockUpdate->stock < 0){
                    return redirect()->route('admin.transaction.index')->with('error', 'Gagal Update, karena Tiket '.$stockUpdate->name.' Habis!');
                }
                $stockUpdate->save();
            }
        }

        $update->save();

        return redirect()->route('admin.transaction.index')->with('success', 'Berhasil Update!');
    }

    public function delete($id){
        
    }
}
