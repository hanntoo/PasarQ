<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PenjualController extends Controller
{
    public function index(){
        $idPenjual = auth()->user()->id;
        $produk = Produk::where('id_penjual', $idPenjual)->get();
        return view('penjual.dashboard', compact('produk'));
    }
    public function search(Request $request){
        $idPenjual = auth()->user()->id;
        $keyword = $request->cari_produk;
        if($request->has('cari_produk')) {
            $produk = Produk::where('id_penjual', $idPenjual)
            ->where(function ($query) use ($keyword) {
                $query->where('nama_produk', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('harga_produk', 'LIKE', '%' . $keyword . '%')
                    ->orWhereHas('kategori', function ($query) use ($keyword) {
                        $query->where('nama', 'LIKE', '%' . $keyword . '%');
                    })
                    ->orWhere('berat_produk', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('deskripsi_produk', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('stok_produk', 'LIKE', '%' . $keyword . '%');
            })
            ->get();
        }
        else{
            $produk = Produk::where('id_penjual', $idPenjual)->get();
        }
        return view('penjual.dashboard',['produk' => $produk]);
    }
    public function create()
    {
        $kategori = Kategori::all();
        return view('penjual.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|file|mimes:jpeg,jpg,png,webp',
            'nama_produk' => 'required|string',
            'harga_produk' => 'required|integer',
            'berat_produk' => 'required|string',
            'deskripsi_produk' => 'required|string',
            'stok_produk' => 'required|integer'
        ], [
            'required' => 'Kolom :attribute harus diisi',
            'integer' => 'Kolom :attribute harus berupa angka',
            'mimes' => 'Kolom :attribute hanya menerima foto dalam format jpg, jpeg, png, atau webp'
        ]);
        $produk = new Produk;
        $idPenjual = auth()->user()->id;
        $produk->id_penjual = $idPenjual;
        $produk->nama_produk = $request->nama_produk;
        $produk->id_kategori = $request->kategori_produk;
        $produk->harga_produk = $request->harga_produk;
        $produk->berat_produk = $request->berat_produk;
        if ($request->hasFile('foto')) {
            Storage::delete(str_replace('storage', 'public', $produk->foto_produk));
            $gambar = $request->file('foto');
            $path = $gambar->store('public/fotoproduk');
            $url = Storage::url($path);
            $produk->foto_produk = $url;
        }
        $produk->deskripsi_produk = $request->deskripsi_produk;
        $produk->stok_produk = $request->stok_produk;
        $produk->save();
        return redirect('/dashboard');
    }

    public function edit($id_produk)
    {
        $produk = Produk::find($id_produk);
        $kategori = Kategori::all();
        $idPenjual = auth()->user()->id;
        if ($produk->id_penjual != $idPenjual) {
        return redirect('/dashboard')->with('error', 'Tidak boleh nakal ya, jangan mengotak atik produk dari penjual lain');
    }
        return view('penjual.edit',compact(['produk', 'kategori']));
    }

    public function update($id_produk, Request $request)
    {
        $request->validate([
            'foto' => 'nullable|file|mimes:jpeg,jpg,png,webp',
            'nama_produk' => 'required|string',
            'harga_produk' => 'required|integer',
            'berat_produk' => 'required|string',
            'deskripsi_produk' => 'required|string',
            'stok_produk' => 'required|integer'
        ], [
            'required' => 'Kolom :attribute harus diisi',
            'integer' => 'Kolom :attribute harus berupa angka',
            'mimes' => 'Kolom :attribute hanya menerima foto dalam format jpg, jpeg, png, atau webp'
        ]);
        $produk = Produk::find($id_produk);
        $produk->nama_produk = $request->nama_produk;
        $produk->id_kategori = $request->kategori_produk;
        $produk->harga_produk = $request->harga_produk;
        $produk->berat_produk = $request->berat_produk;
        $produk->deskripsi_produk = $request->deskripsi_produk;
        $produk->stok_produk = $request->stok_produk;
        if ($request->hasFile('foto')) {
            Storage::delete(str_replace('storage', 'public', $produk->foto_produk));
            $gambar = $request->file('foto');
            $path = $gambar->store('public/fotoproduk');
            $url = Storage::url($path);
            $produk->foto_produk = $url;
        }
        $produk->save();
        return redirect('/dashboard');
    }

    public function destroy($id_produk){
        $produk = Produk::find($id_produk);
        if ($produk->id_penjual === auth()->user()->id) {
            Storage::delete(str_replace('storage', 'public', $produk->foto_produk));
            $produk->delete();
            return redirect('/dashboard');
        }
        return redirect('/dashboard')->with('error', 'Tidak boleh nakal ya, jangan mengotak atik produk dari penjual lain');
    }
}