<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>OLIVIA Laundry</title>
</head>

<body class="h-full">
    <div class="min-h-full">
        
        

    <main>
      <x-navbar></x-navbar>
      {{-- <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        {{ $slot }}
      </div> --}}
      <x-hero></x-hero>

      <x-stats></x-stats>

      <x-about></x-about>

      <x-product></x-product>
      
      <x-contact></x-contact>

      <footer class="bg-gradient-to-br from-indigo-600 to-purple-600">
        <div class="max-w-7xl mx-auto py-12 px-4 overflow-hidden sm:px-6 lg:px-8">
          <nav class="flex flex-wrap justify-center" aria-label="Footer">
            <div class="px-5 py-2">
              <a href="#" class="text-base text-gray-100 hover:text-gray-200">About</a>
            </div>
            <div class="px-5 py-2">
              <a href="#" class="text-base text-gray-100 hover:text-gray-200">Shop</a>
            </div>
            <div class="px-5 py-2">
              <a href="#" class="text-base text-gray-100 hover:text-gray-200">Privacy Policy</a>
            </div>
            <div class="px-5 py-2">
              <a href="#" class="text-base text-gray-100 hover:text-gray-200">Contact</a>
            </div>
          </nav>
          <div class="mt-8 flex justify-center space-x-6">
            <a href="#" class="text-gray-100 hover:text-gray-200">
              <span class="sr-only">Facebook</span>
              <!-- Facebook Icon -->
              <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M22 12.1c0-5.5-4.4-10-9.9-10C6.5 2.1 2 6.5 2 12.1 2 17 5.8 21.3 10.5 22v-6.5H8v-2.6h2.5v-1.9c0-2.5 1.5-3.8 3.7-3.8 1 0 2 .1 2.2.1v2.5h-1.6c-1.3 0-1.7.7-1.7 1.6v1.6H18l-.5 2.6h-2.5V22C18.2 21.3 22 17 22 12.1z"/>
              </svg>
            </a>
            <a href="#" class="text-gray-100 hover:text-gray-200">
              <span class="sr-only">Twitter</span>
              <!-- Twitter Icon -->
              <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M23.5 5.7c-.9.4-1.8.6-2.7.8a4.7 4.7 0 0 0 2-2.6 9.6 9.6 0 0 1-3 1.1 4.7 4.7 0 0 0-8.1 4.3 13.4 13.4 0 0 1-9.7-5 4.7 4.7 0 0 0 1.4 6.3 4.8 4.8 0 0 1-2.1-.6v.1c0 2.3 1.6 4.2 3.7 4.6a4.8 4.8 0 0 1-2.1.1 4.7 4.7 0 0 0 4.4 3.3 9.5 9.5 0 0 1-5.8 2A9.7 9.7 0 0 0 9.5 21c6.2 0 9.7-5.2 9.7-9.7v-.4c.6-.5 1.3-1.2 1.8-1.9z"/>
              </svg>
            </a>
            <a href="#" class="text-gray-100 hover:text-gray-200">
              <span class="sr-only">Instagram</span>
              <!-- Instagram Icon -->
              <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M12 2.2c3.2 0 3.6 0 4.9.1 1.3.1 2 .3 2.5.6a5.3 5.3 0 0 1 1.9 1.9c.3.5.5 1.2.6 2.5.1 1.3.1 1.7.1 4.9s0 3.6-.1 4.9c-.1 1.3-.3 2-.6 2.5a5.3 5.3 0 0 1-1.9 1.9c-.5.3-1.2.5-2.5.6-1.3.1-1.7.1-4.9.1s-3.6 0-4.9-.1c-1.3-.1-2-.3-2.5-.6a5.3 5.3 0 0 1-1.9-1.9c-.3-.5-.5-1.2-.6-2.5-.1-1.3-.1-1.7-.1-4.9s0-3.6.1-4.9c.1-1.3.3-2 .6-2.5a5.3 5.3 0 0 1 1.9-1.9c.5-.3 1.2-.5 2.5-.6 1.3-.1 1.7-.1 4.9-.1m0-2.2c-3.2 0-3.7 0-5 .1-1.3.1-2.3.3-3.2.7A7.4 7.4 0 0 0 1.5 4.8c-.4 1-.6 2-0.7 3.2-.1 1.3-.1 1.7-.1 5s0 3.7.1 5c.1 1.3.3 2.3.7 3.2a7.4 7.4 0 0 0 3.2 3.2c1 .4 2 .6 3.2.7 1.3.1 1.7.1 5 .1s3.7 0 5-.1c1.3-.1 2.3-.3 3.2-.7a7.4 7.4 0 0 0 3.2-3.2c.4-1 .6-2 .7-3.2.1-1.3.1-1.7.1-5s0-3.7-.1-5c-.1-1.3-.3-2.3-.7-3.2a7.4 7.4 0 0 0-3.2-3.2c-1-.4-2-.6-3.2-.7-1.3-.1-1.8-.1-5-.1zM12 5.7a6.3 6.3 0 1 0 0 12.6 6.3 6.3 0 0 0 0-12.6zm0 10.4a4 4 0 1 1 0-8.1 4 4 0 0 1 0 8.1zm6.4-10.9a1.5 1.5 0 1 1 0-3.1 1.5 1.5 0 0 1 0 3.1z"/>
              </svg>
            </a>
          </div>
          <p class="mt-8 text-center text-base text-gray-100">&copy; 2024 Your Company, Inc. All rights reserved.</p>
        </div>
      </footer>      

    </main>
  </div>
      
</body>
</html>