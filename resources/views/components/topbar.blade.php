<header class="flex justify-between items-center px-6 py-4 bg-white dark:bg-gray-800 border-b dark:border-gray-700 ml-64">
    <h1 class="text-lg font-semibold text-gray-800 dark:text-white">Dashboard</h1>
    <div class="text-sm text-gray-600 dark:text-gray-300">
        {{ Auth::user()->name }} | <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
    </div>
</header>
