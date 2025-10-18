<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\User;
use App\Models\Payment;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Make sure we have some parents
        $parentCount = User::where('role', 'orang_tua')->count();
        $this->command->info("Found {$parentCount} parents in database");
        
        if ($parentCount == 0) {
            $this->command->error('No parents found! Please create some parent users first.');
            return;
        }

        // Create 10 students using factory
        Student::factory(10)->create();

        $this->command->info('10 students created successfully!');
        
        // Show some example data
        $ahmad = User::where('email', 'ahmad.ortu@gmail.com')->first();
        if ($ahmad) {
            $ahmadChildren = Student::where('parent_id', $ahmad->id)->get();
            $this->command->info("Ahmad Rahman has {$ahmadChildren->count()} children:");
            foreach ($ahmadChildren as $child) {
                $this->command->line("- {$child->name} (Class: {$child->class})");
            }
        }
    }
}
