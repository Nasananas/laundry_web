<x-layout3>
    @section('title', 'Pesanan')

    @section('content')
    <div class="container mx-auto p-8 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold text-blue-900 mb-4">Checkout Laundry</h2>

        <!-- Menampilkan Data Pengguna yang Login -->
        <div class="p-4 mb-6 bg-gray-200 border rounded-lg">
            <p class="text-lg font-medium text-gray-800">Alamat</p>
            <p class="text-gray-700">Nama Pengguna: <span class="font-semibold">{{ Auth::user()->name }}</span></p>
        </div>
        
        <!-- Menampilkan Produk yang Dipilih -->
        <div class="flex items-center bg-white shadow-md rounded-lg p-4">
            <div class="flex-1 ml-4">
                <p class="text-lg font-medium text-gray-800">Produk yang Dipilih:</p>
                <p class="text-gray-700">Nama Produk: <span class="font-semibold">{{ $produk->nama }}</span></p>
                <p class="text-gray-700">Harga: <span class="font-semibold">Rp{{ number_format($produk->harga, 0, ',', '.') }}</span></p>
                <p class="text-gray-700">Layanan: <span class="font-semibold">{{ $produk->jenis }}</span></p>
            </div>
        </div>

        <form action="{{ route('account.pesanan.store') }}" method="POST" class="space-y-6" id="pesananForm">
            @csrf
            <input type="hidden" name="produk_id" value="{{ $produk->id }}">
            <input type="hidden" id="produkHarga" value="{{ $produk->harga }}">

            <div class="space-y-4">
                <label for="durasi" class="block text-lg font-medium text-gray-700">Durasi Laundry</label>
                <select name="durasi" id="durasi" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3">
                    <option class="text-gray-400" disabled selected>Pilih</option>
                    @foreach ($durasi as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="space-y-4">
                <label for="parfum" class="block text-lg font-medium text-gray-700">Parfum</label>
                <select name="parfum" id="parfum" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3">
                    <option class="text-gray-400" disabled selected>Pilih</option>
                    @foreach ($pewangi as $item)
                        <option value="{{ $item->id }}">{{ $item->parfum }}</option>
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

            <div class="flex items-center mt-4">
                <button type="button" class="bg-gray-300 text-gray-800 px-3 py-1 rounded-l" onclick="decreaseQuantity()">-</button>
                <input type="number" id="jumlahPesanan" name="jumlah_pesanan" value="1" min="1" class="w-16 text-center border-t border-b border-gray-300" readonly>
                <button type="button" class="bg-gray-300 text-gray-800 px-3 py-1 rounded-r" onclick="increaseQuantity()">+</button>
            </div>

            <div class="p-4 bg-[#e9eefe] rounded-lg">
                <p class="text-gray-700 font-semibold">Rincian Transaksi:</p>
                <p class="text-gray-600">Total Layanan: <span id="hargaProduk">Rp{{ number_format($produk->harga, 0, ',', '.') }}</span></p>
                <p class="text-gray-600">Ongkos Antar-Jemput: <span id="hargaTransport">Rp0</span></p>
                <p class="text-lg font-semibold text-gray-900">Total Pembayaran: <span id="totalPembayaran">Rp{{ number_format($produk->harga, 0, ',', '.') }}</span></p>
            </div>

            <div class="text-center">
                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg mt-4">Buat Pesanan</button>
            </div>
        </form>
    </div>

    <script>
        // Update total price function
        function updateTotal() {
            let hargaProduk = parseInt(document.getElementById('produkHarga').value);
            let hargaTransport = parseInt(document.querySelector('#antar_jemput option:checked').getAttribute('data-harga')) || 0;
            let jumlahPesanan = parseInt(document.getElementById('jumlahPesanan').value);
            
            let totalHarga = (hargaProduk * jumlahPesanan) + hargaTransport;
            
            document.getElementById('hargaProduk').innerText = 'Rp' + (hargaProduk * jumlahPesanan).toLocaleString();
            document.getElementById('hargaTransport').innerText = 'Rp' + hargaTransport.toLocaleString();
            document.getElementById('totalPembayaran').innerText = 'Rp' + totalHarga.toLocaleString();
        }

        // Quantity adjustment functions
        function increaseQuantity() {
            let jumlahPesanan = parseInt(document.getElementById('jumlahPesanan').value);
            document.getElementById('jumlahPesanan').value = jumlahPesanan + 1;
            updateTotal();
        }

        function decreaseQuantity() {
            let jumlahPesanan = parseInt(document.getElementById('jumlahPesanan').value);
            if (jumlahPesanan > 1) {
                document.getElementById('jumlahPesanan').value = jumlahPesanan - 1;
                updateTotal();
            }
        }

        // Initialize total calculation on load
        updateTotal();
    </script>
    @endsection
</x-layout3>
