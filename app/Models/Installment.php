<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    protected $fillable = [
        'loan_id',
        'amount_paid',
        'penalty_amount',
        'payment_date',
        'due_date',
        'status',
    ];

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}
