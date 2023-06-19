<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favorite extends Model
{
    use HasFactory;
    protected $table = 'favorite';
    protected $primaryKey = 'id_favorite';
    protected $fillable = [
        'id_pembeli',
        'id_produk',
    ];

    public function pembeli()
    {
        return $this->belongsToMany(User::class, 'id_pembeli', 'id');
    }

    public function produk()
    {
        return $this->belongsToMany(produk::class, 'id_produk', 'id_produk');
    }
}
