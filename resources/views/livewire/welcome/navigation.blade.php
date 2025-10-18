<nav class="-mx-3 flex flex-1 justify-end" data-aos="fade-left">
    @auth
        <!-- Desktop Navigation -->
        <div class="hidden sm:flex items-center space-x-3">
            <!-- User Info -->
            <div class="flex items-center space-x-2 bg-white/10 backdrop-blur-md rounded-full px-4 py-2 border border-white/20">
                <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center text-white text-sm font-bold">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
                <span class="text-white font-medium">{{ auth()->user()->name }}</span>
            </div>
            
            <!-- Dashboard Button -->
            <a
                href="{{ url('/dashboard') }}"
                class="rounded-full px-6 py-3 bg-blue-600 text-white font-semibold ring-1 ring-transparent transition hover:bg-blue-700 transform hover:scale-105 focus:outline-none focus-visible:ring-blue-400 shadow-lg"
            >
                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
                Dashboard
            </a>
            
            <!-- Logout Button -->
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button
                    type="submit"
                    class="rounded-full px-6 py-3 bg-red-600 text-white font-semibold ring-1 ring-transparent transition hover:bg-red-700 transform hover:scale-105 focus:outline-none focus-visible:ring-red-400 shadow-lg"
                    onclick="return confirm('Apakah Anda yakin ingin logout?')"
                >
                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Logout
                </button>
            </form>
        </div>

        <!-- Mobile Navigation -->
        <div class="sm:hidden flex flex-col space-y-2">
            <!-- User Info Mobile -->
            <div class="flex items-center justify-center space-x-2 bg-white/10 backdrop-blur-md rounded-full px-3 py-2 border border-white/20 mb-2">
                <div class="w-6 h-6 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center text-white text-xs font-bold">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
                <span class="text-white text-sm font-medium">{{ auth()->user()->name }}</span>
            </div>
            
            <!-- Mobile Buttons -->
            <div class="flex space-x-2">
                <a
                    href="{{ url('/dashboard') }}"
                    class="flex-1 text-center rounded-full px-4 py-2 bg-blue-600 text-white text-sm font-semibold transition hover:bg-blue-700 shadow-lg"
                >
                    Dashboard
                </a>
                
                <form method="POST" action="{{ route('logout') }}" class="flex-1">
                    @csrf
                    <button
                        type="submit"
                        class="w-full rounded-full px-4 py-2 bg-red-600 text-white text-sm font-semibold transition hover:bg-red-700 shadow-lg"
                        onclick="return confirm('Apakah Anda yakin ingin logout?')"
                    >
                        Logout
                    </button>
                </form>
            </div>
        </div>
    @else
        <a
            href="{{ route('login') }}"
            class="rounded-full px-6 py-3 text-blue-600 border-2 border-blue-600 font-semibold ring-1 ring-transparent transition hover:bg-blue-600 hover:text-white transform hover:scale-105 focus:outline-none focus-visible:ring-blue-400 mr-3"
        >
            Admin Login
        </a>
    @endauth
</nav>
