<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\SoftDeletes;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','dob','password','gender','role_id','address','photo_url','is_profile_complete','company','division','title','manager_name','training','with_who','when_training','negotiation','negotiate_with','variables','negotiator','why','why_not','enjoy_negotiation','why_enjoy','why_not_enjoy','effective_negotiator','complete_profile'
    ];


   
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $guarded = [
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

static $user_id;
    public function batch()
    {
        return $this->belongsTo('App\Batch'); 
    }

    public function feedbackResponses(){
        return $this->hasMany('App\SurveyFeedbackResponse','submitted_by','id')->leftjoin('survey_questions','question_id','survey_questions.id')->where('submitted_for',self::$user_id);
    }
    public function comments(){
        return $this->hasMany('App\Comment','submitted_by','id')->where('submitted_for',self::$user_id);    
    }

    public static function setSelectedUserId($user_id){
        self::$user_id = $user_id;
    }

     public function user()
    {
        return $this->hasMany('App\Workflow','user_id','id');
    }
}
