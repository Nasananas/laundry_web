<!DOCTYPE html>
<html class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>
    @vite('resources/css/app.css') <!-- Sesuaikan sesuai proyek -->
    <style>
        /* Tambahan custom CSS untuk background */
        .background-image {
            background-image: url('/img/bg-login.png'); /* Path gambar di direktori public */
            background-size: cover; /* Gambar memenuhi layar */
            background-position: center; /* Posisi gambar di tengah */
            min-height: 100vh; /* Tinggi penuh layar */
            width: 100%; /* Lebar penuh */
        }
    </style>
</head>
<body class="h-full background-image flex items-center justify-center">

<!-- Wrapper untuk Lapisan Putih -->
<div class="bg-white/90 shadow-lg rounded-xl p-8 sm:p-10 w-full max-w-md">
  <!-- Judul Halaman -->
  <div class="text-center mb-6">
    <h2 class="text-2xl font-bold leading-9 tracking-tight text-[#344C64]">
      Silakan Login ke OLIVIA
    </h2>
  </div>

  <!-- Notifikasi Success -->
  @if (Session::has('success'))
  <div class="alert flex p-4 mb-6 bg-green-100 rounded-lg" role="alert">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-600 mr-2">
      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
    </svg>
    <div class="text-green-700 text-sm font-medium">
      {{ Session::get('success') }}
    </div>
  </div>
  @endif

  <!-- Notifikasi Error -->
  @if (Session::has('error'))
  <div class="alert flex p-4 mb-6 bg-red-100 rounded-lg" role="alert">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600 mr-2">
      <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m0 4.5v.002M19.5 12a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z" />
    </svg>
    <div class="text-red-700 text-sm font-medium">
      {{ Session::get('error') }}
    </div>
  </div>
  @endif

  <!-- Form Login -->
  <form class="space-y-6" action="{{ route('account.authenticate') }}" method="POST">
    @csrf
    <!-- Input Email -->
    <div>
      <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
      <div class="mt-2">
        <input id="email" name="email" type="text" autocomplete="email" 
        class="block w-full rounded-md border border-gray-300 py-2 px-3 text-gray-900 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
    </div>

    <!-- Input Password -->
    <div>
      <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
      <div class="mt-2">
        <input id="password" name="password" type="password" autocomplete="current-password" 
        class="block w-full rounded-md border border-gray-300 py-2 px-3 text-gray-900 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
    </div>

    <!-- Tombol Submit -->
    <div>
      <button type="submit" 
        class="w-full flex justify-center rounded-md bg-gradient-to-br from-indigo-600 to-purple-600 px-4 py-2 text-sm font-semibold leading-6 text-white shadow-sm hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-indigo-600">
        Login
      </button>
    </div>
  </form>

  <!-- Link Registrasi -->
  <p class="mt-6 text-center text-sm text-gray-500">
    Bukan member?
    <a href="{{ route('account.register') }}" class="font-semibold text-indigo-600 hover:text-indigo-700">Registrasi</a>
  </p>
</div>

</body>
</html>
