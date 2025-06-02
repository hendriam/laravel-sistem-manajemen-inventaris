<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? config('app.name') }}</title>
    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/flowbite.min.js'])
    @livewireStyles
</head>
<body class="antialiased bg-gray-50 dark:bg-gray-900">
    <!-- Navbar -->
    @include('partials.nav')
    
    <!-- Sidebar -->
    @include('partials.sidebar')

    <main class="p-4 md:ml-64 h-auto pt-20">
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>
