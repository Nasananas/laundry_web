<x-layout2>
    @section('title', 'Tambah Transport Baru')

    @section('content')
        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Tambah Transport Baru</h3>
        <div class="bg-white shadow-lg rounded-lg p-6">
            <form action="{{ route('admin.transport.store') }}" method="POST">
                @csrf
                <div class="grid gap-6 mb-6">
                    <div>
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Jenis Transport</label>
                        <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 block w-full p-2.5" placeholder="Jenis parfum" required />
                    </div>
                    <div>
                        <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Potongan</label>
                        <input type="text" name="harga" id="harga" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Tarif" />
                        <p class="text-xs text-gray-500 mt-1">Opsional</p>
                    </div>
                </div>
                <button type="submit" class="px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none">
                    Simpan Transport
                </button>
            </form>
        </div>
    @endsection
</x-layout2>
