<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KasKeluar;

class KasKeluarController extends Controller
{
    // Method untuk menampilkan data kas keluar
    public function index(){
        $kaskeluar = KasKeluar::all(); // Menggunakan all() untuk mendapatkan semua data
        return view('admin.kaskeluar.kaskeluar', compact('kaskeluar'));
    }

    // Method untuk menampilkan form tambah kas keluar
    public function create(){
        return view('admin.kaskeluar.create');
    }

    
    public function submit(Request $request) {
        $request->validate([
            'tanggal' => 'required|date',
            'nama_pengeluaran' => 'required|string|max:255',
            'total' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        $kaskeluar = new KasKeluar();
        $kaskeluar->tanggal = $request->tanggal;
        $kaskeluar->nama_pengeluaran = $request->nama_pengeluaran;
        $kaskeluar->total = $request->total;
        $kaskeluar->keterangan = $request->keterangan;

        // Simpan data kas keluar ke database
        $kaskeluar->save();

        // Redirect atau kembali dengan pesan sukses
        return redirect()->route('admin.kaskeluar')->with('success', 'Data kas keluar berhasil ditambah!');
    }

    // Method untuk menampilkan form edit kas keluar
    public function edit($id) {
        $kaskeluar = KasKeluar::findOrFail($id);
        return view('admin.kaskeluar.edit', compact('kaskeluar'));
    }

    // Method untuk mengupdate data kas keluar
    public function update(Request $request, $id) {
        $request->validate([
            'tanggal' => 'required|date',
            'nama_pengeluaran' => 'required|string|max:255',
            'total' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        $kaskeluar = KasKeluar::findOrFail($id);
        $kaskeluar->tanggal = $request->tanggal;
        $kaskeluar->nama_pengeluaran = $request->nama_pengeluaran;
        $kaskeluar->total = $request->total;
        $kaskeluar->keterangan = $request->keterangan;

        // Update data kas keluar di database
        $kaskeluar->save();

        // Redirect atau kembali dengan pesan sukses
        return redirect()->route('admin.kaskeluar')->with('success', 'Data kas keluar berhasil diedit!');
    }

    // Method untuk menghapus data kas keluar
    public function delete($id) {
        $kaskeluar = KasKeluar::findOrFail($id);
        $kaskeluar->delete();
        return redirect()->route('admin.kaskeluar')->with('success', 'Data kas keluar berhasil dihapus!');
    }
}
