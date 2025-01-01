<x-layout3>
    @section('title', 'History Pesanan')

    @section('content')
        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">History Pesanan Laundry</h3>

        <!-- Form Filter Tanggal -->
        <form action="{{ route('account.history') }}" method="GET" class="mb-4">
            <div class="flex items-center space-x-4">
                <div>
                    <label for="filter_date" class="block text-sm font-medium text-gray-700">Filter Tanggal</label>
                    <input type="date" id="filter_date" name="filter_date" value="{{ request('filter_date', now()->toDateString()) }}" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div class="mt-5">
                    <button type="submit" 
                        class="px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded-md hover:bg-blue-600">
                        Tampilkan
                    </button>
                </div>
                <!-- Refresh Button -->
                <div class="mt-5">
                    <a href="{{ route('account.history') }}" class="inline-flex items-center px-4 py-2 text-[#556bce] hover:text-[#d5ddff] focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                        <!-- SVG Icon for Refresh -->
                        <svg class="w-6 h-6 text-[#556bce]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.651 7.65a7.131 7.131 0 0 0-12.68 3.15M18.001 4v4h-4m-7.652 8.35a7.13 7.13 0 0 0 12.68-3.15M6 20v-4h4"/>
                        </svg>
                    </a>
                </div>
            </div>
        </form>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="py-3 px-4 text-left text-gray-600">#</th>
                        <th class="py-3 px-4 text-left text-gray-600">Pelanggan</th>
                        <th class="py-3 px-4 text-left text-gray-600">Produk</th>
                        <th class="py-3 px-4 text-left text-gray-600">Tanggal</th>
                        <th class="py-3 px-4 text-left text-gray-600">Total Harga</th>
                        <th class="py-3 px-4 text-left text-gray-600">Status Pembayaran</th>
                        <th class="py-3 px-4 text-left text-gray-600">Status Pesanan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pesanan as $index => $item)
                        <tr class="border-b">
                            <td class="py-3 px-4 text-gray-700">{{ $index + 1 }}</td>
                            <td class="py-3 px-4 text-gray-700">{{ $item->user->name ?? 'Tidak ada' }}</td>
                            <td class="py-3 px-4 text-gray-700">{{ $item->produk->nama ?? 'Tidak ada' }}</td>
                            <td class="py-3 px-4 text-gray-700">{{ $item->created_at->format('d-m-Y H:i') }}</td>
                            <td class="py-3 px-4 text-gray-700">Rp{{ number_format($item->total_harga, 0, ',', '.') }}</td>
                            <td class="py-3 px-4">
                                <span 
                                    class="inline-block px-3 py-1 text-xs font-medium text-white rounded-full 
                                    {{ $item->status_pembayaran === 'Lunas' ? 'bg-green-500' : 'bg-red-500' }}">
                                    {{ ucfirst($item->status_pembayaran) }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-gray-700">
                                <span 
                                    class="inline-block px-3 py-1 text-xs font-medium text-white rounded-full 
                                    {{ $item->status_pesanan === 'Selesai' ? 'bg-green-500' : 'bg-gray-500' }}">
                                    {{ ucfirst($item->status_pesanan) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-3 px-4 text-gray-700 text-center">Belum ada history pesanan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @endsection
</x-layout3>
