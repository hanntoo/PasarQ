<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk;

class KeranjangController extends Controller
{
    public function addKeranjang(Request $request){
        $id_produk = $request->input('id_produk');
        $id_pembeli = Auth::user()->id;
        $keranjang = Keranjang::where('id_produk', $id_produk)->where('id_pembeli', $id_pembeli)->first();
        if($keranjang){
            return false;
        } 
        $keranjang = new Keranjang;
        $keranjang->id_produk = $id_produk;
        $keranjang->id_pembeli = $id_pembeli;
        $keranjang->save();
        return back();
    }

    public function removeKeranjang(Request $request){
        $id_produk = $request->input('id_produk');
        $id_pembeli = Auth::user()->id;
        $keranjang = Keranjang::where('id_produk', $id_produk)->where('id_pembeli', $id_pembeli)->first();
        if(!$keranjang){
            return false;
        } 
        $keranjang->delete();
        return back();
    }

    public function getKeranjang (){
        $id = Auth::user()->id;
        $keranjang = Produk::select('produk.nama_produk', 'produk.harga_produk', 'produk.stok_produk', 'produk.id_produk', 'produk.foto_produk')
            ->join('keranjang', 'produk.id_produk', '=', 'keranjang.id_produk')
            ->join('users', 'keranjang.id_pembeli', '=', 'users.id')
            ->where('keranjang.id_pembeli', $id)
            ->get();
    
        return view('keranjang', compact('keranjang'));
    }
}

