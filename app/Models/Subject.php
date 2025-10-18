<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'description',
        'credit_hours',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    /**
     * Get all teachers for this subject.
     */
    public function teachers()
    {
        return $this->belongsToMany(User::class, 'teacher_subjects', 'subject_id', 'teacher_id')
                    ->where('role', 'guru');
    }

    /**
     * Get all grades for this subject.
     */
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
