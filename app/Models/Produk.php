<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    public function penjual()
    {
        return $this->belongsTo(User::class, 'id', 'id_penjual');
    }
    protected $guarded = [];
}
