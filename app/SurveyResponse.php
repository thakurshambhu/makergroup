<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
     protected $table ="survey_responses";
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'question_id','response','weightage'
    ];

    public function survey_question(){
    	return $this->belongsTo('App\SurveyQuestion','question_id','id');
    }
}
