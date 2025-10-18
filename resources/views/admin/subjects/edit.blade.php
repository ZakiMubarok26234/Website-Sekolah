<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Mata Pelajaran') }}
            </h2>
            <a href="{{ route('admin.subjects') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.subjects.update', $subject) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Kode Mata Pelajaran -->
                            <div class="md:col-span-1">
                                <label for="code" class="block text-sm font-medium text-gray-700 mb-2">
                                    Kode Mata Pelajaran <span class="text-red-500">*</span>
                                </label>
                                <input type="text" 
                                       name="code" 
                                       id="code" 
                                       value="{{ old('code', $subject->code) }}"
                                       placeholder="Contoh: MTK001"
                                       maxlength="10"
                                       class="w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('code') border-red-500 @enderror">
                                @error('code')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Jam Kredit -->
                            <div class="md:col-span-1">
                                <label for="credit_hours" class="block text-sm font-medium text-gray-700 mb-2">
                                    Jam Kredit <span class="text-red-500">*</span>
                                </label>
                                <input type="number" 
                                       name="credit_hours" 
                                       id="credit_hours" 
                                       value="{{ old('credit_hours', $subject->credit_hours) }}"
                                       min="1"
                                       max="10"
                                       class="w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('credit_hours') border-red-500 @enderror">
                                @error('credit_hours')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nama Mata Pelajaran -->
                            <div class="md:col-span-2">
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nama Mata Pelajaran <span class="text-red-500">*</span>
                                </label>
                                <input type="text" 
                                       name="name" 
                                       id="name" 
                                       value="{{ old('name', $subject->name) }}"
                                       placeholder="Masukkan nama mata pelajaran"
                                       class="w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror">
                                @error('name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Deskripsi -->
                            <div class="md:col-span-2">
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                    Deskripsi
                                </label>
                                <textarea name="description" 
                                          id="description" 
                                          rows="4"
                                          placeholder="Deskripsi mata pelajaran (opsional)"
                                          class="w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror">{{ old('description', $subject->description) }}</textarea>
                                @error('description')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="md:col-span-2">
                                <label for="is_active" class="block text-sm font-medium text-gray-700 mb-2">
                                    Status <span class="text-red-500">*</span>
                                </label>
                                <select name="is_active" 
                                        id="is_active" 
                                        class="w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('is_active') border-red-500 @enderror">
                                    <option value="1" {{ old('is_active', $subject->is_active) == 1 ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ old('is_active', $subject->is_active) == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                                @error('is_active')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex justify-end space-x-4 mt-6 pt-6 border-t border-gray-200">
                            <a href="{{ route('admin.subjects') }}" 
                               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition-colors">
                                Batal
                            </a>
                            <button type="submit" 
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition-colors">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
