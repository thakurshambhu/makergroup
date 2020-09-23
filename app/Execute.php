<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Execute extends Model
{
    use SoftDeletes;
    protected $table = 'executes';
    protected $guarded = [];
}
