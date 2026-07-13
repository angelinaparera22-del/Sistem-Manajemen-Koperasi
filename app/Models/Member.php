<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'user_id',
        'member_number',
        'identity_number',
        'phone',
        'address',
        'status',
        'joined_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
