<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('➕ Input Nilai Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 bg-gradient-to-r from-purple-500 to-pink-600 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-2xl font-bold">Input Nilai Siswa</h1>
                            <p class="text-purple-100 mt-1">Tambahkan nilai baru untuk siswa</p>
                        </div>
                        <div class="hidden md:block">
                            <div class="bg-white/20 rounded-lg p-4">
                                <i class="fas fa-plus-circle text-4xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold text-gray-700">Form Input Nilai</h3>
                        <a href="{{ route('teacher.grades') }}" 
                           class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-colors duration-200">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Kembali ke Daftar Nilai
                        </a>
                    </div>

                    <form method="POST" action="{{ route('teacher.grades.store') }}" class="space-y-6">
                        @csrf
                        
                        <!-- Row 1: Siswa & Mata Pelajaran -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Siswa -->
                            <div>
                                <label for="student_id" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-user text-gray-400 mr-2"></i>Siswa
                                </label>
                                <select id="student_id" name="student_id" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 @error('student_id') border-red-500 @enderror" 
                                        required>
                                    <option value="">Pilih Siswa</option>
                                    @foreach($students as $student)
                                        <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>
                                            {{ $student->name }} ({{ $student->nis }}) - {{ $student->class }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('student_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Mata Pelajaran -->
                            <div>
                                <label for="subject_id" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-book text-gray-400 mr-2"></i>Mata Pelajaran
                                </label>
                                <select id="subject_id" name="subject_id" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 @error('subject_id') border-red-500 @enderror" 
                                        required>
                                    <option value="">Pilih Mata Pelajaran</option>
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}" {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                                            {{ $subject->name }} ({{ $subject->code }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('subject_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Row 2: Jenis Penilaian & Nilai -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Jenis Penilaian -->
                            <div>
                                <label for="type" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-clipboard-list text-gray-400 mr-2"></i>Jenis Penilaian
                                </label>
                                <select id="type" name="type" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 @error('type') border-red-500 @enderror" 
                                        required>
                                    <option value="">Pilih Jenis</option>
                                    <option value="tugas" {{ old('type') == 'tugas' ? 'selected' : '' }}>📝 Tugas</option>
                                    <option value="quiz" {{ old('type') == 'quiz' ? 'selected' : '' }}>📋 Quiz</option>
                                    <option value="uts" {{ old('type') == 'uts' ? 'selected' : '' }}>📊 UTS</option>
                                    <option value="uas" {{ old('type') == 'uas' ? 'selected' : '' }}>🎯 UAS</option>
                                </select>
                                @error('type')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nilai -->
                            <div>
                                <label for="score" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-star text-gray-400 mr-2"></i>Nilai (0-100)
                                </label>
                                <input type="number" id="score" name="score" min="0" max="100" step="0.01" 
                                       value="{{ old('score') }}" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 @error('score') border-red-500 @enderror" 
                                       placeholder="Masukkan nilai 0-100" required>
                                @error('score')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Row 3: Tahun Ajaran & Semester -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Tahun Ajaran -->
                            <div>
                                <label for="academic_year" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-calendar text-gray-400 mr-2"></i>Tahun Ajaran
                                </label>
                                <input type="text" id="academic_year" name="academic_year" 
                                       value="{{ old('academic_year', '2024/2025') }}" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 @error('academic_year') border-red-500 @enderror" 
                                       placeholder="Contoh: 2024/2025" required>
                                @error('academic_year')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Semester -->
                            <div>
                                <label for="semester" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-graduation-cap text-gray-400 mr-2"></i>Semester
                                </label>
                                <select id="semester" name="semester" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 @error('semester') border-red-500 @enderror" 
                                        required>
                                    <option value="">Pilih Semester</option>
                                    <option value="Ganjil" {{ old('semester') == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
                                    <option value="Genap" {{ old('semester') == 'Genap' ? 'selected' : '' }}>Genap</option>
                                </select>
                                @error('semester')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Catatan -->
                        <div>
                            <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-sticky-note text-gray-400 mr-2"></i>Catatan (Opsional)
                            </label>
                            <textarea id="notes" name="notes" rows="4" 
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 @error('notes') border-red-500 @enderror" 
                                      placeholder="Tambahkan catatan atau keterangan tambahan...">{{ old('notes') }}</textarea>
                            @error('notes')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end pt-6 border-t border-gray-200">
                            <button type="submit" 
                                    class="inline-flex items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-colors duration-200">
                                <i class="fas fa-save mr-2"></i>
                                Simpan Nilai
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Tips Section -->
            <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <i class="fas fa-info-circle text-blue-500"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-blue-800">Tips Input Nilai:</h3>
                        <div class="mt-2 text-sm text-blue-700">
                            <ul class="list-disc list-inside space-y-1">
                                <li>Pastikan memilih siswa dan mata pelajaran yang tepat</li>
                                <li>Nilai harus dalam rentang 0-100</li>
                                <li>Pilih jenis penilaian sesuai dengan konteks (Tugas, Quiz, UTS, UAS)</li>
                                <li>Tahun ajaran biasanya dalam format YYYY/YYYY (contoh: 2024/2025)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
