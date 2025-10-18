<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create admin user for school website';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Check if admin already exists
        $existingAdmin = User::where('email', 'admin@sekolah.com')->first();
        
        if ($existingAdmin) {
            $this->error('Admin user already exists!');
            $this->info('Email: admin@sekolah.com');
            return;
        }

        // Create admin user
        $admin = User::create([
            'name' => 'Admin Sekolah',
            'email' => 'admin@sekolah.com',
            'password' => Hash::make('admin123'),
            'email_verified_at' => now(),
        ]);

        $this->info('🎉 Admin user created successfully!');
        $this->info('📧 Email: admin@sekolah.com');
        $this->info('🔐 Password: admin123');
        $this->info('');
        $this->info('You can now login at: http://localhost:8000/login');
    }
}
