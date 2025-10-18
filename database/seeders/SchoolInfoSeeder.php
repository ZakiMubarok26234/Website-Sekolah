<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SchoolInfo;

class SchoolInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schoolData = [
            ['key' => 'school_name', 'value' => 'SMA Negeri 1 Jakarta', 'type' => 'text'],
            ['key' => 'school_address', 'value' => 'Jl. Pendidikan No. 123, Jakarta Pusat, DKI Jakarta 10110', 'type' => 'textarea'],
            ['key' => 'school_phone', 'value' => '(021) 1234-5678', 'type' => 'text'],
            ['key' => 'school_email', 'value' => 'info@sman1jakarta.sch.id', 'type' => 'text'],
            ['key' => 'principal_name', 'value' => 'Dr. Ahmad Susanto, M.Pd', 'type' => 'text'],
            ['key' => 'student_count', 'value' => '340', 'type' => 'number'],
            ['key' => 'teacher_count', 'value' => '24', 'type' => 'number'],
            ['key' => 'staff_count', 'value' => '8', 'type' => 'number'],
            ['key' => 'school_vision', 'value' => 'Menjadi sekolah unggulan yang menghasilkan generasi cerdas, berkarakter, dan berwawasan global', 'type' => 'textarea'],
            ['key' => 'school_mission', 'value' => "1. Menyelenggarakan pendidikan berkualitas tinggi\n2. Mengembangkan karakter siswa yang berakhlak mulia\n3. Membekali siswa dengan keterampilan abad 21\n4. Menciptakan lingkungan belajar yang kondusif\n5. Mengembangkan potensi siswa secara optimal", 'type' => 'textarea'],
            ['key' => 'school_history', 'value' => 'SMA Negeri 1 Jakarta didirikan pada tahun 1950 sebagai sekolah menengah atas pertama di Jakarta. Dengan visi menjadi sekolah unggulan, kami terus berinovasi dalam pendidikan untuk menghasilkan lulusan berkualitas yang siap menghadapi tantangan masa depan.', 'type' => 'textarea'],
        ];

        foreach ($schoolData as $data) {
            SchoolInfo::updateOrCreate(
                ['key' => $data['key']],
                $data
            );
        }
    }
}
