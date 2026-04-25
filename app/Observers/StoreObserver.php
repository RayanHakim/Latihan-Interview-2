<?php

namespace App\Observers;

use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreObserver
{
    /**
     * Menangani event "created" pada model Store.
     */
    public function created(Store $store): void
    {
        // 1. Buat user Admin otomatis untuk toko ini
        User::create([
            'store_id' => $store->id, // Hubungkan ke toko yang baru dibuat
            'name'     => 'Admin ' . $store->name,
            'email'    => 'admin.' . strtolower(str_replace(' ', '', $store->name)) . '@toko.com',
            'password' => Hash::make('password123'),
            'role'     => 'admin',
        ]);

        // 2. Buat user Kasir otomatis untuk toko ini
        User::create([
            'store_id' => $store->id,
            'name'     => 'Kasir ' . $store->name,
            'email'    => 'kasir.' . strtolower(str_replace(' ', '', $store->name)) . '@toko.com',
            'password' => Hash::make('password123'),
            'role'     => 'kasir',
        ]);
    }
}