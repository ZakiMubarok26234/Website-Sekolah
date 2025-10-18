<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Mata Pelajaran') }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('admin.subjects.edit', $subject) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit
                </a>
                <a href="{{ route('admin.subjects') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Subject Information -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Mata Pelajaran</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Kode</dt>
                            <dd class="mt-1 text-sm text-gray-900 font-mono bg-gray-100 px-2 py-1 rounded">{{ $subject->code }}</dd>
                        </div>
                        
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Jam Kredit</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $subject->credit_hours }} jam</dd>
                        </div>
                        
                        <div class="md:col-span-2">
                            <dt class="text-sm font-medium text-gray-500">Nama Mata Pelajaran</dt>
                            <dd class="mt-1 text-lg font-semibold text-gray-900">{{ $subject->name }}</dd>
                        </div>
                        
                        @if($subject->description)
                        <div class="md:col-span-2">
                            <dt class="text-sm font-medium text-gray-500">Deskripsi</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $subject->description }}</dd>
                        </div>
                        @endif
                        
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Status</dt>
                            <dd class="mt-1">
                                @if($subject->is_active)
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                        Aktif
                                    </span>
                                @else
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                        Tidak Aktif
                                    </span>
                                @endif
                            </dd>
                        </div>
                        
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Terakhir Diperbarui</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $subject->updated_at->format('d/m/Y H:i') }}</dd>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Teachers Assigned -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Guru yang Mengajar</h3>
                        <a href="{{ route('admin.subjects.assign-teacher', $subject) }}" 
                           class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg flex items-center text-sm">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Assign Guru
                        </a>
                    </div>
                    
                    @if($subject->teachers->count() > 0)
                        <div class="space-y-4">
                            @foreach($subject->teachers as $teacher)
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0">
                                                <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center">
                                                    <span class="text-white font-semibold text-lg">
                                                        {{ substr($teacher->name, 0, 1) }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <p class="text-sm font-medium text-gray-900">{{ $teacher->name }}</p>
                                                <p class="text-xs text-gray-500">{{ $teacher->email }}</p>
                                                <div class="mt-1 flex space-x-4 text-xs text-gray-600">
                                                    <span>Kelas: {{ $teacher->pivot->class }}</span>
                                                    <span>Tahun: {{ $teacher->pivot->academic_year }}</span>
                                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                                        {{ $teacher->pivot->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                        {{ $teacher->pivot->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{ route('admin.subjects.remove-teacher-assignment', [$subject, $teacher]) }}" 
                                              method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="class" value="{{ $teacher->pivot->class }}">
                                            <input type="hidden" name="academic_year" value="{{ $teacher->pivot->academic_year }}">
                                            <button type="submit" 
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus assignment ini?')"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <p class="text-gray-500 mb-4">Belum ada guru yang ditugaskan untuk mata pelajaran ini.</p>
                            <a href="{{ route('admin.subjects.assign-teacher', $subject) }}" 
                               class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg inline-flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Assign Guru Pertama
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
