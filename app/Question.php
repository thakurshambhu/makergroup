<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Question extends Model
{
  
    protected $table = 'questions';
    protected $fillable = ['id','user_id','ques','who_to_ask','how_you_ask_it'];
}
