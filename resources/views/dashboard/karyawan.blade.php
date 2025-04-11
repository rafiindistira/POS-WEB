<x-app-layout>
    <div class="flex h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Sidebar -->
        <aside class="w-64 bg-white dark:bg-gray-800 shadow-md">
            <div class="p-6 font-bold text-xl border-b border-gray-200 dark:border-gray-700">
                X STORE
            </div>
            <nav class="mt-6">
                <a href="{{ route('dashboard.karyawan') }}" class="block px-6 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700">Dashboard</a>
                <a href="#" class="block px-6 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700">Penjualan</a>
                <a href="#" class="block px-6 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700">Stok Produk</a>
                <a href="#" class="block px-6 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700">Check-in</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Selamat Datang, Owner!</h1>
            <p class="mt-2 text-gray-600 dark:text-gray-400">Ini halaman dashboard kamu.</p>
        </main>
    </div>
</x-app-layout>
