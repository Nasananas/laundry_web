<x-layout3>
    @section('title', 'Detail Pesanan')

    @section('content')
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-blue-900">Invoice Pesanan</h2>
        <button onclick="window.print()" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md shadow-md hover:bg-blue-600">
            Cetak Invoice
        </button>
    </div>
    <div class="print-area container mx-auto p-8 bg-white shadow-lg rounded-lg">
        <!-- Detail Pesanan -->
        <div class="p-6 bg-gray-50 border rounded-lg shadow-sm">
            <!-- Informasi Pesanan -->
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Informasi Pesanan</h3>
                <hr class="my-2 border-gray-300">
                <p class="text-gray-700"><span class="font-medium">Pesanan ID:</span> {{ $pesanan->id }}</p>
                <p class="text-gray-700"><span class="font-medium">Tanggal Pesanan:</span> {{ $pesanan->created_at->format('d-m-Y H:i') }}</p>
            </div>
    
            <!-- Detail Produk -->
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Detail Produk</h3>
                <hr class="my-2 border-gray-300">
                <p class="text-gray-700"><span class="font-medium">Nama Produk:</span> {{ $pesanan->produk->nama }}</p>
                <p class="text-gray-700"><span class="font-medium">Jenis Produk:</span> {{ $pesanan->produk->jenis }}</p>
                <p class="text-gray-700"><span class="font-medium">Harga Produk:</span> Rp{{ number_format($pesanan->produk->harga, 0, ',', '.') }}</p>
                <p class="text-gray-700"><span class="font-medium">Layanan:</span> {{ $pesanan->durasi->nama ?? 'Tidak ada' }}</p>
                <p class="text-gray-700"><span class="font-medium">Parfum:</span> {{ $pesanan->pewangi->parfum ?? 'Tidak ada' }}</p>
            </div>
    
            <!-- Ringkasan Pembayaran -->
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Ringkasan Pembayaran</h3>
                <hr class="my-2 border-gray-300">
                <p class="text-gray-700"><span class="font-medium">Status Pembayaran:</span> {{ ucfirst($pesanan->status_pembayaran) }}</p>
                <p class="text-gray-700">
                    <span class="font-medium">Antar-Jemput:</span> 
                    {{ $pesanan->transport->nama ?? '-' }} 
                    @if($pesanan->transport)
                        (Rp{{ number_format($pesanan->transport->harga, 0, ',', '.') }})
                    @endif
                </p>
                <p class="text-gray-700"><span class="font-medium">Diskon:</span> 
                    @if($pesanan->diskon)
                        {{ $pesanan->diskon->nama }} (Rp{{ number_format($pesanan->diskon->nilai, 0, ',', '.') }})
                    @else
                        Tidak ada
                    @endif
                </p>
                <p class="text-gray-700"><span class="font-medium">Total Harga:</span> 
                    @php
                        $totalHarga = $pesanan->produk->harga;
                        $totalHarga += $pesanan->durasi->harga ?? 0;
                        $totalHarga += $pesanan->pewangi->harga ?? 0;
                        $totalHarga += $pesanan->transport->harga ?? 0;
                        if ($pesanan->diskon) {
                            $totalHarga -= $pesanan->diskon->nilai;
                        }
                    @endphp
                    Rp{{ number_format($totalHarga, 0, ',', '.') }}
                </p>
                
                @if(strtolower($pesanan->status_pembayaran) === 'hutang')
                    <div class="mt-4">
                        <h4 class="text-lg font-semibold text-red-600">Detail Pembayaran Hutang</h4>
                        <p class="text-gray-700"><span class="font-medium">DP:</span> Rp{{ number_format($pesanan->dp ?? 0, 0, ',', '.') }}</p>
                        <p class="text-gray-700"><span class="font-medium">Tanggal Jatuh Tempo:</span> {{ \Carbon\Carbon::parse($pesanan->tanggal_jatuh_tempo)->format('d-m-Y') }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Kembali -->
    <div class="mt-6">
        <a href="{{ route('account.pesanan') }}" class="px-4 py-2 bg-gray-200 text-gray-800 font-medium rounded-md shadow hover:bg-gray-300">
            Kembali ke Pesanan Saya
        </a>
    </div>
    <style>
        @media print {
            /* Sembunyikan elemen non-invoice saat cetak */
            body * {
                visibility: hidden;
            }
            .print-area, .print-area * {
                visibility: visible;
            }
            .print-area {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
            }
        }
    </style>        
    @endsection
</x-layout3>
