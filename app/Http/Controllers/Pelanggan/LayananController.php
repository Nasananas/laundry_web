<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;
use App\Models\Produk;


class LayananController extends Controller
{
    public function index()    {
        $produk = Produk::all(); // Ambil semua data produk
        return view('pelanggan.layanan.product', compact('produk'));
    }

}
