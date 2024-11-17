<x-layout2>
    @section('title', 'Buat Diskon')

    @section('content')
    <div class="container mx-auto p-8 bg-white shadow-lg rounded-lg">
        <h1 class="text-2xl font-semibold mb-6 text-center">Buat Diskon</h1>
        <form action="{{ route('admin.discount.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="space-y-2">
                <label for="nama_paket" class="block text-gray-700 font-medium">Nama Paket Diskon</label>
                <input type="text" id="nama_paket" name="nama_paket" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" placeholder="Masukkan nama paket diskon">
            </div>

            <div class="space-y-2">
                <label for="periode_mulai" class="block text-gray-700 font-medium">Periode Mulai</label>
                <input type="datetime-local" id="periode_mulai" name="periode_mulai" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500">
            </div>

            <div class="space-y-2">
                <label for="periode_selesai" class="block text-gray-700 font-medium">Periode Selesai</label>
                <input type="datetime-local" id="periode_selesai" name="periode_selesai" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500">
            </div>

            <div id="discount-levels" class="space-y-4">
                <h3 class="text-lg font-semibold text-gray-700">Nominal Diskon</h3>
                <div class="level flex space-x-4 mt-4">
                    <input type="number" name="levels[0][tingkat]" class="w-1/3 p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" placeholder="Misal: 10%">
                </div>
            </div>

            <div class="space-y-2">
                <label for="batas_pembelian" class="block text-gray-700 font-medium">Batas Pembelian</label>
                <input type="number" id="batas_pembelian" name="batas_pembelian" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" placeholder="Masukkan batas pembelian">
            </div>

            <div class="space-y-2">
                <label for="produk" class="block text-gray-700 font-medium">Pilih Produk yang Diberi Diskon</label>
                <select id="produk" name="produk[]" multiple class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500">
                    <!-- Contoh opsi produk, pastikan untuk mengganti dengan data produk dari database -->
                </select>
                <p class="text-sm text-gray-500">*Tahan tombol Ctrl (atau Command di Mac) untuk memilih beberapa produk</p>
            </div>

            <div class="text-center">
                <button type="submit" class="w-full md:w-auto px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 focus:outline-none font-semibold">
                    Konfirmasi
                </button>
            </div>
        </form>
    </div>

    <script>
    function addLevel() {
        const levels = document.getElementById('discount-levels');
        const index = levels.querySelectorAll('.level').length;
        const levelDiv = document.createElement('div');
        levelDiv.className = 'level flex space-x-4 mt-4';
        levelDiv.innerHTML = `
            <input type="number" name="levels[${index}][tingkat]" class="w-1/3 p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" placeholder="Tingkat">
            <input type="number" name="levels[${index}][jumlah_beli]" class="w-1/3 p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" placeholder="Jumlah Beli">
            <input type="number" name="levels[${index}][diskon]" class="w-1/3 p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" placeholder="Diskon %">
        `;
        levels.appendChild(levelDiv);
    }
    </script>
    @endsection
</x-layout2>
