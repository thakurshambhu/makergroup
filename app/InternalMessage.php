<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternalMessage extends Model
{
     protected $table = "internal_messages";
    protected $fillable = ['id','user_id','msg','how_to_say','recipient','by_whom','int_when'];
}
