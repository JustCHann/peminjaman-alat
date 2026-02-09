<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategoris')->insert([
            ['nama' => 'Laptop', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Proyektor', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Kamera', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
