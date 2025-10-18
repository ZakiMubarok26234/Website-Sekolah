<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'payment_type',
        'amount',
        'month',
        'year',
        'status',
        'due_date',
        'paid_date',
        'payment_method',
        'notes'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'due_date' => 'date',
        'paid_date' => 'date'
    ];

    /**
     * Get the student for this payment.
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Scope to get overdue payments.
     */
    public function scopeOverdue($query)
    {
        return $query->where('status', 'pending')
                    ->where('due_date', '<', now());
    }

    /**
     * Scope to get paid payments.
     */
    public function scopePaid($query)
    {
        return $query->where('status', 'paid');
    }
}
