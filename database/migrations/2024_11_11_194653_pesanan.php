<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('produk_id')->constrained('produk')->onDelete('cascade');
            $table->foreignId('durasi_id')->nullable()->constrained('durasi')->onDelete('set null');
            $table->foreignId('pewangi_id')->nullable()->constrained('pewangi')->onDelete('set null');
            $table->foreignId('transport_id')->nullable()->constrained('transport')->onDelete('set null');
            $table->enum('status_pembayaran', ['belumlunas', 'lunas'])->default('belumlunas');
            $table->decimal('total_harga', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
