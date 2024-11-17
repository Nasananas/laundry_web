<x-layout2>
    @section('title', 'Tambah Parfum Baru')

    @section('content')
        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Tambah Parfum Baru</h3>
        <div class="bg-white shadow-lg rounded-lg p-6">
            <form action="{{ route('admin.pewangi.store') }}" method="POST">
                @csrf
                <div class="grid gap-6 mb-6">
                    <div>
                        <label for="parfum" class="block mb-2 text-sm font-medium text-gray-900">Jenis Parfum</label>
                        <input type="text" name="parfum" id="parfum" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 block w-full p-2.5" placeholder="Jenis parfum" required />
                    </div>
                </div>
                <button type="submit" class="px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none">
                    Simpan Parfum
                </button>
            </form>
        </div>
    @endsection
</x-layout2>
