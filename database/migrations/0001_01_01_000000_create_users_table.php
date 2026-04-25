<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        // 1. Tabel Stores 
        // Karena tabel users butuh store_id sebagai referensi.
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('level', ['pusat', 'cabang', 'retail']);
            $table->text('address')->nullable();
            $table->timestamps();
        });

        // 2. Tabel Users
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            
            // Relasi: Menghubungkan user ke toko. 
            // constrained('stores') artinya dia merujuk ke tabel stores di atas.
            $table->foreignId('store_id')->nullable()->constrained('stores')->onDelete('cascade');
            
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            
            // Role user sesuai kebutuhan skenario aplikasi
            $table->enum('role', ['superadmin', 'admin', 'kasir'])->default('kasir');
            
            $table->rememberToken();
            $table->timestamps();
        });

        // 3. Tabel Pendukung (Bawaan Laravel)
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Batalkan migrasi (Hapus semua tabel jika rollback).
     */
    public function down(): void
    {
        // Hapus dengan urutan terbalik (Anak dulu baru Bapak)
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
        Schema::dropIfExists('stores');
    }
};