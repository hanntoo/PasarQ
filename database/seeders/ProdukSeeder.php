<?php

namespace Database\Seeders;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penjual = User::where('role', 'penjual')->inRandomOrder()->first();
        Produk::create([
            'id_penjual' => $penjual->id,
            'id_kategori' => 1,
            'nama_produk' => 'Apel',
            'harga_produk' => 30000,
            'berat_produk' => '1 kg',
            'foto_produk' => 'https://cdn-icons-png.flaticon.com/512/2909/2909787.png',
            'deskripsi_produk' => 'Apel segar dari kebun',
            'stok_produk' => 120,
        ]);

        Produk::create([
            'id_penjual' => $penjual->id,
            'id_kategori' => 1,
            'nama_produk' => 'Mangga',
            'harga_produk' => 25000,
            'berat_produk' => '1 kg',
            'foto_produk' => 'https://cdn-icons-png.flaticon.com/512/2909/2909899.png',
            'deskripsi_produk' => 'Mangga segar dari kebun',
            'stok_produk' => 40,
        ]);

        Produk::create([
            'id_penjual' => $penjual->id,
            'id_kategori' => 1,
            'nama_produk' => 'Pisang',
            'harga_produk' => 30000,
            'berat_produk' => '500 g',
            'foto_produk' => 'https://cdn-icons-png.flaticon.com/512/2909/2909761.png',
            'deskripsi_produk' => 'Pisang segar dari kebun',
            'stok_produk' => 200,
        ]);

        Produk::create([
            'id_penjual' => $penjual->id,
            'id_kategori' => 2,
            'nama_produk' => 'Wortel',
            'harga_produk' => 25000,
            'berat_produk' => '1 kg',
            'foto_produk' => 'https://cdn-icons-png.flaticon.com/512/4056/4056860.png',
            'deskripsi_produk' => 'Wortel segar dari kebun',
            'stok_produk' => 1000,
        ]);

        Produk::create([
            'id_penjual' => $penjual->id,
            'id_kategori' => 2,
            'nama_produk' => 'Terong',
            'harga_produk' => 25000,
            'berat_produk' => '1 kg',
            'foto_produk' => 'https://cdn-icons-png.flaticon.com/512/7830/7830755.png',
            'deskripsi_produk' => 'Terong segar dari kebun',
            'stok_produk' => 100,
        ]);

        Produk::create([
            'id_penjual' => $penjual->id,
            'id_kategori' => 2,
            'nama_produk' => 'Cabe',
            'harga_produk' => 80000,
            'berat_produk' => '1 kg',
            'foto_produk' => 'https://cdn-icons-png.flaticon.com/512/3944/3944137.png',
            'deskripsi_produk' => 'Terong segar dari kebun',
            'stok_produk' => 700,
        ]);
        
        Produk::create([
            'id_penjual' => $penjual->id,
            'id_kategori' => 3,
            'nama_produk' => 'Ikan Mas',
            'harga_produk' => 50000,
            'berat_produk' => '500 g',
            'foto_produk' => 'https://cdn-icons-png.flaticon.com/512/9763/9763694.png',
            'deskripsi_produk' => 'Ikan segar',
            'stok_produk' => 200,
        ]);

        Produk::create([
            'id_penjual' => $penjual->id,
            'id_kategori' => 3,
            'nama_produk' => 'Daging Ayam',
            'harga_produk' => 100000,
            'berat_produk' => '500 g',
            'foto_produk' => 'https://cdn-icons-png.flaticon.com/512/10753/10753522.png',
            'deskripsi_produk' => 'Daging Ayam berkualitas tinggi',
            'stok_produk' => 500,
        ]);

        Produk::create([
            'id_penjual' => $penjual->id,
            'id_kategori' => 3,
            'nama_produk' => 'Daging Sapi',
            'harga_produk' => 250000,
            'berat_produk' => '1 kg',
            'foto_produk' => 'https://cdn-icons-png.flaticon.com/512/1134/1134447.png',
            'deskripsi_produk' => 'Daging Ayam berkualitas tinggi',
            'stok_produk' => 100,
        ]);
    }
}
