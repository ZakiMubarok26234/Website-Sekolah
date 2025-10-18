<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4" data-aos="fade-right">
            <a href="{{ route('news.index') }}" class="text-blue-600 hover:text-blue-800 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
            </div>
            <div>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    Tambah Berita Baru
                </h2>
                <p class="text-gray-600 text-sm">Buat dan publikasikan berita sekolah</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 backdrop-blur-md shadow-xl rounded-2xl overflow-hidden" data-aos="fade-up">
                <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="p-8">
                        <!-- Title -->
                        <div class="mb-6">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                Judul Berita *
                            </label>
                            <input type="text" 
                                   name="title" 
                                   id="title"
                                   value="{{ old('title') }}"
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
                                      placeholder="Ringkasan singkat berita (opsional)...">{{ old('excerpt') }}</textarea>
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
                                      required>{{ old('content') }}</textarea>
                            @error('content')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-6">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                                Gambar Berita
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
                                       {{ old('is_published', true) ? 'checked' : '' }}
                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                <label for="is_published" class="ml-2 text-sm font-medium text-gray-700">
                                    Publikasikan berita sekarang
                                </label>
                            </div>
                            <p class="mt-1 text-sm text-gray-500">Uncheck untuk menyimpan sebagai draft</p>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="px-8 py-4 bg-gray-50 border-t border-gray-200 flex justify-between items-center">
                        <a href="{{ route('news.index') }}" 
                           class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                            Batal
                        </a>
                        <div class="flex space-x-3">
                            <button type="submit" 
                                    name="action" 
                                    value="draft"
                                    class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                                Simpan Draft
                            </button>
                            <button type="submit" 
                                    name="action" 
                                    value="publish"
                                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                Publikasikan
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
