<?php

/*
|--------------------------------------------------------------------------
| Test Bootstrap Script
|--------------------------------------------------------------------------
|
| This is a simple test to check if our basic Laravel structure is working
|
*/

// Check if we can load the basic Laravel framework
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
    echo "✅ Autoloader found and loaded successfully\n";
    
    if (class_exists('Illuminate\Foundation\Application')) {
        echo "✅ Laravel Framework classes available\n";
    } else {
        echo "❌ Laravel Framework classes not found\n";
    }
} else {
    echo "❌ Vendor autoloader not found\n";
    echo "Current directory: " . __DIR__ . "\n";
    echo "Looking for: " . __DIR__ . '/vendor/autoload.php' . "\n";
}
