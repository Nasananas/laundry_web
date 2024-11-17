<?php

namespace App\Http\Controllers\Pelanggan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        // Mengambil data pengguna yang sedang login
        $user = Auth::user();
        return view('pelanggan.akun.akun', compact('user'));
    }

    
}


