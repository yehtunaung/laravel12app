<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" x-bind:class="{ 'dark': darkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="bg-gray-50 dark:bg-gray-900 transition-colors duration-300" x-data="{
    sidebarOpen: localStorage.getItem('sidebarOpen') !== 'false',
    loading: false,
    toggleSidebar() {
        this.sidebarOpen = !this.sidebarOpen;
        localStorage.setItem('sidebarOpen', this.sidebarOpen);
    },
    toggleDarkMode() {
        this.darkMode = !this.darkMode;
        localStorage.setItem('darkMode', this.darkMode);
    },
    showLoading() {
        this.loading = true;
    },
    hideLoading() {
        this.loading = false;
    }
}"
    x-init="// Listen for Livewire navigation events
    document.addEventListener('livewire:navigating', () => showLoading());
    document.addEventListener('livewire:navigated', () => hideLoading());">

    <!-- Loading Overlay -->
    <div x-show="loading" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 flex items-center justify-center bg-white/80 dark:bg-gray-900/80 backdrop-blur-sm">
        <div class="flex flex-col items-center">
            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600"></div>
            <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">Loading...</p>
        </div>
    </div>

    <div class="antialiased bg-gray-50 dark:bg-gray-900 min-h-screen">
        <!-- Navbar -->
        @include('admin.partials.navbar')

        <!-- Sidebar -->
        @include('admin.partials.sidebar')

        <!-- Main Content -->
        <main class="p-4 transition-all duration-300 ease-in-out" :class="sidebarOpen ? 'md:ml-64' : 'md:ml-16'">
            <div class="mx-auto max-w-screen-2xl">
                <!-- Page Content -->
                {{ $slot ?? '' }}
                @yield('content')
            </div>
        </main>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
