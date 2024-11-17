<x-layout2>
    @section('title', 'Daftar Produk')

    @section('content')
        <div class="container mx-auto px-4 py-6">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Daftar Produk</h2>
            <div class="mb-4 flex justify-end">
                <a href="{{ route('admin.produk.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition duration-300">
                    + Tambah Produk
                </a>
            </div>

            <ul class="space-y-4">
                @forelse($produk as $p)
                    <li class="flex items-center justify-between bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                        <div class="flex items-center space-x-4">
                            <!-- Gambar Produk -->
                            <img src="{{ Storage::url('images/' . $p->gambar) }}" alt="Gambar Produk" class="w-12 h-12 rounded mr-4">

                            <!-- Detail Produk -->
                            <div>
                                <p class="font-semibold text-lg text-gray-800">{{ $p->nama }}</p>
                                <p class="text-gray-700 text-lg">Rp{{ number_format($p->harga, 0, ',', '.') }}</p>
                                <p class=" text-lg text-gray-500">{{ $p->jenis }}</p>
                            </div>
                        </div>

                        <!-- Aksi -->
                        <div class="flex items-center space-x-3">
                            <a href="{{ route('admin.produk.edit', $p->id) }}" class="bg-green-500 hover:bg-green-600 text-white py-2 px-3 rounded-lg transition duration-300">
                                Edit
                            </a>

                            <form action="{{ route('admin.produk.delete', $p->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-3 rounded-lg transition duration-300" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </li>
                @empty
                    <li class="text-gray-500 text-center">Tidak ada produk yang tersedia.</li>
                @endforelse
            </ul>
        </div>
    @endsection
</x-layout2>