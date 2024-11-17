<x-layout2>
    @section('title', 'Invoice')

    @section('content')
    <div class="p-6 bg-white rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold">Invoice</h2>
                <p class="text-gray-600">{{ date('d-m-Y H:i:s', strtotime($booking->created_at)) }}</p>
            </div>
            <div>
                <button onclick="window.print()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Cetak Invoice
                </button>
            </div>
        </div>

        <div class="mb-4">
            <h3 class="text-lg font-bold">Pelanggan:</h3>
            <p>Nama: {{ $booking->nama }}</p>
            <p>Alamat: {{ $booking->alamat }}</p>
            <p>Status Pembayaran: {{ $booking->dibayar }}</p>
        </div>

        <div class="mb-4">
            <h3 class="text-lg font-bold">Detail Pesanan:</h3>
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 bg-gray-200">
                    <tr>
                        <th class="px-6 py-3">#</th>
                        <th class="px-6 py-3">Produk</th>
                        <th class="px-6 py-3">Harga</th>
                        <th class="px-6 py-3">Diskon</th>
                        <th class="px-6 py-3">Jenis Laundry</th>
                        <th class="px-6 py-3">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-6 py-4">1</td>
                        <td class="px-6 py-4">{{ $booking->barang }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($booking->tarif, 2, ',', '.') }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($booking->diskon ?? 0, 2, ',', '.') }}</td>
                        <td class="px-6 py-4">{{ $booking->layanan }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($booking->total, 2, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="flex justify-end mt-6">
            <div>
                <p class="text-gray-700">Subtotal: Rp {{ number_format($booking->tarif, 2, ',', '.') }}</p>
                <p class="text-gray-700">Diskon: Rp {{ number_format($booking->diskon ?? 0, 2, ',', '.') }}</p>
                <p class="text-gray-700 font-bold">Total Pembayaran: Rp {{ number_format($booking->total, 2, ',', '.') }}</p>
            </div>
        </div>
    </div>
    @endsection
</x-layout2>
