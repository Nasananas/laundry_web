<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KasMasuk;

class KasMasukController extends Controller
{
    // Method untuk menampilkan data kas masuk
    public function index() {
        $kasmasuk = KasMasuk::all(); // Menggunakan all() untuk mendapatkan semua data
        return view('admin.kasmasuk.kasmasuk', compact('kasmasuk'));
    }

    // Method untuk menampilkan form tambah kas masuk
    public function create() {
        return view('admin.kasmasuk.create');
    }

    // Method untuk menyimpan data kas masuk ke database
    public function submit(Request $request) {
        $request->validate([
            'tanggal' => 'required|date',
            'nama_pemasukan' => 'required|string|max:255',
            'total' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        $kasmasuk = new KasMasuk();
        $kasmasuk->tanggal = $request->tanggal;
        $kasmasuk->nama_pemasukan = $request->nama_pemasukan;
        $kasmasuk->total = $request->total;
        $kasmasuk->keterangan = $request->keterangan;

        // Simpan data kas masuk ke database
        $kasmasuk->save();

        // Redirect atau kembali dengan pesan sukses
        return redirect()->route('admin.kasmasuk')->with('success', 'Data kas masuk berhasil ditambah!');
    }

    // Method untuk menampilkan form edit kas masuk
    public function edit($id) {
        $kasmasuk = KasMasuk::findOrFail($id);
        return view('admin.kasmasuk.edit', compact('kasmasuk'));
    }

    // Method untuk mengupdate data kas masuk
    public function update(Request $request, $id) {
        $request->validate([
            'tanggal' => 'required|date',
            'nama_pemasukan' => 'required|string|max:255',
            'total' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        $kasmasuk = KasMasuk::findOrFail($id);
        $kasmasuk->tanggal = $request->tanggal;
        $kasmasuk->nama_pemasukan = $request->nama_pemasukan; // Change this from nama_pengeluaran to nama_pemasukan
        $kasmasuk->total = $request->total;
        $kasmasuk->keterangan = $request->keterangan;

        // Update data kas masuk di database
        $kasmasuk->save();

        // Redirect atau kembali dengan pesan sukses
        return redirect()->route('admin.kasmasuk')->with('success', 'Data kas masuk berhasil diedit!');
    }

    // Method untuk menghapus data kas masuk
    public function delete($id) {
        $kasmasuk = KasMasuk::findOrFail($id);
        $kasmasuk->delete();
        return redirect()->route('admin.kasmasuk')->with('success', 'Data kas masuk berhasil dihapus!');
    }
}
