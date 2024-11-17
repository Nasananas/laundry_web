<x-layout2>

    @section('title', 'Tambah Kas Masuk')
    
    @section('content')
        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Tambah Kas Masuk</h3>
                
                <!-- Form Tambah Kas Keluar -->
                <form action="{{ route('admin.kasmasuk.submit') }}" method="POST">
                    @csrf
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                        </div>
                        <div>
                            <label for="nama_pemasukan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pemasukan</label>
                            <input type="text" name="nama_pemasukan" id="nama_pemasukan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukkan Nama Pengeluaran" required />
                        </div>
                        <div>
                            <label for="total" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total</label>
                            <input type="text" name="total" id="total" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukkan Total" required />
                        </div>
                        <div>
                            <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukkan Keterangan" required></textarea>
                        </div>
                    </div>

                    <!-- Tombol Simpan -->
                    <button type="submit" class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Simpan Kas Masuk
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
   
</x-layout2>
