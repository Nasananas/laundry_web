<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\Durasi;
use App\Models\Pewangi;
use App\Models\Transport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function create($produkId)
    {
        $user = Auth::user();
        $produk = Produk::findOrFail($produkId);
        $durasi = Durasi::all();
        $pewangi = Pewangi::all();
        $transport = Transport::all();
        
        return view('pelanggan.layanan.aturpesanan', compact('produk', 'user', 'durasi', 'pewangi', 'transport'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produk,id',
            'durasi' => 'required|exists:durasi,id',
            'parfum' => 'nullable|exists:pewangi,id',
            'antar_jemput' => 'nullable|exists:transport,id',
        ]);
    
        // Ambil data terkait dari database
        $produk = Produk::findOrFail($request->produk_id);
        $durasi = Durasi::find($request->durasi);
        $pewangi = Pewangi::find($request->parfum);
        $transport = Transport::find($request->antar_jemput);
    
        // Hitung total harga
        $totalAntarJemput = $transport ? $transport->harga : 0;
        $totalHarga = $produk->harga + $totalAntarJemput;
    
        // Buat pesanan
        Pesanan::create([
            'user_id' => Auth::id(),
            'produk_id' => $request->produk_id,
            'durasi_id' => $request->durasi,
            'pewangi_id' => $request->parfum,
            'transport_id' => $request->antar_jemput,
            'status_pembayaran' => 'belumlunas', // Status default
            'total_harga' => $totalHarga,
        ]);
    
        return redirect()->route('account.pesanan')->with('success', 'Pesanan berhasil dibuat');
    }
    
    
    public function index()
    {
        $user = Auth::user();
        $pesanan = Pesanan::where('user_id', $user->id)
            ->with('produk', 'durasi', 'pewangi', 'transport')
            ->get(); // Mendapatkan pesanan dengan relasi
    
        return view('pelanggan.layanan.pesanan', compact('pesanan')); // Kirim data pesanan ke view
    }
    
}
