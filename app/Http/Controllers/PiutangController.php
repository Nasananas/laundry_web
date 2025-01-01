<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PiutangController extends Controller
{
    public function index()
    {
        // Mengambil pesanan dengan status pembayaran belum lunas
        $piutang = Pesanan::where('status_pembayaran', 'Hutang')->get();

        return view('admin.piutang.piutang', compact('piutang'));
    }

}
