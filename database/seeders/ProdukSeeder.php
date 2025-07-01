<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('produk')->insert([
            [
                'nama' => 'TV Samsung 32 inch',
                'kategori_id' => 1, // Elektronik
                'harga' => 2500000,
            ],
            [
                'nama' => 'Kaos Polos Putih',
                'kategori_id' => 2, // Pakaian
                'harga' => 75000,
            ],
            [
                'nama' => 'Mie Instan Goreng',
                'kategori_id' => 3, // Makanan
                'harga' => 3000,
            ],
        ]);
    }
}
