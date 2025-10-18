<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('💰 Kelola Pembayaran') }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('admin.dashboard') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-50 to-purple-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Coming Soon Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="text-center py-16">
                    <svg class="w-24 h-24 text-gray-400 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v2a2 2 0 002 2z"></path>
                    </svg>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Fitur Kelola Pembayaran</h3>
                    <p class="text-gray-600 text-lg mb-6">Fitur ini sedang dalam pengembangan</p>
                    
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 max-w-2xl mx-auto">
                        <h4 class="text-lg font-semibold text-blue-900 mb-3">Yang akan tersedia:</h4>
                        <ul class="text-left text-blue-800 space-y-2">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Manajemen SPP dan biaya sekolah
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Tracking status pembayaran siswa
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Laporan keuangan dan tunggakan
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Integrasi dengan payment gateway
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Notifikasi pembayaran otomatis
                            </li>
                        </ul>
                    </div>

                    <div class="mt-8">
                        <p class="text-gray-500 mb-4">Untuk sementara, Anda dapat menggunakan fitur:</p>
                        <div class="flex justify-center space-x-4">
                            <a href="{{ route('admin.users') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition-colors">
                                <i class="fas fa-users mr-2"></i>Kelola Pengguna
                            </a>
                            <a href="{{ route('admin.news.index') }}" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition-colors">
                                <i class="fas fa-newspaper mr-2"></i>Kelola Berita
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
