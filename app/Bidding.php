<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidding extends Model
{
   protected $table = 'biddings';

   protected $fillable = [
        'round_id', 'user1_bid','user_2_bid'
    ];


	 public function round(){
         return $this->hasMany('App\Round','round_id','id');
    }	



}
