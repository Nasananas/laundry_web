<x-layout3>
    @section('title', 'Akun Profil')
    @section('content')
        <div class="p-6 bg-white rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-4">Profil Pelanggan</h2>
            <p><strong>Nama:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Alamat:</strong> {{ $user->alamat ?? 'Belum diisi' }}</p>
            <!-- Tambahkan detail lainnya sesuai kebutuhan -->
        </div>
    @endsection
</x-layout3>
