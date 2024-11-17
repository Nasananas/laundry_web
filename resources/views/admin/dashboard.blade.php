<x-layout2>

@section('title', 'Dashboard Admin')

@section('content')
   <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Dashboard</h3>
   <p class="text-gray-700">Hello, <span class="font-bold">{{ Auth::guard('admin')->user()->name }}!</span></p>

   <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <a class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
         <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">OLIVIA LAUNDRY</h5>
         <p class="font-normal text-gray-700">Belokasi di Jl. Catur Jaya Sidoluhur No.9, Kanigoro, Kota Madiun.</p>
      </a>
   </div>
@endsection
</x-layout2>
