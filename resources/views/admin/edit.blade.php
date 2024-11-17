<x-layout2>

   @section('title', 'Edit Pesanan')

   @section('content')
      <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Edit Pesanan</h3>
            
                <!-- Form Tambah Pesanan -->
                <form action="{{ route('admin.booking.update', $booking->id) }}" method="POST">
                    @csrf
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                            <input value="{{ $booking->nama }}" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Nama" required />
                        </div>
                        <div>
                            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                            <input value="{{ $booking->alamat }}" type="text" name="alamat" id="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Alamat" required />
                        </div>
                        <div>
                            <label for="barang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Barang</label>
                            <input value="{{ $booking->barang }}" type="text" name="barang" id="barang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Barang" required />
                        </div>
                        <div>
                            <label for="layanan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Layanan</label>
                            <input value="{{ $booking->layanan }}" type="text" name="layanan" id="layanan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Layanan" required />
                        </div>
                        <div>
                            <label for="tarif" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tarif</label>
                            <input value="{{ $booking->tarif }}" type="text" name="tarif" id="tarif" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Tarif" required />
                        </div>
                        <div>
                            <label for="status_pesanan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Pesanan</label>
                            <select name="status_pesanan" id="status_pesanan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option value="pending" {{ $booking->status_pesanan == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="proses" {{ $booking->status_pesanan == 'proses' ? 'selected' : '' }}>Proses</option>
                                <option value="selesai" {{ $booking->status_pesanan == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                <option value="batal" {{ $booking->status_pesanan == 'batal' ? 'selected' : '' }}>Batal</option>
                            </select>
                        </div>
                        <div>
                            <label for="status_pembayaran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Pembayaran</label>
                            <select name="status_pembayaran" id="status_pembayaran" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option value="belum_dibayar" {{ $booking->status_pembayaran == 'belum_dibayar' ? 'selected' : '' }}>Belum Dibayar</option>
                                <option value="belum_lunas" {{ $booking->status_pembayaran == 'belum_lunas' ? 'selected' : '' }}>Belum Lunas</option>
                                <option value="sudah_dibayar" {{ $booking->status_pembayaran == 'sudah_dibayar' ? 'selected' : '' }}>Sudah Dibayar</option>
                            </select>
                        </div>
                        <div>
                            <label for="diskon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Diskon</label>
                            <input type="number" name="diskon" id="diskon" value="{{ $booking->diskon }}" step="0.01" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Diskon (opsional)" />
                        </div> 
                    </div>
                   
            
                    <!-- Tombol Simpan -->
                    <button type="submit" class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Edit Pesanan
                    </button>
                </form>
            </div>
            
         </div>
      </div>
  </body>
</html>

@endsection
   
</x-layout2>
