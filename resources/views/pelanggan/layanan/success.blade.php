<x-layout3>
    @section('title', 'Checkout Success')

    @section('content')
    <div class="container mx-auto p-8 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold text-blue-900 mb-4">Checkout berhasil</h2>
        <div class="card">
            <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                <h1 class="text-success">Pembayaran Berhasil</h1>
                <p class="text-success">Terima kasih telah melakukan pembayaran</p>
                <a href="{{ route('account.pesanan') }}" class="btn btn-primary mt-3">Lihat Transaksi</a>
            </div>
        </div>
    </div>
    @endsection
</x-layout3>
