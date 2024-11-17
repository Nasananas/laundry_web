<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'discount_id', 'tingkat', 'jumlah_beli', 'diskon'
    ];

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }
}
