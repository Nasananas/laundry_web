<x-layout2>
    @section('title', 'Piutang Pelanggan')

    @section('content')
        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Piutang Pelanggan</h3>
        <p class="text-gray-700 mb-4">
            Hello, <span class="font-bold">{{ Auth::guard('admin')->user()->name }}!</span>
        </p>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="py-3 px-4 text-left text-gray-600">#</th>
                        <th class="py-3 px-4 text-left text-gray-600">Pelanggan</th>
                        <th class="py-3 px-4 text-left text-gray-600">Produk</th>
                        <th class="py-3 px-4 text-left text-gray-600">Tanggal</th>
                        <th class="py-3 px-4 text-left text-gray-600">Total Harga</th>
                        <th class="py-3 px-4 text-left text-gray-600">Jumlah DP</th>
                        <th class="py-3 px-4 text-left text-gray-600">Kekurangan</th>
                        <th class="py-3 px-4 text-left text-gray-600">Tanggal Jatuh Tempo</th>
                        <th class="py-3 px-4 text-left text-gray-600">Status Pembayaran</th>
                        <th class="py-3 px-4 text-left text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($piutang as $index => $item)
                        <tr class="border-b">
                            <td class="py-3 px-4 text-gray-700">{{ $index + 1 }}</td>
                            <td class="py-3 px-4 text-gray-700">{{ $item->user->name ?? 'Tidak ada' }}</td>
                            <td class="py-3 px-4 text-gray-700">{{ $item->produk->nama ?? 'Tidak ada' }}</td>
                            <td class="py-3 px-4 text-gray-700">{{ $item->created_at->format('d-m-Y H:i') }}</td>
                            <td class="py-3 px-4 text-gray-700">Rp{{ number_format($item->total_harga, 0, ',', '.') }}</td>
                            <td class="py-3 px-4 text-gray-700">Rp{{ number_format($item->dp, 0, ',', '.') }}</td>
                            <td class="py-3 px-4 text-gray-700">Rp{{ number_format($item->total_harga - $item->dp, 0, ',', '.') }}</td>
                            <td class="py-3 px-4 text-gray-700">
                                {{ $item->tanggal_jatuh_tempo ? \Carbon\Carbon::parse($item->tanggal_jatuh_tempo)->format('d-m-Y') : 'Tidak ada' }}
                            </td>
                            <td class="py-3 px-4">
                                <span 
                                    class="inline-block px-3 py-1 text-xs font-medium text-white rounded-full 
                                    {{ $item->status_pembayaran === 'Lunas' ? 'bg-green-500' : 'bg-red-500' }}">
                                    {{ ucfirst($item->status_pembayaran) }}
                                </span>
                            </td>
                            <td class="py-3 px-4">
                                <a href="#!" class="text-blue-500 hover:underline">Update Cicilan</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="py-3 px-4 text-gray-700 text-center">Belum ada piutang.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @endsection
</x-layout2>
