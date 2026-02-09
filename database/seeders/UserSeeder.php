<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nama' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Staff 1',
                'username' => 'staff1',
                'email' => 'staff1@gmail.com',
                'password' => Hash::make('staff123'),
                'role' => 'staff',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Peminjam 1',
                'username' => 'peminjam1',
                'email' => 'peminjam1@gmail.com',
                'password' => Hash::make('user123'),
                'role' => 'peminjam',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
