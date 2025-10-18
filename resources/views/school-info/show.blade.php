<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Informasi Sekolah') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-50 to-purple-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl" data-aos="fade-up">
                <div class="p-8">
                    
                    <!-- School Logo and Name -->
                    <div class="text-center mb-8">
                        @if($schoolInfos['school_logo'])
                            <div class="mb-4">
                                <img src="{{ asset('storage/' . $schoolInfos['school_logo']) }}" alt="Logo Sekolah" 
                                     class="mx-auto max-w-32 h-auto rounded-lg shadow-lg">
                            </div>
                        @endif
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $schoolInfos['school_name'] }}</h1>
                        <p class="text-lg text-gray-600">Kepala Sekolah: {{ $schoolInfos['principal_name'] }}</p>
                    </div>

                    <!-- Contact Information -->
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-address-book mr-2 text-blue-600"></i>
                            Informasi Kontak
                        </h3>
                        <div class="bg-gray-50 rounded-lg p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt text-blue-600 mr-3"></i>
                                    <div>
                                        <p class="font-semibold text-gray-700">Alamat</p>
                                        <p class="text-gray-600">{{ $schoolInfos['school_address'] ?: 'Belum diisi' }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-phone text-blue-600 mr-3"></i>
                                    <div>
                                        <p class="font-semibold text-gray-700">Telepon</p>
                                        <p class="text-gray-600">{{ $schoolInfos['school_phone'] ?: 'Belum diisi' }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-envelope text-blue-600 mr-3"></i>
                                    <div>
                                        <p class="font-semibold text-gray-700">Email</p>
                                        <p class="text-gray-600">{{ $schoolInfos['school_email'] ?: 'Belum diisi' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Statistics -->
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-chart-bar mr-2 text-blue-600"></i>
                            Statistik Sekolah
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg p-6 text-center">
                                <i class="fas fa-users text-3xl mb-3"></i>
                                <p class="text-2xl font-bold">{{ $schoolInfos['student_count'] }}</p>
                                <p class="text-blue-100">Siswa</p>
                            </div>
                            <div class="bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg p-6 text-center">
                                <i class="fas fa-chalkboard-teacher text-3xl mb-3"></i>
                                <p class="text-2xl font-bold">{{ $schoolInfos['teacher_count'] }}</p>
                                <p class="text-green-100">Guru</p>
                            </div>
                            <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white rounded-lg p-6 text-center">
                                <i class="fas fa-user-tie text-3xl mb-3"></i>
                                <p class="text-2xl font-bold">{{ $schoolInfos['staff_count'] }}</p>
                                <p class="text-purple-100">Staff</p>
                            </div>
                        </div>
                    </div>

                    <!-- Vision -->
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-eye mr-2 text-blue-600"></i>
                            Visi
                        </h3>
                        <div class="bg-blue-50 border-l-4 border-blue-500 rounded-lg p-6">
                            <p class="text-gray-700 leading-relaxed">
                                {{ $schoolInfos['school_vision'] ?: 'Visi sekolah belum diisi.' }}
                            </p>
                        </div>
                    </div>

                    <!-- Mission -->
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-bullseye mr-2 text-blue-600"></i>
                            Misi
                        </h3>
                        <div class="bg-green-50 border-l-4 border-green-500 rounded-lg p-6">
                            <p class="text-gray-700 leading-relaxed whitespace-pre-line">
                                {{ $schoolInfos['school_mission'] ?: 'Misi sekolah belum diisi.' }}
                            </p>
                        </div>
                    </div>

                    <!-- History -->
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-history mr-2 text-blue-600"></i>
                            Sejarah Sekolah
                        </h3>
                        <div class="bg-yellow-50 border-l-4 border-yellow-500 rounded-lg p-6">
                            <p class="text-gray-700 leading-relaxed whitespace-pre-line">
                                {{ $schoolInfos['school_history'] ?: 'Sejarah sekolah belum diisi.' }}
                            </p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end">
                        <a href="{{ route('dashboard') }}" 
                           class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg transition-colors">
                            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
