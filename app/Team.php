<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	protected $table = 'teams';

    protected $guarded = [
    ];

    public function user_1()
    {
        return $this->hasOne('App\User','id','user_1');

    }


    public function user_2()
    {
        return $this->hasOne('App\User','id','user_2');
    }
}
