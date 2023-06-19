<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class DetailController extends Controller
{
        public function show($id)
    {
        $produk = Produk::find($id);
        return view('detail', compact('produk'));
    }
}
