<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Kasmasuk;
use App\Models\Kaskeluar;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        // Ambil tanggal filter dari request, default-nya adalah hari ini
        $filterDate = $request->input('filter_date', now()->toDateString());
        
        // Ambil data transaksi (pemasukan) berdasarkan tanggal yang difilter
        $pemasukan = Pesanan::whereDate('created_at', $filterDate)
                            ->where('status_pembayaran', 'lunas')
                            ->where('status_pesanan', 'selesai')
                            ->sum('total_harga');
        
        // Ambil data kas masuk berdasarkan tanggal yang difilter
        $kasMasuk = Kasmasuk::whereDate('tanggal', $filterDate)->sum('total');
        
        // Ambil data kas keluar berdasarkan tanggal yang difilter
        $kasKeluar = Kaskeluar::whereDate('tanggal', $filterDate)->sum('total');
        
        // Hitung total laba rugi
        $totalLabaRugi = $pemasukan + $kasMasuk - $kasKeluar;
        
        // Kirim data ke view
        return view('admin.laporan.laporan', compact('filterDate', 'pemasukan', 'kasMasuk', 'kasKeluar', 'totalLabaRugi'));
    }
}
