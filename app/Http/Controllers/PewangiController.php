<?php

namespace App\Http\Controllers;

use App\Models\Pewangi;
use Illuminate\Http\Request;

class PewangiController extends Controller
{

    public function create()
    {
        return view('admin.pewangi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'parfum' => 'required|string|max:255',
        ]);

        Pewangi::create([
            'parfum' => $request->parfum,
        ]);

        return redirect()->route('admin.durasi.index')->with('success', 'Parfum berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pewangi = Pewangi::findOrFail($id);
        return view('admin.pewangi.edit', compact('pewangi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'parfum' => 'required|string|max:255',
        ]);

        $pewangi = Pewangi::findOrFail($id);
        $pewangi->update([
            'parfum' => $request->parfum,

        ]);

        return redirect()->route('admin.durasi.index')->with('success', 'Parfum berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pewangi = Pewangi::findOrFail($id);
        $pewangi->delete();

        return redirect()->route('admin.durasi.index')->with('success', 'Parfum berhasil dihapus!');
    }
}
