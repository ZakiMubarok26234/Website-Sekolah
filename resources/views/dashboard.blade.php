<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-50 to-purple-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl mb-6" data-aos="fade-up">
                <div class="p-8 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
                    <h1 class="text-3xl font-bold mb-2">Selamat Datang, {{ Auth::user()->name }}!</h1>
                    <p class="text-blue-100">Kelola konten website sekolah dengan mudah dan efisien</p>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Berita</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['total_news'] ?? 0 }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-100 text-green-600">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Foto Galeri</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['total_gallery'] ?? 0 }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Siswa</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['student_count'] ?? '340' }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="400">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-orange-100 text-orange-600">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Guru</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['teacher_count'] ?? '24' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-gray-900">Kelola Berita</h3>
                            <div class="p-2 bg-blue-100 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5zM15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">Tambah, edit, dan kelola berita terbaru sekolah</p>
                        <a href="{{ route('news.index') }}" class="block w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors text-center">
                            Kelola Berita
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-gray-900">Galeri Foto</h3>
                            <div class="p-2 bg-green-100 rounded-lg">
                                <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">Upload dan atur foto kegiatan sekolah</p>
                        <a href="{{ route('gallery.index') }}" class="block w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition-colors text-center">
                            Kelola Galeri
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="300">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-gray-900">Informasi Sekolah</h3>
                            <div class="p-2 bg-purple-100 rounded-lg">
                                <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">Update profil dan informasi umum sekolah</p>
                        <a href="{{ route('admin.school-info.index') }}" class="block w-full bg-purple-600 text-white py-2 px-4 rounded-lg hover:bg-purple-700 transition-colors text-center">
                            Update Info
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
