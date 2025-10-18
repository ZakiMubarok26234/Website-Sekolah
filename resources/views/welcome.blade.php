<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $schoolInfo['name'] ?? 'SMA Negeri 1' }} - Sekolah Terdepan</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans bg-gradient-to-br from-blue-50 via-white to-green-50">
        <!-- Hero Section -->
        <section class="min-h-screen relative overflow-hidden bg-gradient-to-br from-slate-800 via-slate-700 to-blue-900">
            <!-- School Background Illustration -->
            <div class="absolute inset-0 opacity-20">
                <svg class="w-full h-full object-cover" viewBox="0 0 1200 800" xmlns="http://www.w3.org/2000/svg">
                    <!-- Sky -->
                    <defs>
                        <linearGradient id="skyGradient" x1="0%" y1="0%" x2="0%" y2="100%">
                            <stop offset="0%" style="stop-color:#87CEEB;stop-opacity:1" />
                            <stop offset="100%" style="stop-color:#E0F6FF;stop-opacity:1" />
                        </linearGradient>
                        <linearGradient id="buildingGradient" x1="0%" y1="0%" x2="0%" y2="100%">
                            <stop offset="0%" style="stop-color:#8B4513;stop-opacity:1" />
                            <stop offset="100%" style="stop-color:#654321;stop-opacity:1" />
                        </linearGradient>
                        <linearGradient id="roofGradient" x1="0%" y1="0%" x2="0%" y2="100%">
                            <stop offset="0%" style="stop-color:#DC143C;stop-opacity:1" />
                            <stop offset="100%" style="stop-color:#8B0000;stop-opacity:1" />
                        </linearGradient>
                    </defs>
                    
                    <!-- Sky Background -->
                    <rect width="1200" height="400" fill="url(#skyGradient)"/>
                    
                    <!-- School Building -->
                    <rect x="200" y="200" width="800" height="400" fill="url(#buildingGradient)"/>
                    <polygon points="150,200 600,50 1050,200" fill="url(#roofGradient)"/>
                    
                    <!-- Windows -->
                    <rect x="250" y="250" width="60" height="80" fill="#87CEEB" stroke="#654321" stroke-width="3"/>
                    <rect x="350" y="250" width="60" height="80" fill="#87CEEB" stroke="#654321" stroke-width="3"/>
                    <rect x="450" y="250" width="60" height="80" fill="#87CEEB" stroke="#654321" stroke-width="3"/>
                    <rect x="690" y="250" width="60" height="80" fill="#87CEEB" stroke="#654321" stroke-width="3"/>
                    <rect x="790" y="250" width="60" height="80" fill="#87CEEB" stroke="#654321" stroke-width="3"/>
                    <rect x="890" y="250" width="60" height="80" fill="#87CEEB" stroke="#654321" stroke-width="3"/>
                    
                    <!-- Main Door -->
                    <rect x="570" y="450" width="60" height="150" fill="#8B4513" stroke="#654321" stroke-width="3"/>
                    <circle cx="610" cy="525" r="3" fill="#FFD700"/>
                    
                    <!-- Flag Pole -->
                    <rect x="100" y="150" width="4" height="250" fill="#8B4513"/>
                    <rect x="104" y="150" width="40" height="25" fill="#FF0000"/>
                    <rect x="104" y="175" width="40" height="25" fill="#FFFFFF"/>
                    
                    <!-- Trees -->
                    <ellipse cx="80" cy="500" rx="30" ry="50" fill="#228B22"/>
                    <rect x="75" y="500" width="10" height="100" fill="#8B4513"/>
                    
                    <ellipse cx="1100" cy="480" rx="40" ry="60" fill="#228B22"/>
                    <rect x="1095" y="480" width="10" height="120" fill="#8B4513"/>
                    
                    <!-- Playground -->
                    <rect x="50" y="600" width="300" height="200" fill="#90EE90" opacity="0.7"/>
                    <circle cx="200" cy="700" r="15" fill="#FFD700"/>
                    <rect x="180" y="650" width="40" height="20" fill="#8B4513"/>
                    
                    <!-- Soccer Field -->
                    <rect x="850" y="600" width="300" height="200" fill="#90EE90" opacity="0.7"/>
                    <rect x="870" y="620" width="260" height="160" fill="none" stroke="#FFFFFF" stroke-width="2"/>
                    <circle cx="1000" cy="700" r="30" fill="none" stroke="#FFFFFF" stroke-width="2"/>
                </svg>
            </div>
            
            <!-- Overlay untuk readability -->
            <div class="absolute inset-0 bg-gradient-to-br from-slate-900/70 via-slate-800/60 to-blue-900/70"></div>
            
            <!-- Subtle pattern overlay -->
            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA0MCA0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZGVmcz48cGF0dGVybiBpZD0iZ3JpZCIgd2lkdGg9IjQwIiBoZWlnaHQ9IjQwIiBwYXR0ZXJuVW5pdHM9InVzZXJTcGFjZU9uVXNlIj48cGF0aCBkPSJtIDQwIDAgTCAwIDAgMCA0MCIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjZmZmZmZmIiBzdHJva2Utd2lkdGg9IjAuMyIgb3BhY2l0eT0iMC4xIi8+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2dyaWQpIi8+PC9zdmc+')] opacity-30"></div>
            
            <div class="relative z-10">
                <!-- Navigation -->
                <nav class="flex justify-between items-center p-6 lg:px-12" data-aos="fade-down">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-md rounded-xl flex items-center justify-center border border-white/30">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                            </svg>
                        </div>
                        <h1 class="text-xl font-bold text-slate-100">{{ $schoolInfo['name'] ?? 'SMA Negeri 1' }}</h1>
                    </div>
                    @if (Route::has('login'))
                        <livewire:welcome.navigation />
                    @endif
                </nav>

                <!-- Hero Content -->
                <div class="container mx-auto px-6 lg:px-12 py-16 lg:py-24">
                    <div class="text-center max-w-4xl mx-auto">
                        <h1 class="text-5xl lg:text-7xl font-bold text-white mb-6 leading-tight drop-shadow-lg" data-aos="fade-up">
                            Selamat Datang di
                            <span class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent block mt-2">
                                {{ $schoolInfo['name'] ?? 'SMA Negeri 1' }}
                            </span>
                        </h1>
                        <p class="text-xl lg:text-2xl text-slate-200 mb-8 leading-relaxed max-w-3xl mx-auto drop-shadow-md" data-aos="fade-up" data-aos-delay="100">
                            Membentuk generasi cerdas, kreatif, dan berkarakter untuk masa depan yang gemilang
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center" data-aos="fade-up" data-aos-delay="200">
                            <a href="#about" class="px-8 py-4 bg-white/95 text-slate-800 font-semibold rounded-full hover:bg-white hover:shadow-xl transform hover:scale-105 transition-all duration-300 backdrop-blur-sm">
                                Tentang Kami
                            </a>
                            <a href="#news" class="px-8 py-4 border-2 border-white/80 text-white font-semibold rounded-full hover:bg-white/20 backdrop-blur-sm transform hover:scale-105 transition-all duration-300 shadow-lg">
                                Berita Terbaru
                            </a>
                        </div>
                        
                        <!-- Stats Cards -->
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-16 max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="300">
                            <div class="bg-white/15 backdrop-blur-md rounded-xl p-4 text-center border border-white/20 hover:bg-white/20 transition-all duration-300">
                                <h3 class="text-2xl font-bold text-white drop-shadow-md">{{ $schoolInfo['student_count'] ?? '340' }}</h3>
                                <p class="text-slate-200 text-sm">Siswa Aktif</p>
                            </div>
                            <div class="bg-white/15 backdrop-blur-md rounded-xl p-4 text-center border border-white/20 hover:bg-white/20 transition-all duration-300">
                                <h3 class="text-2xl font-bold text-white drop-shadow-md">{{ $schoolInfo['teacher_count'] ?? '24' }}</h3>
                                <p class="text-slate-200 text-sm">Guru Berpengalaman</p>
                            </div>
                            <div class="bg-white/15 backdrop-blur-md rounded-xl p-4 text-center border border-white/20 hover:bg-white/20 transition-all duration-300">
                                <h3 class="text-2xl font-bold text-white drop-shadow-md">15+</h3>
                                <p class="text-slate-200 text-sm">Program Unggulan</p>
                            </div>
                            <div class="bg-white/15 backdrop-blur-md rounded-xl p-4 text-center border border-white/20 hover:bg-white/20 transition-all duration-300">
                                <h3 class="text-2xl font-bold text-white drop-shadow-md">A</h3>
                                <p class="text-slate-200 text-sm">Akreditasi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="py-20 bg-white">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="text-center mb-16" data-aos="fade-up">
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">Tentang Sekolah Kami</h2>
                    <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                        Sekolah Dasar Negeri yang berkomitmen mengembangkan potensi peserta didik secara holistik
                        melalui pendidikan berkualitas, berkarakter, dan berwawasan global.
                    </p>
                </div>
                
                <div class="grid lg:grid-cols-3 gap-8">
                    <div class="text-center p-8 rounded-2xl bg-gradient-to-br from-blue-50 to-blue-100 transform hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                        <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Visi</h3>
                        <p class="text-gray-600">Menjadi sekolah unggulan yang menciptakan generasi berakhlak mulia, cerdas, dan berprestasi</p>
                    </div>
                    
                    <div class="text-center p-8 rounded-2xl bg-gradient-to-br from-green-50 to-green-100 transform hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Misi</h3>
                        <p class="text-gray-600">Menyelenggarakan pendidikan berkualitas dengan pendekatan pembelajaran inovatif dan berkarakter</p>
                    </div>
                    
                    <div class="text-center p-8 rounded-2xl bg-gradient-to-br from-purple-50 to-purple-100 transform hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="300">
                        <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Program</h3>
                        <p class="text-gray-600">Kurikulum nasional plus dengan program ekstrakurikuler yang beragam dan berkualitas</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- News Section -->
        <section id="news" class="py-20 bg-gray-50">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="text-center mb-16" data-aos="fade-up">
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">Berita Terbaru</h2>
                    <p class="text-lg text-gray-600">Informasi terkini seputar kegiatan dan prestasi sekolah</p>
                </div>
                
                <div class="grid lg:grid-cols-3 gap-8">
                    @forelse($latestNews as $index => $news)
                        <article class="bg-white rounded-2xl shadow-lg overflow-hidden transform hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                            @if($news->image)
                                <div class="h-48 overflow-hidden">
                                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="w-full h-full object-cover">
                                </div>
                            @else
                                <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-white opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5zM15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z"/>
                                    </svg>
                                </div>
                            @endif
                            <div class="p-6">
                                <span class="text-sm text-blue-600 font-semibold">
                                    {{ $news->published_at ? $news->published_at->format('d M Y') : $news->created_at->format('d M Y') }}
                                </span>
                                <h3 class="text-xl font-bold text-gray-800 mt-2 mb-3">{{ $news->title }}</h3>
                                <p class="text-gray-600 mb-4">{{ $news->excerpt ?: Str::limit(strip_tags($news->content), 100) }}</p>
                                <a href="{{ route('news.show.public', $news->slug) }}" class="text-blue-600 font-semibold hover:text-blue-700">Baca Selengkapnya →</a>
                            </div>
                        </article>
                    @empty
                        <div class="col-span-3 text-center py-12">
                            <svg class="mx-auto h-24 w-24 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H14"/>
                            </svg>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada berita</h3>
                            <p class="text-gray-500">Berita akan ditampilkan di sini setelah admin mempublikasikannya.</p>
                        </div>
                    @endforelse
                </div>

                @if($latestNews->count() > 0)
                    <div class="text-center mt-12" data-aos="fade-up">
                        <a href="#" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-full hover:bg-blue-700 transform hover:scale-105 transition-all duration-300">
                            Lihat Semua Berita
                            <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"/>
                            </svg>
                        </a>
                    </div>
                @endif
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-12">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="grid lg:grid-cols-4 gap-8">
                    <div data-aos="fade-up">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold">{{ $schoolInfo['name'] ?? 'SMA Negeri 1' }}</h3>
                        </div>
                        <p class="text-gray-300">Membentuk generasi cerdas, kreatif, dan berkarakter untuk masa depan Indonesia yang gemilang.</p>
                    </div>
                    
                    <div data-aos="fade-up" data-aos-delay="100">
                        <h4 class="text-lg font-semibold mb-4">Kontak</h4>
                        <div class="space-y-2 text-gray-300">
                            <p>📍 {{ $schoolInfo['address'] ?: 'Jl. Pendidikan No. 123, Kota' }}</p>
                            <p>📞 {{ $schoolInfo['phone'] ?: '(021) 1234-5678' }}</p>
                            <p>✉️ {{ $schoolInfo['email'] ?: 'info@sekolah.sch.id' }}</p>
                        </div>
                    </div>
                    
                    <div data-aos="fade-up" data-aos-delay="200">
                        <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                        <div class="space-y-2">
                            <a href="#" class="block text-gray-300 hover:text-white transition-colors">Profil Sekolah</a>
                            <a href="#" class="block text-gray-300 hover:text-white transition-colors">Program Sekolah</a>
                            <a href="#" class="block text-gray-300 hover:text-white transition-colors">Galeri</a>
                            <a href="#" class="block text-gray-300 hover:text-white transition-colors">Prestasi</a>
                        </div>
                    </div>
                    
                    <div data-aos="fade-up" data-aos-delay="300">
                        <h4 class="text-lg font-semibold mb-4">Jam Operasional</h4>
                        <div class="space-y-2 text-gray-300">
                            <p>Senin - Jumat: 07:00 - 15:00</p>
                            <p>Sabtu: 07:00 - 11:00</p>
                            <p>Minggu: Libur</p>
                        </div>
                    </div>
                </div>
                
                <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                    <p>&copy; 2025 {{ $schoolInfo['name'] ?? 'SMA Negeri 1' }}. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </body>
</html>
