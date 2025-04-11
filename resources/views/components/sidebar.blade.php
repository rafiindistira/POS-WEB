<aside class="w-64 bg-white dark:bg-gray-800 h-screen shadow-md fixed z-10">
    <div class="p-6 font-bold text-xl border-b border-gray-200 dark:border-gray-700">
        X STORE
    </div>
    <nav class="mt-4 space-y-2 text-sm font-medium text-gray-700 dark:text-gray-200">
        <a 
        href="{{ auth()->user()->hasRole('owner') ? route('dashboard.owner') : route('dashboard.karyawan') }}" 
        class="block px-6 py-3 hover:bg-gray-100 dark:hover:bg-gray-700 rounded">
        🧭 Dashboard
    </a>    
        <a href="#" class="block px-6 py-3 hover:bg-gray-100 dark:hover:bg-gray-700 rounded">
            💵 Point of Sale
        </a>
        <a href="#" class="block px-6 py-3 hover:bg-gray-100 dark:hover:bg-gray-700 rounded">
            📊 Data Penjualan
        </a>
        <a href="#" class="block px-6 py-3 hover:bg-gray-100 dark:hover:bg-gray-700 rounded">
            💸 Pengeluaran
        </a>
    </nav>
</aside>
