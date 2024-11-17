<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pewangi extends Model
{
    use HasFactory;
    protected $table = 'pewangi';
    protected $fillable = ['parfum'];
}
