<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\Durasi;
use App\Models\Pewangi;
use App\Models\Transport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
        // Validasi input
        $request->validate([
            'produk_id' => 'required|exists:produk,id',
            'durasi' => 'nullable|exists:durasi,id',
            'parfum' => 'nullable|exists:pewangi,id',
            'antar_jemput' => 'nullable|exists:transport,id',
            'metode_pembayaran' => 'nullable|in:CASH,Transfer',
            'status_pembayaran' => 'nullable|in:Lunas,Hutang',
            'status_pesanan' => 'nullable|in:Pending,Proses,Selesai',
            'dp' => 'nullable|numeric',
            'tanggal_jatuh_tempo' => 'nullable|date',
            'jumlah_pesanan' => 'nullable|numeric|min:1', // Ensure quantity is valid
        ]);
    
        $produk = Produk::findOrFail($request->produk_id);
        $transport = Transport::find($request->antar_jemput);
        $jumlahPesanan = $request->input('jumlah_pesanan', 1);
        $totalAntarJemput = $transport ? $transport->harga : 0;
        $totalHarga = ($produk->harga * $jumlahPesanan) + $totalAntarJemput;
        $tanggalJatuhTempo = $request->tanggal_jatuh_tempo ?? Carbon::now()->addDays(3);
    
        $pesanan = Pesanan::create([
            'user_id' => Auth::id(),
            'produk_id' => $request->produk_id,
            'jumlah_pesanan' => $jumlahPesanan,
            'durasi_id' => $request->durasi,
            'pewangi_id' => $request->parfum,
            'transport_id' => $request->antar_jemput,
            'status_pembayaran' => $request->status_pembayaran,
            'metode_pembayaran' => $request->metode_pembayaran,
            'dp' => $request->dp,
            'total_harga' => $totalHarga,
            'status_pesanan' => $request->status_pesanan ?? 'Pending',
            'tanggal_jatuh_tempo' => $tanggalJatuhTempo,
        ]);

        // Set Midtrans Config
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        // Menyiapkan parameter untuk Snap token
        $params = [
            'transaction_details' => [
                'order_id' => $pesanan->id,
                'gross_amount' => $pesanan->total_harga,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
        ];

        // Mendapatkan Snap token
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // Simpan token ke database
        $pesanan->snap_token = $snapToken;
        $pesanan->save();
    
        // Redirect ke halaman checkout dengan Snap Token
        return redirect()->route('account.pesanan', $pesanan->id)->with('success', 'Pesanan berhasil dibuat');
    }

    public function success(Pesanan $pesanan)
    {
        // Update status pembayaran menjadi Lunas
        $pesanan->status_pembayaran = 'Lunas';
        $pesanan->save();
    
        return view('success', compact('pesanan'));
    }
    

    public function index()
    {
        $user = Auth::user();
        $pesanan = Pesanan::where('user_id', $user->id)
            ->with('produk', 'durasi', 'pewangi', 'transport')
            ->get();

        return view('pelanggan.layanan.pesanan', compact('pesanan'));
    }

    public function invoice($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        return view('pelanggan.layanan.invoice', compact('pesanan'));
    }

    public function delete($id)
    {
        $pesanan = Pesanan::findOrFail($id);

        if ($pesanan->user_id !== Auth::id()) {
            return redirect()->route('account.pesanan')->with('error', 'Pesanan tidak ditemukan atau tidak diizinkan.');
        }

        $pesanan->delete();

        return redirect()->route('account.pesanan')->with('success', 'Pesanan berhasil dihapus.');
    }
}
