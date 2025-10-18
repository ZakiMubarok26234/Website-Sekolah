<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'name',
        'gender',
        'birth_date',
        'birth_place',
        'address',
        'phone',
        'class',
        'parent_id',
        'is_active'
    ];

    protected $casts = [
        'birth_date' => 'date',
        'is_active' => 'boolean'
    ];

    /**
     * Get the parent (orang tua) that owns this student.
     */
    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    /**
     * Get all grades for this student.
     */
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    /**
     * Get all attendances for this student.
     */
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
