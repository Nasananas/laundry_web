<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    
    protected $table = 'pesanan';

    protected $fillable = [
        'user_id',
        'produk_id',
        'durasi_id',
        'pewangi_id',
        'transport_id',
        'status_pembayaran',
        'metode_pembayaran',
        'dp',
        'status_pesanan',
        'total_harga',
        'tanggal_jatuh_tempo',
        'jumlah_pesanan',
        'snap_token',
    ];

    // Relasi dengan model lain
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function durasi()
    {
        return $this->belongsTo(Durasi::class);
    }

    public function pewangi()
    {
        return $this->belongsTo(Pewangi::class);
    }

    public function transport()
    {
        return $this->belongsTo(Transport::class);
    }
}
