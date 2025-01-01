<!DOCTYPE html>
<html class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    @vite('resources/css/app.css') <!-- Sesuaikan path proyek Tailwind CSS -->
    <style>
      .background-image {
          background-image: url('/img/bg-login.png'); /* Ganti dengan path gambar sesuai */
          background-size: cover;
          background-position: center;
          min-height: 100vh;
          width: 100%;
      }
      .form-container {
          background-color: rgba(255, 255, 255, 0.9); /* Lapisan putih transparan */
          padding: 2rem;
          border-radius: 8px;
          box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Shadow halus */
      }
    </style>
</head>
<body class="h-full background-image flex items-center justify-center">

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
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

  <div class="bg-white/90 shadow-lg rounded-xl p-8 sm:p-10 w-full max-w-md">
    <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-[#344C64]">
      Silakan Login Administrator
    </h2>

    <form class="space-y-6 mt-6" action="{{ route('admin.authenticate') }}" method="POST">
      @csrf
      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
        <div class="mt-2">
          <input id="email" name="email" type="text" autocomplete="email" @error('email') is-invalid @enderror value="{{ old('email') }}" 
                 class="block w-full rounded-md border border-gray-300 py-2 px-3 text-gray-900 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        @error('email')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
          <div class="text-sm">
            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
          </div>
        </div>
        <div class="mt-2">
          <input id="password" name="password" type="password" autocomplete="current-password" @error('password') is-invalid @enderror 
                 class="block w-full rounded-md border border-gray-300 py-2 px-3 text-gray-900 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        @error('password')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <button type="submit" 
                class="flex w-full justify-center rounded-md bg-gradient-to-br from-indigo-600 to-purple-600 px-4 py-2 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-gradient-to-br hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
          Login
        </button>
      </div>
    </form>
  </div>
</div>

</body>
</html>
