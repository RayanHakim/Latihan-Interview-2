<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // Menghubungkan produk ke toko tertentu
            // onDelete('cascade') artinya jika toko dihapus, produknya juga ikut terhapus
            $table->foreignId('store_id')->constrained()->onDelete('cascade'); 
            
            $table->string('name');
            $table->string('sku')->unique(); // Contoh: BRG-001, harus unik
            $table->integer('stock')->default(0);
            $table->decimal('price', 15, 2); // Harga (maksimal 15 digit, 2 di belakang koma)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};