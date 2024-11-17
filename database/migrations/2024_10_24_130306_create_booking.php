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
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat');
            $table->enum('status', ['pending', 'proses', 'selesai', 'batal'])->default('pending'); // Status pesanan
            $table->string('barang');
            $table->string('layanan');
            $table->decimal('tarif', 10, 2); 
            $table->decimal('total', 10, 2); 
            $table->enum('dibayar', ['belum_dibayar', 'belum_lunas', 'sudah_dibayar'])->default('belum_dibayar'); // Status pembayaran
            $table->decimal('diskon', 10, 2)->nullable(); // Diskon opsional
            $table->timestamps();
        });
    }
    
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
