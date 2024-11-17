<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Item; // Correct the import of the Item model

class BookingController extends Controller
{
    public function index()
    {
        $booking = Booking::get();
        return view('admin.booking', compact('booking'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function submit(Request $request)
    {
        $booking = new Booking();
        $booking->nama = $request->nama;
        $booking->alamat = $request->alamat;
        $booking->barang = $request->barang;
        $booking->layanan = $request->layanan;
        $booking->tarif = $request->tarif;
        $booking->total = $request->tarif - ($request->diskon ?? 0); // Total dikurangi diskon jika ada
        $booking->status = $request->status_pesanan;
        $booking->dibayar = $request->status_pembayaran;
        $booking->diskon = $request->diskon; // Diskon opsional
    
        // Simpan data booking ke database
        $booking->save();
    
        return redirect()->route('admin.booking')->with('success', 'Pesanan berhasil ditambah!');
    }

    public function edit($id)
    {
        $booking = Booking::find($id);
        return view('admin.edit', compact('booking'));
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::find($id);
        $booking->nama = $request->nama;
        $booking->alamat = $request->alamat;
        $booking->barang = $request->barang;
        $booking->layanan = $request->layanan;
        $booking->tarif = $request->tarif;
        $booking->total = $request->tarif - ($request->diskon ?? 0); // Total dikurangi diskon jika ada
        $booking->status = $request->status_pesanan;
        $booking->dibayar = $request->status_pembayaran;
        $booking->diskon = $request->diskon; // Diskon opsional
    
        // Simpan data booking ke database
        $booking->update();
    
        return redirect()->route('admin.booking')->with('success', 'Pesanan berhasil diperbarui!');
    }

    public function delete($id)
    {
        $booking = Booking::find($id);
        $booking->delete();
        return redirect()->route('admin.booking');
    }

    public function invoice($id)
    {
        $booking = Booking::find($id);
        return view('admin.invoice', compact('booking'));
    }


}
