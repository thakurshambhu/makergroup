<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExternalMessage extends Model
{
    protected $guarded = [];

    protected $table = "external_messages";
    protected $fillable = ['id','user_id','msg','how_to_say','recipient','by_whom','ext_when'];
}
