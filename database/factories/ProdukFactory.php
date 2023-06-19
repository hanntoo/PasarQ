<?php

namespace Database\Factories;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdukFactory extends Factory
{
    protected $model = Produk::class;

    public function definition()
    {
        $penjual = User::where('role', 'penjual')->inRandomOrder()->first();
        $kategori = Kategori::inRandomOrder()->first();
        return [
            'id_penjual' => $penjual->id,
            'id_kategori' => $kategori->id_kategori,
            'nama_produk' => $this->faker->word,
            'harga_produk' => $this->faker->numberBetween(1000, 100000),
            'berat_produk' => $this->faker->randomElement(['100 gram', '250 gram', '500 gram', '1 kg', '2', '5 kg']),
            'foto_produk' => $this->faker->imageUrl,
            'deskripsi_produk' => $this->faker->paragraph,
            'stok_produk' => $this->faker->numberBetween(0, 100),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
