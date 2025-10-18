<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Student;
use DB;

class CheckStudentData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:student-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check student and parent relationship data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('=== CHECKING STUDENTS DATA ===');
        
        // Check total students
        $totalStudents = Student::count();
        $this->info("Total students: {$totalStudents}");
        
        // Check students with parents
        $studentsWithParents = Student::whereNotNull('parent_id')->get();
        $this->info("Students with parents: " . $studentsWithParents->count());
        
        foreach ($studentsWithParents as $student) {
            $this->line("- {$student->name} (parent_id: {$student->parent_id}, class: {$student->class})");
        }
        
        $this->info('');
        $this->info('=== CHECKING PARENT-CHILD RELATIONSHIP ===');
        
        // Check specific parent (Ahmad Rahman)
        $ahmad = User::where('email', 'ahmad.ortu@gmail.com')->first();
        if ($ahmad) {
            $this->info("Parent found: {$ahmad->name} (ID: {$ahmad->id})");
            
            $ahmadChildren = $ahmad->children;
            $this->info("Ahmad's children count: " . $ahmadChildren->count());
            
            foreach ($ahmadChildren as $child) {
                $this->line("  - {$child->name} (class: {$child->class})");
            }
        } else {
            $this->error("Ahmad not found!");
        }
        
        $this->info('');
        $this->info('Done!');
    }
}
