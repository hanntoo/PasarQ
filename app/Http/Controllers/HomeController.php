<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $produk = Produk::all();

        if (Auth::id()) {
            $role = Auth()->user()->role;

            if ($role === 'admin') {
                return view('admin.home', compact('produk'));
            } elseif ($role === 'penjual') {
                $produk = Produk::all();
                return view('penjual.home', compact('produk'));
            } else {
                return view('home', compact('produk'));
            }
        } else {
            return view('home', compact('produk'));
        }
    }
    public function search(Request $request){
        $keyword = $request->cari_produk;
        if($request->has('cari_produk')) {
            $produk = Produk::where(function ($query) use ($keyword) {
                $query->where('nama_produk', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('harga_produk', 'LIKE', '%' . $keyword . '%')
                    ->orWhereHas('kategori', function ($query) use ($keyword) {
                        $query->where('nama', 'LIKE', '%' . $keyword . '%');
                    })
                    ->orWhere('stok_produk', 'LIKE', '%' . $keyword . '%');
            })->get();
        }
        else{
            $produk = Produk::all();
        }
        return view('home',['produk' => $produk]);
    }
}
