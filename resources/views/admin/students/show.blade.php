<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                        Detail Siswa
                    </h2>
                    <p class="text-gray-600 text-sm">Informasi lengkap siswa</p>
                </div>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('admin.students') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
                <a href="{{ route('admin.students.edit', $student) }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition-colors">
                    <i class="fas fa-edit mr-2"></i>Edit
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-50 to-purple-50 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Student Profile Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
                <div class="px-6 py-4 bg-gradient-to-r from-blue-500 to-blue-600 text-white">
                    <div class="flex items-center space-x-4">
                        <div class="w-16 h-16 {{ $student->gender == 'Laki-laki' ? 'bg-blue-200' : 'bg-pink-200' }} rounded-full flex items-center justify-center">
                            <svg class="w-10 h-10 {{ $student->gender == 'Laki-laki' ? 'text-blue-600' : 'text-pink-600' }}" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold">{{ $student->name }}</h3>
                            <p class="text-blue-100">NIS: {{ $student->nis }} • Kelas {{ $student->class }}</p>
                        </div>
                        <div class="ml-auto">
                            @if($student->is_active)
                                <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800">
                                    Aktif
                                </span>
                            @else
                                <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-red-100 text-red-800">
                                    Tidak Aktif
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Data Pribadi -->
                        <div class="space-y-4">
                            <h4 class="text-lg font-semibold text-gray-900 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                </svg>
                                Data Pribadi
                            </h4>
                            
                            <div class="space-y-3">
                                <div>
                                    <label class="text-sm font-medium text-gray-500">Jenis Kelamin</label>
                                    <p class="text-gray-900">{{ $student->gender }}</p>
                                </div>
                                
                                <div>
                                    <label class="text-sm font-medium text-gray-500">Tempat, Tanggal Lahir</label>
                                    <p class="text-gray-900">{{ $student->birth_place }}, {{ $student->birth_date->format('d F Y') }}</p>
                                </div>
                                
                                <div>
                                    <label class="text-sm font-medium text-gray-500">Umur</label>
                                    <p class="text-gray-900">{{ $student->birth_date->age }} tahun</p>
                                </div>
                                
                                <div>
                                    <label class="text-sm font-medium text-gray-500">No. Telepon</label>
                                    <p class="text-gray-900">{{ $student->phone ?: '-' }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Data Alamat -->
                        <div class="space-y-4">
                            <h4 class="text-lg font-semibold text-gray-900 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                </svg>
                                Alamat
                            </h4>
                            
                            <div>
                                <label class="text-sm font-medium text-gray-500">Alamat Lengkap</label>
                                <p class="text-gray-900">{{ $student->address }}</p>
                            </div>
                        </div>
                        
                        <!-- Data Keluarga -->
                        <div class="space-y-4">
                            <h4 class="text-lg font-semibold text-gray-900 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                                </svg>
                                Data Keluarga
                            </h4>
                            
                            <div>
                                <label class="text-sm font-medium text-gray-500">Orang Tua/Wali</label>
                                <p class="text-gray-900">{{ $student->parent->name ?? '-' }}</p>
                            </div>
                            
                            @if($student->parent)
                            <div>
                                <label class="text-sm font-medium text-gray-500">Email Orang Tua</label>
                                <p class="text-gray-900">{{ $student->parent->email }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Academic Records -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Nilai -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="px-6 py-4 bg-gradient-to-r from-green-500 to-green-600 text-white">
                        <h3 class="text-lg font-semibold flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Nilai Terbaru
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="text-center py-8">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <p class="text-gray-500">Belum ada data nilai</p>
                            <p class="text-sm text-gray-400">Nilai akan muncul setelah guru input</p>
                        </div>
                    </div>
                </div>
                
                <!-- Absensi -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="px-6 py-4 bg-gradient-to-r from-yellow-500 to-yellow-600 text-white">
                        <h3 class="text-lg font-semibold flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                            </svg>
                            Kehadiran
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="text-center py-8">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <p class="text-gray-500">Belum ada data absensi</p>
                            <p class="text-sm text-gray-400">Absensi akan direkam oleh guru</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Payment Status -->
            <div class="mt-8">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="px-6 py-4 bg-gradient-to-r from-purple-500 to-purple-600 text-white">
                        <h3 class="text-lg font-semibold flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"/>
                            </svg>
                            Status Pembayaran
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="text-center py-8">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v2a2 2 0 002 2z"/>
                            </svg>
                            <p class="text-gray-500">Belum ada data pembayaran</p>
                            <p class="text-sm text-gray-400">Sistem pembayaran sedang dikembangkan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
