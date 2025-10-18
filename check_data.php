<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== CHECKING STUDENTS DATA ===" . PHP_EOL;

// Check total students
$totalStudents = DB::table('students')->count();
echo "Total students: " . $totalStudents . PHP_EOL . PHP_EOL;

// Check students with parents
$studentsWithParents = DB::table('students')
    ->whereNotNull('parent_id')
    ->get(['name', 'parent_id', 'class']);

echo "Students with parents:" . PHP_EOL;
foreach ($studentsWithParents as $student) {
    echo "- " . $student->name . " (parent_id: " . $student->parent_id . ", class: " . $student->class . ")" . PHP_EOL;
}

echo PHP_EOL . "=== CHECKING PARENT-CHILD RELATIONSHIP ===" . PHP_EOL;

// Check specific parent (Ahmad Rahman)
$ahmad = DB::table('users')->where('email', 'ahmad.ortu@gmail.com')->first();
if ($ahmad) {
    echo "Parent found: " . $ahmad->name . " (ID: " . $ahmad->id . ")" . PHP_EOL;
    
    $ahmadChildren = DB::table('students')->where('parent_id', $ahmad->id)->get(['name', 'class']);
    echo "Ahmad's children count: " . count($ahmadChildren) . PHP_EOL;
    
    foreach ($ahmadChildren as $child) {
        echo "  - " . $child->name . " (class: " . $child->class . ")" . PHP_EOL;
    }
} else {
    echo "Ahmad not found!" . PHP_EOL;
}

echo PHP_EOL . "=== TESTING USER MODEL RELATIONSHIP ===" . PHP_EOL;

use App\Models\User;

$parent = User::where('email', 'ahmad.ortu@gmail.com')->first();
if ($parent) {
    echo "Testing User model relationship..." . PHP_EOL;
    $children = $parent->children;
    echo "Children via relationship: " . $children->count() . PHP_EOL;
    
    foreach ($children as $child) {
        echo "  - " . $child->name . " (class: " . $child->class . ")" . PHP_EOL;
    }
}

echo PHP_EOL . "Done!" . PHP_EOL;
