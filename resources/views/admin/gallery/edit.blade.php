<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Foto') }}
            </h2>
            <a href="{{ route('gallery.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-50 to-purple-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl" data-aos="fade-up">
                <form action="{{ route('gallery.update', $gallery) }}" method="POST" enctype="multipart/form-data" class="p-8">
                    @csrf
                    @method('PUT')

                    <!-- Current Image -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Foto Saat Ini
                        </label>
                        <div class="max-w-sm">
                            <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" 
                                 class="w-full rounded-lg shadow-lg">
                        </div>
                    </div>

                    <!-- New Image Upload -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Ganti Foto (opsional)
                        </label>
                        <div class="relative">
                            <input type="file" name="image" id="image" accept="image/*"
                                   class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('image') border-red-500 @enderror">
                            @error('image')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Image Preview -->
                        <div id="imagePreview" class="mt-4 hidden">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Preview Foto Baru:</label>
                            <img id="previewImg" src="" alt="Preview" class="max-w-sm max-h-64 rounded-lg shadow-lg">
                        </div>
                    </div>

                    <!-- Title -->
                    <div class="mb-6">
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                            Judul Foto <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="title" id="title" value="{{ old('title', $gallery->title) }}" required
                               class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('title') border-red-500 @enderror"
                               placeholder="Masukkan judul foto...">
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div class="mb-6">
                        <label for="category" class="block text-sm font-semibold text-gray-700 mb-2">
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <select name="category" id="category" required
                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('category') border-red-500 @enderror">
                            <option value="">Pilih Kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category }}" {{ old('category', $gallery->category) == $category ? 'selected' : '' }}>
                                    {{ ucfirst($category) }}
                                </option>
                            @endforeach
                        </select>
                        @error('category')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-6">
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                            Deskripsi
                        </label>
                        <textarea name="description" id="description" rows="4"
                                  class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('description') border-red-500 @enderror"
                                  placeholder="Deskripsi singkat tentang foto...">{{ old('description', $gallery->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Featured -->
                    <div class="mb-6">
                        <div class="flex items-center">
                            <input type="checkbox" name="is_featured" id="is_featured" value="1" 
                                   {{ old('is_featured', $gallery->is_featured) ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <label for="is_featured" class="ml-2 text-sm text-gray-700">
                                Jadikan foto unggulan
                            </label>
                        </div>
                        <p class="text-gray-500 text-sm mt-1">Foto unggulan akan ditampilkan lebih menonjol</p>
                    </div>

                    <!-- Meta Information -->
                    <div class="bg-gray-50 rounded-lg p-4 mb-6">
                        <h4 class="text-sm font-semibold text-gray-700 mb-2">Informasi Foto</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-600">
                            <div>
                                <span class="font-medium">Diupload oleh:</span>
                                {{ $gallery->user->name }}
                            </div>
                            <div>
                                <span class="font-medium">Tanggal upload:</span>
                                {{ $gallery->created_at->format('d M Y H:i') }}
                            </div>
                            @if($gallery->updated_at != $gallery->created_at)
                            <div>
                                <span class="font-medium">Terakhir diubah:</span>
                                {{ $gallery->updated_at->format('d M Y H:i') }}
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('gallery.index') }}" 
                           class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition-colors">
                            Batal
                        </a>
                        <button type="submit" 
                                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition-colors">
                            <i class="fas fa-save mr-2"></i>Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('previewImg').src = e.target.result;
                    document.getElementById('imagePreview').classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
    @endpush
</x-app-layout>
