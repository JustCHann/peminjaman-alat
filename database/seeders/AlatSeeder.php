<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlatSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('alats')->insert([
            [
                'nama' => 'Laptop Lenovo',
                'kode' => 'LAP001',
                'jumlah' => 5,
                'kategori_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Proyektor Epson',
                'kode' => 'PRO001',
                'jumlah' => 2,
                'kategori_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Kamera Canon',
                'kode' => 'CAM001',
                'jumlah' => 3,
                'kategori_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
