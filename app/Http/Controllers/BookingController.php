<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        // Ambil tanggal filter dari request, default-nya adalah hari ini
        $filterDate = $request->input('filter_date', now()->toDateString());
    
        // Ambil data pesanan berdasarkan tanggal yang difilter, hanya yang status pesanan 'Pending' dan 'Proses'
        $pesanan = Pesanan::with('user', 'produk', 'durasi', 'pewangi', 'transport')
            ->whereDate('created_at', $filterDate)
            ->whereIn('status_pesanan', ['Pending', 'Proses'])  // Filter berdasarkan status pesanan
            ->get();
    
        // Kirim data ke view
        return view('admin.booking', compact('pesanan', 'filterDate'));
    }
    
    

    public function updateStatus($id)
    {
        $pesanan = Pesanan::findOrFail($id);

        // Toggle status
        if ($pesanan->status_pesanan === 'Pending') {
            $pesanan->status_pesanan = 'Proses';
        } elseif ($pesanan->status_pesanan === 'Proses') {
            $pesanan->status_pesanan = 'Selesai';
        }

        // Save the updated status
        $pesanan->save();

        // Redirect back to the admin page with success message
        return redirect()->route('admin.booking')->with('success', 'Status pesanan berhasil diperbarui.');
    }


    public function invoice($id)
    {
        $pesanan = Pesanan::with('produk', 'durasi', 'pewangi', 'transport')->find($id);

        if (!$pesanan) {
            return redirect()->route('admin.booking')->with('error', 'Pesanan tidak ditemukan.');
        }

        return view('admin.invoice', compact('pesanan'));
    }
}
