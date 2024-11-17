<?php

namespace App\Http\Controllers;

use App\Models\Durasi;
use App\Models\Pewangi;
use App\Models\Transport;
use Illuminate\Http\Request;

class DurasiController extends Controller
{
    public function index()
    {
        $durasi = Durasi::all();  
        $pewangi = Pewangi::all();  
        $transport = Transport::all();  
        return view('admin.durasi.index', compact('durasi', 'pewangi', 'transport')); 
    }

    public function create()
    {
        return view('admin.durasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Durasi::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('admin.durasi.index')->with('success', 'Durasi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $durasi = Durasi::findOrFail($id);
        return view('admin.durasi.edit', compact('durasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $durasi = Durasi::findOrFail($id);
        $durasi->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('admin.durasi.index')->with('success', 'Durasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $durasi = Durasi::findOrFail($id);
        $durasi->delete();

        return redirect()->route('admin.durasi.index')->with('success', 'Durasi berhasil dihapus!');
    }
}
