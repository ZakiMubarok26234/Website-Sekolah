<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Student;

class CreateSampleStudent extends Command
{
    protected $signature = 'create:sample-student';
    protected $description = 'Create sample student data for testing';

    public function handle()
    {
        // Find Ahmad Rahman
        $ahmad = User::where('email', 'ahmad.ortu@gmail.com')->first();
        
        if (!$ahmad) {
            $this->error('Ahmad Rahman not found!');
            return;
        }
        
        $this->info("Found parent: {$ahmad->name} (ID: {$ahmad->id})");
        
        // Create a student for Ahmad
        $student = Student::create([
            'nis' => '2024001',
            'name' => 'Andi Rahman',
            'gender' => 'Laki-laki',
            'birth_date' => '2012-05-15',
            'birth_place' => 'Jakarta',
            'address' => 'Jl. Merdeka No. 10, Jakarta',
            'phone' => '081234567890',
            'class' => '7A',
            'parent_id' => $ahmad->id,
            'is_active' => true
        ]);
        
        $this->info("Created student: {$student->name} for parent {$ahmad->name}");
        
        // Check the relationship
        $children = $ahmad->children;
        $this->info("Ahmad now has {$children->count()} children:");
        foreach ($children as $child) {
            $this->line("- {$child->name} (Class: {$child->class})");
        }
    }
}
