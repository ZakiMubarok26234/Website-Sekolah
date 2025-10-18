<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Galeri Foto') }}
            </h2>
            <a href="{{ route('gallery.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors">
                <i class="fas fa-plus mr-2"></i>Tambah Foto
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-50 to-purple-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Success Message -->
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6" data-aos="fade-up">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-lg p-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Foto</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['total_photos'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-100 text-green-600">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Foto Unggulan</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['featured_photos'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Kategori</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['categories'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gallery Grid -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Semua Foto</h3>
                    
                    @if($galleries->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                            @foreach($galleries as $gallery)
                                <div class="bg-gray-50 rounded-lg overflow-hidden hover:shadow-lg transition-shadow">
                                    <div class="aspect-square relative">
                                        <img src="{{ asset('storage/' . $gallery->image) }}" 
                                             alt="{{ $gallery->title }}" 
                                             class="w-full h-full object-cover">
                                        
                                        @if($gallery->is_featured)
                                            <div class="absolute top-2 right-2">
                                                <span class="bg-yellow-500 text-white px-2 py-1 rounded-full text-xs font-semibold">
                                                    <i class="fas fa-star mr-1"></i>Unggulan
                                                </span>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <div class="p-4">
                                        <h4 class="font-semibold text-gray-900 mb-1 truncate">{{ $gallery->title }}</h4>
                                        <p class="text-sm text-gray-600 mb-2 capitalize">{{ $gallery->category }}</p>
                                        
                                        @if($gallery->description)
                                            <p class="text-sm text-gray-500 mb-3 line-clamp-2">{{ $gallery->description }}</p>
                                        @endif
                                        
                                        <div class="flex justify-between items-center">
                                            <span class="text-xs text-gray-400">{{ $gallery->created_at->format('d M Y') }}</span>
                                            
                                            <div class="flex space-x-1">
                                                <a href="{{ route('gallery.show', $gallery) }}" 
                                                   class="bg-blue-100 text-blue-600 p-1 rounded hover:bg-blue-200 transition-colors"
                                                   title="Lihat Detail">
                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                                        <path d="M10 2C5.58 2 2 6.58 2 10s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8z"/>
                                                    </svg>
                                                </a>
                                                
                                                <a href="{{ route('gallery.edit', $gallery) }}" 
                                                   class="bg-amber-100 text-amber-600 p-1 rounded hover:bg-amber-200 transition-colors"
                                                   title="Edit">
                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                                                    </svg>
                                                </a>
                                                
                                                <form action="{{ route('gallery.destroy', $gallery) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="bg-red-100 text-red-600 p-1 rounded hover:bg-red-200 transition-colors"
                                                            onclick="return confirm('Yakin ingin menghapus foto ini?')"
                                                            title="Hapus">
                                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                                            <path d="M4 5a1 1 0 011-1h10a1 1 0 011 1v1H4V5zM6 10a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1z"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="mt-6">
                            {{ $galleries->links() }}
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="mx-auto h-24 w-24 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada foto</h3>
                            <p class="mt-1 text-gray-500">Mulai dengan menambahkan foto pertama Anda.</p>
                            <div class="mt-6">
                                <a href="{{ route('gallery.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                                    <i class="fas fa-plus mr-2"></i>Tambah Foto Pertama
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
