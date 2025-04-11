<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel POS') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body x-data="{ sidebarOpen: true }" class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-white font-sans antialiased">
    
    {{-- Sidebar --}}
    @include('components.sidebar')

    {{-- Main Wrapper --}}
    <div :class="sidebarOpen ? 'ml-64' : 'ml-16'" class="transition-all duration-300 min-h-screen">
        
        {{-- Topbar --}}
        @include('components.topbar')

        {{-- Content --}}
        <main class="p-6">
            @yield('content')
        </main>
        
    </div>
</body>
</html>
