<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    //region props
    protected $fillable = [
        'username','name','mobile', 'bio', 'password',
    ];



    protected $hidden = [
        'password', 'code',
    ];


    protected $casts = [
        'code_expiration' => 'datetime',
    ];

    //endregion props

    //region relations

    public function chats()
    {
        return $this->hasMany(Chat::class,'creator_id','id');
    }

    //endregion relations
}
