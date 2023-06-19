<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{
    public function checkout(Request $request){

        $id_produk = $request->input('id_produk');
        $id_pembeli = Auth::user()->id;
        $jumlah = $request->input('jumlah');
        $total = $request->input('total_harga');
        $produk = Produk::where('id_produk', $id_produk)->first();
        $checkout = Checkout::where('id_produk', $id_produk)->where('id_pembeli', $id_pembeli)->first();
        $checkout = new Checkout;
        $checkout->id_produk = $id_produk;
        $checkout->id_pembeli = $id_pembeli;
        $checkout->total_harga = $total;
        $checkout->jumlah = $jumlah;
        $checkout->save();
        $produk->stok_produk = $produk->stok_produk - $jumlah;
        $produk->save();
        return back();
    }

    public function getProductCheckout ($id)
    {
        $produk = Produk::find($id);
        return view('components.checkout', compact('produk'));
    }
}
