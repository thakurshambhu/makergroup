<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimeEvent extends Model
{
    use SoftDeletes;
    protected $table = 'timeevents';
    protected $guarded = [];
}


