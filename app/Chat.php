<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{

    //region chat type constants
    const CHAT_TYPE_PRIVATE = 'private';
    const CHAT_TYPE_GROUP = 'group';
    const CHAT_TYPE_CHANNEL = 'channel';

    const CHAT_TYPES= [self::CHAT_TYPE_CHANNEL,self::CHAT_TYPE_GROUP,self::CHAT_TYPE_PRIVATE];
    //endregion chat type constants

    //region props
    protected $fillable = ['creator_id','type'];
    //endregion props

    // region relations
    public function creator()
    {
        return $this->belongsTo(User::class,'creator_id','id');
    }
    // endregion relations
}
