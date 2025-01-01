<x-layout3>
    @section('title', 'Pesanan Saya')

    @section('content')
    <div class="container mx-auto p-8 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold text-blue-900 mb-4">Pesanan Saya</h2>
        @if (session('success'))
            <div id="success-alert" class="p-4 mb-4 text-green-800 bg-green-200 rounded-lg flex justify-between items-center">
                <span>{{ session('success') }}</span>
                <button type="button" class="text-green-800 hover:text-green-600 font-bold" onclick="document.getElementById('success-alert').remove()">X</button>
            </div>
        @endif
        @if ($pesanan->isNotEmpty())
        <table class="min-w-full bg-white border rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-3 px-4 text-left text-gray-600">#</th>
                    <th class="py-3 px-4 text-left text-gray-600">Nama Produk</th>
                    <th class="py-3 px-4 text-left text-gray-600">Tanggal Pesanan</th>
                    <th class="py-3 px-4 text-left text-gray-600">Harga</th>
                    <th class="py-3 px-4 text-left text-gray-600">Qty</th>
                    <th class="py-3 px-4 text-left text-gray-600">Antar-Jemput</th>
                    <th class="py-3 px-4 text-left text-gray-600">Total Bayar</th>
                    <th class="py-3 px-4 text-left text-gray-600">Status Pesanan</th>
                    <th class="py-3 px-4 text-left text-gray-600">Status Pembayaran</th>
                    <th class="py-3 px-4 text-left text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesanan as $index => $item)
                <tr class="border-b">
                    <td class="py-3 px-4 text-gray-700">{{ $index + 1 }}</td>
                    <td class="py-3 px-4 text-gray-700">{{ $item->produk->nama }}</td>
                    <td class="py-3 px-4 text-gray-700">{{ $item->created_at->format('d-m-Y H:i') }}</td>
                    <td class="py-3 px-4 text-gray-700">Rp{{ number_format($item->produk->harga, 0, ',', '.') }}</td>
                    <td class="py-3 px-4 text-gray-700">{{ $item->jumlah_pesanan }}</td>
                    <td class="py-3 px-4 text-gray-700">
                        @if($item->antar_jemput)
                            Rp{{ number_format($item->antar_jemput->harga, 0, ',', '.') }}
                        @else
                            Tidak
                        @endif
                    </td>
                    <td class="py-3 px-4 text-gray-700">Rp{{ number_format($item->total_harga, 0, ',', '.') }}</td>
                    <td class="py-3 px-4 text-gray-700">
                        <span class="
                            {{ $item->status_pesanan === 'Pending' ? 'text-yellow-600' : 
                            ($item->status_pesanan === 'Proses' ? 'text-blue-600' : 
                            ($item->status_pesanan === 'Selesai' ? 'text-green-600' : 'text-gray-600')) }}">
                            {{ ucfirst($item->status_pesanan) }}
                        </span>
                    </td>
                    <td class="py-3 px-4">
                        <span 
                            class="inline-block px-3 py-1 text-xs font-medium text-white rounded-full 
                            {{ $item->status_pembayaran === 'Lunas' ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ ucfirst($item->status_pembayaran) }}
                        </span>
                    </td>
                    <td class="py-3 px-4">
                        <a href="{{ route('account.pesanan.invoice', $item->id) }}" class="text-blue-500 hover:underline">Detail</a>
                        <form action="{{ route('account.pesanan.delete', $item->id) }}" method="POST" class="inline-block">
                            @csrf
                            <button type="submit" class="text-red-500 hover:underline ml-2" onclick="return confirm('Apakah Anda yakin ingin membatalkan pesanan ini?')">Delete</button>
                        </form>
                        <a href="#" class="text-green-500 hover:underline ml-2" id="pay-button-{{ $item->id }}">Bayar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p class="text-gray-700">Tidak ada pesanan yang ditemukan.</p>
        @endif
    </div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script type="text/javascript">
        @foreach ($pesanan as $item)
            document.getElementById('pay-button-{{ $item->id }}').onclick = function(){
                snap.pay('{{ $item->snap_token }}', {
                    onSuccess: function(result){
                        window.location.href = '{{ route('account.success', $item->id) }}';
                    },
                    onPending: function(result){
                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    },
                    onError: function(result){
                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    }
                });
            };
        @endforeach
    </script>
    @endsection
</x-layout3>
