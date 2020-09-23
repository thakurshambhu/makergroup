<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SurveyQuestion extends Model
{
	use SoftDeletes;
	protected $table = 'survey_questions';

    protected $guarded = [
    ];
    static $user_id;

    public function feedbackresponse()
    {
        return $this->belongsToMany('App\SurveyFeedbackResponse', 'comments', 'submitted_for', 'submitted_for');
    }

    public static function setSelectedUserId($user_id){
        self::$user_id = $user_id;
    }

    public function survey_response(){
        if(self::$user_id!=''){
            return $this->hasOne('App\SurveyResponse','question_id','id')->where('user_id',self::$user_id);    
        }else{
            return $this->hasMany('App\SurveyResponse','question_id','id');
        }
    }
}
