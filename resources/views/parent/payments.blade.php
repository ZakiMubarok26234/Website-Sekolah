<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('💰 Pembayaran ') . $student->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gradient-to-r from-emerald-500 to-blue-600 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-2xl font-bold">💰 Pembayaran {{ $student->name }}</h1>
                            <p class="text-emerald-100 mt-1">Riwayat dan status pembayaran</p>
                        </div>
                        <a href="{{ route('parent.dashboard') }}" 
                           class="inline-flex items-center px-4 py-2 bg-white/20 border border-white/30 rounded-md font-medium text-white hover:bg-white/30 transition-colors">
                            ← Kembali
                        </a>
                    </div>
                </div>
                
                <!-- Student Info Cards -->
                <div class="p-6 border-b border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div class="bg-blue-50 rounded-lg p-4 border border-blue-200">
                            <div class="flex items-center">
                                <div class="p-2 bg-blue-500 rounded-lg mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h6 class="text-sm font-medium text-blue-900">Nama Siswa</h6>
                                    <p class="text-lg font-bold text-blue-800">{{ $student->name }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-green-50 rounded-lg p-4 border border-green-200">
                            <div class="flex items-center">
                                <div class="p-2 bg-green-500 rounded-lg mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h6 class="text-sm font-medium text-green-900">NIS</h6>
                                    <p class="text-lg font-bold text-green-800">{{ $student->nis }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-purple-50 rounded-lg p-4 border border-purple-200">
                            <div class="flex items-center">
                                <div class="p-2 bg-purple-500 rounded-lg mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h6 class="text-sm font-medium text-purple-900">Kelas</h6>
                                    <p class="text-lg font-bold text-purple-800">{{ $student->class }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-yellow-50 rounded-lg p-4 border border-yellow-200">
                            <div class="flex items-center">
                                <div class="p-2 bg-yellow-500 rounded-lg mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h6 class="text-sm font-medium text-yellow-900">Status</h6>
                                    <p class="text-lg font-bold text-yellow-800">Aktif</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <!-- Coming Soon Message -->
                    <div class="text-center py-12">
                        <div class="bg-gradient-to-br from-emerald-100 to-blue-100 rounded-full p-6 w-24 h-24 mx-auto mb-6">
                            <svg class="w-12 h-12 text-emerald-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Sistem Pembayaran</h3>
                        <p class="text-lg text-gray-600 mb-6 max-w-2xl mx-auto">
                            Fitur pembayaran sedang dalam tahap pengembangan. Sistem ini akan memungkinkan Anda untuk:
                        </p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8 max-w-4xl mx-auto">
                            <div class="bg-white border border-emerald-200 rounded-lg p-6 hover:shadow-md transition-shadow">
                                <div class="bg-emerald-100 rounded-full p-3 w-12 h-12 mx-auto mb-4">
                                    <svg class="w-6 h-6 text-emerald-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Tagihan SPP</h4>
                                <p class="text-sm text-gray-600">Melihat dan membayar tagihan SPP bulanan</p>
                            </div>

                            <div class="bg-white border border-blue-200 rounded-lg p-6 hover:shadow-md transition-shadow">
                                <div class="bg-blue-100 rounded-full p-3 w-12 h-12 mx-auto mb-4">
                                    <svg class="w-6 h-6 text-blue-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                </div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Biaya Kegiatan</h4>
                                <p class="text-sm text-gray-600">Pembayaran untuk kegiatan sekolah dan ekstrakurikuler</p>
                            </div>

                            <div class="bg-white border border-purple-200 rounded-lg p-6 hover:shadow-md transition-shadow">
                                <div class="bg-purple-100 rounded-full p-3 w-12 h-12 mx-auto mb-4">
                                    <svg class="w-6 h-6 text-purple-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                    </svg>
                                </div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Riwayat Pembayaran</h4>
                                <p class="text-sm text-gray-600">Melihat histori dan bukti pembayaran</p>
                            </div>

                            <div class="bg-white border border-yellow-200 rounded-lg p-6 hover:shadow-md transition-shadow">
                                <div class="bg-yellow-100 rounded-full p-3 w-12 h-12 mx-auto mb-4">
                                    <svg class="w-6 h-6 text-yellow-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.994-.833-2.464 0L4.35 15.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                    </svg>
                                </div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Notifikasi Tagihan</h4>
                                <p class="text-sm text-gray-600">Pengingat otomatis untuk tagihan yang belum dibayar</p>
                            </div>

                            <div class="bg-white border border-red-200 rounded-lg p-6 hover:shadow-md transition-shadow">
                                <div class="bg-red-100 rounded-full p-3 w-12 h-12 mx-auto mb-4">
                                    <svg class="w-6 h-6 text-red-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                    </svg>
                                </div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Payment Gateway</h4>
                                <p class="text-sm text-gray-600">Pembayaran online melalui berbagai metode</p>
                            </div>

                            <div class="bg-white border border-indigo-200 rounded-lg p-6 hover:shadow-md transition-shadow">
                                <div class="bg-indigo-100 rounded-full p-3 w-12 h-12 mx-auto mb-4">
                                    <svg class="w-6 h-6 text-indigo-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Laporan Keuangan</h4>
                                <p class="text-sm text-gray-600">Laporan detail pengeluaran pendidikan anak</p>
                            </div>
                        </div>

                        <div class="mt-8 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                            <div class="flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <p class="text-blue-800 font-medium">
                                    Untuk sementara, silakan lakukan pembayaran melalui tata usaha sekolah atau hubungi admin.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
