<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{
    public function checkout(Request $request){

        // validation
        $this->validate($request, [
            'jumlah' => 'required',
            'total_harga' => 'required',
        ]);

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
        return redirect('/riwayat')->with('success', 'Checkout Berhasil!');
    }

    public function getProductCheckout ($id)
    {
        $produk = Produk::find($id);
        return view('checkout', compact('produk'));
    }

    public function getCheckout()
    {
        $id = Auth::user()->id;
        $produk = Produk::select('produk.nama_produk', 'checkout.total_harga', 'checkout.jumlah', 'produk.id_produk', 'produk.foto_produk', 'checkout.id')
        ->join('checkout', 'produk.id_produk', '=', 'checkout.id_produk')
        ->join('users', 'checkout.id_pembeli', '=', 'users.id')
        ->where('checkout.id_pembeli', $id)
        ->get();

        return view('riwayat', compact('produk'));
    }

    public function getCheckoutById($id)
    {
        $produk = Produk::select('produk.nama_produk', 'checkout.total_harga', 'checkout.jumlah', 'produk.id_produk', 'produk.foto_produk', 'users.id')
        ->join('checkout', 'produk.id_produk', '=', 'checkout.id_produk')
        ->join('users', 'checkout.id_pembeli', '=', 'users.id')
        ->where('checkout.id', $id)
            ->first();

        if (!$produk) {
            // Handle jika data tidak ditemukan
            return abort(404);
        }

        return view('checkout_detail', compact('produk'));
    }

    public function getCheckoutAdmin()
    {
        
    }

}
