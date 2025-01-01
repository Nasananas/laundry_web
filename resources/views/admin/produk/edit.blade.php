<x-layout2>
    @section('title', 'Edit Produk')

    @section('content')
        <div class="container mx-auto px-4 py-6">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Produk</h2>
            <form action="{{ route('admin.produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PATCH')

                <div>
                    <label for="nama" class="block text-gray-700 font-semibold">Nama Produk</label>
                    <input type="text" name="nama" id="nama" value="{{ $produk->nama }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Nama Produk" required>
                </div>

                <div>
                    <label for="harga" class="block text-gray-700 font-semibold">Harga</label>
                    <input type="number" name="harga" id="harga" value="{{ $produk->harga }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Harga produk" required>
                </div>

                <div>
                    <label for="jenis" class="block text-gray-700 font-semibold">Jenis Layanan</label>
                    <input type="text" name="jenis" id="jenis" value="{{ $produk->jenis }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Misal:satuan,kiloan, dll"required>
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    @endsection
</x-layout2>
