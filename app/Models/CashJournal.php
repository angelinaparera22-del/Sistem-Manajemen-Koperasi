<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\LogsActivity;

class CashJournal extends Model
{
    use LogsActivity;

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
