<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $news->title }} - {{ $schoolInfo['name'] ?? 'SMA Negeri 1' }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-sans bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"/>
                        </svg>
                    </div>
                    <h1 class="text-lg font-bold text-gray-800">{{ $schoolInfo['name'] ?? 'SMA Negeri 1' }}</h1>
                </div>
                <a href="{{ url('/') }}" class="text-blue-600 hover:text-blue-700 font-medium">
                    ← Kembali ke Beranda
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Article Header -->
        <article class="bg-white rounded-xl shadow-lg overflow-hidden">
            @if($news->image)
                <div class="h-96 overflow-hidden">
                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" 
                         class="w-full h-full object-cover">
                </div>
            @endif
            
            <div class="p-8">
                <!-- Meta Info -->
                <div class="flex items-center space-x-4 text-sm text-gray-500 mb-4">
                    <span>📅 {{ $news->published_at ? $news->published_at->format('d M Y') : $news->created_at->format('d M Y') }}</span>
                    <span>👤 {{ $news->user->name }}</span>
                </div>
                
                <!-- Title -->
                <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">{{ $news->title }}</h1>
                
                <!-- Excerpt -->
                @if($news->excerpt)
                    <div class="text-xl text-gray-600 bg-blue-50 p-4 rounded-lg mb-8 italic">
                        {{ $news->excerpt }}
                    </div>
                @endif
                
                <!-- Content -->
                <div class="prose prose-lg max-w-none">
                    {!! nl2br(e($news->content)) !!}
                </div>
            </div>
        </article>

        <!-- Related News -->
        @if($relatedNews->count() > 0)
            <section class="mt-16">
                <h2 class="text-2xl font-bold text-gray-900 mb-8">Berita Terkait</h2>
                <div class="grid md:grid-cols-3 gap-6">
                    @foreach($relatedNews as $related)
                        <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                            @if($related->image)
                                <div class="h-40 overflow-hidden">
                                    <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->title }}" 
                                         class="w-full h-full object-cover">
                                </div>
                            @else
                                <div class="h-40 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                    <svg class="w-12 h-12 text-white opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"/>
                                    </svg>
                                </div>
                            @endif
                            <div class="p-4">
                                <span class="text-xs text-blue-600 font-semibold">
                                    {{ $related->published_at ? $related->published_at->format('d M Y') : $related->created_at->format('d M Y') }}
                                </span>
                                <h3 class="text-lg font-bold text-gray-800 mt-1 mb-2">{{ $related->title }}</h3>
                                <p class="text-gray-600 text-sm mb-3">{{ Str::limit($related->excerpt ?: strip_tags($related->content), 80) }}</p>
                                <a href="{{ route('news.show.public', $related->slug) }}" 
                                   class="text-blue-600 font-semibold hover:text-blue-700 text-sm">
                                    Baca Selengkapnya →
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        @endif
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p>&copy; 2025 {{ $schoolInfo['name'] ?? 'SMA Negeri 1' }}. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
