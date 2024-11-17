<x-layout2>
    @section('title', 'Tambah Produk')

    @section('content')
        <div class="container mx-auto px-4 py-6">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Tambah Produk</h2>

            <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label for="nama" class="block text-sm font-semibold text-gray-700">Nama Produk</label>
                        <input type="text" name="nama" id="nama" class="mt-1 block w-full p-3 border border-gray-300 rounded-md" value="{{ old('nama') }}" placeholder="Nama produk" required>
                    </div>

                    <div>
                        <label for="harga" class="block text-sm font-semibold text-gray-700">Harga</label>
                        <input type="number" name="harga" id="harga" class="mt-1 block w-full p-3 border border-gray-300 rounded-md" value="{{ old('harga') }}" placeholder="Harga produk" required>
                    </div>

                    <div>
                        <label for="jenis" class="block text-sm font-semibold text-gray-700">Jenis layanan</label>
                        <input type="text" name="jenis" id="jenis" class="mt-1 block w-full p-3 border border-gray-300 rounded-md" value="{{ old('jenis') }}" placeholder="Misal:satuan,kiloan, dll" required>
                    </div>

                    <div>
                        <label for="gambar" class="block text-sm font-semibold text-gray-700">Gambar Produk</label>
                        <input type="file" name="gambar" id="gambar" class="mt-1 block w-full p-3 border border-gray-300 rounded-md">
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition duration-300">
                        Simpan Produk
                    </button>
                </div>
            </form>
        </div>
    @endsection
</x-layout2>
