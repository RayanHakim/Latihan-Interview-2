<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'level',
        'address'
    ];

    /**
     * Relasi ke User (Satu toko punya banyak user: Admin & Kasir)
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Relasi ke Product (Satu toko punya banyak produk/barang)
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}