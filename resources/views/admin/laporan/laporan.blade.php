<x-layout2>
    @section('title', 'Laporan')

    @section('content')
        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Laporan Keuangan</h3>

        <!-- Filter Form -->
        <form method="GET" action="{{ route('admin.laporan.index') }}" class="mb-4 flex space-x-4">
            <!-- Tanggal Filter -->
            <div>
                <label for="filter_date" class="block text-sm font-medium text-gray-700">Tanggal</label>
                <input type="date" id="filter_date" name="filter_date" value="{{ request('filter_date', now()->toDateString()) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div class="mt-5">
                <button type="submit" 
                    class="px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded-md hover:bg-blue-600">
                    Tampilkan
                </button>
            </div>

            <!-- Refresh Icon Button -->
            <div class="mt-5">
                <a href="{{ route('admin.laporan.index') }}" class="inline-flex items-center px-4 py-2 text-[#556bce] hover:text-[#d5ddff] focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                    <!-- SVG Icon for Refresh -->
                    <svg class="w-6 h-6 text-[#556bce]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.651 7.65a7.131 7.131 0 0 0-12.68 3.15M18.001 4v4h-4m-7.652 8.35a7.13 7.13 0 0 0 12.68-3.15M6 20v-4h4"/>
                    </svg>
                </a>
            </div>
        </form>

        <!-- Tabel Laporan -->
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="py-3 px-4 text-left text-gray-600">Tanggal Pemesanan</th>
                        <th class="py-3 px-4 text-left text-gray-600">Jumlah Pemasukan</th>
                        <th class="py-3 px-4 text-left text-gray-600">Jumlah Kas Masuk</th>
                        <th class="py-3 px-4 text-left text-gray-600">Jumlah Kas Keluar</th>
                        <th class="py-3 px-4 text-left text-gray-600">Total Laba Rugi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="py-3 px-4 text-gray-700">{{ \Carbon\Carbon::parse($filterDate)->format('d-m-Y') }}</td>
                        <td class="py-3 px-4 text-gray-700">Rp{{ number_format($pemasukan, 0, ',', '.') }}</td>
                        <td class="py-3 px-4 text-gray-700">Rp{{ number_format($kasMasuk, 0, ',', '.') }}</td>
                        <td class="py-3 px-4 text-gray-700">Rp{{ number_format($kasKeluar, 0, ',', '.') }}</td>
                        <td class="py-3 px-4 text-gray-700">Rp{{ number_format($totalLabaRugi, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endsection
</x-layout2>
