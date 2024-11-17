<x-layout2>

    @section('title', 'Edit Kas Keluar')
    
    @section('content')
        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Edit Kas Keluar</h3>

        @if(session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form Edit Kas Keluar -->
        <form action="{{ route('admin.kaskeluar.update', $kaskeluar->id) }}" method="POST">
            @csrf
            @method('POST')
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900">Tanggal:</label>
                    <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $kaskeluar->tanggal) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                    @error('tanggal')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="nama_pengeluaran" class="block mb-2 text-sm font-medium text-gray-900">Nama Pengeluaran:</label>
                    <input type="text" name="nama_pengeluaran" id="nama_pengeluaran" value="{{ old('nama_pengeluaran', $kaskeluar->nama_pengeluaran) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                    @error('nama_pengeluaran')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="total" class="block mb-2 text-sm font-medium text-gray-900">Total:</label>
                    <input type="number" name="total" id="total" value="{{ old('total', $kaskeluar->total) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                    @error('total')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900">Keterangan:</label>
                    <textarea name="keterangan" id="keterangan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>{{ old('keterangan', $kaskeluar->keterangan) }}</textarea>
                    @error('keterangan')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Tombol Simpan -->
            <button type="submit" class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                Update
            </button>
        </form>
    @endsection

</x-layout2>
