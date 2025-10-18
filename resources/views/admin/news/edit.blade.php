<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4" data-aos="fade-right">
            <a href="{{ route('news.index') }}" class="text-blue-600 hover:text-blue-800 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-orange-600 rounded-full flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
            </div>
            <div>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    Edit Berita
                </h2>
                <p class="text-gray-600 text-sm">Perbarui konten berita: {{ Str::limit($news->title, 50) }}</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 backdrop-blur-md shadow-xl rounded-2xl overflow-hidden" data-aos="fade-up">
                <form action="{{ route('news.update', $news) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="p-8">
                        <!-- Title -->
                        <div class="mb-6">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                Judul Berita *
                            </label>
                            <input type="text" 
                                   name="title" 
                                   id="title"
                                   value="{{ old('title', $news->title) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('title') border-red-500 @enderror"
                                   placeholder="Masukkan judul berita..."
                                   required>
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Excerpt -->
                        <div class="mb-6">
                            <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">
                                Ringkasan
                            </label>
                            <textarea name="excerpt" 
                                      id="excerpt"
                                      rows="3"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('excerpt') border-red-500 @enderror"
                                      placeholder="Ringkasan singkat berita (opsional)...">{{ old('excerpt', $news->excerpt) }}</textarea>
                            @error('excerpt')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-sm text-gray-500">Kosongkan untuk menggunakan excerpt otomatis dari konten</p>
                        </div>

                        <!-- Content -->
                        <div class="mb-6">
                            <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                                Konten Berita *
                            </label>
                            <textarea name="content" 
                                      id="content"
                                      rows="12"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('content') border-red-500 @enderror"
                                      placeholder="Tulis konten berita lengkap..."
                                      required>{{ old('content', $news->content) }}</textarea>
                            @error('content')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Current Image Display -->
                        @if($news->image)
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Gambar Saat Ini
                                </label>
                                <div class="flex items-center space-x-4">
                                    <img src="{{ asset('storage/' . $news->image) }}" 
                                         alt="{{ $news->title }}"
                                         class="h-24 w-24 object-cover rounded-lg">
                                    <div class="text-sm text-gray-600">
                                        <p>{{ basename($news->image) }}</p>
                                        <p class="text-xs">Upload gambar baru untuk mengganti</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Image Upload -->
                        <div class="mb-6">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ $news->image ? 'Ganti Gambar' : 'Gambar Berita' }}
                            </label>
                            <div class="flex items-center justify-center w-full">
                                <label for="image" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk upload</span> atau drag & drop</p>
                                        <p class="text-xs text-gray-500">PNG, JPG atau GIF (Max. 2MB)</p>
                                    </div>
                                    <input id="image" name="image" type="file" class="hidden" accept="image/*">
                                </label>
                            </div>
                            @error('image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Publish Status -->
                        <div class="mb-8">
                            <div class="flex items-center">
                                <input type="checkbox" 
                                       name="is_published" 
                                       id="is_published"
                                       value="1"
                                       {{ old('is_published', $news->is_published) ? 'checked' : '' }}
                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                <label for="is_published" class="ml-2 text-sm font-medium text-gray-700">
                                    Publikasikan berita
                                </label>
                            </div>
                            <p class="mt-1 text-sm text-gray-500">
                                @if($news->is_published)
                                    Berita ini sedang dipublikasikan
                                @else
                                    Berita ini masih dalam status draft
                                @endif
                            </p>
                        </div>

                        <!-- Meta Information -->
                        <div class="bg-gray-50 rounded-lg p-4 mb-6">
                            <h4 class="font-medium text-gray-900 mb-2">Informasi Berita</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-600">
                                <div>
                                    <span class="font-medium">Dibuat:</span> {{ $news->created_at->format('d M Y H:i') }}
                                </div>
                                <div>
                                    <span class="font-medium">Diperbarui:</span> {{ $news->updated_at->format('d M Y H:i') }}
                                </div>
                                <div>
                                    <span class="font-medium">Penulis:</span> {{ $news->user->name }}
                                </div>
                                <div>
                                    <span class="font-medium">Slug:</span> {{ $news->slug }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="px-8 py-4 bg-gray-50 border-t border-gray-200 flex justify-between items-center">
                        <a href="{{ route('news.index') }}" 
                           class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                            Batal
                        </a>
                        <div class="flex space-x-3">
                            <a href="{{ route('news.show', $news) }}" 
                               class="px-6 py-2 border border-blue-300 text-blue-600 rounded-lg hover:bg-blue-50 transition-colors">
                                Lihat
                            </a>
                            <button type="submit" 
                                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                Perbarui Berita
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Preview Image Script -->
    <script>
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.createElement('img');
                    preview.src = e.target.result;
                    preview.className = 'max-h-32 rounded-lg mt-2';
                    
                    // Remove existing preview
                    const existingPreview = document.querySelector('.image-preview');
                    if (existingPreview) {
                        existingPreview.remove();
                    }
                    
                    // Add new preview
                    const container = document.createElement('div');
                    container.className = 'image-preview mt-2';
                    container.appendChild(preview);
                    e.target.parentNode.parentNode.appendChild(container);
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-app-layout>
