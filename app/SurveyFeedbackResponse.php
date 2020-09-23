<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyFeedbackResponse extends Model
{

	protected $fillable = [
        'question_id','response', 'submitted_for','submitted_by','weightage'
    ];
    public function comments()
    {
        return $this->hasMany('App\Comment' , 'submitted_for', 'submitted_for');
    }

    public function surveyquestion(){
    	return $this->hasOne('App\SurveyQuestion','id','question_id');
    }
}
