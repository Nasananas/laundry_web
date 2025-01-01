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
            $table->enum('status_pembayaran', ['Lunas', 'Hutang'])->nullable();
            $table->enum('metode_pembayaran', ['CASH', 'Transfer'])->nullable();
            $table->decimal('dp', 10, 2)->nullable();
            $table->decimal('total_harga', 10, 2);
            $table->enum('status_pesanan', ['Pending', 'Proses', 'Selesai'])->default('Pending');
            $table->date('tanggal_jatuh_tempo')->nullable();
            $table->integer('jumlah_pesanan')->default(1);
            $table->string('snap_token')->nullable();
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
