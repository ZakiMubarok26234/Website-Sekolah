<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('👤 Profil Guru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Berhasil!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Profile Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Header -->
                <div class="bg-gradient-to-r from-blue-500 to-purple-600 text-white p-6">
                    <div class="flex items-center">
                        <div class="bg-white/20 rounded-full p-4 mr-4">
                            <i class="fas fa-chalkboard-teacher text-2xl"></i>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold">Profil Guru</h1>
                            <p class="text-blue-100">Kelola informasi profil Anda</p>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <div class="p-6">
                    <form method="POST" action="{{ route('teacher.profile.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nama Lengkap -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-user text-gray-400 mr-2"></i>Nama Lengkap
                                </label>
                                <input type="text" name="name" id="name" 
                                       value="{{ old('name', $teacher->name) }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                       required>
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-envelope text-gray-400 mr-2"></i>Email
                                </label>
                                <input type="email" name="email" id="email" 
                                       value="{{ old('email', $teacher->email) }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                       required>
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nomor Telepon -->
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-phone text-gray-400 mr-2"></i>Nomor Telepon
                                </label>
                                <input type="text" name="phone" id="phone" 
                                       value="{{ old('phone', $teacher->phone) }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                @error('phone')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Role (Read Only) -->
                            <div>
                                <label for="role" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-user-tag text-gray-400 mr-2"></i>Role
                                </label>
                                <input type="text" value="Guru" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-100 text-gray-600"
                                       readonly>
                            </div>
                        </div>

                        <!-- Alamat -->
                        <div class="mt-6">
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-map-marker-alt text-gray-400 mr-2"></i>Alamat
                            </label>
                            <textarea name="address" id="address" rows="3" 
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                      placeholder="Masukkan alamat lengkap">{{ old('address', $teacher->address) }}</textarea>
                            @error('address')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="mt-8 flex items-center justify-between">
                            <a href="{{ route('teacher.dashboard') }}" 
                               class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Kembali ke Dashboard
                            </a>
                            
                            <button type="submit" 
                                    class="inline-flex items-center px-6 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                <i class="fas fa-save mr-2"></i>
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Additional Info Card -->
            <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">
                        <i class="fas fa-info-circle text-blue-500 mr-2"></i>Informasi Akun
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex items-center p-4 bg-blue-50 rounded-lg">
                            <div class="bg-blue-500 rounded-full p-2 mr-3">
                                <i class="fas fa-calendar text-white"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Bergabung sejak</p>
                                <p class="font-medium text-gray-900">{{ $teacher->created_at->format('d F Y') }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center p-4 bg-green-50 rounded-lg">
                            <div class="bg-green-500 rounded-full p-2 mr-3">
                                <i class="fas fa-check-circle text-white"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Status Akun</p>
                                <p class="font-medium text-green-600">
                                    {{ $teacher->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
