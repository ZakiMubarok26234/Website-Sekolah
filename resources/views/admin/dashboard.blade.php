<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('🧑‍💼 Dashboard Admin Sekolah') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-50 to-purple-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl mb-6" data-aos="fade-up">
                <div class="p-8 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
                    <h1 class="text-3xl font-bold mb-2">Selamat Datang, {{ Auth::user()->name }}!</h1>
                    <p class="text-blue-100">Kelola sistem sekolah dengan mudah dan efisien</p>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center">
                        <div class="p-3 bg-blue-100 rounded-full">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-500 text-sm">Total Siswa</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['total_students'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-100 rounded-full">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-500 text-sm">Total Guru</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['total_teachers'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center">
                        <div class="p-3 bg-purple-100 rounded-full">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-500 text-sm">Total Orang Tua</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['total_parents'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="400">
                    <div class="flex items-center">
                        <div class="p-3 bg-yellow-100 rounded-full">
                            <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-500 text-sm">Mata Pelajaran</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['total_subjects'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Menu Admin -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="500">
                    <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            Menu Administrasi
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-3">
                            <a href="{{ route('admin.users.index') }}" class="flex items-center p-3 rounded-lg hover:bg-blue-50 transition-colors group">
                                <div class="p-2 bg-blue-100 rounded-lg group-hover:bg-blue-200 transition-colors">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="font-medium text-gray-900">Kelola Pengguna</p>
                                    <p class="text-sm text-gray-500">Manajemen user dan akses</p>
                                </div>
                            </a>

                            <a href="{{ route('admin.students') }}" class="flex items-center p-3 rounded-lg hover:bg-green-50 transition-colors group">
                                <div class="p-2 bg-green-100 rounded-lg group-hover:bg-green-200 transition-colors">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="font-medium text-gray-900">Kelola Siswa</p>
                                    <p class="text-sm text-gray-500">Data dan informasi siswa</p>
                                </div>
                            </a>

                            <a href="{{ route('admin.subjects') }}" class="flex items-center p-3 rounded-lg hover:bg-yellow-50 transition-colors group">
                                <div class="p-2 bg-yellow-100 rounded-lg group-hover:bg-yellow-200 transition-colors">
                                    <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="font-medium text-gray-900">Kelola Mata Pelajaran</p>
                                    <p class="text-sm text-gray-500">Mata pelajaran dan kurikulum</p>
                                </div>
                            </a>

                            <a href="{{ route('admin.teacher-assignments') }}" class="flex items-center p-3 rounded-lg hover:bg-emerald-50 transition-colors group">
                                <div class="p-2 bg-emerald-100 rounded-lg group-hover:bg-emerald-200 transition-colors">
                                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="font-medium text-gray-900">Assignment Guru</p>
                                    <p class="text-sm text-gray-500">Penugasan mata pelajaran</p>
                                </div>
                            </a>

                            <a href="{{ route('admin.news.index') }}" class="flex items-center p-3 rounded-lg hover:bg-purple-50 transition-colors group">
                                <div class="p-2 bg-purple-100 rounded-lg group-hover:bg-purple-200 transition-colors">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="font-medium text-gray-900">Kelola Berita</p>
                                    <p class="text-sm text-gray-500">Publikasi dan informasi</p>
                                </div>
                            </a>

                            <a href="{{ route('admin.school-info.index') }}" class="flex items-center p-3 rounded-lg hover:bg-indigo-50 transition-colors group">
                                <div class="p-2 bg-indigo-100 rounded-lg group-hover:bg-indigo-200 transition-colors">
                                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="font-medium text-gray-900">Informasi Sekolah</p>
                                    <p class="text-sm text-gray-500">Profil dan data sekolah</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Recent News & Quick Info -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="600">
                    <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                            Berita Terbaru
                        </h3>
                    </div>
                    <div class="p-6">
                        @if($recent_news->count() > 0)
                            <div class="space-y-4">
                                @foreach($recent_news as $news)
                                <div class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50 transition-colors">
                                    <h4 class="font-medium text-gray-900 mb-2">{{ $news->title }}</h4>
                                    <p class="text-sm text-gray-600 mb-2">{{ Str::limit($news->content, 100) }}</p>
                                    <p class="text-xs text-gray-500">{{ $news->created_at->format('d M Y') }}</p>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8">
                                <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                                <p class="text-gray-500">Belum ada berita terbaru</p>
                                <a href="{{ route('admin.news.create') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Buat berita baru</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
