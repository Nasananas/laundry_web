<div class="md:hidden fixed inset-0 bg-gray-800 bg-opacity-75 z-40 hidden" id="mobile-menu">
    <div class="fixed inset-y-0 left-0 w-64" style="background-color: #10375C;">
        <div class="h-full flex flex-col justify-between">
            <div>
                <!-- Brand -->
                <div class="text-center py-4 text-2xl font-bold text-white border-b">
                    OLIVIA Laundry
                </div>
                <!-- Navigation -->
                <nav class="mt-5">
                    <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4 rounded hover:bg-gray-200 text-white">Dashboard</a>
                    <a href="{{ route('admin.booking') }}" class="block py-2.5 px-4 rounded hover:bg-gray-200 text-white">Pesanan Saya</a>
                    <a href="{{ route('admin.kaskeluar') }}" class="block py-2.5 px-4 rounded hover:bg-gray-200 text-white">Kas Keluar</a>
                    <a href="{{ route('admin.kasmasuk') }}" class="block py-2.5 px-4 rounded hover:bg-gray-200 text-white">Kas Masuk</a>
                </nav>
            </div>
            <!-- Logout Button -->
            <div class="p-4">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-center w-full py-2.5 bg-red-500 text-white rounded hover:bg-red-600">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="absolute inset-0" id="close-menu"></div>
</div>
