<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashJournal extends Model
{
    protected $fillable = [
        'type',
        'amount',
        'category',
        'description',
        'transaction_date',
        'created_by',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
