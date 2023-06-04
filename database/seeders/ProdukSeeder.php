<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produk::create([
            'id_penjual' => 3,
            'kategori_produk' => 'buah',
            'nama_produk' => 'Apel',
            'harga_produk' => 5000,
            'berat_produk' => '1 kg',
            'foto_produk' => 'foto_apel.jpg',
            'deskripsi_produk' => 'Apel segar dari kebun',
            'stok_produk' => 10,
        ]);

        Produk::factory()
            ->times(9)
            ->create();
    }
}
