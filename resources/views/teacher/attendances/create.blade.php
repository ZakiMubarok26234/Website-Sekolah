<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('➕ Input Absensi Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 bg-gradient-to-r from-green-500 to-teal-600 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-2xl font-bold">Input Absensi Siswa</h1>
                            <p class="text-green-100 mt-1">Catat kehadiran siswa</p>
                        </div>
                        <div class="hidden md:block">
                            <div class="bg-white/20 rounded-lg p-4">
                                <i class="fas fa-calendar-plus text-4xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold text-gray-700">Form Input Absensi</h3>
                        <a href="{{ route('teacher.attendances') }}" 
                           class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Kembali ke Daftar Absensi
                        </a>
                    </div>

                    <form method="POST" action="{{ route('teacher.attendances.store') }}" class="space-y-6">
                        @csrf
                        
                        <!-- Row 1: Tanggal & Mata Pelajaran -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Tanggal -->
                            <div>
                                <label for="date" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-calendar text-gray-400 mr-2"></i>Tanggal
                                </label>
                                <input type="date" id="date" name="date" 
                                       value="{{ old('date', date('Y-m-d')) }}" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 @error('date') border-red-500 @enderror" 
                                       required>
                                @error('date')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Mata Pelajaran -->
                            <div>
                                <label for="subject_id" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-book text-gray-400 mr-2"></i>Mata Pelajaran
                                </label>
                                <select id="subject_id" name="subject_id" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 @error('subject_id') border-red-500 @enderror" 
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

                        <!-- Row 2: Siswa & Status Kehadiran -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Siswa -->
                            <div>
                                <label for="student_id" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-user text-gray-400 mr-2"></i>Siswa
                                </label>
                                <select id="student_id" name="student_id" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 @error('student_id') border-red-500 @enderror" 
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

                            <!-- Status Kehadiran -->
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-check-circle text-gray-400 mr-2"></i>Status Kehadiran
                                </label>
                                <select id="status" name="status" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 @error('status') border-red-500 @enderror" 
                                        required>
                                    <option value="">Pilih Status</option>
                                    <option value="hadir" {{ old('status') == 'hadir' ? 'selected' : '' }}>✅ Hadir</option>
                                    <option value="tidak_hadir" {{ old('status') == 'tidak_hadir' ? 'selected' : '' }}>❌ Tidak Hadir</option>
                                    <option value="izin" {{ old('status') == 'izin' ? 'selected' : '' }}>📝 Izin</option>
                                    <option value="sakit" {{ old('status') == 'sakit' ? 'selected' : '' }}>🏥 Sakit</option>
                                </select>
                                @error('status')
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
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 @error('notes') border-red-500 @enderror" 
                                      placeholder="Catatan tambahan tentang kehadiran siswa...">{{ old('notes') }}</textarea>
                            @error('notes')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end pt-6 border-t border-gray-200">
                            <button type="submit" 
                                    class="inline-flex items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200">
                                <i class="fas fa-save mr-2"></i>
                                Simpan Absensi
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Tips Section -->
            <div class="mt-6 bg-green-50 border border-green-200 rounded-lg p-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <i class="fas fa-info-circle text-green-500"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-green-800">Tips Input Absensi:</h3>
                        <div class="mt-2 text-sm text-green-700">
                            <ul class="list-disc list-inside space-y-1">
                                <li>Pastikan tanggal sesuai dengan hari pembelajaran</li>
                                <li>Pilih mata pelajaran yang sedang diajarkan</li>
                                <li>Status kehadiran: Hadir, Tidak Hadir, Izin, atau Sakit</li>
                                <li>Gunakan catatan untuk informasi tambahan jika diperlukan</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
