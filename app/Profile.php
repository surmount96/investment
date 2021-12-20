<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'address',
        'phone_number',
        'account_name',
        'account_number',
        'bank_name'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
