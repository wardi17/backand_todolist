<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategori')->insert([
            ['nama' => 'Elektronik'],
            ['nama' => 'Pakaian'],
            ['nama' => 'Makanan'],
        ]);
    }
}
