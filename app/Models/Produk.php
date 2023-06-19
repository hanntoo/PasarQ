<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'id_produk',
        'id_penjual',
        'id_kategori',
        'nama_produk',
        'harga_produk',
        'berat_produk',
        'foto_produk',
        'deskripsi_produk',
        'stok_produk',
    ];

    public function penjual()
    {
        return $this->belongsTo(User::class, 'id_penjual');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
    public function favorite()
    {
        return $this->hasMany(favorite::class, 'id_produk');
    }

    public function keranjang()
    {
        return $this->hasMany(Keranjang::class, 'id_produk');
    }

    public function checkout()
    {
        return $this->hasMany(Checkout::class, 'id_produk');
    }
}
    