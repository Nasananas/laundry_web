<x-layout3>
    @section('title', 'Layanan Laundry')

    @section('content')
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-2">Layanan Laundry</h2>

        <div class="space-y-4">
            @foreach ($produk as $item)
                <div class="flex items-center bg-white shadow-md rounded-lg p-4">

                    <!-- Deskripsi Produk -->
                    <div class="flex-1 ml-4">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $item->nama }}</h3>
                        <p class="text-gray-600">Rp{{ number_format($item->harga, 0, ',', '.') }}</p>
                        <p class=" text-lg text-gray-500">{{ $item->jenis }}</p>
                    </div>

                    <!-- Tombol Pilih -->
                    <div class="ml-auto">
                        <a href="{{ route('account.pesanan.aturpesanan', $item->id) }}" class="bg-blue-500 text-white text-sm font-semibold py-2 px-4 rounded-full hover:bg-blue-600 transition duration-300">
                            Pilih
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endsection
</x-layout3>
