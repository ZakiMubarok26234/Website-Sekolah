<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4" data-aos="fade-right">
            <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>
            <div>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    {{ __('Profile Settings') }}
                </h2>
                <p class="text-gray-600 text-sm">Kelola informasi profil dan keamanan akun Anda</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="bg-white/80 backdrop-blur-md shadow-xl sm:rounded-2xl border border-gray-200 overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-4">
                    <h3 class="text-lg font-semibold text-white flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Informasi Profile
                    </h3>
                    <p class="text-blue-100 text-sm mt-1">Update informasi profil dan alamat email Anda</p>
                </div>
                <div class="p-6 sm:p-8">
                    <div class="max-w-xl">
                        <livewire:profile.update-profile-information-form />
                    </div>
                </div>
            </div>

            <div class="bg-white/80 backdrop-blur-md shadow-xl sm:rounded-2xl border border-gray-200 overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-gradient-to-r from-green-500 to-green-600 px-6 py-4">
                    <h3 class="text-lg font-semibold text-white flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                        Keamanan Password
                    </h3>
                    <p class="text-green-100 text-sm mt-1">Ubah password untuk menjaga keamanan akun</p>
                </div>
                <div class="p-6 sm:p-8">
                    <div class="max-w-xl">
                        <livewire:profile.update-password-form />
                    </div>
                </div>
            </div>

            <div class="bg-white/80 backdrop-blur-md shadow-xl sm:rounded-2xl border border-red-200 overflow-hidden" data-aos="fade-up" data-aos-delay="300">
                <div class="bg-gradient-to-r from-red-500 to-red-600 px-6 py-4">
                    <h3 class="text-lg font-semibold text-white flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.856-.833-2.464 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                        </svg>
                        Hapus Akun
                    </h3>
                    <p class="text-red-100 text-sm mt-1">Hapus akun Anda secara permanen (tidak dapat dibatalkan)</p>
                </div>
                <div class="p-6 sm:p-8">
                    <div class="max-w-xl">
                        <livewire:profile.delete-user-form />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
