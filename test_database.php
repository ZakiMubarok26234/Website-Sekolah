<?php

require_once __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

try {
    echo "Testing database connection...\n";
    
    // Test User model
    $userCount = App\Models\User::count();
    echo "Users count: " . $userCount . "\n";
    
    // Test Student model if table exists
    try {
        $studentCount = App\Models\Student::count();
        echo "Students count: " . $studentCount . "\n";
    } catch (Exception $e) {
        echo "Students table error: " . $e->getMessage() . "\n";
    }
    
    // Test Subject model if table exists
    try {
        $subjectCount = App\Models\Subject::count();
        echo "Subjects count: " . $subjectCount . "\n";
    } catch (Exception $e) {
        echo "Subjects table error: " . $e->getMessage() . "\n";
    }
    
    // Test News model
    try {
        $newsCount = App\Models\News::count();
        echo "News count: " . $newsCount . "\n";
    } catch (Exception $e) {
        echo "News table error: " . $e->getMessage() . "\n";
    }
    
} catch(Exception $e) {
    echo "Database connection error: " . $e->getMessage() . "\n";
}
