<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\LogsActivity;

class Loan extends Model
{
    use LogsActivity;

    protected $fillable = [
        'member_id',
        'amount',
        'interest_rate',
        'tenor',
        'status',
        'start_date',
        'due_date',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function installments()
    {
        return $this->hasMany(Installment::class);
    }
}
