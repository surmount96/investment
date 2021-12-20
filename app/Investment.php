<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    public function payment()
    {
        return $this->belongsTo('App\Payment');
    }
}
