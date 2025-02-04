<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\hash;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */  public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password123'), // Ganti dengan password yang diinginkan
            'role' => 'admin', // Pastikan kolom ini ada di tabel users
        ]);
    }
}
