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
                return view('penjual.home', compact('produk'));
            } else {
                return view('home', compact('produk'));
            }
        } else {
            return view('home', compact('produk'));
        }
    }
}
