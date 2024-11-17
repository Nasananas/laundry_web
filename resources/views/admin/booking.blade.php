<x-layout2>
    @section('title', 'Pesanan Saya')

    @section('content')
        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Pesanan Saya</h3>
        <p class="text-gray-700 mb-4">
            Hello, <span class="font-bold">{{ Auth::guard('admin')->user()->name }}!</span>
        </p>

        <div class="mb-6">
            <a href="{{ route('admin.booking.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-6 h-6 text-gray-100 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                </svg>                       
                Tambah Pesanan
            </a>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Nama</th>
                        <th scope="col" class="px-6 py-3">Alamat</th>
                        <th scope="col" class="px-6 py-3">Status Pesanan</th>
                        <th scope="col" class="px-6 py-3">Barang</th>
                        <th scope="col" class="px-6 py-3">Layanan</th>
                        <th scope="col" class="px-6 py-3">Harga</th>
                        <th scope="col" class="px-6 py-3"><span class="sr-only">Aksi</span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($booking as $no => $data)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $no + 1 }}</th>
                        <td class="px-6 py-4">{{ $data->nama }}</td>
                        <td class="px-6 py-4">{{ $data->alamat }}</td>

                        <td class="px-6 py-4">
                            @if ($data->status == 'proses')
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">PROSES</span>
                            @elseif ($data->status == 'selesai')
                                <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">SELESAI</span>
                            @elseif ($data->status == 'batal')
                                <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">BATAL</span>
                            @else
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-900 dark:text-gray-300">PENDING</span>
                            @endif
                        </td>

                        <td class="px-6 py-4">{{ $data->barang }}</td>
                        <td class="px-6 py-4">{{ $data->layanan }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($data->tarif, 2, ',', '.') }}</td>

                        <td class="px-6 py-4 text-right flex space-x-2">
                            <a href="{{ route('admin.booking.edit', $data->id) }}" class="inline-flex items-center py-1.5 px-4 text-xs font-medium text-gray-900 bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700">
                                Edit
                            </a>
                        
                            <form action="{{ route('admin.booking.delete', $data->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?');">
                                @csrf
                                <button type="submit" class="inline-flex items-center py-1.5 px-4 text-xs font-medium text-white bg-red-600 rounded-full border border-red-600 hover:bg-red-700">
                                    Hapus
                                </button>
                            </form>

                            <a href="{{ route('admin.booking.invoice', $data->id) }}" class="inline-flex items-center py-1.5 px-4 text-xs font-medium text-gray-900 bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700">
                                Invoice
                            </a>
                        
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @endsection
</x-layout2>
