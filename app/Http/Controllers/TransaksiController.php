<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        // Ambil tanggal filter dari request, default-nya adalah hari ini
        $filterDate = $request->input('filter_date', now()->toDateString());

        // Ambil data transaksi dengan status pembayaran 'lunas' dan status pesanan 'selesai', dan filter berdasarkan tanggal
        $transaksi = Pesanan::where('status_pembayaran', 'lunas')
                            ->where('status_pesanan', 'selesai')
                            ->whereDate('created_at', $filterDate) // Filter by date
                            ->get();

        // Kirim data ke view
        return view('admin.transaksi.transaksi', compact('transaksi', 'filterDate'));
    }
}

