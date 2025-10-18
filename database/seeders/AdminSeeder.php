<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin Sekolah',
            'email' => 'admin@sekolah.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'phone' => '081234567890',
            'address' => 'Jl. Sekolah No. 1, Kota ABC',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        // Create Sample Teachers
        User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi.guru@sekolah.com',
            'password' => Hash::make('guru123'),
            'role' => 'guru',
            'phone' => '081234567891',
            'address' => 'Jl. Guru No. 1, Kota ABC',
            'is_active' => true,
        ]);

        User::create([
            'name' => 'Siti Aminah',
            'email' => 'siti.guru@sekolah.com',
            'password' => Hash::make('guru123'),
            'role' => 'guru',
            'phone' => '081234567892',
            'address' => 'Jl. Guru No. 2, Kota ABC',
            'is_active' => true,
        ]);

        // Create Sample Parents
        User::create([
            'name' => 'Ahmad Rahman',
            'email' => 'ahmad.ortu@gmail.com',
            'password' => Hash::make('ortu123'),
            'role' => 'orang_tua',
            'phone' => '081234567893',
            'address' => 'Jl. Orang Tua No. 1, Kota ABC',
            'is_active' => true,
        ]);

        User::create([
            'name' => 'Fatimah Zahra',
            'email' => 'fatimah.ortu@gmail.com',
            'password' => Hash::make('ortu123'),
            'role' => 'orang_tua',
            'phone' => '081234567894',
            'address' => 'Jl. Orang Tua No. 2, Kota ABC',
            'is_active' => true,
        ]);

        $this->command->info('Users created successfully!');
        $this->command->info('Admin - Email: admin@sekolah.com, Password: admin123');
        $this->command->info('Teacher - Email: budi.guru@sekolah.com, Password: guru123');
        $this->command->info('Parent - Email: ahmad.ortu@gmail.com, Password: ortu123');
    }
}
