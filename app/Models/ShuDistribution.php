<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShuDistribution extends Model
{
    protected $fillable = [
        'member_id',
        'period_year',
        'total_savings_point',
        'total_loan_point',
        'amount_received',
        'status',
        'distributed_date',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
