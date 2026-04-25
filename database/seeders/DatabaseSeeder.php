<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Jalankan database seeder.
     */
    public function run(): void
    {
        // Membuat User Super Admin untuk login pertama kali
        User::create([
            'name' => 'Rayan Super Admin',
            'email' => 'admin@toko.com',
            'password' => Hash::make('password123'), // Password harus di-hash agar bisa login
            'role' => 'superadmin',
            'store_id' => null, // Superadmin tidak terikat toko manapun
        ]);

    }
}