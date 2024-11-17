<x-layout3>
    @section('title', 'Pesanan Saya')

    @section('content')
    <div class="container mx-auto p-8 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold text-blue-900 mb-4">Pesanan Saya</h2>

        @foreach ($pesanan as $item)
        <div class="p-4 mb-6 bg-gray-200 border rounded-lg">
            <p class="text-lg font-medium text-gray-800">Pesanan ID: {{ $item->id }}</p>
            <p class="text-gray-700">Nama Produk: <span class="font-semibold">{{ $item->produk->nama }}</span></p>
            <p class="text-gray-700">Durasi: <span class="font-semibold">{{ $item->durasi->nama ?? 'Tidak ada' }}</span></p>
            <p class="text-gray-700">Parfum: <span class="font-semibold">{{ $item->pewangi->parfum ?? 'Tidak ada' }}</span></p>
            <p class="text-gray-700">Antar-Jemput: <span class="font-semibold">{{ $item->transport->nama ?? 'Tidak ada' }}</span></p>
            <p class="text-gray-700">Status Pembayaran: <span class="font-semibold">{{ $item->status_pembayaran }}</span></p>
            <p class="text-gray-700">Total Harga: <span class="font-semibold">Rp{{ number_format($item->total_harga, 0, ',', '.') }}</span></p>
            <p class="text-gray-700">Tanggal Pesanan: <span class="font-semibold">{{ $item->created_at->format('d-m-Y H:i') }}</span></p>
        </div>
        @endforeach    

        @if ($pesanan->isEmpty())
            <p class="text-gray-700">Tidak ada pesanan yang ditemukan.</p>
        @endif
    </div>
    @endsection
</x-layout3>
