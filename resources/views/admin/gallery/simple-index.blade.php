<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('🖼️ Kelola Galeri Foto') }}
            </h2>
            <div class="flex space-x-2">
                @if(isset($canManage) && $canManage)
                    <a href="{{ route('gallery.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors">
                        <i class="fas fa-plus mr-2"></i>Tambah Foto
                    </a>
                @endif
                <a href="{{ route('admin.dashboard') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-50 to-purple-50 min-h-screen">
    <div class="row">
        <div class="col-md-12">
    <div class="py-12 bg-gradient-to-br from-blue-50 to-purple-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Success Message -->
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Stats Cards -->
            @if(isset($stats))
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <div class="flex items-center">
                            <div class="p-3 bg-blue-100 rounded-full">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-500 text-sm">Total Foto</p>
                                <p class="text-2xl font-bold text-gray-900">{{ $stats['total_photos'] }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <div class="flex items-center">
                            <div class="p-3 bg-green-100 rounded-full">
                                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-500 text-sm">Foto Unggulan</p>
                                <p class="text-2xl font-bold text-gray-900">{{ $stats['featured_photos'] }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <div class="flex items-center">
                            <div class="p-3 bg-purple-100 rounded-full">
                                <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-500 text-sm">Kategori</p>
                                <p class="text-2xl font-bold text-gray-900">{{ $stats['categories'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Gallery Grid -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="p-6">
                    @if($galleries->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($galleries as $gallery)
                                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-all duration-300">
                                    @if($gallery->image)
                                        <img src="{{ asset('storage/' . $gallery->image) }}" 
                                             class="w-full h-48 object-cover" 
                                             alt="{{ $gallery->title }}">
                                    @else
                                        <div class="w-full h-48 bg-gray-200 flex items-center justify-content-center">
                                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                    @endif
                                    
                                    <div class="p-4">
                                        <h3 class="font-semibold text-gray-900 mb-2">{{ $gallery->title }}</h3>
                                        <p class="text-gray-600 text-sm mb-3">{{ Str::limit($gallery->description, 100) }}</p>
                                        
                                        <div class="flex justify-between items-center mb-3">
                                            <span class="text-sm text-gray-500">
                                                📅 {{ $gallery->created_at->format('d M Y') }}
                                            </span>
                                            @if($gallery->is_featured)
                                                <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full">
                                                    ⭐ Unggulan
                                                </span>
                                            @endif
                                        </div>
                                        
                                        @if(isset($canManage) && $canManage)
                                            <div class="flex space-x-2">
                                                <a href="{{ route('gallery.show', $gallery) }}" 
                                                   class="flex-1 bg-blue-100 text-blue-700 text-center py-2 px-3 rounded text-sm hover:bg-blue-200 transition-colors">
                                                    👁️ Lihat
                                                </a>
                                                <a href="{{ route('gallery.edit', $gallery) }}" 
                                                   class="flex-1 bg-yellow-100 text-yellow-700 text-center py-2 px-3 rounded text-sm hover:bg-yellow-200 transition-colors">
                                                    ✏️ Edit
                                                </a>
                                                <form action="{{ route('gallery.destroy', $gallery) }}" method="POST" class="flex-1" onsubmit="return confirm('Yakin ingin menghapus foto ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="w-full bg-red-100 text-red-700 py-2 px-3 rounded text-sm hover:bg-red-200 transition-colors">
                                                        🗑️ Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @if($galleries->hasPages())
                            <div class="mt-8 flex justify-center">
                                {{ $galleries->links() }}
                            </div>
                        @endif
                    @else
                        <div class="text-center py-12">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-gray-500 text-lg mb-4">Belum ada foto yang diunggah.</p>
                            @if(isset($canManage) && $canManage)
                                <a href="{{ route('gallery.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition-colors">
                                    <i class="fas fa-plus mr-2"></i>Tambah Foto Pertama
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
