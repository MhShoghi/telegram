<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChatParticipant extends Model
{
    use SoftDeletes;
    //region props
    protected $fillable = ['chat_id','user_id'];
    //endregion props
    //region relations
    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //endregion relations
}
