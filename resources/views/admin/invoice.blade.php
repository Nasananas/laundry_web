<x-layout3>
    @section('title', 'Invoice Pesanan')

    @section('content')
    <div class="container mx-auto p-8 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold text-blue-900 mb-4">Invoice Pesanan</h2>

        <!-- Informasi Pelanggan -->
        <div class="mb-6 bg-gray-100 p-4 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-gray-700 mb-3">Informasi Pelanggan</h3>
            <p class="text-gray-600">Nama Pelanggan: <span class="font-semibold">{{ $pesanan->user->name }}</span></p>
            <p class="text-gray-600">Email: <span class="font-semibold">{{ $pesanan->user->email }}</span></p>
            <p class="text-gray-600">Nomor Telepon: <span class="font-semibold">{{ $pesanan->user->no_tlpn ?? 'Belum diisi' }}</span></p>
            <p class="text-gray-600">Alamat: <span class="font-semibold">{{ $pesanan->user->alamat ?? 'Belum diisi' }}</span></p>
        </div>

        <!-- Detail Pesanan -->
        <div class="mb-6 bg-gray-100 p-4 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-gray-700 mb-3">Detail Pesanan</h3>
            <p class="text-gray-600">Nomor Pesanan: #{{ $pesanan->id }}</p>
            <p class="text-gray-600">Tanggal Pesanan: {{ $pesanan->created_at->format('d-m-Y H:i') }}</p>
            <p class="text-gray-600">Tanggal Jatuh Tempo: 
                @if ($pesanan->status_pembayaran === 'Hutang')
                    {{ $pesanan->tanggal_jatuh_tempo ? \Carbon\Carbon::parse($pesanan->tanggal_jatuh_tempo)->format('d-m-Y') : 'Tidak ada' }}
                @else
                    -
                @endif
            </p>
        </div>

        <table class="min-w-full bg-white border rounded-lg mb-6">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-3 px-4 text-left text-gray-600">Nama Produk</th>
                    <th class="py-3 px-4 text-left text-gray-600">Durasi</th>
                    <th class="py-3 px-4 text-left text-gray-600">Parfum</th>
                    <th class="py-3 px-4 text-left text-gray-600">Transport</th>
                    <th class="py-3 px-4 text-left text-gray-600">Harga</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="py-3 px-4 text-gray-700">{{ $pesanan->produk->nama }}</td>
                    <td class="py-3 px-4 text-gray-700">{{ $pesanan->durasi->jam }} Jam</td>
                    <td class="py-3 px-4 text-gray-700">{{ $pesanan->pewangi ? $pesanan->pewangi->parfum : 'Tidak ada' }}</td>
                    <td class="py-3 px-4 text-gray-700">{{ $pesanan->transport ? $pesanan->transport->nama : 'Tidak ada' }}</td>
                    <td class="py-3 px-4 text-gray-700">Rp{{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <div class="mb-4">
            <h3 class="text-xl font-semibold text-gray-700">Status Pembayaran</h3>
            <p class="text-gray-600">Metode Pembayaran: {{ ucfirst($pesanan->metode_pembayaran) }}</p>
            <p class="text-gray-600">Status Pembayaran: 
                <span class="{{ $pesanan->status_pembayaran === 'Lunas' ? 'text-green-600' : 'text-yellow-600' }}">
                    {{ ucfirst($pesanan->status_pembayaran) }}
                </span>
            </p>
        </div>

        <div class="mb-4">
            <h3 class="text-xl font-semibold text-gray-700">Status Pesanan</h3>
            <p class="text-gray-600">
                <span class="{{ $pesanan->status_pesanan === 'Pending' ? 'text-yellow-600' : ($pesanan->status_pesanan === 'Proses' ? 'text-blue-600' : 'text-green-600') }}">
                    {{ ucfirst($pesanan->status_pesanan) }}
                </span>
            </p>
        </div>

        <div class="mt-6 text-right">
            <h3 class="text-xl font-semibold text-gray-700">Total Pembayaran</h3>
            <p class="text-xl text-gray-700">Rp{{ number_format($pesanan->total_harga, 0, ',', '.') }}</p>
        </div>

        <div class="mt-6">
            <a href="{{ route('admin.booking') }}" class="inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Kembali ke Pesanan Saya</a>
        </div>
    </div>
    @endsection
</x-layout3>
