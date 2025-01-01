<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class HutangController extends Controller
{
    public function index()
    {
        $hutang = Pesanan::where('status_pembayaran', 'Hutang')->get();

        return view('pelanggan.hutang.hutang', compact('hutang'));
    }
}
