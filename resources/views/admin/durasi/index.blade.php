<x-layout2>
    @section('title', 'Daftar Durasi')

    @section('content')
        <!-- Tabel Durasi -->
        <div class="container mx-auto px-4 py-8">
            @if(session('success'))
            <div class="mt-4 bg-green-100 text-green-800 text-sm p-2 rounded-lg">
                {{ session('success') }}
            </div>
            @endif
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Daftar Durasi</h2>

            <a href="{{ route('admin.durasi.create') }}" class="bg-blue-700 text-white hover:bg-blue-800 font-medium rounded-lg px-5 py-2 inline-flex items-center">
                Tambah Durasi Baru
            </a>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-6">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nama</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($durasi as $item)
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4 font-medium text-gray-900">{{ $item->nama }}</td>
                                <td class="px-6 py-4 flex space-x-2">
                                    <a href="{{ route('admin.durasi.edit', $item->id) }}" class="text-blue-600 hover:underline">Edit</a> |
                                    <form action="{{ route('admin.durasi.delete', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tabel Pewangi -->
        <div class="container mx-auto px-4 py-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Daftar Parfum</h2>

            <a href="{{ route('admin.pewangi.create') }}" class="bg-blue-700 text-white hover:bg-blue-800 font-medium rounded-lg px-5 py-2 inline-flex items-center">
                Tambah Parfum Baru
            </a>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-6">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Jenis Parfum</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pewangi as $item)
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4 font-medium text-gray-900">{{ $item->parfum }}</td>
                                <td class="px-6 py-4 flex space-x-2">
                                    <a href="{{ route('admin.pewangi.edit', $item->id) }}" class="text-blue-600 hover:underline">Edit</a> |
                                    <form action="{{ route('admin.pewangi.delete', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tabel Transport -->
        <div class="container mx-auto px-4 py-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Daftar Trasnport</h2>

            <a href="{{ route('admin.transport.create') }}" class="bg-blue-700 text-white hover:bg-blue-800 font-medium rounded-lg px-5 py-2 inline-flex items-center">
                Tambah Transport Baru
            </a>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-6">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Jenis Transport</th>
                            <th scope="col" class="px-6 py-3">Harga</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transport as $item)
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4 font-medium text-gray-900">{{ $item->nama }}</td>
                                <td class="px-6 py-4">Rp{{ $item->harga ?? '-' }}</td>
                                <td class="px-6 py-4 flex space-x-2">
                                    <a href="{{ route('admin.transport.edit', $item->id) }}" class="text-blue-600 hover:underline">Edit</a> |
                                    <form action="{{ route('admin.transport.delete', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus transport ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>
    @endsection
</x-layout2>
