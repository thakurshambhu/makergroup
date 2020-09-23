<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'submitted_by','submitted_for', 'liked_comment','disliked_comment'
    ];

    protected $guarded = [
    ];

    public function feedbackresponse()
    {
        return $this->belongsToMany('App\SurveyFeedbackResponse', 'comments','submitted_for','submitted_for');
    }
}
