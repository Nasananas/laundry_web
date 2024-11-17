<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\KasMasukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KasKeluarController;
use App\Http\Controllers\Admin\AdminPesananController;

// use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Pelanggan\LayananController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DiskonController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\Pelanggan\ProfileController;
use App\Http\Controllers\DurasiController;
use App\Http\Controllers\PewangiController;
use App\Http\Controllers\TransportController;


Route::get('/', function () {
    return view('landing', ['title' => 'Home Page']);
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'About', 'posts' => Post::all()]);
});

Route::get('/posts/{slug}', function($slug) {
    $post = Post::find($slug);

    return view ('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/service', function () {
    return view('service', ['title' => 'Service']);
});
Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

// LOGIN AUTH PELANGGAN
Route::group(['prefix' => 'account'],function(){
    Route::group(['middleware' => 'guest'],function(){
        Route::get('login', [LoginController::class, 'index'])->name('account.login');
        Route::get('register', [LoginController::class, 'register'])->name('account.register');
        Route::post('process-register', [LoginController::class, 'processRegister'])->name('account.processRegister');
        Route::post('authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');

    });
    Route::group(['middleware' => 'auth'],function(){
        Route::get('logout', [LoginController::class, 'logout'])->name('account.logout');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('account.dashboard');
        Route::get('akun', [ProfileController::class, 'index'])->name('account.akun');
        Route::get('akun/edit', [ProfileController::class, 'edit'])->name('account.akun.edit');
        Route::put('akun', [ProfileController::class, 'update'])->name('account.akun.update');
        //PEMESANAN
        Route::get('layanan', [LayananController::class, 'index'])->name('account.layanan');
        Route::get('/pesanan/{produkId}/create', [PesananController::class, 'create'])->name('account.pesanan.aturpesanan');
        Route::post('pesanan', [PesananController::class, 'store'])->name('account.pesanan.store');
        Route::get('pesanan', [PesananController::class, 'index'])->name('account.pesanan'); 

    

    });
});

// LOGIN AUTH Admin
Route::group(['prefix' => 'admin'],function(){
    Route::group(['middleware' => 'admin.guest'],function(){
        Route::get('login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');

    });
    Route::group(['middleware' => 'admin.auth'],function(){
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
        //USERS
        Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('users/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('users', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('users/{id}', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
        //PESANAN
        Route::get('booking', [BookingController::class, 'index'])->name('admin.booking');
        Route::get('booking/create', [BookingController::class, 'create'])->name('admin.booking.create');
        Route::post('booking/submit', [BookingController::class, 'submit'])->name('admin.booking.submit');
        Route::get('booking/edit/{id}', [BookingController::class, 'edit'])->name('admin.booking.edit');
        Route::post('booking/update/{id}', [BookingController::class, 'update'])->name('admin.booking.update');
        Route::post('booking/delete/{id}', [BookingController::class, 'delete'])->name('admin.booking.delete');
        // invoice
        Route::get('/booking/{id}/invoice', [BookingController::class, 'invoice'])->name('admin.booking.invoice');
        //DISKON
        // Route di file web.php
        Route::get('discount', [DiscountController::class, 'index'])->name('admin.discount');
        Route::get('discount/create', [DiscountController::class, 'create'])->name('admin.discount.create');
        Route::post('discount/store', [DiscountController::class, 'store'])->name('admin.discount.store');    
        //PRODUK
        Route::get('produk', [ProdukController::class, 'index'])->name('admin.produk');
        Route::get('produk/create', [ProdukController::class, 'create'])->name('admin.produk.create');
        Route::post('produk/store', [ProdukController::class, 'store'])->name('admin.produk.store');
        Route::get('produk/{id}/edit', [ProdukController::class, 'edit'])->name('admin.produk.edit');
        Route::patch('produk/{id}/update', [ProdukController::class, 'update'])->name('admin.produk.update');
        Route::post('produk/{id}/delete', [ProdukController::class, 'destroy'])->name('admin.produk.delete');

        //DISKON
        Route::get('diskon', [DiskonController::class, 'index'])->name('admin.diskon');
        Route::get('diskon/create', [DiskonController::class, 'create'])->name('admin.diskon.create');
        Route::post('diskon/store', [DiskonController::class, 'store'])->name('admin.diskon.store');
        Route::get('diskon/{id}/edit', [DiskonController::class, 'edit'])->name('admin.diskon.edit');
        Route::post('diskon/{id}/update', [DiskonController::class, 'update'])->name('admin.diskon.update');
        Route::post('diskon/{id}/delete', [DiskonController::class, 'delete'])->name('admin.diskon.delete');
        //KAS KELUAR
        Route::get('kaskeluar', [KasKeluarController::class, 'index'])->name('admin.kaskeluar');
        Route::get('kaskeluar/create', [KasKeluarController::class, 'create'])->name('admin.kaskeluar.create');
        Route::post('kaskeluar/submit', [KasKeluarController::class, 'submit'])->name('admin.kaskeluar.submit');
        Route::get('kaskeluar/edit/{id}', [KasKeluarController::class, 'edit'])->name('admin.kaskeluar.edit');
        Route::post('kaskeluar/update/{id}', [KasKeluarController::class, 'update'])->name('admin.kaskeluar.update');
        Route::post('kaskeluar/delete/{id}', [KasKeluarController::class, 'delete'])->name('admin.kaskeluar.delete');
        //KAS MASUK
        Route::get('kasmasuk', [KasMasukController::class, 'index'])->name('admin.kasmasuk');
        Route::get('kasmasuk/create', [KasMasukController::class, 'create'])->name('admin.kasmasuk.create');
        Route::post('kasmasuk/submit', [KasMasukController::class, 'submit'])->name('admin.kasmasuk.submit');
        Route::get('kasmasuk/edit/{id}', [KasMasukController::class, 'edit'])->name('admin.kasmasuk.edit');
        Route::post('kasmasuk/update/{id}', [KasMasukController::class, 'update'])->name('admin.kasmasuk.update');
        Route::post('kasmasuk/delete/{id}', [KasMasukController::class, 'delete'])->name('admin.kasmasuk.delete');
        //durasi
        Route::get('durasi', [DurasiController::class, 'index'])->name('admin.durasi.index');
        Route::get('durasi/create', [DurasiController::class, 'create'])->name('admin.durasi.create');
        Route::post('durasi/store', [DurasiController::class, 'store'])->name('admin.durasi.store');
        Route::get('durasi/{id}/edit', [DurasiController::class, 'edit'])->name('admin.durasi.edit');
        Route::put('durasi/{id}/update', [DurasiController::class, 'update'])->name('admin.durasi.update');
        Route::delete('durasi/{id}/delete', [DurasiController::class, 'destroy'])->name('admin.durasi.delete');
        //parfum
        Route::get('pewangi/create', [PewangiController::class, 'create'])->name('admin.pewangi.create');
        Route::post('pewangi/store', [PewangiController::class, 'store'])->name('admin.pewangi.store');
        Route::get('pewangi/{id}/edit', [PewangiController::class, 'edit'])->name('admin.pewangi.edit');
        Route::put('pewangi/{id}/update', [PewangiController::class, 'update'])->name('admin.pewangi.update');
        Route::delete('pewangi/{id}/delete', [PewangiController::class, 'destroy'])->name('admin.pewangi.delete');   
        //transport
        Route::get('transport/create', [TransportController::class, 'create'])->name('admin.transport.create');
        Route::post('transport/store', [TransportController::class, 'store'])->name('admin.transport.store');
        Route::get('transport/{id}/edit', [TransportController::class, 'edit'])->name('admin.transport.edit');
        Route::put('transport/{id}/update', [TransportController::class, 'update'])->name('admin.transport.update');
        Route::delete('transport/{id}/delete', [TransportController::class, 'destroy'])->name('admin.transport.delete');  

    });
});


Route::get('/adminpesanan', [AdminPesananController::class, 'index']);
