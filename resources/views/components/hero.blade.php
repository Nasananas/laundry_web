<section class="relative bg-white min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Background Gradient -->
    <div class="absolute inset-0 bg-gradient-to-br from-indigo-600 to-purple-600"></div>
    
    <!-- Hero Content -->
    <div class="container mx-auto px-6 lg:px-8 relative z-10">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
        
        <!-- Left Side - Text Content -->
        <div class="text-white space-y-6 lg:max-w-lg">
          <h1 class="text-5xl font-bold tracking-tight leading-tight">
            Cuci dan Setrika Sempurna, Solusi Laundry Tanpa Ribet!
          </h1>
          <p class="text-lg text-gray-200">
            Kami menggunakan teknologi moderen dan bahan terbaik untuk memastikan pakaian Anda terawat dengan sempurna
          </p>
          <div class="mt-6 flex gap-4">
            <a href="{{ route('account.login') }}" class="bg-purple-500 hover:bg-purple-700 text-white py-3 px-6 rounded-lg shadow-md">
              Pesan Sekarang
            </a>
            <a href="{{ route('account.login') }}" class="text-blue-100 hover:underline border border-white py-3 px-6 rounded-lg">
              Temukan lebih banyak
            </a>
          </div>
        </div>
  
        <!-- Right Side - Image -->
        <div class="flex justify-center lg:justify-end">
          <img src="img/img2.png" alt="Hero Image" class="rounded-lg max-w-full h-auto">
        </div>
      </div>
    </div>
  </section>
  