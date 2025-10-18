<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Assign Guru ke Mata Pelajaran') }}
            </h2>
            <a href="{{ route('admin.subjects.show', $subject) }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <!-- Subject Info -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Mata Pelajaran</h3>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <span class="text-sm font-medium text-gray-500">Kode:</span>
                                <span class="ml-2 font-mono">{{ $subject->code }}</span>
                            </div>
                            <div>
                                <span class="text-sm font-medium text-gray-500">Jam Kredit:</span>
                                <span class="ml-2">{{ $subject->credit_hours }} jam</span>
                            </div>
                            <div class="col-span-2">
                                <span class="text-sm font-medium text-gray-500">Nama:</span>
                                <span class="ml-2 font-semibold">{{ $subject->name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Assignment Form -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Form Assignment</h3>

                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.subjects.store-teacher-assignment', $subject) }}" method="POST">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Pilih Guru -->
                            <div class="md:col-span-2">
                                <label for="teacher_id" class="block text-sm font-medium text-gray-700 mb-2">
                                    Pilih Guru <span class="text-red-500">*</span>
                                </label>
                                <select name="teacher_id" 
                                        id="teacher_id" 
                                        class="w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('teacher_id') border-red-500 @enderror">
                                    <option value="">-- Pilih Guru --</option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                                            {{ $teacher->name }} ({{ $teacher->email }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('teacher_id')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Kelas -->
                            <div>
                                <label for="class" class="block text-sm font-medium text-gray-700 mb-2">
                                    Kelas <span class="text-red-500">*</span>
                                </label>
                                <select name="class" 
                                        id="class" 
                                        class="w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('class') border-red-500 @enderror">
                                    <option value="">-- Pilih Kelas --</option>
                                    @foreach($classes as $class)
                                        <option value="{{ $class }}" {{ old('class') == $class ? 'selected' : '' }}>
                                            {{ $class }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('class')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Tahun Ajaran -->
                            <div>
                                <label for="academic_year" class="block text-sm font-medium text-gray-700 mb-2">
                                    Tahun Ajaran <span class="text-red-500">*</span>
                                </label>
                                <input type="text" 
                                       name="academic_year" 
                                       id="academic_year" 
                                       value="{{ old('academic_year', $currentYear) }}"
                                       placeholder="2025/2026"
                                       class="w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('academic_year') border-red-500 @enderror">
                                @error('academic_year')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex justify-end space-x-4 mt-6 pt-6 border-t border-gray-200">
                            <a href="{{ route('admin.subjects.show', $subject) }}" 
                               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition-colors">
                                Batal
                            </a>
                            <button type="submit" 
                                    class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg transition-colors">
                                Assign Guru
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Assignments -->
            @if($subject->teachers->count() > 0)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Assignment Saat Ini</h3>
                    <div class="space-y-3">
                        @foreach($subject->teachers as $teacher)
                            <div class="bg-gray-50 p-3 rounded-lg flex justify-between items-center">
                                <div>
                                    <span class="font-medium">{{ $teacher->name }}</span>
                                    <span class="text-gray-500 text-sm ml-2">
                                        - Kelas {{ $teacher->pivot->class }} 
                                        ({{ $teacher->pivot->academic_year }})
                                    </span>
                                </div>
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                    {{ $teacher->pivot->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $teacher->pivot->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
