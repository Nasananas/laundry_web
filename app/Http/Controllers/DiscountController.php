<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\DiscountLevel;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        // Mengambil data diskon dengan relasi levels
        $discounts = Discount::with('levels')->get();
        return view('admin.discount.create', compact('discounts')); // Sesuaikan path jika berbeda
    }

    public function create()
    {
        return view('admin.discount.create'); // Sesuaikan path jika berbeda
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'periode_mulai' => 'required|date',
            'periode_selesai' => 'required|date|after_or_equal:periode_mulai',
            'jenis_diskon' => 'required|string',
            'batas_pembelian' => 'required|integer|min:1',
            'levels.*.tingkat' => 'required|integer',
            'levels.*.jumlah_beli' => 'required|integer',
            'levels.*.diskon' => 'required|numeric|min:0|max:100',
        ]);
    
        // Menyimpan data diskon utama
        $discount = Discount::create($request->only(['nama_paket', 'periode_mulai', 'periode_selesai', 'jenis_diskon', 'batas_pembelian']));
    
        // Menyimpan data tingkat diskon
        foreach ($request->levels as $level) {
            DiscountLevel::create([
                'discount_id' => $discount->id,
                'tingkat' => $level['tingkat'],
                'jumlah_beli' => $level['jumlah_beli'],
                'diskon' => $level['diskon']
            ]);
        }
    
        // Redirect ke halaman pembuatan diskon dengan pesan sukses
        return redirect()->route('admin.discount.create')->with('success', 'Diskon berhasil dibuat');
    }
    
}
