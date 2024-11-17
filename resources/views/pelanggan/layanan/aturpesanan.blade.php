<x-layout3>
    @section('title', 'Checkout')

    @section('content')
    <div class="container mx-auto p-8 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold text-blue-900 mb-4">Checkout Laundry</h2>

        <!-- Menampilkan Data Pengguna yang Login -->
        <div class="p-4 mb-6 bg-gray-200 border rounded-lg">
            <p class="text-lg font-medium text-gray-800">Alamat</p>
            <p class="text-gray-700">Nama Pengguna: <span class="font-semibold">{{ $user->name }}</span></p>
        </div>
        <!-- Menampilkan Produk yang Dipilih -->
        <div class="p-4 mb-6 bg-gray-200 border rounded-lg">
            <p class="text-lg font-medium text-gray-800">Produk yang Dipilih:</p>
            <p class="text-gray-700">Nama Produk: <span class="font-semibold">{{ $produk->nama }}</span></p>
            <p class="text-gray-700">Harga: <span class="font-semibold">Rp{{ number_format($produk->harga, 0, ',', '.') }}</span></p>
        </div>

        <form action="{{ route('account.pesanan.store') }}" method="POST" class="space-y-6">
            @csrf
            <input type="hidden" name="produk_id" value="{{ $produk->id }}">
            <input type="hidden" id="produkHarga" value="{{ $produk->harga }}">

            <div class="space-y-4">
                <label for="durasi" class="block text-lg font-medium text-gray-700">Durasi Laundry</label>
                <select name="durasi" id="durasi" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3">
                    <option class="text-gray-400" disabled selected>Pilih</option>
                    @foreach ($durasi as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="space-y-4">
                <label for="parfum" class="block text-lg font-medium text-gray-700">Parfum</label>
                <select name="parfum" id="parfum" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3">
                    <option class="text-gray-400" disabled selected>Pilih</option>
                    @foreach ($pewangi as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->parfum }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="space-y-4">
                <label for="antar_jemput" class="block text-lg font-medium text-gray-700">Antar-Jemput</label>
                <select name="antar_jemput" id="antar_jemput" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3" onchange="updateTotal()">
                    <option class="text-gray-400" disabled selected>Pilih</option>
                    @foreach ($transport as $item)
                        <option value="{{ $item->id }}" data-harga="{{ $item->harga ?? 0 }}">
                            {{ $item->nama }} - Rp {{ $item->harga ? number_format($item->harga, 0, ',', '.') : 'Gratis' }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- <div class="space-y-2">
                <label for="metode_pembayaran" class="block text-gray-700 font-medium">Metode Pembayaran</label>
                <div class="flex space-x-4">
                    <!-- Tombol Tunai -->
                    <button type="button" class="btn-pembayaran py-2 px-4 border-2 border-gray-300 rounded-lg text-gray-600 font-medium hover:border-purple-500 hover:text-purple-500 transition"
                        onclick="selectPayment(this)">
                        Tunai
                    </button>
                </div>
                <!-- Input hidden untuk menyimpan metode pembayaran yang dipilih -->
                <input type="hidden" name="metode_pembayaran" id="metode_pembayaran">
            </div>             --}}

            <div class="p-4 bg-[#e9eefe] rounded-lg">
                <p class="text-gray-700 font-semibold">Rincian Transaksi:</p>
                
                <!-- Total Layanan -->
                <p class="text-gray-600">Total Layanan: <span id="hargaProduk">Rp{{ number_format($produk->harga, 0, ',', '.') }}</span></p>
                
                <!-- Antar-Jemput, jika dipilih -->
                <p class="text-gray-600">Antar-Jemput: <span id="hargaAntarJemput" class="font-medium text-gray-400">Tidak</span></p>
            
                <!-- Total Bayar dengan Potongan Transport -->
                <p class="text-lg text-gray-800 font-semibold mt-2">Total Bayar: 
                    <span id="totalBayar" class="text-[#5971d0] font-bold">
                        Rp{{ number_format($produk->harga, 0, ',', '.') }}
                    </span>
                </p>
            </div>
            
            <div class="mb-4 flex justify-end">
                <button type="submit" class="bg-[#657FF3] text-white font-semibold py-2 px-4 rounded transition duration-300">
                    Buat Pesanan
                </button>
            </div>
        </form>
    </div>

    <script>
        function updateTotal() {
            const produkHarga = parseInt(document.getElementById('produkHarga').value);
            const antarJemputSelect = document.getElementById('antar_jemput');
            const selectedOption = antarJemputSelect.options[antarJemputSelect.selectedIndex];
            const antarJemputHarga = parseInt(selectedOption.getAttribute('data-harga')) || 0;

            document.getElementById('hargaAntarJemput').textContent = antarJemputHarga > 0 ? `Rp${new Intl.NumberFormat('id-ID').format(antarJemputHarga)}` : 'Tidak ada';
            document.getElementById('totalBayar').textContent = `Rp${new Intl.NumberFormat('id-ID').format(produkHarga + antarJemputHarga)}`;
        }
    </script>
    @endsection
</x-layout3>
