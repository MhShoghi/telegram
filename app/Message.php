<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //region message_states
    const MESSAGE_STATE_PENDING = 'pending';
    const MESSAGE_STATE_SENT = 'sent';
    const MESSAGE_STATE_VIEW = 'read';
    const MESSAGE_STATES = [
        self::MESSAGE_STATE_PENDING,
        self::MESSAGE_STATE_SENT,
        self::MESSAGE_STATE_VIEW];
    //endregion message_states
}
