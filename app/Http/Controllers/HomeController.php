<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use App\Models\User;
use App\Models\Produk;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::id()){
            $role = Auth()->user()->role;
    
            if($role === 'admin'){
                $user = User::all();
                $kategori = Kategori::all();
                $produk = Produk::all();
                return view('admin.home', compact('user', 'kategori', 'produk'));
            }elseif($role === 'penjual'){
                $idPenjual = auth()->user()->id;
                $produk = Produk::where('id_penjual', $idPenjual)->get();
                return view('penjual.home', compact('produk'));
            }else{
                return view('home');
            }
        }else{
            return view('home');
        }
    }    
}
