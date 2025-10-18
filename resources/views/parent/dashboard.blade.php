<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('👨‍👩‍👧‍👦 Dashboard Orang Tua') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-green-50 to-blue-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl mb-6" data-aos="fade-up">
                <div class="p-8 bg-gradient-to-r from-green-600 to-blue-600 text-white">
                    <h1 class="text-3xl font-bold mb-2">Selamat Datang, {{ auth()->user()->name }}!</h1>
                    <p class="text-green-100">Pantau perkembangan anak Anda dengan mudah</p>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center">
                        <div class="p-3 bg-blue-100 rounded-full">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-500 text-sm">Anak</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['total_children'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-100 rounded-full">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-500 text-sm">Total Nilai</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['total_grades'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center">
                        <div class="p-3 bg-yellow-100 rounded-full">
                            <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-500 text-sm">Tunggakan</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['pending_payments'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="400">
                    <div class="flex items-center">
                        <div class="p-3 bg-red-100 rounded-full">
                            <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.994-.833-2.464 0L4.35 15.5c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-500 text-sm">Terlambat</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['overdue_payments'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Anak-anak Saya -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="500">
                    <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Anak-anak Saya
                        </h3>
                    </div>
                    <div class="p-6">
                        @forelse($children as $child)
                            <div class="border border-gray-200 rounded-lg p-4 mb-4 hover:bg-gray-50 transition-colors">
                                <div class="flex items-center justify-between mb-3">
                                    <div>
                                        <h4 class="font-medium text-gray-900 flex items-center">
                                            <span class="mr-2">👦</span>
                                            {{ $child->name }}
                                        </h4>
                                        <p class="text-sm text-gray-600">NIS: {{ $child->nis }} • Kelas: {{ $child->class }}</p>
                                    </div>
                                </div>
                                <div class="flex flex-wrap gap-2">
                                    <a href="{{ route('parent.child.grades', $child->id) }}" 
                                       class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 transition-colors">
                                        📊 Nilai
                                    </a>
                                    <a href="{{ route('parent.child.attendances', $child->id) }}" 
                                       class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 transition-colors">
                                        📋 Absensi
                                    </a>
                                    <a href="{{ route('parent.child.payments', $child->id) }}" 
                                       class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-md text-white bg-green-600 hover:bg-green-700 transition-colors">
                                        💰 Pembayaran
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8">
                                <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <p class="text-gray-500">Belum ada data anak yang terdaftar</p>
                                <p class="text-gray-400 text-sm mt-1">Hubungi admin sekolah untuk pendaftaran anak</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Menu Orang Tua -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="600">
                    <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            Menu Orang Tua
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-3">
                            <a href="{{ route('parent.profile') }}" class="flex items-center p-3 rounded-lg hover:bg-green-50 transition-colors group">
                                <div class="p-2 bg-green-100 rounded-lg group-hover:bg-green-200 transition-colors">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="font-medium text-gray-900">👤 Profil Saya</p>
                                    <p class="text-sm text-gray-500">Kelola informasi profil</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Berita Terbaru -->
            @if($recent_news->count() > 0)
            <div class="mt-8">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="700">
                    <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                            Berita Terbaru
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            @foreach($recent_news as $news)
                            <div class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50 transition-colors">
                                <h4 class="font-medium text-gray-900 mb-2">{{ $news->title }}</h4>
                                <p class="text-sm text-gray-600 mb-2">{{ Str::limit($news->content, 100) }}</p>
                                <p class="text-xs text-gray-500">{{ $news->created_at->format('d M Y') }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
