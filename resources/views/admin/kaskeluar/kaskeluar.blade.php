<x-layout2>
   @section('title', 'Kas Keluar')
   @section('content')
      <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Kas Keluar</h3>
               <!-- Tombol Tambah Pesanan -->
               <div class="mb-6">
                  <a href="{{ route('admin.kaskeluar.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                     <svg class="w-6 h-6 text-gray-100 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                     </svg>                      
                     Tambah
                  </a>
               </div>

               <!-- Tabel Kas Keluar -->
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">No</th>
                                <th scope="col" class="px-6 py-3">Tanggal</th>
                                <th scope="col" class="px-6 py-3">Nama Pengeluaran</th>
                                <th scope="col" class="px-6 py-3">Total</th>
                                <th scope="col" class="px-6 py-3">Keterangan</th>
                                <th scope="col" class="px-6 py-3"><span class="sr-only">Aksi</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kaskeluar as $no => $data)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $no + 1 }}</th>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($data->tanggal)->format('d M Y') }}</td>
                                <td class="px-6 py-4">{{ $data->nama_pengeluaran }}</td>
                                <td class="px-6 py-4">Rp {{ number_format($data->total, 2, ',', '.') }}</td>
                                <td class="px-6 py-4">{{ $data->keterangan }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.kaskeluar.edit', $data->id) }}" 
                                        class="inline-flex items-center py-2.5 px-5 mb-2 text-sm font-medium text-gray-900 bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 hover:underline">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.kaskeluar.delete', $data->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?');">
                                        @csrf
                                        <button type="submit" 
                                                class="inline-flex items-center py-2.5 px-5 mb-2 text-sm font-medium text-white bg-red-600 rounded-full border border-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
         </div>
      </div>
   </body>
</html>
@endsection
   
</x-layout2>
