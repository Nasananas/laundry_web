<?php

namespace App\Http\Controllers;

use App\Models\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{

    public function create()
    {
        return view('admin.transport.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'nullable|integer', // Menjadikan harga opsional
        ]);
    
        Transport::create([
            'nama' => $request->nama,
            'harga' => $request->harga, // Tidak masalah jika null
        ]);
    
        return redirect()->route('admin.durasi.index')->with('success', 'Transport berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $transport = Transport::findOrFail($id);
        return view('admin.Transport.edit', compact('transport'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'nullable|integer',
        ]);

        $transport = Transport::findOrFail($id);
        $transport->update([
            'nama' => $request->nama,
            'harga' => $request->harga,

        ]);

        return redirect()->route('admin.durasi.index')->with('success', 'Transport berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $transport = Transport::findOrFail($id);
        $transport->delete();

        return redirect()->route('admin.durasi.index')->with('success', 'Transport berhasil dihapus!');
    }
}
