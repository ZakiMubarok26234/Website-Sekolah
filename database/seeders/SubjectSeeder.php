<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Create sample subjects
        $subjects = [
            ['code' => 'MTK', 'name' => 'Matematika', 'description' => 'Mata pelajaran Matematika', 'credit_hours' => 4],
            ['code' => 'IND', 'name' => 'Bahasa Indonesia', 'description' => 'Mata pelajaran Bahasa Indonesia', 'credit_hours' => 4],
            ['code' => 'ING', 'name' => 'Bahasa Inggris', 'description' => 'Mata pelajaran Bahasa Inggris', 'credit_hours' => 3],
            ['code' => 'IPA', 'name' => 'IPA', 'description' => 'Mata pelajaran Ilmu Pengetahuan Alam', 'credit_hours' => 4],
            ['code' => 'IPS', 'name' => 'IPS', 'description' => 'Mata pelajaran Ilmu Pengetahuan Sosial', 'credit_hours' => 3],
            ['code' => 'PKN', 'name' => 'PKN', 'description' => 'Mata pelajaran Pendidikan Kewarganegaraan', 'credit_hours' => 2],
            ['code' => 'OR', 'name' => 'Olahraga', 'description' => 'Mata pelajaran Pendidikan Jasmani', 'credit_hours' => 2],
            ['code' => 'SEN', 'name' => 'Seni Budaya', 'description' => 'Mata pelajaran Seni Budaya', 'credit_hours' => 2],
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }

        // Assign teachers to subjects
        $teachers = User::where('role', 'guru')->get();
        $subjects = Subject::all();

        if ($teachers->count() > 0 && $subjects->count() > 0) {
            // Teacher 1 teaches Math and Science
            if ($teachers->count() >= 1) {
                DB::table('teacher_subjects')->insert([
                    [
                        'teacher_id' => $teachers[0]->id,
                        'subject_id' => $subjects->where('code', 'MTK')->first()->id,
                        'class' => '7A',
                        'academic_year' => '2024/2025',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'teacher_id' => $teachers[0]->id,
                        'subject_id' => $subjects->where('code', 'IPA')->first()->id,
                        'class' => '7A',
                        'academic_year' => '2024/2025',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                ]);
            }

            // Teacher 2 teaches Indonesian and English
            if ($teachers->count() >= 2) {
                DB::table('teacher_subjects')->insert([
                    [
                        'teacher_id' => $teachers[1]->id,
                        'subject_id' => $subjects->where('code', 'IND')->first()->id,
                        'class' => '7A',
                        'academic_year' => '2024/2025',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'teacher_id' => $teachers[1]->id,
                        'subject_id' => $subjects->where('code', 'ING')->first()->id,
                        'class' => '7A',
                        'academic_year' => '2024/2025',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                ]);
            }
        }

        $this->command->info('Subjects created and assigned to teachers successfully!');
    }
}
