<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject; // WAJIB ADA

class User extends Authenticatable implements JWTSubject // WAJIB IMPLEMENTS
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Atribut yang dapat diisi secara massal (Mass Assignable).
     */
    protected $fillable = [
        'store_id',
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * Atribut yang harus disembunyikan saat data dikirim (Serialization).
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Konfigurasi tipe data kolom (Casting).
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relasi: Setiap User (Admin/Kasir) dimiliki oleh satu Toko.
     */
    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * ==========================================
     * METODE WAJIB UNTUK JWT AUTHENTICATION
     * ==========================================
     */

    /**
     * Mendapatkan identifier yang akan disimpan di klaim JWT.
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Mendapatkan klaim kustom yang akan ditambahkan ke JWT.
     * Di sini kita masukkan role agar bisa dicek tanpa query DB lagi.
     */
    public function getJWTCustomClaims()
    {
        return [
            'role' => $this->role,
        ];
    }
}