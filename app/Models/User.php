<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'address',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Get the news articles created by this user.
     */
    public function news()
    {
        return $this->hasMany(News::class);
    }

    /**
     * Check if user has a specific role.
     */
    public function hasRole($role)
    {
        return $this->role === $role;
    }

    /**
     * Check if user is admin.
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Check if user is teacher (guru).
     */
    public function isTeacher()
    {
        return $this->role === 'guru';
    }

    /**
     * Check if user is parent (orang tua).
     */
    public function isParent()
    {
        return $this->role === 'orang_tua';
    }

    /**
     * Get children (students) if user is a parent.
     */
    public function children()
    {
        return $this->hasMany(Student::class, 'parent_id');
    }

    /**
     * Get subjects taught by this teacher.
     */
    public function subjects()
    {
        // For now, return a query builder that returns empty results
        return $this->belongsToMany(Student::class, 'subjects', 'id', 'id')->where('id', 0);
    }

    /**
     * Get grades given by this teacher.
     */
    public function gradesGiven()
    {
        // For now, return a query builder that returns empty results
        return $this->hasMany(Student::class, 'id', 'id')->where('id', 0);
    }

    /**
     * Get attendances recorded by this teacher.
     */
    public function attendancesRecorded()
    {
        // For now, return a query builder that returns empty results
        return $this->hasMany(Student::class, 'id', 'id')->where('id', 0);
    }
}
