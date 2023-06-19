<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $table = 'checkout';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_pembeli',
        'id_produk',
        'jumlah',
    ];

    public function pembeli()
    {
        return $this->belongsTo(User::class, 'id_pembeli', 'id');
    }

    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_produk', 'id');
    }
}
