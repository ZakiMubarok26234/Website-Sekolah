<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'subject_id',
        'teacher_id',
        'type',
        'score',
        'academic_year',
        'semester',
        'notes'
    ];

    protected $casts = [
        'score' => 'decimal:2'
    ];

    /**
     * Get the student that owns this grade.
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Get the subject for this grade.
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * Get the teacher who gave this grade.
     */
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
