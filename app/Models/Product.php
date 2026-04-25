<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id', 
        'name', 
        'sku', 
        'stock', 
        'price'
    ];

    /**
     * Relasi: Produk ini milik sebuah Toko (Store)
     */
    public function store(): BelongsTo
    {
        // Menggunakan class lengkap agar tidak ada error "Class Store not found"
        return $this->belongsTo(\App\Models\Store::class);
    }
}