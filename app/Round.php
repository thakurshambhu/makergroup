<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Round extends Model
{

	protected $fillable = [
        'game_id','final_bid', 'user_won','round_complete'
    ];
	protected $table = 'rounds';

	public function bidding(){
         return $this->hasMany('App\Bidding','round_id','id');
    }	

    public function game(){
         return $this->belongsTo('App\Game','game_id','id');
    }	

}
