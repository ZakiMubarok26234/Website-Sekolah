<?php

require_once __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;

// Create admin user
try {
    $admin = User::firstOrCreate(
        ['email' => 'admin@sekolah.com'],
        [
            'name' => 'Admin Sekolah',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]
    );
    echo "Admin user created successfully: " . $admin->email . "\n";
} catch(Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
