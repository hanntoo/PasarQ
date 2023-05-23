<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'role' => 'admin',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Pembeli',
            'email' => 'pembeli@email.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'role' => 'pembeli',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Penjual',
            'email' => 'penjual@email.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'role' => 'penjual',
            'remember_token' => Str::random(10),
        ]);

        // Menggabungkan factory dengan seeder untuk membuat user lainnya
        User::factory()
            ->times(5) // Jumlah user yang ingin di-generate
            ->create();
    }
}
