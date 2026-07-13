<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\LogsActivity;

class Saving extends Model
{
    use LogsActivity;

    protected $fillable = [
        'member_id',
        'type',
        'amount',
        'transaction_type',
        'transaction_date',
        'notes',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
