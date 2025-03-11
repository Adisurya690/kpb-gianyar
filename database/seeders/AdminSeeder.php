<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            [
                'name' => 'Kader Pelestari Budaya Kabupaten Gianyar',
                'nickname' => 'KPB Gianyar',
                'profile_picture' => null, // Bisa diganti dengan default path
                'email' => 'kpbgianyar@gmail.com',
                'password' => Hash::make('admin123'), // Ganti dengan password yang kuat
                'role_id' => 1, // ID dari tabel roles
                'role' => 'superAdmin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kader Pelestari Budaya Kabupaten Gianyar 2',
                'nickname' => 'KPB Gianyar',
                'profile_picture' => null,
                'email' => 'gianyarkpb@gmail.com',
                'password' => Hash::make('admin123'),
                'role_id' => 1, // ID dari tabel roles
                'role' => 'superAdmin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
