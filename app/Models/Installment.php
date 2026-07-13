<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\LogsActivity;

class Installment extends Model
{
    use LogsActivity;

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
