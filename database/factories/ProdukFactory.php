<?php

namespace Database\Factories;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdukFactory extends Factory
{
    protected $model = Produk::class;

    public function definition()
    {
        $penjual = User::where('role', 'penjual')->inRandomOrder()->first();
        return [
            'id_penjual' => $penjual->id,
            'kategori_produk' => $this->faker->randomElement(['buah', 'sayur', 'daging', 'ikan', 'rempah-rempah', 'jajanan', 'elektronik', 'pakaian', 'aksesori', 'kosmetik', 'perabotan rumah', 'peralatan dapur', 'mainan', 'peralatan kantor', 'peralatan sekolah', 'olahraga']),
            'nama_produk' => $this->faker->word,
            'harga_produk' => $this->faker->numberBetween(1000, 100000),
            'berat_produk' => $this->faker->randomElement(['100 gram', '250 gram', '500 gram', '1 kg', '2 kg', '5 kg']),
            'foto_produk' => $this->faker->imageUrl(),
            'deskripsi_produk' => $this->faker->paragraph,
            'stok_produk' => $this->faker->numberBetween(0, 100),
        ];
    }
}
