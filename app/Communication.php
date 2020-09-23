<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Communication extends Model
{
    protected $guarded = [];
    protected $table = "communications";
    protected $fillable = ['user_id','workflow_id','who','title','linkedin_url','personality_type','decision_maker','decision_maker_check','decision_maker_type','influence_by','relation_status','rank'];
}
