<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;

class HistoryPesananController extends Controller
{
    public function index(Request $request)
    {
        // Ambil tanggal filter dari request, default-nya adalah hari ini
        $filterDate = $request->input('filter_date', now()->toDateString());

        // Ambil data pesanan dengan status pembayaran 'Lunas' dan status pesanan 'Selesai'
        $pesanan = Pesanan::with('user', 'produk', 'durasi', 'pewangi', 'transport')
            ->whereDate('created_at', $filterDate)
            ->where('status_pembayaran', 'Lunas')
            ->where('status_pesanan', 'Selesai')
            ->get();

        // Kirim data ke view
        return view('pelanggan.history.history', compact('pesanan', 'filterDate'));
    }
}
