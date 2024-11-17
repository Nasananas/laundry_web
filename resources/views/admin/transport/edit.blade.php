<x-layout2>
    @section('title', 'Edit Transport')

    @section('content')
    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Edit Transport</h3>
    <div class="bg-white shadow-lg rounded-lg p-6">
        <form action="{{ route('admin.transport.update', $transport->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid gap-6 mb-6">
                <div>
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Jenis Traport</label>
                    <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ old('parfum', $pewangi->parfum) }}" required />
                </div>
            </div>
            <button type="submit" class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                Perbarui Transport
            </button>
        </form>
    </div>
    @endsection
</x-layout2>
