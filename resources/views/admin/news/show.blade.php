<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between" data-aos="fade-right">
            <div class="flex items-center space-x-4">
                <a href="{{ route('news.index') }}" class="text-blue-600 hover:text-blue-800 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
                <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                        Detail Berita
                    </h2>
                    <p class="text-gray-600 text-sm">Preview dan kelola berita</p>
                </div>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('news.edit', $news) }}" 
                   class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-6 rounded-full transition-all duration-300 transform hover:scale-105 shadow-lg flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    <span>Edit</span>
                </a>
                <form action="{{ route('news.destroy', $news) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            onclick="return confirm('Yakin ingin menghapus berita ini?')"
                            class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-6 rounded-full transition-all duration-300 transform hover:scale-105 shadow-lg flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        <span>Hapus</span>
                    </button>
                </form>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Status Banner -->
            <div class="mb-6" data-aos="fade-up">
                @if($news->is_published)
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-medium">Berita Dipublikasikan</span>
                        <span class="ml-2 text-sm">pada {{ $news->published_at->format('d M Y H:i') }}</span>
                    </div>
                @else
                    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded-lg flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-medium">Status Draft</span>
                        <span class="ml-2 text-sm">Berita belum dipublikasikan</span>
                    </div>
                @endif
            </div>

            <!-- Article Content -->
            <article class="bg-white/80 backdrop-blur-md shadow-xl rounded-2xl overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                <!-- Image -->
                @if($news->image)
                    <div class="aspect-w-16 aspect-h-9">
                        <img src="{{ asset('storage/' . $news->image) }}" 
                             alt="{{ $news->title }}"
                             class="w-full h-64 object-cover">
                    </div>
                @endif

                <!-- Content -->
                <div class="p-8">
                    <!-- Title -->
                    <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $news->title }}</h1>

                    <!-- Meta Info -->
                    <div class="flex items-center text-sm text-gray-500 mb-6 pb-6 border-b border-gray-200">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white text-sm font-bold mr-3">
                                {{ substr($news->user->name, 0, 1) }}
                            </div>
                            <span>{{ $news->user->name }}</span>
                        </div>
                        <span class="mx-4">•</span>
                        <span>{{ $news->created_at->format('d M Y') }}</span>
                        <span class="mx-4">•</span>
                        <span>{{ $news->created_at->diffForHumans() }}</span>
                    </div>

                    <!-- Excerpt -->
                    @if($news->excerpt)
                        <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6">
                            <p class="text-blue-800 italic">{{ $news->excerpt }}</p>
                        </div>
                    @endif

                    <!-- Content -->
                    <div class="prose prose-lg max-w-none">
                        {!! nl2br(e($news->content)) !!}
                    </div>
                </div>
            </article>

            <!-- Meta Information Card -->
            <div class="mt-8 bg-white/80 backdrop-blur-md shadow-xl rounded-2xl p-6" data-aos="fade-up" data-aos-delay="200">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Berita</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="font-medium text-gray-700 mb-2">Detail Publikasi</h4>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Status:</span>
                                <span class="font-medium">
                                    @if($news->is_published)
                                        <span class="text-green-600">Dipublikasikan</span>
                                    @else
                                        <span class="text-yellow-600">Draft</span>
                                    @endif
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Dibuat:</span>
                                <span class="font-medium">{{ $news->created_at->format('d M Y H:i') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Diperbarui:</span>
                                <span class="font-medium">{{ $news->updated_at->format('d M Y H:i') }}</span>
                            </div>
                            @if($news->published_at)
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Dipublikasi:</span>
                                    <span class="font-medium">{{ $news->published_at->format('d M Y H:i') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-700 mb-2">Detail Teknis</h4>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Penulis:</span>
                                <span class="font-medium">{{ $news->user->name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Slug:</span>
                                <span class="font-medium text-blue-600">{{ $news->slug }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">ID:</span>
                                <span class="font-medium">#{{ $news->id }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Karakter:</span>
                                <span class="font-medium">{{ strlen($news->content) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
