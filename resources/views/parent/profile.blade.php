<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('👤 Profil Orang Tua') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gradient-to-r from-green-500 to-blue-600 text-white">
                    <h1 class="text-2xl font-bold">Profil Orang Tua</h1>
                    <p class="text-green-100 mt-1">Kelola informasi profil Anda</p>
                </div>
                
                <div class="p-6">
                    @if (session('success'))
                        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('parent.profile.update') }}" class="space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                                <input type="text" 
                                       id="name" 
                                       name="name" 
                                       value="{{ old('name', $parent->name) }}" 
                                       required
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('name') border-red-500 @enderror">
                                @error('name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input type="email" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email', $parent->email) }}" 
                                       required
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('email') border-red-500 @enderror">
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                                <input type="text" 
                                       id="phone" 
                                       name="phone" 
                                       value="{{ old('phone', $parent->phone) }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('phone') border-red-500 @enderror">
                                @error('phone')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="role" class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                                <input type="text" 
                                       id="role"
                                       value="Orang Tua" 
                                       readonly
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-gray-100 text-gray-600">
                            </div>
                        </div>

                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                            <textarea id="address" 
                                      name="address" 
                                      rows="3"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('address') border-red-500 @enderror">{{ old('address', $parent->address) }}</textarea>
                            @error('address')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <a href="{{ route('parent.dashboard') }}" 
                               class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                ← Kembali ke Dashboard
                            </a>
                            <button type="submit" 
                                    class="inline-flex items-center px-6 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200">
                                💾 Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            @if($children->count() > 0)
            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        👶 Data Anak
                    </h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($children as $child)
                            <div class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50 transition-colors">
                                <div class="flex items-center mb-3">
                                    <div class="bg-blue-100 rounded-full p-2 mr-3">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-900">{{ $child->name }}</h4>
                                        <p class="text-sm text-gray-600">NIS: {{ $child->nis }}</p>
                                    </div>
                                </div>
                                <div class="space-y-1 text-sm text-gray-600">
                                    <p><span class="font-medium">Kelas:</span> {{ $child->class }}</p>
                                    <p><span class="font-medium">Jenis Kelamin:</span> {{ $child->gender }}</p>
                                </div>
                                <div class="mt-3 flex space-x-2">
                                    <a href="{{ route('parent.child.grades', $child->id) }}" 
                                       class="inline-flex items-center px-2 py-1 text-xs font-medium rounded text-blue-700 bg-blue-100 hover:bg-blue-200">
                                        📊 Nilai
                                    </a>
                                    <a href="{{ route('parent.child.attendances', $child->id) }}" 
                                       class="inline-flex items-center px-2 py-1 text-xs font-medium rounded text-yellow-700 bg-yellow-100 hover:bg-yellow-200">
                                        📋 Absensi
                                    </a>
                                    <a href="{{ route('parent.child.payments', $child->id) }}" 
                                       class="inline-flex items-center px-2 py-1 text-xs font-medium rounded text-green-700 bg-green-100 hover:bg-green-200">
                                        💰 Pembayaran
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
