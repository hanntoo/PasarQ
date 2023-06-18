<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\favorite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Produk;
use Illuminate\Support\Facades\View;

class FavoriteController extends Controller
{
    public function addFavorite(Request $request){
        $id_produk = $request->input('id_produk');
        $id_pembeli = Auth::user()->id;
        $favorite = favorite::where('id_produk', $id_produk)->where('id_pembeli', $id_pembeli)->first();
        if($favorite){
            return false;
        } 
        $favorite = new favorite;
        $favorite->id_produk = $id_produk;
        $favorite->id_pembeli = $id_pembeli;
        $favorite->save();
        // return response()->json([
        //     'message' => 'Produk berhasil ditambahkan ke favorite'
        // ], 200);
        return back();
    }

    public function removeFavorite(Request $request){
        $id_produk = $request->input('id_produk');
        $id_pembeli = Auth::user()->id;
        $favorite = favorite::where('id_produk', $id_produk)->where('id_pembeli', $id_pembeli)->first();
        if(!$favorite){
            return false;
        } 
        $favorite->delete();
        // direct back and not load
        //  return redirect()->back()->with('success', 'Produk berhasil dihapus dari favorite'); 
        return back();
    }

    public function getFavorite(){
        $id = Auth::user()->id;
        $favorites = Produk::select('produk.nama_produk', 'produk.harga_produk', 'produk.stok_produk', 'produk.id_produk', 'produk.foto_produk')
        ->join('favorite', 'produk.id_produk', '=', 'favorite.id_produk')
        ->join('users', 'favorite.id_pembeli', '=', 'users.id')
        ->where('favorite.id_pembeli', $id)
        ->get();

        $countFavorite = $favorites->count();

        return view('favorite', compact('favorites'));
    }
}
