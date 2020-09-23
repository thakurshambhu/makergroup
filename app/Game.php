<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'batch_id', 'team_id'
    ];


    public function rounds(){
	    	return $this->hasMany('App\Round')->take(6)->orderBy('id','DESC');

    }








}
