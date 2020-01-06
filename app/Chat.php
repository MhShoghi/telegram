<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
{

    use SoftDeletes;
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
    /**
     * connect creator to User::Class
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class,'creator_id','id');
    }
    // endregion relations
}
