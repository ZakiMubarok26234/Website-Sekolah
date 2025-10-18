<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    </head>
    <body class="antialiased font-sans bg-gradient-to-br from-blue-600 via-blue-700 to-purple-700 min-h-screen">
        <!-- Clean Pattern Background -->
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZGVmcz48cGF0dGVybiBpZD0iZ3JpZCIgd2lkdGg9IjYwIiBoZWlnaHQ9IjYwIiBwYXR0ZXJuVW5pdHM9InVzZXJTcGFjZU9uVXNlIj48cGF0aCBkPSJtIDYwIDAgTCAwIDAgMCA2MCIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjZmZmZmZmIiBzdHJva2Utd2lkdGg9IjAuNSIgb3BhY2l0eT0iMC4xIi8+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2dyaWQpIi8+PC9zdmc+')] opacity-20"></div>
        
        <!-- Decorative Elements -->
        <div class="absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full blur-xl"></div>
        <div class="absolute bottom-32 right-16 w-32 h-32 bg-purple-300/20 rounded-full blur-2xl"></div>
        <div class="absolute top-1/2 right-1/4 w-16 h-16 bg-blue-300/15 rounded-full blur-lg"></div>
        
        <div class="relative z-10 min-h-screen flex flex-col justify-center items-center py-8">
            <div data-aos="fade-down" class="mb-8 flex flex-col items-center">
                <a href="/" wire:navigate class="flex items-center space-x-3 mb-4">
                    <div class="w-16 h-16 bg-white/20 backdrop-blur-md rounded-xl flex items-center justify-center border border-white/30">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                        </svg>
                    </div>
                    <div class="text-left">
                        <h1 class="text-2xl font-bold text-white">SMA Negeri 1</h1>
                        <p class="text-blue-200 text-sm">Portal Admin</p>
                    </div>
                </a>
                <div class="text-center">
                    <h2 class="text-3xl font-bold text-white mb-2">Selamat Datang</h2>
                    <p class="text-blue-200 text-lg">Silakan login untuk mengelola konten sekolah</p>
                </div>
            </div>
            <div data-aos="zoom-in" class="w-full sm:max-w-md px-8 py-8 bg-white/95 backdrop-blur-xl shadow-2xl rounded-3xl border border-white/30">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
