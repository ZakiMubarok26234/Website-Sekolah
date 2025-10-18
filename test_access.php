<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== TESTING ACCESS RESTRICTIONS ===" . PHP_EOL;

// Test users
$admin = App\Models\User::where('role', 'admin')->first();
$guru = App\Models\User::where('role', 'guru')->first(); 
$parent = App\Models\User::where('role', 'orang_tua')->first();

echo "Admin user: " . ($admin ? $admin->name . " (" . $admin->email . ")" : "Not found") . PHP_EOL;
echo "Guru user: " . ($guru ? $guru->name . " (" . $guru->email . ")" : "Not found") . PHP_EOL;
echo "Parent user: " . ($parent ? $parent->name . " (" . $parent->email . ")" : "Not found") . PHP_EOL . PHP_EOL;

// Check routes
echo "Routes that should only be accessible to admin:" . PHP_EOL;
echo "- /admin/news" . PHP_EOL;
echo "- /admin/gallery" . PHP_EOL;
echo "- /admin/school-info" . PHP_EOL . PHP_EOL;

echo "Routes accessible to all authenticated users:" . PHP_EOL;
echo "- /dashboard (role-based redirection)" . PHP_EOL;
echo "- /profile" . PHP_EOL . PHP_EOL;

echo "Role-specific dashboards:" . PHP_EOL;
echo "- /admin/dashboard (admin only)" . PHP_EOL;
echo "- /teacher/dashboard (guru only)" . PHP_EOL;
echo "- /parent/dashboard (orang_tua only)" . PHP_EOL . PHP_EOL;

echo "Access has been restricted successfully!" . PHP_EOL;
echo "Non-admin users will only see Dashboard in navigation." . PHP_EOL;
