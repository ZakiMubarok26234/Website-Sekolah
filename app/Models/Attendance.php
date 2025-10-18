<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'subject_id',
        'teacher_id',
        'date',
        'status',
        'notes'
    ];

    protected $casts = [
        'date' => 'date'
    ];

    /**
     * Get the student for this attendance.
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Get the subject for this attendance.
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * Get the teacher who recorded this attendance.
     */
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
