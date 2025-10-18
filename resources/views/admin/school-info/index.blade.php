<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Informasi Sekolah') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-50 to-purple-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Success Message -->
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6" data-aos="fade-up">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl" data-aos="fade-up">
                <form action="{{ route('admin.school-info.update') }}" method="POST" enctype="multipart/form-data" class="p-8">
                    @csrf
                    @method('PUT')

                    <!-- School Logo -->
                    <div class="mb-8">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Logo Sekolah
                        </label>
                        @if($schoolInfos['school_logo'])
                            <div class="mb-4">
                                <img src="{{ asset('storage/' . $schoolInfos['school_logo']) }}" alt="Logo Sekolah" 
                                     class="max-w-32 h-auto rounded-lg shadow-lg">
                            </div>
                        @endif
                        <input type="file" name="school_logo" id="school_logo" accept="image/*"
                               class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('school_logo') border-red-500 @enderror">
                        @error('school_logo')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-gray-500 text-sm mt-1">Format: JPG, PNG. Maksimal 1MB</p>
                    </div>

                    <!-- Basic Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div>
                            <label for="school_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                Nama Sekolah <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="school_name" id="school_name" 
                                   value="{{ old('school_name', $schoolInfos['school_name']) }}" required
                                   class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('school_name') border-red-500 @enderror">
                            @error('school_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="principal_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                Nama Kepala Sekolah <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="principal_name" id="principal_name" 
                                   value="{{ old('principal_name', $schoolInfos['principal_name']) }}" required
                                   class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('principal_name') border-red-500 @enderror">
                            @error('principal_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Kontak</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="school_phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Nomor Telepon <span class="text-red-500">*</span>
                                </label>
                                <input type="tel" name="school_phone" id="school_phone" 
                                       value="{{ old('school_phone', $schoolInfos['school_phone']) }}" required
                                       class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('school_phone') border-red-500 @enderror">
                                @error('school_phone')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="school_email" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Email <span class="text-red-500">*</span>
                                </label>
                                <input type="email" name="school_email" id="school_email" 
                                       value="{{ old('school_email', $schoolInfos['school_email']) }}" required
                                       class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('school_email') border-red-500 @enderror">
                                @error('school_email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6">
                            <label for="school_address" class="block text-sm font-semibold text-gray-700 mb-2">
                                Alamat Sekolah <span class="text-red-500">*</span>
                            </label>
                            <textarea name="school_address" id="school_address" rows="3" required
                                      class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('school_address') border-red-500 @enderror">{{ old('school_address', $schoolInfos['school_address']) }}</textarea>
                            @error('school_address')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Statistics -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Statistik</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label for="student_count" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Jumlah Siswa <span class="text-red-500">*</span>
                                </label>
                                <input type="number" name="student_count" id="student_count" min="0"
                                       value="{{ old('student_count', $schoolInfos['student_count']) }}" required
                                       class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('student_count') border-red-500 @enderror">
                                @error('student_count')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="teacher_count" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Jumlah Guru <span class="text-red-500">*</span>
                                </label>
                                <input type="number" name="teacher_count" id="teacher_count" min="0"
                                       value="{{ old('teacher_count', $schoolInfos['teacher_count']) }}" required
                                       class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('teacher_count') border-red-500 @enderror">
                                @error('teacher_count')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="staff_count" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Jumlah Staff <span class="text-red-500">*</span>
                                </label>
                                <input type="number" name="staff_count" id="staff_count" min="0"
                                       value="{{ old('staff_count', $schoolInfos['staff_count']) }}" required
                                       class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('staff_count') border-red-500 @enderror">
                                @error('staff_count')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Vision -->
                    <div class="mb-6">
                        <label for="school_vision" class="block text-sm font-semibold text-gray-700 mb-2">
                            Visi Sekolah <span class="text-red-500">*</span>
                        </label>
                        <textarea name="school_vision" id="school_vision" rows="4" required
                                  class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('school_vision') border-red-500 @enderror"
                                  placeholder="Masukkan visi sekolah...">{{ old('school_vision', $schoolInfos['school_vision']) }}</textarea>
                        @error('school_vision')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Mission -->
                    <div class="mb-6">
                        <label for="school_mission" class="block text-sm font-semibold text-gray-700 mb-2">
                            Misi Sekolah <span class="text-red-500">*</span>
                        </label>
                        <textarea name="school_mission" id="school_mission" rows="6" required
                                  class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('school_mission') border-red-500 @enderror"
                                  placeholder="Masukkan misi sekolah...">{{ old('school_mission', $schoolInfos['school_mission']) }}</textarea>
                        @error('school_mission')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- History -->
                    <div class="mb-8">
                        <label for="school_history" class="block text-sm font-semibold text-gray-700 mb-2">
                            Sejarah Sekolah <span class="text-red-500">*</span>
                        </label>
                        <textarea name="school_history" id="school_history" rows="8" required
                                  class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('school_history') border-red-500 @enderror"
                                  placeholder="Masukkan sejarah singkat sekolah...">{{ old('school_history', $schoolInfos['school_history']) }}</textarea>
                        @error('school_history')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('dashboard') }}" 
                           class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg transition-colors">
                            Kembali ke Dashboard
                        </a>
                        <button type="submit" 
                                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition-colors">
                            <i class="fas fa-save mr-2"></i>Simpan Informasi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
