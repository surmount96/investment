<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasRoles, Notifiable, Uuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','id','affiliate_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'id' => 'string',
    ];

    protected $appends = ['isOnline'];

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
    public function chats()
    {
//        return Message::whereIn('sender_id',$this->id)->whereIn('receiver_id',$this->id)->orderBy('created_at','asc')->get();
//        return $this->hasMany('App\Message','receiver_id');
    }

    public function getIsOnlineAttribute()
    {
        return Cache::has('user-is-online'.$this->id);
    }

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }
}
