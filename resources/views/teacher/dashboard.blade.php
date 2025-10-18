<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('👩‍🏫 Dashboard Guru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 bg-gradient-to-r from-blue-500 to-purple-600 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-2xl font-bold">Selamat Datang, {{ auth()->user()->name }}! 👋</h1>
                            <p class="text-blue-100 mt-1">Dashboard Guru - {{ date('d F Y') }}</p>
                        </div>
                        <div class="hidden md:block">
                            <div class="bg-white/20 rounded-lg p-4">
                                <i class="fas fa-chalkboard-teacher text-4xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <!-- Mata Pelajaran -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-blue-500">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-blue-100 rounded-lg p-3">
                                    <i class="fas fa-book text-blue-600 text-xl"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-700">Mata Pelajaran</h3>
                                <p class="text-3xl font-bold text-blue-600">{{ $stats['my_subjects'] }}</p>
                                <p class="text-sm text-gray-500">yang diampu</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Siswa -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-green-500">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-green-100 rounded-lg p-3">
                                    <i class="fas fa-users text-green-600 text-xl"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-700">Siswa Kelas Saya</h3>
                                <p class="text-3xl font-bold text-green-600">{{ $stats['total_students_in_classes'] ?? 0 }}</p>
                                <p class="text-sm text-gray-500">dari {{ $stats['my_classes'] ?? 0 }} kelas</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Nilai Diberikan -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-purple-500">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-purple-100 rounded-lg p-3">
                                    <i class="fas fa-clipboard-list text-purple-600 text-xl"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-700">Nilai Diberikan</h3>
                                <p class="text-3xl font-bold text-purple-600">{{ $stats['grades_given'] }}</p>
                                <p class="text-sm text-gray-500">total penilaian</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Absensi Hari Ini -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-yellow-500">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-yellow-100 rounded-lg p-3">
                                    <i class="fas fa-calendar-check text-yellow-600 text-xl"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-700">Absensi Hari Ini</h3>
                                <p class="text-3xl font-bold text-yellow-600">{{ $stats['attendances_today'] }}</p>
                                <p class="text-sm text-gray-500">dicatat hari ini</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Quick Actions -->
                <div class="lg:col-span-2">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-700 mb-4">
                                <i class="fas fa-bolt text-yellow-500 mr-2"></i>Aksi Cepat
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Lihat Siswa -->
                                <a href="{{ route('teacher.students') }}" class="group block p-4 bg-gradient-to-r from-blue-50 to-blue-100 rounded-lg border border-blue-200 hover:shadow-md transition-all duration-200">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="bg-blue-500 rounded-lg p-2 group-hover:scale-110 transition-transform duration-200">
                                                <i class="fas fa-users text-white"></i>
                                            </div>
                                        </div>
                                        <div class="ml-3">
                                            <h4 class="font-medium text-blue-900">Lihat Siswa</h4>
                                            <p class="text-sm text-blue-600">Daftar semua siswa</p>
                                        </div>
                                    </div>
                                </a>

                                <!-- Input Nilai -->
                                <a href="{{ route('teacher.grades.create') }}" class="group block p-4 bg-gradient-to-r from-green-50 to-green-100 rounded-lg border border-green-200 hover:shadow-md transition-all duration-200">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="bg-green-500 rounded-lg p-2 group-hover:scale-110 transition-transform duration-200">
                                                <i class="fas fa-plus text-white"></i>
                                            </div>
                                        </div>
                                        <div class="ml-3">
                                            <h4 class="font-medium text-green-900">Input Nilai</h4>
                                            <p class="text-sm text-green-600">Tambah nilai siswa</p>
                                        </div>
                                    </div>
                                </a>

                                <!-- Kelola Nilai -->
                                <a href="{{ route('teacher.grades') }}" class="group block p-4 bg-gradient-to-r from-purple-50 to-purple-100 rounded-lg border border-purple-200 hover:shadow-md transition-all duration-200">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="bg-purple-500 rounded-lg p-2 group-hover:scale-110 transition-transform duration-200">
                                                <i class="fas fa-chart-bar text-white"></i>
                                            </div>
                                        </div>
                                        <div class="ml-3">
                                            <h4 class="font-medium text-purple-900">Kelola Nilai</h4>
                                            <p class="text-sm text-purple-600">Lihat dan edit nilai</p>
                                        </div>
                                    </div>
                                </a>

                                <!-- Input Absensi -->
                                <a href="{{ route('teacher.attendances.create') }}" class="group block p-4 bg-gradient-to-r from-yellow-50 to-yellow-100 rounded-lg border border-yellow-200 hover:shadow-md transition-all duration-200">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="bg-yellow-500 rounded-lg p-2 group-hover:scale-110 transition-transform duration-200">
                                                <i class="fas fa-calendar-plus text-white"></i>
                                            </div>
                                        </div>
                                        <div class="ml-3">
                                            <h4 class="font-medium text-yellow-900">Input Absensi</h4>
                                            <p class="text-sm text-yellow-600">Catat kehadiran siswa</p>
                                        </div>
                                    </div>
                                </a>

                                <!-- Kelola Absensi -->
                                <a href="{{ route('teacher.attendances') }}" class="group block p-4 bg-gradient-to-r from-red-50 to-red-100 rounded-lg border border-red-200 hover:shadow-md transition-all duration-200">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="bg-red-500 rounded-lg p-2 group-hover:scale-110 transition-transform duration-200">
                                                <i class="fas fa-calendar-alt text-white"></i>
                                            </div>
                                        </div>
                                        <div class="ml-3">
                                            <h4 class="font-medium text-red-900">Kelola Absensi</h4>
                                            <p class="text-sm text-red-600">Lihat rekap absensi</p>
                                        </div>
                                    </div>
                                </a>

                                <!-- Profil Guru -->
                                <a href="{{ route('teacher.profile') }}" class="group block p-4 bg-gradient-to-r from-gray-50 to-gray-100 rounded-lg border border-gray-200 hover:shadow-md transition-all duration-200">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="bg-gray-500 rounded-lg p-2 group-hover:scale-110 transition-transform duration-200">
                                                <i class="fas fa-user text-white"></i>
                                            </div>
                                        </div>
                                        <div class="ml-3">
                                            <h4 class="font-medium text-gray-900">Profil Saya</h4>
                                            <p class="text-sm text-gray-600">Edit profil guru</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mata Pelajaran & Info -->
                <div class="space-y-6">
                    <!-- Mata Pelajaran -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-700 mb-4">
                                <i class="fas fa-book text-blue-500 mr-2"></i>Mata Pelajaran Saya
                            </h3>
                            <div class="space-y-3">
                                @forelse($my_subjects as $subject)
                                    <div class="flex items-center p-3 bg-blue-50 rounded-lg border border-blue-200">
                                        <div class="flex-shrink-0">
                                            <div class="bg-blue-500 rounded-full p-2">
                                                <i class="fas fa-book text-white text-sm"></i>
                                            </div>
                                        </div>
                                        <div class="ml-3 flex-1">
                                            <h4 class="font-medium text-blue-900">{{ $subject->name }}</h4>
                                            <p class="text-sm text-blue-600">{{ $subject->code }}</p>
                                            @if($subject->teachers->isNotEmpty())
                                                <div class="flex flex-wrap gap-1 mt-1">
                                                    @foreach($subject->teachers as $teacher_assignment)
                                                        <span class="inline-flex px-2 py-1 text-xs font-medium rounded-full bg-blue-200 text-blue-800">
                                                            Kelas {{ $teacher_assignment->pivot->class }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center py-8">
                                        <div class="bg-gray-100 rounded-full p-4 w-16 h-16 mx-auto mb-4">
                                            <i class="fas fa-book text-gray-400 text-2xl"></i>
                                        </div>
                                        <p class="text-gray-500 text-sm">Belum ada mata pelajaran yang diajar</p>
                                        <p class="text-gray-400 text-xs mt-1">Hubungi admin untuk penugasan mata pelajaran</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- Tips Hari Ini -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-700 mb-4">
                                <i class="fas fa-lightbulb text-yellow-500 mr-2"></i>Tips Hari Ini
                            </h3>
                            <div class="bg-gradient-to-r from-yellow-50 to-orange-50 rounded-lg p-4 border border-yellow-200">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-star text-yellow-500"></i>
                                    </div>
                                    <div class="ml-3">
                                        <h4 class="font-medium text-yellow-900 mb-2">Manajemen Kelas yang Efektif</h4>
                                        <p class="text-sm text-yellow-700">Gunakan sistem penilaian yang konsisten dan berikan feedback yang konstruktif kepada siswa untuk meningkatkan motivasi belajar mereka.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity (jika diperlukan) -->
            <div class="mt-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-700 mb-4">
                            <i class="fas fa-history text-green-500 mr-2"></i>Aktivitas Terbaru
                        </h3>
                        <div class="space-y-3">
                            @forelse($recent_grades as $grade)
                                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                    <div class="flex-shrink-0">
                                        <div class="bg-green-500 rounded-full p-2">
                                            <i class="fas fa-chart-line text-white text-sm"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3 flex-1">
                                        <p class="text-sm font-medium text-gray-900">
                                            Nilai {{ $grade->type }} - {{ $grade->student->name }}
                                        </p>
                                        <p class="text-xs text-gray-500">{{ $grade->subject->name }} • {{ $grade->created_at->diffForHumans() }}</p>
                                    </div>
                                    <div class="text-right">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            {{ $grade->score }}
                                        </span>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-8">
                                    <div class="bg-gray-100 rounded-full p-4 w-16 h-16 mx-auto mb-4">
                                        <i class="fas fa-clock text-gray-400 text-2xl"></i>
                                    </div>
                                    <p class="text-gray-500 text-sm">Belum ada aktivitas terbaru</p>
                                    <p class="text-gray-400 text-xs mt-1">Aktivitas penilaian akan muncul di sini</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
