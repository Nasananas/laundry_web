<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('admin.produk.produk', compact('produk'));
    }

    public function create()
    {
        return view('admin.produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|integer',
            'jenis' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $data = $request->only(['nama', 'harga','jenis', 'durasi']);
        
        // Handle image upload
        if ($request->hasFile('gambar')) {
            $fileName = time() . '.' . $request->gambar->extension();
            $path = $request->file('gambar')->storeAs('public/images', $fileName);
            $data['gambar'] = basename($path);
        }
    
        Produk::create($data);
    
        return redirect()->route('admin.produk')->with('success', 'Produk berhasil ditambahkan');
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|integer',
            'jenis' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $produk = Produk::findOrFail($id);
        $data = $request->only(['nama', 'harga','jenis', 'durasi']);
    
        // Handle image update
        if ($request->hasFile('gambar')) {
            if ($produk->gambar && Storage::exists('public/images/' . $produk->gambar)) {
                Storage::delete('public/images/' . $produk->gambar);
            }
    
            $fileName = time() . '.' . $request->gambar->extension();
            $path = $request->file('gambar')->storeAs('public/images', $fileName);
            $data['gambar'] = basename($path);
        }
    
        $produk->update($data);
    
        return redirect()->route('admin.produk')->with('success', 'Produk berhasil diupdate');
    }
    

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('admin.produk.edit', compact('produk'));
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
    
        // Hapus gambar produk dari storage jika ada
        if ($produk->gambar && Storage::exists('public/images/' . $produk->gambar)) {
            Storage::delete('public/images/' . $produk->gambar);
        }
    
        $produk->delete();
    
        return redirect()->route('admin.produk')->with('success', 'Produk berhasil dihapus');
    }
    
}
