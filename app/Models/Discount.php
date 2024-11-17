<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_paket', 'periode_mulai', 'periode_selesai', 'jenis_diskon', 'batas_pembelian'
    ];

    public function levels()
    {
        return $this->hasMany(DiscountLevel::class);
    }
}
