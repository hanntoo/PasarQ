<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = 'keranjang';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_pembeli',
        'id_produk',
    ];

    public function pembeli()
    {
        return $this->belongsTo(User::class, 'id_pembeli', 'id');
    }

    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_produk', 'id_produk');
    }
}
