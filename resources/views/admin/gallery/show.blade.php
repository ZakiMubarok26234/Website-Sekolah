<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Foto') }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('gallery.edit', $gallery) }}" class="bg-amber-600 hover:bg-amber-700 text-white px-4 py-2 rounded-lg transition-colors">
                    <i class="fas fa-edit mr-2"></i>Edit
                </a>
                <a href="{{ route('gallery.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-50 to-purple-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl" data-aos="fade-up">
                <div class="p-8">
                    <!-- Main Image -->
                    <div class="mb-8 text-center">
                        <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" 
                             class="max-w-full h-auto rounded-lg shadow-lg mx-auto">
                    </div>

                    <!-- Title and Status -->
                    <div class="mb-6">
                        <div class="flex items-center justify-between">
                            <h1 class="text-3xl font-bold text-gray-900">{{ $gallery->title }}</h1>
                            @if($gallery->is_featured)
                                <span class="bg-yellow-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                    <i class="fas fa-star mr-1"></i>Unggulan
                                </span>
                            @endif
                        </div>
                        <p class="text-lg text-gray-600 capitalize mt-2">
                            <i class="fas fa-tag mr-2"></i>{{ $gallery->category }}
                        </p>
                    </div>

                    <!-- Description -->
                    @if($gallery->description)
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Deskripsi</h3>
                            <p class="text-gray-700 leading-relaxed">{{ $gallery->description }}</p>
                        </div>
                    @endif

                    <!-- Meta Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Upload</h3>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <i class="fas fa-user w-5 text-gray-400 mr-3"></i>
                                    <div>
                                        <span class="text-sm text-gray-500">Diupload oleh:</span>
                                        <p class="font-medium text-gray-900">{{ $gallery->user->name }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-calendar w-5 text-gray-400 mr-3"></i>
                                    <div>
                                        <span class="text-sm text-gray-500">Tanggal upload:</span>
                                        <p class="font-medium text-gray-900">{{ $gallery->created_at->format('d M Y, H:i') }}</p>
                                    </div>
                                </div>
                                @if($gallery->updated_at != $gallery->created_at)
                                <div class="flex items-center">
                                    <i class="fas fa-edit w-5 text-gray-400 mr-3"></i>
                                    <div>
                                        <span class="text-sm text-gray-500">Terakhir diubah:</span>
                                        <p class="font-medium text-gray-900">{{ $gallery->updated_at->format('d M Y, H:i') }}</p>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Aksi</h3>
                            <div class="space-y-3">
                                <a href="{{ route('gallery.edit', $gallery) }}" 
                                   class="block w-full bg-amber-600 hover:bg-amber-700 text-white text-center py-2 px-4 rounded-lg transition-colors">
                                    <i class="fas fa-edit mr-2"></i>Edit Foto
                                </a>
                                
                                <form action="{{ route('gallery.destroy', $gallery) }}" method="POST" class="w-full">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="w-full bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-lg transition-colors"
                                            onclick="return confirm('Yakin ingin menghapus foto ini? Aksi ini tidak dapat dibatalkan.')">
                                        <i class="fas fa-trash mr-2"></i>Hapus Foto
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
