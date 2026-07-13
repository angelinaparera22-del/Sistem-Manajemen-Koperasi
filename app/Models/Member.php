<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\LogsActivity;

class Member extends Model
{
    use LogsActivity;

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

    public function savings()
    {
        return $this->hasMany(Saving::class);
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function shuDistributions()
    {
        return $this->hasMany(ShuDistribution::class);
    }
}
