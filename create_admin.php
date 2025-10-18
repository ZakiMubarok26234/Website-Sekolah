<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;

echo "Checking existing users...\n";

// Get all users
$users = User::all();

if ($users->count() > 0) {
    echo "📋 Existing users:\n";
    foreach ($users as $user) {
        echo "- Name: {$user->name}\n";
        echo "  Email: {$user->email}\n";
        echo "  Created: {$user->created_at}\n";
        echo "\n";
    }
} else {
    echo "Creating admin user...\n";
    
    // Create admin user
    try {
        $admin = User::create([
            'name' => 'Admin Sekolah',
            'email' => 'admin@sekolah.com',
            'password' => Hash::make('admin123'),
            'email_verified_at' => now(),
        ]);

        echo "🎉 Admin user created successfully!\n";
        echo "📧 Email: admin@sekolah.com\n";
        echo "🔐 Password: admin123\n";
    } catch (Exception $e) {
        echo "❌ Error creating admin user: " . $e->getMessage() . "\n";
    }
}

echo "\n";
echo "🌐 Login URL: http://localhost:8000/login\n";
echo "📧 Default Email: admin@sekolah.com\n";
echo "🔐 Default Password: admin123\n";
